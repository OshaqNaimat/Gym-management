<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

    // admin all routes
    Route::view('/member-control','member_control');
    Route::view('/member-attendence-control','attendence-control');
    Route::view('/admin-dashboard','admin-dashboard');
    Route::view('/members-payments-control','payments');
    Route::view('/membership','membership');
    Route::view('/admin-reports','admin-reports');
    Route::view('/admin-setting','admin-setting');

    // member routes
    Route::view('/member-dashboard','member-dashboard');
    Route::view('/member-attendence','member-attendence');
    Route::view('/member-payment','member-payment');
    Route::view('/member-profile','member-profile');


    Route::post('/admin/add-member', [MemberController::class, 'store'])->name('admin.addMember');
});
