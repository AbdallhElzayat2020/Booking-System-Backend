<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\DashboardController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // user.dashboard

});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
