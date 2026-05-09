<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Check role and redirect
            if ($user->role === 'admin') {
                return redirect()->route('admin.dash');
            }

            return redirect()->route('member.dash');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
