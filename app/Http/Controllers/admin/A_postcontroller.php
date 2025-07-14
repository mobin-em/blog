<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use app\docs\BaseDocs;

class A_postcontroller extends Controller
{


    /**
     * @OA\Post(
     *     path="/api/admin/posts",
     *     summary="ایجاد پست جدید توسط ادمین",
     *     tags={"Admin Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "content", "status"},
     *                 @OA\Property(property="title", type="string", example="عنوان پست"),
     *                 @OA\Property(property="content", type="string", example="متن کامل پست"),
     *                 @OA\Property(property="status", type="string", enum={"draft", "published", "archived"}),
     *                 @OA\Property(property="image", type="file", description="آپلود تصویر (اختیاری)")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="پست با موفقیت ایجاد شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="پست با موفقیت ایجاد شد")
     *         )
     *     ),
     *     @OA\Response(response=422, description="خطای اعتبارسنجی")
     * )
     */


    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'content' => 'required|string|min:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'status' => 'required|in:draft,published,archived'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'خطا در اعتبارسنجی',
                    'errors' => $validator->errors()
                ], 422);
            }

            $imagePath = $request->hasFile('image')
                ? $request->file('image')->store('posts', 'public')
                : null;

            $post = Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'status' => $request->status,
                'user_id' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'پست با موفقیت ایجاد شد',
                'data' => $post->load('user')->append('image_url')
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error creating post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'خطا در ایجاد پست',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @OA\Get(
     *     path="/api/admin/my-posts",
     *     summary="دریافت پست‌های ادمین جاری",
     *     tags={"Admin Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="عبارت جستجو در عنوان پست",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="لیست پست‌ها",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Post"))
     *     )
     * )
     */



    public function myPosts(Request $request)
    {
        try {
            $query = Post::where('user_id', $request->user()->id);

            if ($request->has('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            return response()->json($query->latest()->get());
        } catch (\Exception $e) {
            Log::error('Error fetching posts: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'خطا در دریافت پست‌ها',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/admin/posts/{id}",
     *     summary="ویرایش پست",
     *     tags={"Admin Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="شناسه پست",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="title", type="string", example="عنوان جدید"),
     *                 @OA\Property(property="content", type="string", example="محتوای جدید"),
     *                 @OA\Property(property="status", type="string", enum={"draft", "published", "archived"}),
     *                 @OA\Property(property="image", type="file", description="تصویر جدید (اختیاری)")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="پست با موفقیت ویرایش شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="پست با موفقیت به‌روزرسانی شد")
     *         )
     *     ),
     *     @OA\Response(response=403, description="دسترسی غیرمجاز"),
     *     @OA\Response(response=404, description="پست یافت نشد"),
     *     @OA\Response(response=422, description="خطای اعتبارسنجی")
     * )
     */


    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);

            // بررسی مالکیت پست
            if ($post->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'شما مجاز به ویرایش این پست نیستید'
                ], 403);
            }

            $validator = Validator::make($request->all(), [
                'title' => 'sometimes|string|max:255',
                'content' => 'sometimes|string|min:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'status' => 'sometimes|in:draft,published,archived'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'خطا در اعتبارسنجی',
                    'errors' => $validator->errors()
                ], 422);
            }

            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::disk('public')->delete($post->image);
                }
                $post->image = $request->file('image')->store('posts', 'public');
            }

            $post->title = $request->input('title', $post->title);
            $post->content = $request->input('content', $post->content);
            $post->status = $request->input('status', $post->status);
            $post->save();

            return response()->json([
                'success' => true,
                'message' => 'پست با موفقیت به‌روزرسانی شد',
                'data' => $post->load('user')->append('image_url')
            ]);

        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'خطا در به‌روزرسانی پست',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @OA\Delete(
     *     path="/api/admin/posts/{id}",
     *     summary="حذف پست",
     *     tags={"Admin Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="شناسه پست",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="پست حذف شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="پست با موفقیت حذف شد")
     *         )
     *     ),
     *     @OA\Response(response=403, description="دسترسی غیرمجاز"),
     *     @OA\Response(response=404, description="پست یافت نشد")
     * )
     */


    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);

            // بررسی مالکیت پست
            if ($post->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'شما مجاز به حذف این پست نیستید'
                ], 403);
            }

            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'پست با موفقیت حذف شد'
            ]);

        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'خطا در حذف پست',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
