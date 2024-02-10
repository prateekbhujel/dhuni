<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index')->middleware('auth:admin');

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.show');

Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.check');

Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/', function () {
    return to_route('admin.dashboard.index');
});

// Auth::routes();
