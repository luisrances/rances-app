<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

// service container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

// service providers
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
    // dd($userService->listUsers());
});

// service controller
Route::get('/test-users', [UserController::class, 'index']);

// facades
Route::get('/test-facades', function (UserService $userService) {
    return Response::json($userService->listUsers());
    // dd(Response::json($userService->listUsers()));
});