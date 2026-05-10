<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    // public function handle(Request $request, Closure $next): Response
    // {
    //     1. Check if the user is logged in
    //     2. Check if their 'role' column in MySQL is 'admin'
    //     if (Auth::check() && Auth::user()->role === 'admin') {
    //         return $next($request);
    //     }

    //     If not admin, redirect back to login or member dashboard
    //     return redirect('/login')->with('error', 'Access denied. Admins only.');
    // }


    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
            }

            return redirect()->route('member.dash');
            }
}

