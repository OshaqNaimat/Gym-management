<?php

use App\Http\Controllers\AttendanceController;
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

// Member Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/member-dashboard', fn() => view('member-dashboard'))->name('member.dash');
    Route::get('/member-profile',   fn() => view('member-profile'))->name('member.profile');
    Route::get('/member-attendence',fn() => view('member-attendence'))->name('member.attendance');
    Route::get('/member-payment',   fn() => view('member-payment'))->name('member.payment');
});

// Admin Routes — protected by both auth + admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
   Route::get('/admin-dashboard', [MemberController::class, 'dashboard'])->name('admin.dash');
    Route::get('/admin-reports',              fn() => view('admin-reports'))->name('admin.reports');
    Route::get('/admin-setting',              fn() => view('admin-setting'))->name('admin.setting');
    Route::get('/member-control', [MemberController::class, 'index'])->name('admin.memberControl');
    Route::put('/admin/edit-member/{user}', [MemberController::class, 'update'])->name('admin.updateMember');
    Route::get('/member-attendence-control',  fn() => view('attendence-control'))->name('admin.attendanceControl');
    Route::get('/members-payments-control',   fn() => view('payments'))->name('admin.paymentsControl');
    Route::get('/membership',                 fn() => view('membership'))->name('admin.membership');
    Route::post('/admin/add-member', [MemberController::class, 'store'])->name('admin.addMember');
    Route::get('/member-attendence-control', [AttendanceController::class, 'index'])->name('admin.attendanceControl');
    Route::post('/admin/save-attendance', [AttendanceController::class, 'save'])->name('admin.saveAttendance');
});
