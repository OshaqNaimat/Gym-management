<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
 public function dashboard()
{
    $memberCount = User::where('role', 'member')->count();

    $monthlyRevenue = \App\Models\Payment::where('status', 'Paid')
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->sum('amount');

    $lastMonthRevenue = \App\Models\Payment::where('status', 'Paid')
        ->whereMonth('date', now()->subMonth()->month)
        ->whereYear('date', now()->subMonth()->year)
        ->sum('amount');

    // Calculate percentage change
    if ($lastMonthRevenue > 0) {
        $revenueChange = (($monthlyRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
    } elseif ($monthlyRevenue > 0) {
        $revenueChange = 100; // anything vs zero = 100% increase
    } else {
        $revenueChange = 0;
    }

  $now = now();

$expiredPlans = \App\Models\User::where('role', 'member')
    ->where(function ($q) use ($now) {
        $q->where(fn($q) => $q->where('plan','Trial')->where('plan_updated_at','<',$now->copy()->subDay()))
          ->orWhere(fn($q) => $q->where('plan','Monthly')->where('plan_updated_at','<',$now->copy()->subMonth()))
          ->orWhere(fn($q) => $q->where('plan','Quarterly')->where('plan_updated_at','<',$now->copy()->subMonths(3)))
          ->orWhere(fn($q) => $q->where('plan','Annual')->where('plan_updated_at','<',$now->copy()->subYear()));
    })->count();

$expiredThisWeek = \App\Models\User::where('role', 'member')
    ->where(function ($q) use ($now) {
        $q->where(fn($q) => $q->where('plan','Trial')->whereBetween('plan_updated_at',[$now->copy()->startOfWeek()->subDay(),$now->copy()->endOfWeek()->subDay()]))
          ->orWhere(fn($q) => $q->where('plan','Monthly')->whereBetween('plan_updated_at',[$now->copy()->startOfWeek()->subMonth(),$now->copy()->endOfWeek()->subMonth()]))
          ->orWhere(fn($q) => $q->where('plan','Quarterly')->whereBetween('plan_updated_at',[$now->copy()->startOfWeek()->subMonths(3),$now->copy()->endOfWeek()->subMonths(3)]))
          ->orWhere(fn($q) => $q->where('plan','Annual')->whereBetween('plan_updated_at',[$now->copy()->startOfWeek()->subYear(),$now->copy()->endOfWeek()->subYear()]));
    })->count();
$monthlyData = [];
for ($i = 5; $i >= 0; $i--) {
    $date = now()->subMonths($i);
    $monthlyData[] = [
        'label' => $date->format('M'),
        'amount' => \App\Models\Payment::where('status', 'Paid')
            ->whereMonth('date', $date->month)
            ->whereYear('date', $date->year)
            ->sum('amount'),
    ];
}

    // Last 7 days for chart
    $weeklyData = [];
    for ($i = 6; $i >= 0; $i--) {
        $date = now()->subDays($i);
        $weeklyData[] = [
            'label' => $date->format('D'),
            'amount' => \App\Models\Payment::where('status', 'Paid')
                ->whereDate('date', $date->toDateString())
                ->sum('amount'),
        ];
    }

    // Growth %
    if ($lastMonthRevenue > 0) {
        $revenueChange = (($monthlyRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
    } elseif ($monthlyRevenue > 0) {
        $revenueChange = 100;
    } else {
        $revenueChange = 0;
    }

   // Plan distribution
// Plan distribution from users table
$planDistribution = \App\Models\User::where('role', 'member')
    ->whereNotNull('plan')
    ->select('plan', DB::raw('count(*) as total'))
    ->groupBy('plan')
    ->get();

$totalPlans = $planDistribution->sum('total');

$planStats = $planDistribution->map(function ($user) use ($totalPlans) {
    return [
        'name'       => $user->plan,
        'count'      => $user->total,
        'percentage' => $totalPlans > 0 ? round(($user->total / $totalPlans) * 100) : 0,
    ];
});

// Retention rate (members who have a plan assigned)
$totalMembers  = \App\Models\User::where('role', 'member')->count();
$activeMembers = \App\Models\User::where('role', 'member')->whereNotNull('plan')->count();
$retentionRate = $totalMembers > 0 ? round(($activeMembers / $totalMembers) * 100) : 0;

// New members this month
$newThisMonth = \App\Models\User::where('role', 'member')
    ->whereMonth('created_at', now()->month)
    ->whereYear('created_at', now()->year)
    ->count();
    $recentMembers = \App\Models\User::where('role', 'member')
    ->orderBy('created_at', 'desc')
    ->take(5)
    ->get();
    $recentPayments = \App\Models\Payment::with('user')
    ->orderBy('date', 'desc')
    ->take(5)
    ->get();
    $weeklyAttendance = [];
for ($i = 6; $i >= 0; $i--) {
    $date = now()->subDays($i);
    $weeklyAttendance[] = [
        'label' => $date->format('D'),
        'count' => \App\Models\Attendance::whereDate('created_at', $date->toDateString())->count(),
    ];
}

return view('admin-dashboard', compact(
    'memberCount',
    'monthlyRevenue',
    'lastMonthRevenue',
    'revenueChange',
    'monthlyData',
    'weeklyData',
    'expiredPlans',
    'expiredThisWeek',
    'planStats',
    'retentionRate',
    'newThisMonth',
    'recentMembers',
    'recentPayments',
    'weeklyAttendance'
));
}

   public function index()
{
    $members = User::where('role', 'member')
        ->orderByRaw("
            CASE
                WHEN plan = 'Trial'     AND created_at < DATE_SUB(NOW(), INTERVAL 1 DAY)   THEN 0
                WHEN plan = 'Monthly'   AND created_at < DATE_SUB(NOW(), INTERVAL 1 MONTH) THEN 0
                WHEN plan = 'Quarterly' AND created_at < DATE_SUB(NOW(), INTERVAL 3 MONTH) THEN 0
                WHEN plan = 'Annual'    AND created_at < DATE_SUB(NOW(), INTERVAL 1 YEAR)  THEN 0
                ELSE 1
            END ASC,
            created_at DESC
        ")
        ->get();

    $memberCount = $members->count();
    return view('member_control', compact('members', 'memberCount'));
}
public function store(Request $request)
{
    $request->validateWithBag('addMember', [
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|unique:users,email',
        'password'    => 'required|min:6|confirmed',
        'roll_number' => 'nullable|string|unique:users,roll_number',
        'phone'       => 'nullable|string',
        'plan'        => 'nullable|in:Trial,Monthly,Quarterly,Annual',
        'amount'      => 'nullable|integer|min:0',
        'gender'      => 'nullable|in:Male,Female,Other',
    ], [
        'roll_number.unique' => 'This roll number is already allocated to another member.',
    ]);

    $user = User::create([
        'name'        => $request->name,
        'email'       => $request->email,
        'password'    => Hash::make($request->password),
        'role'        => 'member',
        'roll_number' => $request->roll_number,
        'phone'       => $request->phone,
        'plan'        => $request->plan,
        'amount'      => $request->amount,
        'gender'      => $request->gender,
    ]);

    Notification::create([
        'type'    => 'member_added',
        'title'   => 'New Member Added',
        'message' => $user->name . ' has been added with a ' . $user->plan . ' plan.',
        'is_read' => false,
    ]);

    if ($user->plan && $user->amount) {
        \App\Models\Payment::create([
            'user_id' => $user->id,
            'plan'    => $user->plan,
            'amount'  => $user->amount,
            'method'  => 'Cash',
            'status'  => 'Paid',
            'date'    => now()->toDateString(),
        ]);
    }

    return back()->with('success', 'Member added successfully!');
}

 public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validateWithBag('updateMember', [
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|unique:users,email,' . $user->id . ',id',
        'password'    => 'nullable|min:6|confirmed',
        'roll_number' => 'nullable|string|unique:users,roll_number,' . $user->id . ',id',
        'phone'       => 'nullable|string',
        'plan'        => 'nullable|in:Trial,Monthly,Quarterly,Annual',
        'amount'      => 'nullable|integer|min:0',
        'gender'      => 'nullable|in:Male,Female,Other',
    ], [
        'roll_number.unique' => 'This roll number is already allocated to another member.',
    ]);

    $oldPlan = $user->plan;

    $updateData = [
        'name'            => $request->name,
        'email'           => $request->email,
        'roll_number'     => $request->roll_number,
        'phone'           => $request->phone,
        'plan'            => $request->plan,
        'amount'          => $request->amount,
        'gender'          => $request->gender,
        'plan_updated_at' => now(),
    ];

    if ($request->filled('password')) {
        $updateData['password'] = Hash::make($request->password);
    }

    User::where('id', $user->id)->update($updateData);

    $planChanged = $oldPlan !== $request->plan;
    if ($planChanged && $request->plan && $request->amount) {
        \App\Models\Payment::create([
            'user_id' => $user->id,
            'plan'    => $request->plan,
            'amount'  => $request->amount,
            'method'  => 'Cash',
            'status'  => 'Paid',
            'date'    => now()->toDateString(),
        ]);
    }

    return back()
        ->with('success', 'Member updated successfully!')
        ->with('edit_member_id', $user->id);
}
}
