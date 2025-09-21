<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;

Route::get('/', function () {
    return view('welcome');
});

/*Backend Route*/
Route::get('dashboard/index', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('admin');

/*User*/
Route::get('user/index', [UserController::class, 'index'])
    ->name('user.index')
    ->middleware('admin');

Route::get('admin', [AuthController::class, 'index'])
    ->name('auth.admin')
    ->middleware('login');

Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
