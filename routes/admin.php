<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');


