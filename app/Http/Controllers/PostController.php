<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use app\Models\User;

class PostController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/posts",
     *     summary="لیست پست‌ها",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         required=false,
     *         description="تعداد آیتم در هر صفحه",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         required=false,
     *         description="فیلتر بر اساس وضعیت (draft, published, archived)",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="لیست پست‌ها",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */


    public function index(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);
            $status = $request->input('status');

            $query = Post::with(['user'])
                ->latest();

            if ($status && in_array($status, ['draft', 'published', 'archived'])) {
                $query->where('status', $status);
            }

            $posts = $query->paginate($perPage);
            $posts->getCollection()->transform(function ($post) {
                return $post->append('image_url');
            });


            return response()->json($posts);

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
     * Store a newly created resource in storage.
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
                'data' => $post->load('user')
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
     *     path="/api/posts/{id}",
     *     summary="نمایش یک پست خاص",
     *     tags={"Posts"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="پست یافت شد"),
     *     @OA\Response(response=404, description="پست یافت نشد")
     * )
     */

    public function show($id)
    {
        try {
            $post = Post::with('user')->findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'پست با موفقیت دریافت شد',
                'data' => $post
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'پست مورد نظر یافت نشد',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
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
                // Delete old image if exists
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
                'data' => $post->load('user')
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
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'پست با موفقیت حذف شد',
                'data' => null
            ], 204);

        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'خطا در حذف پست',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/posts/search",
     *     summary="جستجوی پست‌ها بر اساس عنوان دقیق",
     *     tags={"Posts"},
     *     @OA\Parameter(name="q", in="query", required=true, description="عبارت جستجو", @OA\Schema(type="string")),
     *     @OA\Response(response=200, description="نتایج جستجو")
     * )
     */

    public function search(Request $request)
    {
        $query = trim($request->input('q'));

        if (empty($query)) {
            return response()->json(['message' => 'عبارت جستجو نمی‌تواند خالی باشد'], 400);
        }

        $results = Post::where('title', $query)->take(10)->get();

        return response()->json($results);
    }




}
