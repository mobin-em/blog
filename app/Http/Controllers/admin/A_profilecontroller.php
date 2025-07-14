<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class A_profilecontroller extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/admin/profile",
     *     summary="دریافت اطلاعات پروفایل ادمین",
     *     description="برگرداندن نام و ایمیل کاربر لاگین‌شده (ادمین)",
     *     tags={"Admin Profile"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="اطلاعات کاربر",
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Admin User"),
     *             @OA\Property(property="email", type="string", example="admin@example.com")
     *         )
     *     )
     * )
     */


    public function me(Request $request)
    {
        return response()->json([
            'name' => $request->user()->name,
            'email' => $request->user()->email,
        ]);
    }


    /**
     * @OA\Post(
     *     path="/api/admin/profile/update-name",
     *     summary="بروزرسانی نام ادمین",
     *     tags={"Admin Profile"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="مدیر جدید")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="نام با موفقیت بروزرسانی شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="نام با موفقیت به‌روزرسانی شد.")
     *         )
     *     ),
     *     @OA\Response(response=422, description="خطا در اعتبارسنجی")
     * )
     */


    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->save();

        return response()->json(['message' => 'نام با موفقیت به‌روزرسانی شد.']);
    }


    /**
     * @OA\Post(
     *     path="/api/admin/profile/update-password",
     *     summary="تغییر رمز عبور ادمین",
     *     tags={"Admin Profile"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"password", "password_confirmation"},
     *             @OA\Property(property="password", type="string", format="password", example="newpassword123"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="newpassword123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="رمز عبور تغییر کرد",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="رمز عبور با موفقیت تغییر یافت.")
     *         )
     *     ),
     *     @OA\Response(response=422, description="خطای اعتبارسنجی")
     * )
     */


    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'رمز عبور با موفقیت تغییر یافت.']);
    }
}
