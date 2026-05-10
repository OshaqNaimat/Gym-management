<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the data
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:6',
            'roll_number' => 'nullable|string',
            'phone'       => 'nullable|string',
            'plan'        => 'nullable|in:Trial,Monthly,Quarterly,Annual',
            'amount'      => 'nullable|integer|min:0',
            'gender'      => 'nullable|in:Male,Female,Other',
        ]);

        // 2. Create the User
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

        // 3. Redirect back with success message
        return back()->with('success', 'New member added successfully!');

    }
}
