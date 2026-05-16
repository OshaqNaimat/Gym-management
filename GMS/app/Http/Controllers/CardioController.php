<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CardioLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardioController extends Controller
{
    // Show My Cardio page
    public function index()
    {
        $user = Auth::user();
        $logs = CardioLog::where('user_id', $user->id)
            ->orderBy('logged_at', 'desc')
            ->get();

        // Stats
        $totalSessions  = $logs->count();
        $totalCalories  = $logs->sum('calories');
        $avgDuration    = $logs->avg('duration') ?? 0;
        $totalDistance  = $logs->sum('distance');

        // Last 7 days chart data
        $last7 = CardioLog::where('user_id', $user->id)
            ->where('logged_at', '>=', now()->subDays(6)->toDateString())
            ->orderBy('logged_at', 'asc')
            ->get()
            ->groupBy(fn($log) => $log->logged_at->format('M d'));

        $chartLabels   = [];
        $chartCalories = [];
        $chartDuration = [];

        for ($i = 6; $i >= 0; $i--) {
            $label = now()->subDays($i)->format('M d');
            $chartLabels[]   = $label;
            $chartCalories[] = isset($last7[$label]) ? round($last7[$label]->sum('calories'), 1) : 0;
            $chartDuration[] = isset($last7[$label]) ? round($last7[$label]->sum('duration'), 1) : 0;
        }

        return view('cardio', compact(
            'user', 'logs',
            'totalSessions', 'totalCalories', 'avgDuration', 'totalDistance',
            'chartLabels', 'chartCalories', 'chartDuration'
        ));
    }

    // Store new cardio log
    public function store(Request $request)
    {
        $user = Auth::user();

        // If no weight set, redirect to profile
        if (!$user->weight) {
            return back()->with('error', 'Please set your weight in My Profile before logging cardio.');
        }

        $request->validate([
            'exercise_type' => 'required|string',
            'duration'      => 'required|integer|min:1',
            'distance'      => 'nullable|numeric|min:0',
            'notes'         => 'nullable|string|max:255',
            'logged_at'     => 'required|date',
        ]);

        $calories = CardioLog::calculateCalories(
            $request->exercise_type,
            $request->duration,
            $user->weight
        );

        CardioLog::create([
            'user_id'       => $user->id,
            'exercise_type' => $request->exercise_type,
            'duration'      => $request->duration,
            'distance'      => $request->distance,
            'calories'      => $calories,
            'notes'         => $request->notes,
            'logged_at'     => $request->logged_at,
        ]);

        return back()->with('success', "Great job! You burned {$calories} calories! 🔥");
    }

    // Delete a log
    public function destroy($id)
    {
        $log = CardioLog::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $log->delete();

        return back()->with('success', 'Cardio log removed.');
    }
}
