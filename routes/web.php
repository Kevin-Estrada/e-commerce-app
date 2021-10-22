<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\RegistrationController;
use App\Http\Controllers\Front\SessionsController;
use Illuminate\Support\Facades\Route;

/*
 * Admin Routes
 */
Route::prefix('admin')->group(function() {
        Route::middleware('auth:admin')->group(function() {
        
                // Dashboard
                Route::get('/', [DashboardController::class , 'index']);
                
                // Products
                Route::resource('/products', ProductController::class);

                // Orders
                Route::resource('/orders', OrderController::class);
                Route::get('/confirm/{id}', [OrderController::class , 'confirm'])->name('order.confirm');
                Route::get('/pending/{id}', [OrderController::class , 'pending'])->name('order.pending');

                // Users
                Route::resource('/users', UsersController::class);

                // Logout
                Route::get('/logout', [AdminUserController::class , 'logout']);
        });
        
        // Admin Login
        Route::get('/login', [AdminUserController::class , 'index'])->name('login');
        Route::post('/login', [AdminUserController::class , 'store']);

});

/*
 * Front Routes
 */

// Home Page
Route::get('/', [HomeController::class , 'index']);

// User Registration
Route::get('/user/register', [RegistrationController::class , 'index']);
Route::post('/user/register', [RegistrationController::class , 'store']);

Route::get('user/profile', function(){
        return 'Welcome - User';
});

// User Login
Route::get('/user/login', [SessionsController::class , 'index']);
Route::post('/user/login', [SessionsController::class , 'store']);