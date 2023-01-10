<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Resources\UserResource;

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
    // Route::post('/logout', 'logout');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/posts/{post}/comments', 'index');
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/me', function (Request $request) {
        return UserResource::make($request->user());
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('/posts/{post}', 'show');
        Route::post('/posts', 'create');
        Route::post('/posts/{post}', 'update');
        Route::delete('/posts/{post}', 'destroy');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('/comments', 'create');
        Route::post('/comments/{comment}', 'update');
        Route::delete('/comments/{comment}', 'destroy');
    });
});
