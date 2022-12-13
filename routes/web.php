<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AppUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminUserController::class, 'home'])->name('home');

    Route::prefix('/admin-user')->name('admin-user.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
    });

    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [AppUserController::class, 'index'])->name('index');
        Route::delete('/{id}/delete', [AppUserController::class, 'delete'])->name('delete');
        Route::get('/{id}/detail', [AppUserController::class, 'detail'])->name('detail');
        Route::get('/{userID}/post/{postID}', [AppUserController::class, 'post'])->name('post');
    });
    
});

Route::get('login', [AuthController::class, 'login']);

Auth::routes(
    ['register' => false]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
