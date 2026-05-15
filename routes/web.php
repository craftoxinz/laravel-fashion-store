<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';

// Inertia routes
Route::middleware(['handle.inertia'])->group(function () {
    Route::get('/app/home', [HomeController::class, 'index']);
});
