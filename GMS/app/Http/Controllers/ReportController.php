<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Monthly signups — last 6 months
        $signups = User::where('role', 'member')
            ->where('created_at', '>=', now()->subMonths(6))
            ->selectRaw('DATE_FORMAT(created_at, "%b") as month, COUNT(*) as total')
            ->groupByRaw('DATE_FORMAT(created_at, "%b"), MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->pluck('total', 'month');

        // Revenue by plan
        $revenueByPlan = Payment::where('status', 'Paid')
            ->selectRaw('plan, SUM(amount) as total')
            ->groupBy('plan')
            ->pluck('total', 'plan');

        $totalRevenue = $revenueByPlan->sum();

        return view('admin-reports', compact('signups', 'revenueByPlan', 'totalRevenue'));
    }
}
