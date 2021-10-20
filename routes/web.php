<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminUserController;
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
