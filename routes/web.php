<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware('auth:admin')->group(function(){
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::match(['put','patch'],'/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        
        Route::get('/password/change', [PasswordController::class, 'edit'])->name('password.edit');

        Route::match(['put','patch'], '/password/update', [PasswordController::class, 'update'])->name('password.change');
        
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
    
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
    
    Route::post('/login', [LoginController::class, 'login'])->name('login.check');

});//End of Admin route



Route::get('/', function () {
    return to_route('admin.dashboard.index');
});

// Auth::routes();
