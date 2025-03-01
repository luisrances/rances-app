<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// middleware
Route::get('/user', function (Request $request) {
    echo 'Welcome API - Test Middleware';
})->middleware(UserMiddleware::class);