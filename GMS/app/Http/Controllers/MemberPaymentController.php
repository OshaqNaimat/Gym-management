<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class MemberPaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $payments = Payment::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();

        // Stats
        $totalPaid   = $payments->where('status', 'Paid')->sum('amount');
        $hasPending  = $payments->where('status', 'Pending')->count() > 0;
        $nextDue     = $payments->where('status', 'Pending')
                        ->sortBy('date')
                        ->first();

        return view('member-payment', compact(
            'payments',
            'totalPaid',
            'hasPending',
            'nextDue',
        ));
    }
}
