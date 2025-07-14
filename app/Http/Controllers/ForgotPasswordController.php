<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/forgot-password",
     *     summary="ارسال لینک بازیابی رمز عبور",
     *     tags={"Password"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="لینک بازیابی رمز عبور ارسال شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="لینک بازیابی رمز عبور به ایمیل شما ارسال شد.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="خطا در ارسال لینک"
     *     )
     * )
     */

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'لینک بازیابی رمز عبور به ایمیل شما ارسال شد.'])
            : response()->json(['message' => 'ارسال لینک بازیابی با مشکل مواجه شد.'], 500);
    }


    /**
     * @OA\Post(
     *     path="/api/reset-password",
     *     summary="تنظیم رمز عبور جدید",
     *     tags={"Password"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"token", "email", "password", "password_confirmation"},
     *             @OA\Property(property="token", type="string", example="abcdef123456"),
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="newpassword"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="newpassword")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="رمز عبور با موفقیت تغییر یافت",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="رمز عبور با موفقیت تغییر کرد.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="توکن نامعتبر یا اطلاعات ناقص"
     *     )
     * )
     */


    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'رمز عبور با موفقیت تغییر کرد.'])
            : response()->json(['message' => 'توکن نامعتبر یا منقضی شده است.'], 422);
    }
    }
