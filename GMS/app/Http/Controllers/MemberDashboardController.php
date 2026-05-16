<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\CardioLog;
use App\Models\Payment;
use Carbon\Carbon;

class MemberDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $now  = Carbon::now();

        // ── Plan expiry ──────────────────────────────────────────────────────
        $joinedAt = Carbon::parse($user->created_at);

        $expiry = match ($user->plan) {
            'Trial'     => $joinedAt->copy()->addDay(),
            'Monthly'   => $joinedAt->copy()->addMonth(),
            'Quarterly' => $joinedAt->copy()->addMonths(3),
            'Annual'    => $joinedAt->copy()->addYear(),
            default     => null,
        };

        $daysLeft = $expiry ? max(0, (int) $now->diffInDays($expiry, false)) : null;

        // ── Attendance ───────────────────────────────────────────────────────
        // This month check-ins (present only)
        $thisMonthCheckins = Attendance::where('user_id', $user->id)
            ->whereYear('date', $now->year)
            ->whereMonth('date', $now->month)
            ->where('status', 'present')
            ->count();

        // Last month check-ins
        $lastMonth = $now->copy()->subMonth();
        $lastMonthCheckins = Attendance::where('user_id', $user->id)
            ->whereYear('date', $lastMonth->year)
            ->whereMonth('date', $lastMonth->month)
            ->where('status', 'present')
            ->count();

        // Attendance rate this month (present / working days so far)
        $workingDaysSoFar = $now->day; // simplistic: calendar days elapsed
        $attendanceRate = $workingDaysSoFar > 0
            ? round(($thisMonthCheckins / $workingDaysSoFar) * 100)
            : 0;
        $attendanceRate = min($attendanceRate, 100);

        // Rate last month (full month days)
        $daysInLastMonth  = $lastMonth->daysInMonth;
        $lastMonthRate    = $daysInLastMonth > 0
            ? round(($lastMonthCheckins / $daysInLastMonth) * 100)
            : 0;
        $attendanceDelta  = $attendanceRate - $lastMonthRate;

        // Last 6 months bar-chart data (monthly)
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $m = $now->copy()->subMonths($i);
            $count = Attendance::where('user_id', $user->id)
                ->whereYear('date', $m->year)
                ->whereMonth('date', $m->month)
                ->where('status', 'present')
                ->count();
            $monthlyData[] = [
                'label' => $m->format('M'),
                'value' => $count,
            ];
        }

        // Last 6 weeks bar-chart data (weekly)
        $weeklyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $weekStart = $now->copy()->startOfWeek()->subWeeks($i);
            $weekEnd   = $weekStart->copy()->endOfWeek();
            $count = Attendance::where('user_id', $user->id)
                ->whereBetween('date', [$weekStart->toDateString(), $weekEnd->toDateString()])
                ->where('status', 'present')
                ->count();
            $weeklyData[] = [
                'label' => 'W' . $weekStart->weekOfYear,
                'value' => $count,
            ];
        }

        // ── Payments ─────────────────────────────────────────────────────────
        // 3 most recent payments
        $recentPayments = Payment::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->limit(3)
            ->get();

        // Next due payment: look for a Pending payment in the future
        $nextPayment = Payment::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->where('date', '>=', $now->toDateString())
            ->orderBy('date')
            ->first();

        // ── Attendance rate for circle (clamp 0-100) ─────────────────────────
        // Circle stroke offset formula: circumference = 2π×34 ≈ 213.6
        // offset = circumference × (1 - pct/100)
        $circleCircumference = 213.6;
        $attCircleOffset     = round($circleCircumference * (1 - $attendanceRate / 100), 1);
        // ── Check-in Streak ──────────────────────────────────────────────────────
$presentDates = Attendance::where('user_id', $user->id)
    ->where('status', 'present')
    ->orderBy('date', 'desc')
    ->pluck('date')
    ->map(fn($d) => \Carbon\Carbon::parse($d)->toDateString())
    ->toArray();

$streak = 0;
$check  = $now->copy()->toDateString();
foreach ($presentDates as $date) {
    if ($date === $check) {
        $streak++;
        $check = \Carbon\Carbon::parse($check)->subDay()->toDateString();
    } else {
        break;
    }
}

// ── Plan Usage ───────────────────────────────────────────────────────────
$planTotalDays = match ($user->plan) {
    'Trial'     => 1,
    'Monthly'   => 30,
    'Quarterly' => 90,
    'Annual'    => 365,
    default     => null,
};

$planUsedDays  = $planTotalDays
    ? min($planTotalDays, (int) $joinedAt->diffInDays($now))
    : null;

$planUsagePct  = ($planTotalDays && $planTotalDays > 0)
    ? min(100, round(($planUsedDays / $planTotalDays) * 100))
    : 0;

// Circle offsets
$streakMax        = 30; // treat 30 days as 100%
$streakPct        = min(100, round(($streak / $streakMax) * 100));
$streakOffset     = round($circleCircumference * (1 - $streakPct / 100), 1);
$planUsageOffset  = round($circleCircumference * (1 - $planUsagePct / 100), 1);

$totalCaloriesToday = CardioLog::where('user_id', $user->id)
    ->whereDate('logged_at', today())
    ->sum('calories');

$totalCaloriesMonth = CardioLog::where('user_id', $user->id)
    ->whereYear('logged_at', now()->year)
    ->whereMonth('logged_at', now()->month)
    ->sum('calories');

// Cardio circle — goal is 500 kcal/day × days passed this month
$cardioGoal = 500 * now()->day;
$cardioPct  = $cardioGoal > 0 ? min(100, round(($totalCaloriesMonth / $cardioGoal) * 100)) : 0;
$cardioOffset = $circleCircumference - ($circleCircumference * $cardioPct / 100);

        return view('member-dashboard', compact(
    'user',
    'expiry',
    'daysLeft',
    'thisMonthCheckins',
    'lastMonthCheckins',
    'attendanceRate',
    'attendanceDelta',
    'monthlyData',
    'weeklyData',
    'recentPayments',
    'nextPayment',
    'attCircleOffset',
    'circleCircumference',
    'streak',
    'streakOffset',
    'planUsedDays',
    'planTotalDays',
    'planUsagePct',
    'planUsageOffset',
    'totalCaloriesToday',
    'totalCaloriesMonth',
    'cardioPct',
    'cardioOffset'
));
    }
}
