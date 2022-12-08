<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', [DashboardController::class, 'home'])->name('home');

    Route::get('/admin-users', [DashboardController::class, 'adminUsers'])->name('admin-users.index');
    Route::get('/admin-users/create', [DashboardController::class, 'adminUsersCreate'])->name('admin-users.create');

    Route::get('/users', [DashboardController::class, 'users'])->name('users.index');
});

Route::get('login', [AuthController::class, 'login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
