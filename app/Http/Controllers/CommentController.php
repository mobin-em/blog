<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ReplyNotification;


class CommentController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/posts/{post}/comments",
     *     summary="دریافت لیست نظرات یک پست",
     *     tags={"Comments"},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         required=true,
     *         description="شناسه پست",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="لیست نظرات",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="object"))
     *         )
     *     )
     * )
     */


    public function index(Post $post)
    {
        try {
            if (!$post->exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'پست مورد نظر یافت نشد'
                ], 404);
            }

            $comments = $post->comments()
                ->whereNull('parent_id')
                ->with(['user:id,name,is_admin',
                    'replies' => function($query) {
                        $query->with('user:id,name,is_admin')
                            ->orderBy('created_at', 'asc');
                    }])
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $comments
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در دریافت نظرات',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/posts/{post}/comments",
     *     summary="ارسال نظر یا پاسخ به نظر",
     *     tags={"Comments"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         required=true,
     *         description="شناسه پست",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"content"},
     *             @OA\Property(property="content", type="string", example="این یک نظر تستی است"),
     *             @OA\Property(property="parent_id", type="integer", nullable=true, example=5)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="کامنت با موفقیت ثبت شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean"),
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     )
     * )
     */


    public function store(Request $request, Post $post)
    {

        try {
           
            if (!$post->exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'پست مورد نظر یافت نشد'
                ], 404);
            }

            $validated = $request->validate([
                'content' => 'required|string|max:100',
                'parent_id' => 'nullable|exists:comments,id',
            ]);

            $comment = $post->comments()->create([
                'content' => $validated['content'],
                'user_id' => auth()->id(),
                'parent_id' => $validated['parent_id'] ?? null,
            ]);

            if ($comment->parent_id) {
                try {
                    $parent = Comment::find($comment->parent_id);
                    $comment->load('user');
                    if ($parent && $parent->user_id !== auth()->id()) {
                        $parent->user->notify(new ReplyNotification($comment));
                    }
                } catch (\Exception $ex) {
                    \Log::error("Notification Error: " . $ex->getMessage());
                }
            }





          
            $comment->load(['user' => function($query) {
                $query->select('id', 'name', 'is_admin');
            }]);

            return response()->json([
                'success' => true,
                'message' => 'کامنت با موفقیت ثبت شد',
                'data' => $comment
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در ثبت کامنت',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @OA\Delete(
     *     path="/api/comments/{comment}",
     *     summary="حذف نظر توسط کاربر یا ادمین",
     *     tags={"Comments"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="comment",
     *         in="path",
     *         required=true,
     *         description="شناسه کامنت",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="کامنت حذف شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean"),
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(response=403, description="عدم دسترسی"),
     *     @OA\Response(response=404, description="کامنت یافت نشد")
     * )
     */


    public function destroy(Comment $comment)
    {
        try {
            $user = auth()->user();

            // بررسی وجود کامنت
            if (!$comment->exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'نظر مورد نظر یافت نشد'
                ], 404);
            }

            
            if ($comment->user_id != $user->id && !$user->is_admin) {
                return response()->json([
                    'success' => false,
                    'message' => 'شما مجاز به حذف این نظر نیستید'
                ], 403);
            }

            $comment->delete();

            return response()->json([
                'success' => true,
                'message' => 'نظر با موفقیت حذف شد'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در حذف نظر',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
