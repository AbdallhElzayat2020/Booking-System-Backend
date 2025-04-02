<?php


use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

/* Dashboard Routes */
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    Route::get('login', [AdminAuthController::class, 'login'])->name('login')->middleware('guest');
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
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile-password', [ProfileController::class, 'passwordUpdate'])->name('profile.password.update');

    /* Hero Routes */
    Route::get('hero', [HeroController::class, 'index'])->name('hero.index');
    Route::put('hero', [HeroController::class, 'update'])->name('hero.update');
});

