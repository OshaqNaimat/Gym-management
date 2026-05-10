<x-layout>
    <x-admin-navbar />
    <x-admin-sidebar />

    {{-- Flash Message --}}
    @if (session('success'))
        <div id="flash-message"
            style="position:fixed;top:20px;right:20px;z-index:9999;background:#4ade80;color:#000;padding:15px 20px;border-radius:10px;font-weight:600;box-shadow:0 4px 15px rgba(0,0,0,0.3);">
            ✅ {{ session('success') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('flash-message').style.display = 'none', 3000);
        </script>
    @endif

    <div id="page-payments" class="content">
        <div class="section-head mb-3">
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">Payments</h2>
            <div style="display:flex;gap:8px;">
                <a href="{{ route('admin.exportPayments') }}" class="btn-outline-accent">
                    <i class="fa fa-download me-1"></i> Export CSV
                </a>
                <button class="btn-accent" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                    <i class="fa fa-plus me-1"></i> Add Payment
                </button>
            </div>
        </div>

        {{-- Summary Cards --}}
        <div class="row g-3 mb-4">
            <div class="col-sm-4">
                <div class="stat-card c1">
                    <div class="stat-label">Total Collected</div>
                    <div class="stat-value">${{ number_format($totalCollected) }}</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stat-card c3">
                    <div class="stat-label">Outstanding</div>
                    <div class="stat-value">${{ number_format($outstanding) }}</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stat-card c4">
                    <div class="stat-label">Transactions</div>
                    <div class="stat-value">{{ $transactions }}</div>
                </div>
            </div>
        </div>

        {{-- Payments Table --}}
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        @php
                            $colors = [
                                '#e8ff47',
                                '#4fc3f7',
                                '#a78bfa',
                                '#fb923c',
                                '#4ade80',
                                '#f472b6',
                                '#facc15',
                                '#38bdf8',
                            ];
                            $color = $colors[$payment->user->id % count($colors)];
                            $parts = explode(' ', $payment->user->name);
                            $initials = strtoupper(
                                substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''),
                            );
                        @endphp
                        <tr>
                            <td>
                                <div style="display:flex;align-items:center;">
                                    <div class="mem-avatar" style="background:{{ $color }};">{{ $initials }}
                                    </div>
                                    {{ $payment->user->name }}
                                </div>
                            </td>
                            <td>{{ $payment->plan }}</td>
                            <td
                                style="color:{{ $payment->status === 'Paid' ? '#4ade80' : 'var(--accent2)' }};font-weight:600;">
                                ${{ number_format($payment->amount) }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($payment->date)->format('M d, Y') }}</td>
                            <td>{{ $payment->method }}</td>
                            <td>
                                @if ($payment->status === 'Paid')
                                    <span class="badge-status badge-active">Paid</span>
                                @elseif($payment->status === 'Failed')
                                    <span class="badge-status badge-expired">Failed</span>
                                @else
                                    <span class="badge-status badge-trial">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;color:var(--muted);padding:30px;">
                                No payments recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Payment Modal --}}
    <div class="modal fade" id="addPaymentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Record Payment</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.addPayment') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Member</label>
                                <select name="user_id" class="form-select" required>
                                    <option value="">Select member...</option>
                                    @foreach (App\Models\User::where('role', 'member')->orderByRaw('CAST(roll_number AS UNSIGNED)')->get() as $member)
                                        <option value="{{ $member->id }}">
                                            #{{ $member->roll_number }} — {{ $member->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Plan</label>
                                <select name="plan" class="form-select" required>
                                    <option value="Trial">Trial</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Quarterly">Quarterly</option>
                                    <option value="Annual">Annual</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Amount ($)</label>
                                <input type="number" name="amount" class="form-control" placeholder="e.g. 599"
                                    min="0" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Method</label>
                                <select name="method" class="form-select" required>
                                    <option value="Cash">Cash</option>
                                    <option value="Card">Card</option>
                                    <option value="Transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="Paid">Paid</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Failed">Failed</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ today()->toDateString() }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-outline-accent" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-accent">Save Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
