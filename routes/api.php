<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShortUrlController;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route Register User
Route::post('register',[AuthController::class, 'register']);

//Route Login User
Route::post('login',[AuthController::class, 'login']);

//Get URL
Route::get('/{key}', [ShortUrlController::class, 'index']);

//After Auth
Route::middleware('auth:api')->group(function(){
    ################## USER ##################
    //Route detail user
    Route::post('user/detail', [AuthController::class, 'user_detail']);

    ############### Short URL ##############
    //Route Short URL
    Route::post('shorturl/{key}', [ShortUrlController::class, 'store']);

});
