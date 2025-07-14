<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\A_profilecontroller;
use App\Http\Controllers\admin\A_postcontroller;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgotPasswordController;





///////auth

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);




//// post

Route::apiResource('posts', PostController::class);

Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('verify.auth.token');


////user

Route::apiResource('users', UserController::class);


////profile

Route::middleware('auth:sanctum')->get('/me', [ProfileController::class, 'me']);

Route::middleware('auth:sanctum')->put('/profile/update', [ProfileController::class, 'update']);

Route::middleware('auth:sanctum')->put('/profile/password', [ProfileController::class, 'updatePassword']);


/////ADMIN PROFILE

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/check', function (Request $request) {
        return $request->user()->is_admin
            ? response()->json(['admin' => true])
            : response()->json(['admin' => false], 403);
    });

    Route::get('/Admin_profile', [A_ProfileController::class, 'me']);

    Route::put('/Admin_profile/name', [A_ProfileController::class, 'updateName']);

    Route::put('/Admin_profile/password', [A_ProfileController::class, 'updatePassword']);

    Route::post('/Admin_posts', [A_postcontroller::class, 'store']);

    Route::get('/Admin_posts/mine', [A_postcontroller::class, 'myPosts']);

    Route::post('/Admin_posts/{id}', [A_postcontroller::class, 'update']);

    Route::post('/make-admin', [adminController::class, 'makeAdmin']);

    Route::get('/Admin_user-info', [AdminController::class, 'getUserInfo']);

    Route::post('/Admin_logout', [AuthController::class, 'logout']);

    Route::delete('/Admin_posts/{post}', [A_postcontroller::class, 'destroy']);

});


/////COMMENT

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/posts/{post}/comments', [CommentController::class, 'store']);
});

Route::get('/posts/{post}/comments', [CommentController::class, 'index']);

Route::middleware('auth:sanctum')->delete('/comments/{comment}', [CommentController::class, 'destroy']);


/////forget password

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);

Route::post('/reset-password', [ForgotPasswordController::class, 'reset']);

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [ForgotPasswordController::class, 'reset']);

