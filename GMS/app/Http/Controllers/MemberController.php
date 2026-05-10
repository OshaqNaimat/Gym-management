<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function dashboard()
    {
        $memberCount = User::where('role', 'member')->count();
        return view('admin-dashboard', compact('memberCount'));
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
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:6|confirmed',
            'roll_number' => 'nullable|string',
            'phone'       => 'nullable|string',
            'plan'        => 'nullable|in:Trial,Monthly,Quarterly,Annual',
            'amount'      => 'nullable|integer|min:0',
            'gender'      => 'nullable|in:Male,Female,Other',
        ]);

        User::create([
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

        return back()->with('success', 'Member added successfully!');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $user->id,
            'password'    => 'nullable|min:6|confirmed',
            'roll_number' => 'nullable|string',
            'phone'       => 'nullable|string',
            'plan'        => 'nullable|in:Trial,Monthly,Quarterly,Annual',
            'amount'      => 'nullable|integer|min:0',
            'gender'      => 'nullable|in:Male,Female,Other',
        ]);

        $user->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'roll_number' => $request->roll_number,
            'phone'       => $request->phone,
            'plan'        => $request->plan,
            'amount'      => $request->amount,
            'gender'      => $request->gender,
            ...($request->filled('password') ? ['password' => Hash::make($request->password)] : []),
        ]);

        return back()->with('success', 'Member updated successfully!');
    }
}
