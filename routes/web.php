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

// day 2
//routing -> parameters
Route::get('/post/{post_id}/comment/{comment}', function (string $post_id, string $comment) {
    return "Post ID: " . $post_id . " - Comment: " . $comment;
});

Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');

// named route or route alias
Route::get('/test/route', function () {
    return route('test-route');
})->name('test-route');

//route -> middleware group
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });

    Route::get('route-middleware-group/second', function (Request $request) {
        echo 'second';
    });
});

// route -> controller
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

//crsf
// Route::get('/token', function (Request $request) {
//     $token = $request->session()->token();
//     return view('token', ['token' => $token]);
// });

Route::get('/token', function (Request $request) {
    return view('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});