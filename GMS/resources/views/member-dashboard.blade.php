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
                        $parts = explode(' ', Auth::user()->name);
                        $initials = strtoupper(
                            substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''),
                        );
                    @endphp
                    <div class="member-big-avatar"> {{ $initials }}</div>
                    <div style="flex:1;">
                        <div
                            style="font-size:11px;letter-spacing:3px;color:var(--muted);text-transform:uppercase;margin-bottom:4px;">
                            Welcome back</div>
                        <div class="member-name">{{ Auth::user()->name }}</div>
                        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:8px;">
                            <span class="member-plan-badge"><i class="fa fa-crown" style="font-size:9px;"></i>
                                Annual Plan</span>
                            <span class="expiry-pill"><i class="fa fa-calendar" style="font-size:11px;"></i> Expires
                                Feb 18, 2027</span>
                        </div>
                    </div>
                    <div style="text-align:right;" class="d-none d-md-block">
                        <div
                            style="font-size:10px;letter-spacing:2px;color:var(--muted);text-transform:uppercase;margin-bottom:4px;">
                            Member Since</div>
                        <div style="font-family:'Bebas Neue',sans-serif;font-size:1.6rem;color:var(--accent);">Feb
                            2025</div>
                        <div style="font-size:11px;color:var(--muted);">Roll #0042</div>
                    </div>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-xl-3">
                    <div class="stat-card c1">
                        <div class="stat-icon"><i class="fa fa-fire"></i></div>
                        <div class="stat-label">This Month</div>
                        <div class="stat-value">22</div>
                        <div class="stat-sub">Check-ins so far</div>
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <div class="stat-card c4">
                        <div class="stat-icon"><i class="fa fa-circle-check"></i></div>
                        <div class="stat-label">Attendance Rate</div>
                        <div class="stat-value">88%</div>
                        <div class="stat-sub"><span style="color:#4ade80;">↑ 5%</span> vs last month</div>
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <div class="stat-card c2">
                        <div class="stat-icon"><i class="fa fa-calendar-days"></i></div>
                        <div class="stat-label">Days Left</div>
                        <div class="stat-value">361</div>
                        <div class="stat-sub">Annual plan active</div>
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <div class="stat-card c3">
                        <div class="stat-icon"><i class="fa fa-dollar-sign"></i></div>
                        <div class="stat-label">Next Payment</div>
                        <div class="stat-value">$599</div>
                        <div class="stat-sub">Due Feb 18, 2027</div>
                    </div>
                </div>
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
                                <div class="val" style="color:var(--accent);">22</div>
                                <div class="lbl">This Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val">19</div>
                                <div class="lbl">Last Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val" style="color:#4ade80;">+16%</div>
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
                            <div class="circle-wrap">
                                <div class="circle">
                                    <svg width="80" height="80" viewBox="0 0 80 80">
                                        <circle class="circle-bg" cx="40" cy="40" r="34" />
                                        <circle class="circle-fill" cx="40" cy="40" r="34"
                                            stroke="var(--accent)" stroke-dasharray="213.6" stroke-dashoffset="25.6" />
                                    </svg>
                                    <div class="circle-val" style="color:var(--accent);">88%</div>
                                </div>
                                <div class="circle-lbl">Attendance</div>
                            </div>
                            <div class="circle-wrap">
                                <div class="circle">
                                    <svg width="80" height="80" viewBox="0 0 80 80">
                                        <circle class="circle-bg" cx="40" cy="40" r="34" />
                                        <circle class="circle-fill" cx="40" cy="40" r="34"
                                            stroke="#4ade80" stroke-dasharray="213.6" stroke-dashoffset="64" />
                                    </svg>
                                    <div class="circle-val" style="color:#4ade80;">70%</div>
                                </div>
                                <div class="circle-lbl">Workouts</div>
                            </div>
                            <div class="circle-wrap">
                                <div class="circle">
                                    <svg width="80" height="80" viewBox="0 0 80 80">
                                        <circle class="circle-bg" cx="40" cy="40" r="34" />
                                        <circle class="circle-fill" cx="40" cy="40" r="34"
                                            stroke="#4fc3f7" stroke-dasharray="213.6" stroke-dashoffset="106.8" />
                                    </svg>
                                    <div class="circle-val" style="color:#4fc3f7;">50%</div>
                                </div>
                                <div class="circle-lbl">Cardio</div>
                            </div>
                        </div>
                        <div class="prog-row">
                            <div class="prog-label"><span>Check-in Goal</span><span>22/25</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:88%;background:var(--accent);"></div>
                            </div>
                        </div>
                        <div class="prog-row">
                            <div class="prog-label"><span>Workout Goal</span><span>14/20</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:70%;background:#4ade80;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule + Recent Payments -->
            <div class="row g-3">
                <div class="col-lg-7">
                    <div class="section-head">
                        <h2>This Week's Schedule</h2><button class="btn-outline-accent"
                            onclick="showPage('schedule')">Full Schedule</button>
                    </div>
                    <div class="chart-card" id="dash-schedule"></div>
                </div>
                <div class="col-lg-5">
                    <div class="section-head">
                        <h2>Recent Payments</h2><button class="btn-outline-accent" onclick="showPage('payments')">View
                            All</button>
                    </div>
                    <div class="chart-card">
                        <div class="pay-row">
                            <div class="pay-icon"><i class="fa fa-check"></i></div>
                            <div class="pay-info">
                                <div class="pn">Annual Plan</div>
                                <div class="pd">Feb 18, 2026</div>
                            </div>
                            <div class="pay-amt">$599</div>
                        </div>
                        <div class="pay-row">
                            <div class="pay-icon"><i class="fa fa-check"></i></div>
                            <div class="pay-info">
                                <div class="pn">Annual Plan</div>
                                <div class="pd">Feb 18, 2025</div>
                            </div>
                            <div class="pay-amt">$599</div>
                        </div>
                        <div class="pay-row" style="border:none;">
                            <div class="pay-icon" style="background:rgba(245,197,24,.1);color:var(--accent);"><i
                                    class="fa fa-clock"></i></div>
                            <div class="pay-info">
                                <div class="pn">Annual Plan</div>
                                <div class="pd">Due Feb 18, 2027</div>
                            </div>
                            <div class="pay-amt" style="color:var(--accent);">$599</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
