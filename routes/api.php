<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'v1/auth'], function() {
    Route::controller(\App\Http\Controllers\API\V1\AuthController::class)->group(function() {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('otp-send', 'sendOtp');
        Route::post('otp-verify', 'VerifyOtp');
    });
});

Route::middleware('auth:sanctum')->group(function() {
    Route::group(['prefix' => 'v1/auth'], function() {
        Route::controller(\App\Http\Controllers\API\V1\AuthController::class)->group(function() {
            Route::post('logout', 'logout');
        });
    });
    Route::group(['prefix' => 'v1/users'], function() {
        Route::controller(\App\Http\Controllers\API\V1\UserController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('/ban/{id}', 'ban');
            Route::post('/unban/{id}', 'unBan');
            Route::delete('/{id}', 'destroy');
        });
        Route::controller(\App\Http\Controllers\API\V1\ProfileController::class)->group(function() {
            Route::get('profile', 'profile');
        });

    });
});
