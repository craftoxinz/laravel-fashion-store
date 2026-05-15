<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


