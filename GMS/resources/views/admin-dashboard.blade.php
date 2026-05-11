<x-layout>
    <!--  Sidebar -->
    <x-admin-sidebar />
    <x-admin-navbar />
    <div>
        {{-- dashboard --}}
        <div id="page-dashboard" class="content">
            <div class="row g-3 mb-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card c1">
                        <div class="stat-icon"><i class="fa fa-users"></i></div>
                        <div class="stat-label">Active Members</div>
                        <div class="stat-value">{{ $memberCount }}</div>
                        <div class="stat-sub"><span class="up">↑ 12%</span> vs last month</div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card c2">
                        <div class="stat-icon"><i class="fa fa-dollar-sign"></i></div>
                        <div class="stat-label">Monthly Revenue</div>
                        <div class="stat-value">${{ number_format($monthlyRevenue) }}</div>
                        <div class="stat-sub">
                            @if ($revenueChange > 0)
                                <span class="up">↑ {{ number_format(abs($revenueChange), 1) }}%</span>
                            @elseif($revenueChange < 0)
                                <span class="down">↓ {{ number_format(abs($revenueChange), 1) }}%</span>
                            @else
                                <span class="neutral">→ 0%</span>
                            @endif
                            vs last month
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card transition  c3">
                        <div class="stat-icon"><i class="fa fa-calendar-xmark"></i></div>
                        <div class="stat-label">Expired Plans</div>
                        <div class="stat-value">{{ $expiredPlans }}</div>
                        <div class="stat-sub">
                            @if ($expiredThisWeek > 0)
                                <span class="dn">↑ {{ $expiredThisWeek }}</span>
                            @else
                                <span class="neutral">→ 0</span>
                            @endif
                            this week
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-lg-8">
                    <div class="chart-card">
                        <div class="section-head">
                            <h2>Revenue Overview</h2>
                            <div class="tab-nav" style="margin:0;padding:3px;">
                                <button class="tab-btn active" style="flex:none;padding:5px 12px;"
                                    onclick="switchChart('monthly', this)">Monthly</button>
                                <button class="tab-btn text-white" style="flex:none;padding:5px 12px;"
                                    onclick="switchChart('weekly', this)">Weekly</button>
                            </div>
                        </div>
                        <div class="chart-bars" id="revenue-chart"></div>
                        <div
                            style="display:flex;gap:16px;margin-top:8px;padding-top:8px;border-top:1px solid var(--border);">
                            <div class="mini-metric">
                                <div class="val" style="color:var(--accent);">${{ number_format($monthlyRevenue) }}
                                </div>
                                <div class="lbl">This Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val">${{ number_format($lastMonthRevenue) }}</div>
                                <div class="lbl">Last Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val" style="color: {{ $revenueChange >= 0 ? '#4ade80' : '#f87171' }};">
                                    {{ $revenueChange >= 0 ? '+' : '' }}{{ number_format($revenueChange, 1) }}%
                                </div>
                                <div class="lbl">Growth</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chart-card h-100">
                        <div class="section-head">
                            <h2>Plan Distribution</h2>
                        </div>

                        @php
                            $colors = ['var(--accent)', '#4fc3f7', '#a78bfa', '#fbbf24', '#f87171', '#34d399'];
                        @endphp

                        @forelse($planStats as $index => $plan)
                            <div class="prog-row">
                                <div class="prog-label">
                                    <span>{{ $plan['name'] }}</span>
                                    <span>{{ $plan['percentage'] }}%</span>
                                </div>
                                <div class="prog-bar-bg">
                                    <div class="prog-bar-fill"
                                        style="width:{{ $plan['percentage'] }}%;background:{{ $colors[$index % count($colors)] }};">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="color:var(--text-muted);font-size:13px;">No plan data available.</p>
                        @endforelse

                        <div class="row g-2 mt-2">
                            <div class="col-6">
                                <div class="mini-metric"
                                    style="background:var(--surface2);padding:10px;border-radius:8px;">
                                    <div class="val">{{ $retentionRate }}%</div>
                                    <div class="lbl">Retention</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mini-metric"
                                    style="background:var(--surface2);padding:10px;border-radius:8px;">
                                    <div class="val">{{ $newThisMonth }}</div>
                                    <div class="lbl">New This Mo.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-lg-12">
                    <div class="section-head">
                        <h2>Recent Members</h2>
                        <a href="/member-control" class="btn-accent text-decoration-none">View All</a>
                    </div>
                    <div class="table-card">
                        <table>
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Plan</th>
                                    <th>Joined</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentMembers as $member)
                                    @php
                                        // Generate initials from name
                                        $words = explode(' ', trim($member->name));
                                        $initials = strtoupper(
                                            substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''),
                                        );

                                        // Avatar colors
                                        $colors = [
                                            '#e8ff47',
                                            '#4fc3f7',
                                            '#a78bfa',
                                            '#fb923c',
                                            '#4ade80',
                                            '#f87171',
                                            '#34d399',
                                        ];
                                        $color = $colors[$member->id % count($colors)];

                                        // Status based on plan
                                        if (is_null($member->plan)) {
                                            $status = 'No Plan';
                                            $badgeClass = 'badge-expired';
                                        } elseif ($member->plan === 'Trial') {
                                            $status = 'Trial';
                                            $badgeClass = 'badge-trial';
                                        } else {
                                            $status = 'Active';
                                            $badgeClass = 'badge-active';
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            <div style="display:flex;align-items:center;gap:8px;">
                                                <div class="mem-avatar" style="background:{{ $color }};">
                                                    {{ $initials }}</div>
                                                {{ $member->name }}
                                            </div>
                                        </td>
                                        <td>{{ $member->plan ?? '—' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($member->created_at)->format('M d') }}</td>
                                        <td><span class="badge-status {{ $badgeClass }}">{{ $status }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align:center;color:var(--text-muted);">No members
                                            found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-5">
                    <div class="section-head">
                        <h2>Recent Payments</h2><a href="/members-payments-control"
                            class="btn-outline-accent text-decoration-none">View
                            All</a>
                    </div>
                    <div class="chart-card">
                        @forelse($recentPayments as $payment)
                            @php
                                $isPaid = $payment->status === 'Paid';
                            @endphp
                            <div class="payment-row">
                                <div class="pay-icon"
                                    style="{{ !$isPaid ? 'background:rgba(255,71,87,.1);color:var(--accent2);' : '' }}">
                                    <i class="fa fa-{{ $isPaid ? 'check' : 'xmark' }}"></i>
                                </div>
                                <div>
                                    <div class="pay-name">{{ $payment->user->name ?? '—' }}</div>
                                    <div class="pay-plan">{{ $payment->plan ?? ($payment->user->plan ?? '—') }} Plan
                                    </div>
                                </div>
                                <div class="pay-amount" style="{{ !$isPaid ? 'color:var(--accent2);' : '' }}">
                                    ${{ number_format($payment->amount) }}
                                </div>
                            </div>
                        @empty
                            <p style="color:var(--text-muted);font-size:13px;text-align:center;">No payments found.</p>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-head">
                        <h2>Attendance (This Week)</h2>
                    </div>
                    <div class="chart-card">
                        <div class="chart-bars" id="attend-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div
            style="position:fixed;top:20px;right:20px;z-index:9999;background:red;color:white;padding:15px;border-radius:8px;">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div
            style="position:fixed;top:20px;right:20px;z-index:9999;background:green;color:white;padding:15px;border-radius:8px;">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal(document.getElementById('addMemberModal')).show();
            });
        </script>
    @endif


    <script>
        const monthlyData = @json($monthlyData);
        const weeklyData = @json($weeklyData);

        function renderChart(data) {
            const chart = document.getElementById('revenue-chart');
            const max = Math.max(...data.map(d => d.amount), 1);
            chart.innerHTML = data.map(d => {
                const pct = ((d.amount / max) * 100).toFixed(1);
                return `
                <div class="bar-wrap" title="$${Number(d.amount).toLocaleString()}">
                    <div class="bar" style="height:${pct}%"></div>
                    <div class="bar-label">${d.label}</div>
                </div>`;
            }).join('');
        }

        function switchChart(type, btn) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderChart(type === 'monthly' ? monthlyData : weeklyData);
        }

        // Initial render
        renderChart(monthlyData);
        // Attendance Chart
        const attendanceData = @json($weeklyAttendance);

        function renderAttendanceChart(data) {
            const chart = document.getElementById('attend-chart');
            const max = Math.max(...data.map(d => d.count), 1);
            chart.innerHTML = data.map(d => {
                const pct = ((d.count / max) * 100).toFixed(1);
                return `
            <div class="bar-wrap" title="${d.count} members">
                <div class="bar" style="height:${pct}%;background:#4fc3f7;"></div>
                <div class="bar-label">${d.label}</div>
            </div>`;
            }).join('');
        }

        renderAttendanceChart(attendanceData);
    </script>

</x-layout>
