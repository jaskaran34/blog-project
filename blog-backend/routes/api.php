<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Middleware\cors;




    
Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::delete('/posts/{id}',[PostController::class,'destroy']);
Route::post('/posts', [PostController::class, 'store'])->middleware(\App\Http\Middleware\Cors::class);
Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware(\App\Http\Middleware\Cors::class);
