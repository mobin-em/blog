<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use app\http\middleware\VerifyAuthToken;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use app\http\middleware;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ForgotPasswordController;

/////home

Route::get('/', function () {
    return view('home');
});


Route::get('/search', [PostController::class, 'search']);

////post

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/posts/{id}', function ($id) {
    return view('posts.show', ['id' => $id]);
});


/////auth

Route::get('/auth', function () {
    return view('auth');
});


///profile

Route::get('/profile', function () {
    return view('profile.show');
});



/////ADMIN PROFILE

Route::get('/profile_A', function () {
    return view('profile.admin');
});






