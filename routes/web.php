<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


// Authentication Routes...
Auth::routes();

// Example of protecting a route with auth middleware
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/trade', [App\Http\Controllers\TradeController::class, 'index'])->name('trade');
Route::get('/transaction-status', [App\Http\Controllers\TransactionController::class, 'checkStatus'])->name('transaction-status');


// User Dashboard
Route::middleware(['auth'])->group(function () {
    // Route::prefix('u')->group(function () {
    //     Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    //     // Add more routes as needed
    // });
    Route::get('/wallet', [App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
    Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('order.post');
    Route::get('/payment', [App\Http\Controllers\OrderController::class, 'paymentPage'])->name('payment');
    Route::post('/transactions', [App\Http\Controllers\TransactionController::class, 'store'])->name('transactions.post');
});


// Admin Dashboard
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('u')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');

        Route::prefix('dashboard')->group(function () {
            Route::get('/users', [App\Http\Controllers\AdminDashboardController::class, 'users'])->name('dashboard.users');
            Route::get('/user/{id}', [App\Http\Controllers\AdminDashboardController::class, 'singleUser'])->name('dashboard.user');

            Route::get('/active-coins', [App\Http\Controllers\AdminDashboardController::class, 'activeCoins'])->name('dashboard.active-coins');
            Route::get('/transactions', [App\Http\Controllers\AdminDashboardController::class, 'transactions'])->name('dashboard.transactions');

            Route::get('/settings', [App\Http\Controllers\AdminDashboardController::class, 'settings'])->name('dashboard.settings');
            Route::post('/site-options', [App\Http\Controllers\AdminDashboardController::class, 'updateSiteOptions'])->name('dashboard.options.update');
        });
    });
});












Route::get('/clear-route-cache', function () {
    if (request()->ip() != '103.95.211.1') {
        abort(403, 'Unauthorized action.');
    }
    Artisan::call('route:cache');
    return 'Route cache cleared';
});

Route::get('/storage-link', function () {
    if (request()->ip() != '103.95.211.1') {
        abort(403, 'Unauthorized action.');
    }
    Artisan::call('storage:link');
    return 'Storage link created';
});
