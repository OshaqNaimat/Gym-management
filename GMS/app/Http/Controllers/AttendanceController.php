<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
  public function index(Request $request)
{
    $date = $request->get('date', today()->toDateString());
    $colors = ['#e8ff47','#4fc3f7','#a78bfa','#fb923c','#4ade80','#f472b6','#facc15','#38bdf8'];

   $membersCollection = User::where('role', 'member')
    ->orderByRaw('CAST(roll_number AS UNSIGNED)')
    ->get();

    $membersJs = $membersCollection->map(function($m) use ($colors) {
        $parts    = explode(' ', $m->name);
        $initials = strtoupper(substr($parts[0],0,1) . (isset($parts[1]) ? substr($parts[1],0,1) : ''));
        return [
    'id'          => $m->id,
    'name'        => $m->name,
    'initials'    => $initials,
    'color'       => $colors[$m->id % count($colors)],
    'plan'        => $m->plan ?? 'N/A',
    'roll_number' => $m->roll_number ?? '—', // ← add this
];
    });

    $attendance = Attendance::where('date', $date)->get()->keyBy('user_id');

    $history = Attendance::with('user')
        ->orderBy('date', 'desc')
        ->get()
        ->groupBy('date')
        ->take(15);

    $presentCount = $attendance->where('status', 'present')->count();
    $absentCount  = $attendance->where('status', 'absent')->count();
    $totalCount   = $membersCollection->count();
    $rate         = $totalCount ? round($presentCount / $totalCount * 100) : 0;

    return view('attendence-control', compact(
        'membersJs', 'attendance', 'date', 'history',
        'totalCount', 'presentCount', 'absentCount', 'rate'
    ));
}

    public function save(Request $request)
    {
        $request->validate([
            'date'    => 'required|date',
            'records' => 'required|array',
        ]);

        foreach ($request->records as $userId => $data) {
            Attendance::updateOrCreate(
                ['user_id' => $userId, 'date' => $request->date],
                [
                    'status'  => $data['status'] ?? 'unmarked',
                    'time_in' => $data['time_in'] ?? null,
                ]
            );
        }

        return response()->json(['success' => true]);
    }
}
