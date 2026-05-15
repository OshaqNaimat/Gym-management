<x-layout>
    <x-member-navbar />
    <x-member-sidebar />

    <div id="page-payments" class="content">
        <div class="section-head mb-4">
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">My Payments</h2>
        </div>

        {{-- Stats Row --}}
        <div class="row g-3 mb-4">
            {{-- Total Paid --}}
            <div class="col-md-6">
                <div class="stat-card c1">
                    <div class="stat-icon"><i class="fa fa-dollar-sign"></i></div>
                    <div class="stat-label">Total Paid</div>
                    <div class="stat-value">${{ number_format($totalPaid) }}</div>
                    <div class="stat-sub">Lifetime payments</div>
                </div>
            </div>

            {{-- Due Status --}}
            <div class="col-md-6">
                <div class="stat-card c4">
                    <div class="stat-icon"><i class="fa fa-circle-check"></i></div>
                    <div class="stat-label">Status</div>
                    <div class="stat-value">{{ $hasPending ? 'Due' : 'Clear' }}</div>
                    <div class="stat-sub">{{ $hasPending ? 'Payment pending' : 'No dues pending' }}</div>
                </div>
            </div>

            {{-- Next Due --}}
            {{-- <div class="col-md-4">
                <div class="stat-card c2">
                    <div class="stat-icon"><i class="fa fa-clock"></i></div>
                    <div class="stat-label">Next Due</div>
                    <div class="stat-value">
                        @if ($nextDue)
                            {{ \Carbon\Carbon::parse($nextDue->date)->format("M 'y") }}
                        @else
                            —
                        @endif
                    </div>
                    <div class="stat-sub">
                        @if ($nextDue)
                            ${{ number_format($nextDue->amount) }} {{ $nextDue->plan }} renewal
                        @else
                            No upcoming payments
                        @endif
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- Payments Table --}}
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                        @php
                            $isPending = $payment->status === 'Pending';
                            $isFailed = $payment->status === 'Failed';
                            $amtColor = $isPending
                                ? 'color:var(--accent);'
                                : ($isFailed
                                    ? 'color:#f87171;'
                                    : 'color:#4ade80;');
                            $badgeClass = match ($payment->status) {
                                'Paid' => 'badge-active',
                                'Pending' => 'badge-pending',
                                'Failed' => 'badge-expired',
                                default => 'badge-pending',
                            };
                            $badgeLabel = match ($payment->status) {
                                'Paid' => 'Paid',
                                'Pending' => 'Upcoming',
                                'Failed' => 'Failed',
                                default => $payment->status,
                            };
                        @endphp
                        <tr>
                            <td style="color:var(--muted);font-size:.85rem;">
                                #INV-{{ str_pad($payment->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td>{{ $payment->plan }}</td>
                            <td style="font-weight:600;{{ $amtColor }}">
                                ${{ number_format($payment->amount) }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($payment->date)->format('M d, Y') }}</td>
                            <td>{{ $isPending ? '—' : $payment->method }}</td>
                            <td><span class="badge-status {{ $badgeClass }}">{{ $badgeLabel }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;color:var(--muted);padding:32px;">
                                No payment records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
