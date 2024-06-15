<?php

use Illuminate\Support\Facades\Route;

// Authentication Routes...
Auth::routes();

// Example of protecting a route with auth middleware
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::prefix('u')->group(function () {
        Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        // Route::get('/profile', [ProfileController::class, 'index'])->name('dashboard.profile');
        // Route::get('/settings', [SettingsController::class, 'index'])->name('dashboard.settings');
        // Add more routes as needed
    });
});
