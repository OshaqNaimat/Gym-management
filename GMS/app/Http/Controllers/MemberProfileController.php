<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendance;

class MemberProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $now  = now();

        // Attendance stats this month
        $thisMonthCheckins = Attendance::where('user_id', $user->id)
            ->whereYear('date', $now->year)
            ->whereMonth('date', $now->month)
            ->where('status', 'present')
            ->count();

        $attendanceRate = $now->day > 0
            ? min(100, round(($thisMonthCheckins / $now->day) * 100))
            : 0;

        // Member duration label
        $joinedAt      = $user->created_at;
        $memberMonths  = (int) $joinedAt->diffInMonths($now);
        $memberDuration = $memberMonths >= 12
            ? round($memberMonths / 12, 1) . 'yr'
            : $memberMonths . 'mo';

        return view('member-profile', compact(
            'user',
            'thisMonthCheckins',
            'attendanceRate',
            'memberDuration',
        ));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:6|confirmed',
        ], [
            'password.confirmed' => 'New password and confirm password do not match.',
            'password.min'       => 'New password must be at least 6 characters.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'Current password is incorrect.'])
                ->with('password_error', true);
        }

        \App\Models\User::where('id', $user->id)->update([
    'password' => Hash::make($request->password),
]);

        return back()->with('password_success', 'Password updated successfully.');
    }
}
