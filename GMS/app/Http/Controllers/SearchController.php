<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');

        if (!$query || strlen($query) < 2) {
            return response()->json([]);
        }

        $members = User::where('role', 'member')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('email', 'like', "%{$query}%")
                  ->orWhere('phone', 'like', "%{$query}%");
            })
            ->take(5)
            ->get(['id', 'name', 'email', 'phone', 'plan']);

        $payments = Payment::with('user')
            ->whereHas('user', fn($q) => $q->where('name', 'like', "%{$query}%"))
            ->orWhere('plan', 'like', "%{$query}%")
            ->orWhere('status', 'like', "%{$query}%")
            ->orWhere('method', 'like', "%{$query}%")
            ->take(5)
            ->get(['id', 'user_id', 'plan', 'amount', 'status', 'method', 'date']);

        return response()->json([
            'members'  => $members,
            'payments' => $payments,
        ]);
    }
}
