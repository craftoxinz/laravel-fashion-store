<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Product routes
    Route::resource('products', ProductController::class)->only([
        'index', 'store', 'update', 'destroy',
    ]);

    // Category routes
    Route::resource('categories', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy',
    ]);

    // Customer routes
    Route::resource('customers', CustomerController::class)->only([
        'index', 'store', 'update', 'destroy',
    ]);

    // Order routes
    Route::resource('orders', OrderController::class)->only([
        'index', 'store', 'update', 'destroy',
    ]);

    // Employee routes
    Route::resource('employees', EmployeeController::class)->only([
        'index', 'store', 'update', 'destroy',
    ]);

    // Supplier routes
    Route::resource('suppliers', SupplierController::class)->only([
        'index', 'store', 'update', 'destroy',
    ]);
});
