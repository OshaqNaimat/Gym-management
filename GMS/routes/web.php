<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Protected Routes (Must be logged in)
Route::middleware(['auth'])->group(function () {

    // Member Routes
    Route::get('/member-dashboard', function () {
        return view('member-dashboard');
    })->name('member.dash');

    // Admin Routes (Adding 'admin' middleware alias we talked about earlier)
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin-dashboard', function () {
            return view('admin-dashboard');
        })->name('admin.dash');
    });


});
