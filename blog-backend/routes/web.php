<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Middleware\cors;


Route::get('/', function () {
    return view('welcome');
});

