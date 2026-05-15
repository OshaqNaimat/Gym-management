<x-layout>
    <x-member-sidebar />
    {{-- navbar --}}
    <x-member-navbar />
    <div>
        <!-- DASHBOARD -->
        <div id="page-dashboard" class="content">

            <!-- Hero Member Card -->
            <div class="hero-card mb-4">
                <div style="display:flex;align-items:center;gap:18px;flex-wrap:wrap;">
                    @php
                        $parts = explode(' ', $user->name);
                        $initials = strtoupper(
                            substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''),
                        );
                    @endphp
                    <div class="member-big-avatar">{{ $initials }}</div>
                    <div style="flex:1;">
                        <div
                            style="font-size:11px;letter-spacing:3px;color:var(--muted);text-transform:uppercase;margin-bottom:4px;">
                            Welcome back
                        </div>
                        <div class="member-name">{{ $user->name }}</div>
                        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:8px;">
                            <span class="member-plan-badge">
                                <i class="fa fa-crown" style="font-size:9px;"></i>
                                {{ $user->plan ?? 'No Plan' }}
                            </span>
                            <span class="expiry-pill">
                                <i class="fa fa-calendar" style="font-size:11px;"></i>
                                Expires {{ $expiry ? $expiry->format('M d, Y') : 'N/A' }}
                            </span>
                        </div>
                    </div>
                    <div style="text-align:right;" class="d-none d-md-block">
                        <div
                            style="font-size:10px;letter-spacing:2px;color:var(--muted);text-transform:uppercase;margin-bottom:4px;">
                            Member Since
                        </div>
                        <div style="font-family:'Bebas Neue',sans-serif;font-size:1.6rem;color:var(--accent);">
                            {{ $user->created_at->format('d M Y') }}
                        </div>
                        <div style="font-size:11px;color:var(--muted);">
                            Roll #{{ $user->roll_number ?? 'N/A' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="row g-3 mb-4">
                {{-- Check-ins this month --}}
                <div class="col-6 col-xl-4">
                    <div class="stat-card c1">
                        <div class="stat-icon"><i class="fa fa-fire"></i></div>
                        <div class="stat-label">This Month</div>
                        <div class="stat-value">{{ $thisMonthCheckins }}</div>
                        <div class="stat-sub">Check-ins so far</div>
                    </div>
                </div>

                {{-- Attendance rate --}}
                <div class="col-6 col-xl-4">
                    <div class="stat-card c4">
                        <div class="stat-icon"><i class="fa fa-circle-check"></i></div>
                        <div class="stat-label">Attendance Rate</div>
                        <div class="stat-value">{{ $attendanceRate }}%</div>
                        <div class="stat-sub">
                            @if ($attendanceDelta >= 0)
                                <span style="color:#4ade80;">↑ {{ abs($attendanceDelta) }}%</span>
                            @else
                                <span style="color:#f87171;">↓ {{ abs($attendanceDelta) }}%</span>
                            @endif
                            vs last month
                        </div>
                    </div>
                </div>

                {{-- Days left on plan --}}
                <div class="col-6 col-xl-4">
                    <div class="stat-card c2">
                        <div class="stat-icon"><i class="fa fa-calendar-days"></i></div>
                        <div class="stat-label">Days Left</div>
                        <div class="stat-value">{{ $daysLeft ?? '—' }}</div>
                        <div class="stat-sub">{{ $user->plan ?? 'No' }} plan active</div>
                    </div>
                </div>

                {{-- Next payment --}}
                {{-- <div class="col-6 col-xl-3">
                    <div class="stat-card c3">
                        <div class="stat-icon"><i class="fa fa-dollar-sign"></i></div>
                        <div class="stat-label">Next Payment</div>
                        <div class="stat-value">
                            @if ($nextPayment)
                                ${{ number_format($nextPayment->amount) }}
                            @else
                                —
                            @endif
                        </div>
                        <div class="stat-sub">
                            @if ($nextPayment)
                                Due {{ \Carbon\Carbon::parse($nextPayment->date)->format('M d, Y') }}
                            @else
                                No pending payment
                            @endif
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Charts Row -->
            <div class="row g-3 mb-4">
                <div class="col-lg-8">
                    <div class="chart-card">
                        <div class="section-head">
                            <h2>My Attendance (Last 6 Months)</h2>
                            <div class="tab-nav" style="margin:0;padding:3px;">
                                <button class="tab-btn active" style="flex:none;padding:5px 12px;"
                                    onclick="switchAttTab(this,'monthly')">Monthly</button>
                                <button class="tab-btn" style="flex:none;padding:5px 12px;"
                                    onclick="switchAttTab(this,'weekly')">Weekly</button>
                            </div>
                        </div>
                        <div class="chart-bars" id="member-att-chart"></div>
                        <div
                            style="display:flex;gap:16px;margin-top:8px;padding-top:8px;border-top:1px solid var(--border);">
                            <div class="mini-metric">
                                <div class="val" style="color:var(--accent);">{{ $thisMonthCheckins }}</div>
                                <div class="lbl">This Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val">{{ $lastMonthCheckins }}</div>
                                <div class="lbl">Last Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val" style="color:{{ $attendanceDelta >= 0 ? '#4ade80' : '#f87171' }};">
                                    {{ $attendanceDelta >= 0 ? '+' : '' }}{{ $attendanceDelta }}%
                                </div>
                                <div class="lbl">Growth</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="chart-card h-100">
                        <div class="section-head">
                            <h2>Monthly Goals</h2>
                        </div>
                        <div style="display:flex;justify-content:space-around;padding:10px 0 16px;">
                            {{-- Attendance circle --}}
                            <div class="circle-wrap">
                                <div class="circle">
                                    <svg width="80" height="80" viewBox="0 0 80 80">
                                        <circle class="circle-bg" cx="40" cy="40" r="34" />
                                        <circle class="circle-fill" cx="40" cy="40" r="34"
                                            stroke="var(--accent)" stroke-dasharray="{{ $circleCircumference }}"
                                            stroke-dashoffset="{{ $attCircleOffset }}" />
                                    </svg>
                                    <div class="circle-val" style="color:var(--accent);">{{ $attendanceRate }}%</div>
                                </div>
                                <div class="circle-lbl">Attendance</div>
                            </div>
                            {{-- Workouts & Cardio circles are goal-based;
                                 wire these up once you have a goals/workouts table --}}
                            {{-- Check-in Streak circle --}}
                            <div class="circle-wrap">
                                <div class="circle">
                                    <svg width="80" height="80" viewBox="0 0 80 80">
                                        <circle class="circle-bg" cx="40" cy="40" r="34" />
                                        <circle class="circle-fill" cx="40" cy="40" r="34"
                                            stroke="#f97316" stroke-dasharray="{{ $circleCircumference }}"
                                            stroke-dashoffset="{{ $streakOffset }}" />
                                    </svg>
                                    <div class="circle-val" style="color:#f97316;">{{ $streak }}d</div>
                                </div>
                                <div class="circle-lbl">Streak</div>
                            </div>

                            {{-- Plan Usage circle --}}
                            <div class="circle-wrap">
                                <div class="circle">
                                    <svg width="80" height="80" viewBox="0 0 80 80">
                                        <circle class="circle-bg" cx="40" cy="40" r="34" />
                                        <circle class="circle-fill" cx="40" cy="40" r="34"
                                            stroke="#4fc3f7" stroke-dasharray="{{ $circleCircumference }}"
                                            stroke-dashoffset="{{ $planUsageOffset }}" />
                                    </svg>
                                    <div class="circle-val" style="color:#4fc3f7;">{{ $planUsagePct }}%</div>
                                </div>
                                <div class="circle-lbl">Plan Used</div>
                            </div>
                        </div>

                        {{-- Check-in goal progress (dynamic) --}}
                        @php
                            $checkinGoal = 30; // adjust or pull from settings table
                            $checkinPct =
                                $checkinGoal > 0 ? min(100, round(($thisMonthCheckins / $checkinGoal) * 100)) : 0;
                        @endphp
                        <div class="prog-row">
                            <div class="prog-label">
                                <span>Check-in Goal</span>
                                <span>{{ $thisMonthCheckins }}/{{ $checkinGoal }}</span>
                            </div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill"
                                    style="width:{{ $checkinPct }}%;background:var(--accent);"></div>
                            </div>
                        </div>
                        {{-- <div class="prog-row">
                            <div class="prog-label"><span>Workout Goal</span><span>14/20</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:70%;background:#4ade80;"></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Recent Payments -->
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="section-head">
                        <h2>Recent Payments</h2>
                        <a href="/member-payment" class="btn-outline-accent text-decoration-none">
                            View All</a>

                    </div>
                    <div class="chart-card">
                        @forelse($recentPayments as $payment)
                            @php
                                $isPending = $payment->status === 'Pending';
                                $iconClass = $isPending ? 'fa fa-clock' : 'fa fa-check';
                                $iconStyle = $isPending ? 'background:rgba(245,197,24,.1);color:var(--accent);' : '';
                                $amtStyle = $isPending ? 'color:var(--accent);' : '';
                                $rowBorder = $loop->last ? 'border:none;' : '';
                            @endphp
                            <div class="pay-row" style="{{ $rowBorder }}">
                                <div class="pay-icon" style="{{ $iconStyle }}">
                                    <i class="{{ $iconClass }}"></i>
                                </div>
                                <div class="pay-info">
                                    <div class="pn">{{ $payment->plan }}</div>
                                    <div class="pd">
                                        @if ($isPending)
                                            Due {{ \Carbon\Carbon::parse($payment->date)->format('M d, Y') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($payment->date)->format('M d, Y') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="pay-amt" style="{{ $amtStyle }}">
                                    ${{ number_format($payment->amount) }}
                                </div>
                            </div>
                        @empty
                            <div style="padding:16px;color:var(--muted);text-align:center;">
                                No payment records found.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div><!-- /#page-dashboard -->
    </div>

    {{-- ─── Chart Data (injected from controller) ──────────────────────────── --}}
    <script>
        var monthlyAttData = @json($monthlyData);
        var weeklyAttData = @json($weeklyData);

        function renderAttChart(data) {
            var chart = document.getElementById('member-att-chart');
            if (!chart) return;
            var maxV = 1;
            for (var i = 0; i < data.length; i++) {
                if (data[i].value > maxV) maxV = data[i].value;
            }
            var html = '<div style="display:flex;align-items:flex-end;gap:6px;height:140px;width:100%;padding-top:10px;">';
            for (var j = 0; j < data.length; j++) {
                var barH = Math.round((data[j].value / maxV) * 110);
                if (data[j].value > 0 && barH < 6) barH = 6;
                html +=
                    '<div style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:flex-end;height:100%;">';
                html += '<div style="font-size:10px;color:var(--muted);margin-bottom:3px;">' + data[j].value + '</div>';
                html += '<div style="width:60%;height:' + barH +
                    'px;background:var(--accent);border-radius:4px 4px 0 0;"></div>';
                html += '<div style="font-size:10px;color:var(--muted);margin-top:4px;">' + data[j].label + '</div>';
                html += '</div>';
            }
            html += '</div>';
            chart.innerHTML = html;
        }

        function switchAttTab(btn, type) {
            document.querySelectorAll('.tab-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            renderAttChart(type === 'monthly' ? monthlyAttData : weeklyAttData);
        }

        renderAttChart(monthlyAttData);
    </script>
</x-layout>
