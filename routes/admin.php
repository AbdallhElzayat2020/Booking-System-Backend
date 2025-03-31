<?php


use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

/* Dashboard Routes */
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::get('forget-password', [AdminAuthController::class, 'forgetPassword'])->name('password.request');

});

/* Protected Routes */
Route::group([
    'middleware' => ['auth', 'check.type:admin'],
    'as' => 'admin.',
    'prefix' => 'admin'
], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    /* Profile Route */
    Route::get('profile',[ProfileController::class, 'index'])->name('profile');

});

