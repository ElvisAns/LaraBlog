<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::get('/posts/{limit?}',[PostController::class,'index']);
Route::get('/posts/read/{slug}',[PostController::class,'read']);

Route::post('/posts/create',[PostController::class,'create']);
Route::post('/posts/update/{post_id}',[PostController::class,'update']);

Route::get('/posts/delete/{post_id}')

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
