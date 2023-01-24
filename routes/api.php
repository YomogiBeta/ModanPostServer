<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'authenticate');
    Route::post('/register', 'register');
    Route::get('/logout', 'logout');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{post}', 'show');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/posts/{post}/comments', 'index');
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(AccountController::class)->group(function () {
        Route::get('/me', 'show');
        Route::post('/me', 'update');
        Route::post('/me/profile', 'updateProfile');
    });

    Route::controller(PostController::class)->group(function () {
        Route::post('/posts', 'create');
        Route::post('/posts/{post}', 'update');
        Route::delete('/posts/{post}', 'destroy');
    });

    Route::controller(PostImageController::class)->group(function () {
        Route::post('/posts/{post}/post_images', 'create');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('/posts/{post}/comments', 'create');
        Route::post('/comments/{comment}', 'update');
        Route::delete('/comments/{comment}', 'destroy');
    });
});
