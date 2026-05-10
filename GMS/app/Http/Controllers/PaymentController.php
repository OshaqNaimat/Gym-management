<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user')
            ->orderBy('date', 'desc')
            ->get();

        $totalCollected = Payment::where('status', 'Paid')->sum('amount');
        $outstanding    = Payment::where('status', 'Failed')
                            ->orWhere('status', 'Pending')->sum('amount');
        $transactions   = Payment::count();

        return view('payments', compact('payments', 'totalCollected', 'outstanding', 'transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan'    => 'required|string',
            'amount'  => 'required|integer|min:0',
            'method'  => 'required|in:Cash,Card,Transfer',
            'status'  => 'required|in:Paid,Failed,Pending',
            'date'    => 'required|date',
        ]);

        Payment::create($request->all());

        return back()->with('success', 'Payment recorded successfully!');
    }

    public function export()
    {
        $payments = Payment::with('user')->orderBy('date', 'desc')->get();

        $csv = "Member,Plan,Amount,Date,Method,Status\n";
        foreach ($payments as $p) {
            $csv .= "\"{$p->user->name}\",\"{$p->plan}\",\"{$p->amount}\",\"{$p->date}\",\"{$p->method}\",\"{$p->status}\"\n";
        }

        return response($csv, 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="payments.csv"',
        ]);
    }
}
