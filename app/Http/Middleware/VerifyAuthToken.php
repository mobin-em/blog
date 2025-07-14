<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class VerifyAuthToken
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. دریافت توکن از هدر
        $authHeader = $request->header('Authorization');
        if (!$authHeader) {
            return response()->json([
                'status' => 'error',
                'message' => 'توکن احراز هویت ارائه نشده است',
                'error_code' => 'AUTH_TOKEN_MISSING'
            ], 401);
        }

// جدا کردن قسمت توکن از "Bearer <token>"
        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'توکن احراز هویت ارائه نشده است',
                'error_code' => 'AUTH_TOKEN_MISSING'
            ], 401);
        }

        // 2. بررسی و جستجوی توکن
        $tokenModel = PersonalAccessToken::findToken($token);

        if (!$tokenModel) {
            return response()->json([
                'status' => 'error',
                'message' => 'توکن احراز هویت نامعتبر یا منقضی شده است',
                'error_code' => 'INVALID_AUTH_TOKEN'
            ], 401);
        }

        // 3. بررسی انقضا (اختیاری)
        if ($tokenModel->expires_at && now()->gt($tokenModel->expires_at)) {
            return response()->json([
                'status' => 'error',
                'message' => 'توکن احراز هویت منقضی شده است',
                'error_code' => 'TOKEN_EXPIRED'
            ], 401);
        }

        // 4. تنظیم کاربر برای درخواست
        auth()->setUser($tokenModel->tokenable);

        // 5. ضمیمه کردن اطلاعات به درخواست (اختیاری)
        $request->merge([
            'user' => $tokenModel->tokenable,
            'current_access_token' => $tokenModel
        ]);

        return $next($request);
    }
}
