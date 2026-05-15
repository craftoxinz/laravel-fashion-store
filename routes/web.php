<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


require __DIR__.'/admin.php';

// Inertia routes
Route::middleware(['handle.inertia'])->group(function () {
    Route::get('/app/home', [HomeController::class, 'index']);
});
