<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\MediaController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('multimedia', AuthController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/profile', [UserController::class, 'profile']);
});
Route::get('/multimedia', [MultimediaController::class, 'index']);


Route::post('/api/user/upload', [MediaController::class, 'upload'])->middleware('auth:api');
Route::get('/api/user/media', [MediaController::class, 'getUserMedia'])->middleware('auth:api');


Route::middleware('auth:api')->group(function () {
    Route::get('/api/user/media', [MediaController::class, 'getUserMedia']);
    Route::post('/api/user/upload', [MediaController::class, 'upload']);
    Route::delete('/api/user/media/{id}', [MediaController::class, 'deleteMedia']);
});


Route::post('/api/user/upload', [MultimediaController::class, 'upload']);
Route::post('/register', [AuthController::class, 'register']);
