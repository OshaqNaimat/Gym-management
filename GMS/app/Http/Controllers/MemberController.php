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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // 2. Create the User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Always hash passwords!
            'role' => 'member', // Default role so they aren't admins
            'phone' => $request->phone,
            'plan' => $request->plan,
            'gender' => $request->gender,
            // add other columns here...
        ]);

        // 3. Redirect back with success message
        return back()->with('success', 'New member added successfully!');
    }
}
