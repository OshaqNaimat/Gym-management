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
                        <div class="stat-value">321</div>
                        <div class="stat-sub"><span class="up">↑ 12%</span> vs last month</div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card c2">
                        <div class="stat-icon"><i class="fa fa-dollar-sign"></i></div>
                        <div class="stat-label">Monthly Revenue</div>
                        <div class="stat-value">$1234</div>
                        <div class="stat-sub"><span class="up">↑ 8.3%</span> vs last month</div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card c3">
                        <div class="stat-icon"><i class="fa fa-calendar-xmark"></i></div>
                        <div class="stat-label">Expired Plans</div>
                        <div class="stat-value">67</div>
                        <div class="stat-sub"><span class="dn">↑ 4</span> this week</div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-lg-8">
                    <div class="chart-card">
                        <div class="section-head">
                            <h2>Revenue Overview</h2>
                            <div class="tab-nav" style="margin:0;padding:3px;">
                                <button class="tab-btn active" style="flex:none;padding:5px 12px;">Monthly</button>
                                <button class="tab-btn" style="flex:none;padding:5px 12px;">Weekly</button>
                            </div>
                        </div>
                        <div class="chart-bars" id="revenue-chart"></div>
                        <div
                            style="display:flex;gap:16px;margin-top:8px;padding-top:8px;border-top:1px solid var(--border);">
                            <div class="mini-metric">
                                <div class="val" style="color:var(--accent);">$1234</div>
                                <div class="lbl">This Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val">$44,611</div>
                                <div class="lbl">Last Month</div>
                            </div>
                            <div class="mini-metric">
                                <div class="val" style="color:#4ade80;">+8.3%</div>
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
                        <div class="prog-row">
                            <div class="prog-label"><span>Annual</span><span>48%</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:48%;background:var(--accent);"></div>
                            </div>
                        </div>
                        <div class="prog-row">
                            <div class="prog-label"><span>Monthly</span><span>33%</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:33%;background:#4fc3f7;"></div>
                            </div>
                        </div>
                        <div class="prog-row">
                            <div class="prog-label"><span>Quarterly</span><span>14%</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:14%;background:#a78bfa;"></div>
                            </div>
                        </div>
                        <div class="prog-row">
                            <div class="prog-label"><span>Trial</span><span>5%</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:5%;background:#fbbf24;"></div>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6">
                                <div class="mini-metric"
                                    style="background:var(--surface2);padding:10px;border-radius:8px;">
                                    <div class="val">89%</div>
                                    <div class="lbl">Retention</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mini-metric"
                                    style="background:var(--surface2);padding:10px;border-radius:8px;">
                                    <div class="val">142</div>
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
                        <h2>Recent Members</h2><button class="btn-accent" onclick="showPage('members')">View
                            All</button>
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
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;">
                                            <div class="mem-avatar" style="background:#e8ff47;">AK</div>Alex Kim
                                        </div>
                                    </td>
                                    <td>Annual</td>
                                    <td>Feb 18</td>
                                    <td><span class="badge-status badge-active">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;">
                                            <div class="mem-avatar" style="background:#4fc3f7;">SR</div>Sara Reed
                                        </div>
                                    </td>
                                    <td>Monthly</td>
                                    <td>Feb 16</td>
                                    <td><span class="badge-status badge-active">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;">
                                            <div class="mem-avatar" style="background:#a78bfa;">MO</div>Mike Osei
                                        </div>
                                    </td>
                                    <td>Trial</td>
                                    <td>Feb 15</td>
                                    <td><span class="badge-status badge-trial">Trial</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;">
                                            <div class="mem-avatar" style="background:#fb923c;">JP</div>Jane Park
                                        </div>
                                    </td>
                                    <td>Quarterly</td>
                                    <td>Feb 10</td>
                                    <td><span class="badge-status badge-expired">Expired</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;">
                                            <div class="mem-avatar" style="background:#4ade80;">LC</div>Leo Chen
                                        </div>
                                    </td>
                                    <td>Annual</td>
                                    <td>Feb 08</td>
                                    <td><span class="badge-status badge-active">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-5">
                    <div class="section-head">
                        <h2>Recent Payments</h2><button class="btn-outline-accent" onclick="showPage('payments')">View
                            All</button>
                    </div>
                    <div class="chart-card">
                        <div class="payment-row">
                            <div class="pay-icon"><i class="fa fa-check"></i></div>
                            <div>
                                <div class="pay-name">Alex Kim</div>
                                <div class="pay-plan">Annual Plan</div>
                            </div>
                            <div class="pay-amount">$599</div>
                        </div>
                        <div class="payment-row">
                            <div class="pay-icon"><i class="fa fa-check"></i></div>
                            <div>
                                <div class="pay-name">Sara Reed</div>
                                <div class="pay-plan">Monthly Plan</div>
                            </div>
                            <div class="pay-amount">$59</div>
                        </div>
                        <div class="payment-row">
                            <div class="pay-icon" style="background:rgba(255,71,87,.1);color:var(--accent2);"><i
                                    class="fa fa-xmark"></i></div>
                            <div>
                                <div class="pay-name">Jane Park</div>
                                <div class="pay-plan">Quarterly Plan</div>
                            </div>
                            <div class="pay-amount" style="color:var(--accent2);">$149</div>
                        </div>
                        <div class="payment-row">
                            <div class="pay-icon"><i class="fa fa-check"></i></div>
                            <div>
                                <div class="pay-name">Leo Chen</div>
                                <div class="pay-plan">Annual Plan</div>
                            </div>
                            <div class="pay-amount">$599</div>
                        </div>
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

</x-layout>
