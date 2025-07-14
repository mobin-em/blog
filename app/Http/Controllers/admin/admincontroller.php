<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/admin/user-info",
     *     summary="دریافت اطلاعات کاربر از طریق ایمیل",
     *     tags={"Admin"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="اطلاعات کاربر با موفقیت دریافت شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="name", type="string", example="کاربر تستی"),
     *             @OA\Property(property="email", type="string", example="user@example.com"),
     *             @OA\Property(property="is_admin", type="boolean", example=false)
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="کاربر یافت نشد"
     *     )
     * )
     */
    public function getUserInfo(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'کاربر یافت نشد'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'name' => $user->name,
                'email' => $user->email,
                'is_admin' => $user->is_admin
            ]);

        } catch (\Exception $e) {
            Log::error('Error getting user info: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'خطا در دریافت اطلاعات کاربر'
            ], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/admin/make-admin",
     *     summary="ارتقاء کاربر به ادمین",
     *     tags={"Admin"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="کاربر با موفقیت به ادمین ارتقاء یافت",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="کاربر با موفقیت به ادمین ارتقاء یافت")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="کاربر از قبل ادمین است"
     *     )
     * )
     */
    public function makeAdmin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user->is_admin) {
                return response()->json([
                    'success' => false,
                    'message' => 'این کاربر هم‌اکنون ادمین است'
                ]);
            }

            $user->is_admin = true;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'کاربر با موفقیت به ادمین ارتقاء یافت'
            ]);

        } catch (\Exception $e) {
            Log::error('Error making admin: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'خطا در تبدیل کاربر به ادمین'
            ], 500);
        }
    }
}
