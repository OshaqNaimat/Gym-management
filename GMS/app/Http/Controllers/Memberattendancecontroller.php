<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Carbon\Carbon;

class MemberAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // ── Selected month (default = current month) ─────────────────────
        $monthInput = $request->input('month', now()->format('Y-m'));
        $selected   = Carbon::createFromFormat('Y-m', $monthInput)->startOfMonth();

        // ── All attendance records for selected month ─────────────────────
        $records = Attendance::where('user_id', $user->id)
            ->whereYear('date', $selected->year)
            ->whereMonth('date', $selected->month)
            ->orderBy('date')
            ->get()
            ->keyBy(fn($r) => Carbon::parse($r->date)->toDateString());

        // ── Stats ─────────────────────────────────────────────────────────
        $daysInMonth  = $selected->daysInMonth;
        $presentCount = $records->where('status', 'present')->count();
        $absentCount  = $records->where('status', 'absent')->count();
        $rate         = $daysInMonth > 0
            ? min(100, round(($presentCount / $daysInMonth) * 100))
            : 0;

        // ── Calendar days array ───────────────────────────────────────────
        // Build array of all days in month with their status
        $calendarDays = [];
        for ($d = 1; $d <= $daysInMonth; $d++) {
            $dateStr = $selected->copy()->day($d)->toDateString();
            $record  = $records->get($dateStr);
            $calendarDays[] = [
                'day'     => $d,
                'date'    => $dateStr,
                'weekday' => Carbon::parse($dateStr)->format('D'),
                'status'  => $record ? $record->status : 'unmarked',
                'time_in' => $record ? $record->time_in : null,
            ];
        }

        // ── First day offset (so calendar starts on correct weekday) ──────
        // 0 = Monday ... 6 = Sunday
        $firstDayOffset = $selected->copy()->startOfMonth()->dayOfWeek;
        // Carbon: 0=Sunday,1=Monday...6=Saturday — convert to Mon-first
        $firstDayOffset = ($firstDayOffset + 6) % 7;

        // ── Log table (only present/absent, not unmarked) ─────────────────
        $log = $records->filter(fn($r) => in_array($r->status, ['present', 'absent']))
            ->sortByDesc('date')
            ->values();

        return view('member-attendence', compact(
            'selected',
            'monthInput',
            'daysInMonth',
            'presentCount',
            'absentCount',
            'rate',
            'calendarDays',
            'firstDayOffset',
            'log',
        ));
    }
}
