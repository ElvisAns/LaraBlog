<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::post('/sanctum/token', [AuthController::class,'index']);

Route::get('/posts/{limit?}',[PostController::class,'index']);
Route::get('/posts/read/{slug}',[PostController::class,'read']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/posts/delete/{post_id}',[PostController::class,'destroy']);
    Route::post('/posts/create',[PostController::class,'create']);
    Route::post('/posts/update/{post_id}',[PostController::class,'update']);
    Route::get('/users/get/{user_id}',[UserController::class,'get']);
    Route::get('/users/list/all',[UserController::class,'all']);
});


