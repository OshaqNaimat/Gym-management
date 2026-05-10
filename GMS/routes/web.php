<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// // ↓ THESE WERE MISSING — ADD THEM BACK
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {

//     // Member Routes
//     Route::get('/member-dashboard', function () {
//         return view('member-dashboard');
//     })->name('member.dash');

//     Route::get('/member-profile', function () {
//         return view('member-profile');
//     })->name('member.profile');

//     Route::get('/member-attendence', function () {
//         return view('member-attendence');
//     })->name('member.attendance');

//     Route::get('/member-payment', function () {
//         return view('member-payment');
//     })->name('member.payment');

//     // Admin Routes
//     Route::get('/admin-dashboard', function () {
//         return view('admin-dashboard');
//     })->name('admin.dash');

//     Route::get('/admin-reports', function () {
//         return view('admin-reports');
//     })->name('admin.reports');

//     Route::get('/admin-setting', function () {
//         return view('admin-setting');
//     })->name('admin.setting');

//     Route::get('/member-control', function () {
//         return view('member_control');
//     })->name('admin.memberControl');

//     Route::get('/member-attendence-control', function () {
//         return view('attendence-control');
//     })->name('admin.attendanceControl');

//     Route::get('/members-payments-control', function () {
//         return view('payments');
//     })->name('admin.paymentsControl');

//     Route::get('/membership', function () {
//         return view('membership');
//     })->name('admin.membership');

//     Route::post('/admin/add-member', [MemberController::class, 'store'])->name('admin.addMember');

// });

// Member Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/member-dashboard', fn() => view('member-dashboard'))->name('member.dash');
    Route::get('/member-profile',   fn() => view('member-profile'))->name('member.profile');
    Route::get('/member-attendence',fn() => view('member-attendence'))->name('member.attendance');
    Route::get('/member-payment',   fn() => view('member-payment'))->name('member.payment');
});

// Admin Routes — protected by both auth + admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard',            fn() => view('admin-dashboard'))->name('admin.dash');
    Route::get('/admin-reports',              fn() => view('admin-reports'))->name('admin.reports');
    Route::get('/admin-setting',              fn() => view('admin-setting'))->name('admin.setting');
    Route::get('/member-control',             fn() => view('member_control'))->name('admin.memberControl');
    Route::get('/member-attendence-control',  fn() => view('attendence-control'))->name('admin.attendanceControl');
    Route::get('/members-payments-control',   fn() => view('payments'))->name('admin.paymentsControl');
    Route::get('/membership',                 fn() => view('membership'))->name('admin.membership');
    Route::post('/admin/add-member', [MemberController::class, 'store'])->name('admin.addMember');
});
