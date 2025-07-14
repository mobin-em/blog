<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/me",
     *     summary="دریافت اطلاعات کاربر لاگین‌ کرده",
     *     tags={"Profile"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="اطلاعات کاربر",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object")
     *         )
     *     )
     * )
     */

    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }


    /**
     * @OA\Put(
     *     path="/api/profile",
     *     summary="ویرایش نام کاربر",
     *     tags={"Profile"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="مبین میرشفیعی")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="نام با موفقیت بروزرسانی شد",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="نام با موفقیت بروزرسانی شد")
     *         )
     *     )
     * )
     */


public function update(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
    ]);

    $user = $request->user();
    $user->update([
        'name' => $request->name,
    ]);

    return response()->json(['message' => 'نام با موفقیت بروزرسانی شد']);
}


    /**
     * @OA\Put(
     *     path="/api/profile/password",
     *     summary="تغییر رمز عبور کاربر",
     *     tags={"Profile"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"current_password", "password", "password_confirmation"},
     *             @OA\Property(property="current_password", type="string", format="password", example="oldpassword"),
     *             @OA\Property(property="password", type="string", format="password", example="newpassword"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="newpassword")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="رمز عبور تغییر یافت",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="رمز عبور با موفقیت تغییر یافت")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="رمز فعلی اشتباه است"
     *     )
     * )
     */


public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = $request->user();

    if (!Hash::check($request->current_password, $user->password)) {
        return response()->json([
            'message' => 'رمز فعلی اشتباه است',
        ], 422);
    }

    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'رمز عبور با موفقیت تغییر یافت']);
}
}
