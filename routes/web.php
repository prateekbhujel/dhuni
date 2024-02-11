<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware('auth:admin')->group(function(){
        
        Route::middleware('active-only')->group(function()
        {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
            
            Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

            Route::match(['put','patch'],'/profile/update', [ProfileController::class, 'update'])->name('profile.update');
            
            Route::get('/password/change', [PasswordController::class, 'edit'])->name('password.edit');

            Route::match(['put','patch'], '/password/update', [PasswordController::class, 'update'])->name('password.change');

            Route::resource('staffs', StaffController::class)->except(['show'])->middleware(('admin-access'));

            Route::resources([
                'users' => UserController::class,
            ]);
        });
        
        
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
    
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
    
    Route::post('/login', [LoginController::class, 'login'])->name('login.check');

});//End of Admin route



Route::get('/', function () {
    return to_route('admin.dashboard.index');
});

// Auth::routes();
