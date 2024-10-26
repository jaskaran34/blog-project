<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Middleware\cors;


use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
//Route::post('/logout', [AuthController::class, 'logout'])

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user_send'])->middleware('auth:sanctum');

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    try {
        // Call the controller method
        return app(AuthController::class)->user_send($request);
    } catch (Throwable $e) {
        // Return a JSON response if an error occurs
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'code' => $e->getCode()
        ], 500);
    }
});

*/

Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::delete('/posts/{id}',[PostController::class,'destroy']);
Route::post('/posts', [PostController::class, 'store'])->middleware(\App\Http\Middleware\Cors::class);
Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware(\App\Http\Middleware\Cors::class);

