<x-layout>

    </head>

    <body>

        <!-- ── Sidebar ─────────────────────────────────────────────── -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <h1 class="pump-house">PUMP HOUSE</h1>
                <span>Gym Management</span>
            </div>

            <div class="nav-section">Main</div>
            <a class="nav-item active" onclick="showPage('dashboard')"><i class="fa fa-gauge-high"></i> Dashboard</a>
            <a class="nav-item" onclick="showPage('members')"><i class="fa fa-users"></i> Members</a>
            <a class="nav-item" onclick="showPage('attendance')"><i class="fa fa-clipboard-check"></i> Attendance</a>

            <div class="nav-section">Finance</div>
            <a class="nav-item" onclick="showPage('payments')"><i class="fa fa-credit-card"></i> Payments</a>
            <a class="nav-item" onclick="showPage('memberships')"><i class="fa fa-id-card"></i> Memberships</a>

            <div class="nav-section">System</div>
            <a class="nav-item" onclick="showPage('reports')"><i class="fa fa-chart-line"></i> Reports</a>
            <a class="nav-item" onclick="showPage('settings')"><i class="fa fa-gear"></i> Settings</a>

            <div class="sidebar-bottom">
                <div class="admin-chip">
                    <div class="admin-avatar">JD</div>
                    <div>
                        <div class="name">John Dean</div>
                        <div class="role">Super Admin</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ── Main ──────────────────────────────────────────────────── -->
        <div class="main">
            <div class="topbar">
                <button class="icon-btn d-lg-none"
                    onclick="document.getElementById('sidebar').classList.toggle('open')">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="topbar-title" id="page-title">Dashboard</div>
                <div class="topbar-search">
                    <i class="fa fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search members, classes...">
                </div>
                <div class="topbar-actions">
                    <div class="icon-btn"><i class="fa fa-bell"></i>
                        <div class="badge-dot"></div>
                    </div>
                    <div class="icon-btn" id="themeToggle" onclick="toggleTheme()" title="Toggle Theme">
                        <i class="fa fa-moon" id="themeIcon"></i>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════════════════════
       DASHBOARD
  ══════════════════════════════════════════ -->
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
                            <h2>Recent Payments</h2><button class="btn-outline-accent"
                                onclick="showPage('payments')">View All</button>
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

            <!-- ══════════════════════════════════════════
       MEMBERS
  ══════════════════════════════════════════ -->
            <div id="page-members" class="content" style="display:none;">
                <div class="section-head mb-3">
                    <div>
                        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">All
                            Members</h2>
                        <div style="font-size:.8rem;color:var(--muted);">1,284 total members</div>
                    </div>
                    <div style="display:flex;gap:8px;">
                        <select class="form-select form-select-sm" style="width:140px;">
                            <option>All Plans</option>
                            <option>Annual</option>
                            <option>Monthly</option>
                            <option>Quarterly</option>
                            <option>Trial</option>
                        </select>
                        <button class="btn-accent" data-bs-toggle="modal" data-bs-target="#addMemberModal"><i
                                class="fa fa-plus me-1"></i> Add Member</button>
                    </div>
                </div>
                <div class="table-card">
                    <table>
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Email</th>
                                <th>Plan</th>
                                <th>Expiry</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#e8ff47;">AK</div>Alex Kim
                                    </div>
                                </td>
                                <td>alex@email.com</td>
                                <td>Annual</td>
                                <td>Feb 2027</td>
                                <td><span class="badge-status badge-active">Active</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#4fc3f7;">SR</div>Sara Reed
                                    </div>
                                </td>
                                <td>sara@email.com</td>
                                <td>Monthly</td>
                                <td>Mar 2026</td>
                                <td><span class="badge-status badge-active">Active</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#a78bfa;">MO</div>Mike Osei
                                    </div>
                                </td>
                                <td>mike@email.com</td>
                                <td>Trial</td>
                                <td>Mar 2026</td>
                                <td><span class="badge-status badge-trial">Trial</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#fb923c;">JP</div>Jane Park
                                    </div>
                                </td>
                                <td>jane@email.com</td>
                                <td>Quarterly</td>
                                <td>Feb 2026</td>
                                <td><span class="badge-status badge-expired">Expired</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#4ade80;">LC</div>Leo Chen
                                    </div>
                                </td>
                                <td>leo@email.com</td>
                                <td>Annual</td>
                                <td>Feb 2027</td>
                                <td><span class="badge-status badge-active">Active</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#f472b6;">RA</div>Raza Ali
                                    </div>
                                </td>
                                <td>raza@email.com</td>
                                <td>Monthly</td>
                                <td>Mar 2026</td>
                                <td><span class="badge-status badge-active">Active</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#facc15;">NS</div>Nina Shah
                                    </div>
                                </td>
                                <td>nina@email.com</td>
                                <td>Annual</td>
                                <td>Jan 2027</td>
                                <td><span class="badge-status badge-active">Active</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#38bdf8;">OF</div>Omar Farooq
                                    </div>
                                </td>
                                <td>omar@email.com</td>
                                <td>Quarterly</td>
                                <td>Apr 2026</td>
                                <td><span class="badge-status badge-active">Active</span></td>
                                <td><button class="btn-outline-accent"
                                        style="padding:4px 10px;font-size:11px;">Edit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ══════════════════════════════════════════
       ATTENDANCE
  ══════════════════════════════════════════ -->
            <div id="page-attendance" class="content" style="display:none;">

                <!-- Header -->
                <div class="section-head mb-1">
                    <div>
                        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">Attendance
                        </h2>
                        <div style="font-size:.8rem;color:var(--muted);" id="att-date-label">Loading...</div>
                    </div>
                    <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                        <input type="date" class="form-control form-control-sm" id="att-date-picker"
                            style="width:160px;" onchange="onDateChange()">
                        <button class="btn-outline-accent" onclick="exportAttendance()"><i
                                class="fa fa-download me-1"></i>Export CSV</button>
                        <button class="btn-accent" onclick="saveAttendance()"><i
                                class="fa fa-floppy-disk me-1"></i>Save</button>
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="row g-3 mb-4 mt-1">
                    <div class="col-6 col-md-3">
                        <div class="stat-card c1">
                            <div class="stat-icon"><i class="fa fa-users"></i></div>
                            <div class="stat-label">Total</div>
                            <div class="stat-value" id="att-total">8</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card c4">
                            <div class="stat-icon" style="background:rgba(74,222,128,.15);color:#4ade80;"><i
                                    class="fa fa-circle-check"></i></div>
                            <div class="stat-label">Present</div>
                            <div class="stat-value" id="att-present" style="color:#4ade80;">0</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card c3">
                            <div class="stat-icon"><i class="fa fa-circle-xmark"></i></div>
                            <div class="stat-label">Absent</div>
                            <div class="stat-value" id="att-absent" style="color:#ff4757;">8</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card"
                            style="background:linear-gradient(135deg,rgba(167,139,250,.12),rgba(167,139,250,.04));border:1px solid rgba(167,139,250,.2);">
                            <div class="stat-icon" style="background:rgba(167,139,250,.15);color:#a78bfa;"><i
                                    class="fa fa-percent"></i></div>
                            <div class="stat-label">Rate</div>
                            <div class="stat-value" id="att-rate" style="color:#a78bfa;">0%</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions + Search -->
                <div style="display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap;align-items:center;">
                    <button onclick="markAll('present')"
                        style="padding:7px 14px;border-radius:8px;border:1px solid rgba(74,222,128,.4);background:rgba(74,222,128,.08);color:#4ade80;cursor:pointer;font-size:13px;font-weight:600;transition:all .2s;">
                        <i class="fa fa-check-double me-1"></i> Mark All Present
                    </button>
                    <button onclick="markAll('absent')"
                        style="padding:7px 14px;border-radius:8px;border:1px solid rgba(255,71,87,.3);background:rgba(255,71,87,.06);color:#ff4757;cursor:pointer;font-size:13px;font-weight:600;transition:all .2s;">
                        <i class="fa fa-xmark me-1"></i> Mark All Absent
                    </button>
                    <button onclick="resetAll()"
                        style="padding:7px 14px;border-radius:8px;border:1px solid var(--border);background:var(--surface2);color:var(--muted);cursor:pointer;font-size:13px;font-weight:600;transition:all .2s;">
                        <i class="fa fa-rotate-left me-1"></i> Reset
                    </button>
                    <div style="margin-left:auto;">
                        <input type="text" class="att-search" id="att-search" placeholder="🔍  Search member..."
                            oninput="renderAttTable()">
                    </div>
                </div>

                <!-- Attendance Table -->
                <div class="table-card mb-4">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member</th>
                                <th>Plan</th>
                                <th>Time In</th>
                                <th>Status</th>
                                <th>Mark Attendance</th>
                            </tr>
                        </thead>
                        <tbody id="att-table-body"></tbody>
                    </table>
                </div>

                <!-- Attendance History -->
                <div class="section-head mb-3">
                    <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.2rem;letter-spacing:1px;"><i
                            class="fa fa-clock-rotate-left me-2" style="color:var(--accent);"></i>Recent Attendance
                        History</h2>
                    <button onclick="clearHistory()"
                        style="font-size:11px;padding:4px 10px;border-radius:6px;border:1px solid var(--border);background:none;color:var(--muted);cursor:pointer;">Clear
                        All</button>
                </div>
                <div class="chart-card" id="att-history">
                    <div style="color:var(--muted);font-size:.85rem;text-align:center;padding:20px;">No saved records
                        yet. Mark attendance and click Save.</div>
                </div>
            </div>

            <!-- ══════════════════════════════════════════
       PAYMENTS
  ══════════════════════════════════════════ -->
            <div id="page-payments" class="content" style="display:none;">
                <div class="section-head mb-3">
                    <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">Payments</h2>
                    <button class="btn-accent"><i class="fa fa-download me-1"></i> Export CSV</button>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="stat-card c1">
                            <div class="stat-label">Total Collected</div>
                            <div class="stat-value">$48,290</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-card c3">
                            <div class="stat-label">Outstanding</div>
                            <div class="stat-value">$3,410</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-card c4">
                            <div class="stat-label">Transactions</div>
                            <div class="stat-value">412</div>
                        </div>
                    </div>
                </div>
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
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#e8ff47;">AK</div>Alex Kim
                                    </div>
                                </td>
                                <td>Annual</td>
                                <td style="color:#4ade80;font-weight:600;">$599</td>
                                <td>Feb 18, 2026</td>
                                <td>Card</td>
                                <td><span class="badge-status badge-active">Paid</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#4fc3f7;">SR</div>Sara Reed
                                    </div>
                                </td>
                                <td>Monthly</td>
                                <td style="color:#4ade80;font-weight:600;">$59</td>
                                <td>Feb 16, 2026</td>
                                <td>Cash</td>
                                <td><span class="badge-status badge-active">Paid</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#fb923c;">JP</div>Jane Park
                                    </div>
                                </td>
                                <td>Quarterly</td>
                                <td style="color:var(--accent2);font-weight:600;">$149</td>
                                <td>Feb 10, 2026</td>
                                <td>Card</td>
                                <td><span class="badge-status badge-expired">Failed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;">
                                        <div class="mem-avatar" style="background:#4ade80;">LC</div>Leo Chen
                                    </div>
                                </td>
                                <td>Annual</td>
                                <td style="color:#4ade80;font-weight:600;">$599</td>
                                <td>Feb 08, 2026</td>
                                <td>Transfer</td>
                                <td><span class="badge-status badge-active">Paid</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ══════════════════════════════════════════
       MEMBERSHIPS
  ══════════════════════════════════════════ -->
            <div id="page-memberships" class="content" style="display:none;">
                <div class="section-head mb-4">
                    <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">Membership
                        Plans</h2>
                    <button class="btn-accent"><i class="fa fa-plus me-1"></i> New Plan</button>
                </div>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="chart-card" style="text-align:center;padding:30px 20px;">
                            <div
                                style="font-size:.8rem;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">
                                Trial</div>
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:3rem;color:var(--accent);">FREE
                            </div>
                            <div style="font-size:.78rem;color:var(--muted);margin-bottom:20px;">7-day access</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>Gym access</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>1 class/day</div>
                            <div style="font-size:.82rem;margin-bottom:8px;color:var(--muted);"><i
                                    class="fa fa-xmark me-2" style="color:var(--accent2);"></i>Personal trainer</div>
                            <div style="margin-top:16px;font-size:.78rem;color:var(--muted);">142 active</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="chart-card" style="text-align:center;padding:30px 20px;">
                            <div
                                style="font-size:.8rem;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">
                                Monthly</div>
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:3rem;">$59<span
                                    style="font-size:1rem;">/mo</span></div>
                            <div style="font-size:.78rem;color:var(--muted);margin-bottom:20px;">Billed monthly</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>Unlimited access</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>All classes</div>
                            <div style="font-size:.82rem;margin-bottom:8px;color:var(--muted);"><i
                                    class="fa fa-xmark me-2" style="color:var(--accent2);"></i>Personal trainer</div>
                            <div style="margin-top:16px;font-size:.78rem;color:var(--muted);">422 active</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="chart-card"
                            style="border:2px solid var(--accent);text-align:center;padding:30px 20px;position:relative;">
                            <div
                                style="position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:var(--accent);color:#000;font-size:.65rem;font-weight:700;padding:3px 12px;border-radius:20px;letter-spacing:1px;">
                                POPULAR</div>
                            <div
                                style="font-size:.8rem;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">
                                Quarterly</div>
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:3rem;color:var(--accent);">
                                $149<span style="font-size:1rem;">/qtr</span></div>
                            <div style="font-size:.78rem;color:var(--muted);margin-bottom:20px;">Save 16%</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>Unlimited access</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>All classes</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>2 PT sessions</div>
                            <div style="margin-top:16px;font-size:.78rem;color:var(--muted);">180 active</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="chart-card" style="text-align:center;padding:30px 20px;">
                            <div
                                style="font-size:.8rem;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">
                                Annual</div>
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:3rem;">$599<span
                                    style="font-size:1rem;">/yr</span></div>
                            <div style="font-size:.78rem;color:var(--muted);margin-bottom:20px;">Save 30%</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>Unlimited access</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>All classes</div>
                            <div style="font-size:.82rem;margin-bottom:8px;"><i class="fa fa-check me-2"
                                    style="color:#4ade80;"></i>Unlimited PT</div>
                            <div style="margin-top:16px;font-size:.78rem;color:var(--muted);">540 active</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════════════════════
       REPORTS
  ══════════════════════════════════════════ -->
            <div id="page-reports" class="content" style="display:none;">
                <h2
                    style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:20px;">
                    Reports</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="chart-card">
                            <div class="section-head">
                                <h2>Monthly Sign-ups</h2>
                            </div>
                            <div class="chart-bars" id="signup-chart"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="chart-card">
                            <div class="section-head">
                                <h2>Revenue by Plan</h2>
                            </div>
                            <div style="margin-top:10px;">
                                <div class="prog-row">
                                    <div class="prog-label"><span>Annual ($599)</span><span>$29,351</span></div>
                                    <div class="prog-bar-bg">
                                        <div class="prog-bar-fill" style="width:72%;background:var(--accent);"></div>
                                    </div>
                                </div>
                                <div class="prog-row">
                                    <div class="prog-label"><span>Monthly ($59)</span><span>$11,682</span></div>
                                    <div class="prog-bar-bg">
                                        <div class="prog-bar-fill" style="width:45%;background:#4fc3f7;"></div>
                                    </div>
                                </div>
                                <div class="prog-row">
                                    <div class="prog-label"><span>Quarterly ($149)</span><span>$7,257</span></div>
                                    <div class="prog-bar-bg">
                                        <div class="prog-bar-fill" style="width:28%;background:#a78bfa;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════════════════════
       SETTINGS
  ══════════════════════════════════════════ -->
            <div id="page-settings" class="content" style="display:none;">
                <h2
                    style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:24px;">
                    Settings</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="chart-card">
                            <h2
                                style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                                Gym Details</h2>
                            <div class="mb-3"><label class="form-label">Gym Name</label><input type="text"
                                    class="form-control" value="Pump House"></div>
                            <div class="mb-3"><label class="form-label">Email</label><input type="email"
                                    class="form-control" value="admin@pumphouse.gym"></div>
                            <div class="mb-3"><label class="form-label">Phone</label><input type="text"
                                    class="form-control" value="+92 300 0000000"></div>
                            <div class="mb-3"><label class="form-label">Address</label><input type="text"
                                    class="form-control" value="123 Fitness Ave, Rawalpindi"></div>
                            <button class="btn-accent">Save Changes</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="chart-card">
                            <h2
                                style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                                Opening Hours</h2>
                            <div class="mb-3"><label class="form-label">Weekdays</label>
                                <div class="row g-2">
                                    <div class="col"><input type="time" class="form-control" value="05:00">
                                    </div>
                                    <div class="col"><input type="time" class="form-control" value="22:00">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3"><label class="form-label">Saturday</label>
                                <div class="row g-2">
                                    <div class="col"><input type="time" class="form-control" value="07:00">
                                    </div>
                                    <div class="col"><input type="time" class="form-control" value="20:00">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3"><label class="form-label">Sunday</label>
                                <div class="row g-2">
                                    <div class="col"><input type="time" class="form-control" value="08:00">
                                    </div>
                                    <div class="col"><input type="time" class="form-control" value="18:00">
                                    </div>
                                </div>
                            </div>
                            <button class="btn-accent">Save Hours</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /main -->

        <!-- ── Add Member Modal ────────────────────────────────────── -->
        <form class="modal fade" id="addMemberModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Member</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-6"><label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="John Doe">
                            </div>
                            <div class="col-6"><label class="form-label">Roll Number</label>
                                <input type="text" class="form-control" placeholder="1, 2, 3...">
                            </div>
                            <div class="col-6"><label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="john@email.com">
                            </div>
                            <div class="col-6"><label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="abcd123....">
                            </div>
                            <div class="col-6"><label class="form-label">Phone</label>
                                <input type="text" class="form-control" placeholder="+92 300...">
                            </div>
                            <div class="col-6"><label class="form-label">Plan</label>
                                <select class="form-select">
                                    <option>Trial</option>
                                    <option>Monthly</option>
                                    <option>Quarterly</option>
                                    <option>Annual</option>
                                </select>
                            </div>
                            <div class="col-6"><label class="form-label">Amount</label>
                                <input type="number" class="form-control" placeholder="e.g. 21" min="1"
                                    max="31">
                            </div>
                            <div class="col-6"><label class="form-label">Gender</label><select class="form-select">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-outline-accent" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn-accent" data-bs-dismiss="modal">Add Member</button>
                    </div>
                </div>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
        <script>
            /* ══════════════════════════════════════════════════════════════
                                           PAGE NAVIGATION
                                        ══════════════════════════════════════════════════════════════ */
            function showPage(page) {
                document.querySelectorAll('.content').forEach(c => c.style.display = 'none');
                document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));

                const el = document.getElementById('page-' + page);
                if (el) {
                    el.style.display = 'block';
                    el.style.animation = 'none';
                    void el.offsetWidth;
                    el.style.animation = '';
                }

                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach(n => {
                    if (n.getAttribute('onclick') && n.getAttribute('onclick').includes("'" + page + "'")) n.classList
                        .add('active');
                });

                const titles = {
                    dashboard: 'Dashboard',
                    members: 'Members',
                    attendance: 'Attendance',
                    payments: 'Payments',
                    memberships: 'Memberships',
                    reports: 'Reports',
                    settings: 'Settings'
                };
                document.getElementById('page-title').textContent = titles[page] || page;

                if (page === 'attendance') initAttendance();
                if (page === 'dashboard') buildCharts();

                // close mobile sidebar
                document.getElementById('sidebar').classList.remove('open');
            }

            /* ══════════════════════════════════════════════════════════════
               THEME TOGGLE
            ══════════════════════════════════════════════════════════════ */
            function toggleTheme() {
                document.body.classList.toggle('light');
                const icon = document.getElementById('themeIcon');
                icon.className = document.body.classList.contains('light') ? 'fa fa-sun' : 'fa fa-moon';
            }

            /* ══════════════════════════════════════════════════════════════
               CHARTS (simple bar charts)
            ══════════════════════════════════════════════════════════════ */
            function buildBar(containerId, data, color) {
                const el = document.getElementById(containerId);
                if (!el) return;
                const max = Math.max(...data.map(d => d.v));
                el.innerHTML = data.map(d => `
    <div class="bar-wrap">
      <div class="bar" style="height:${Math.round((d.v/max)*100)}%;background:${color||'var(--accent)'};"></div>
      <div class="bar-label">${d.l}</div>
    </div>`).join('');
            }

            function buildCharts() {
                buildBar('revenue-chart', [{
                        l: 'Sep',
                        v: 38000
                    }, {
                        l: 'Oct',
                        v: 42000
                    }, {
                        l: 'Nov',
                        v: 39000
                    }, {
                        l: 'Dec',
                        v: 44000
                    },
                    {
                        l: 'Jan',
                        v: 46000
                    }, {
                        l: 'Feb',
                        v: 48290
                    }
                ]);
                buildBar('attend-chart', [{
                    l: 'Mon',
                    v: 210
                }, {
                    l: 'Tue',
                    v: 185
                }, {
                    l: 'Wed',
                    v: 230
                }, {
                    l: 'Thu',
                    v: 195
                }, {
                    l: 'Fri',
                    v: 260
                }, {
                    l: 'Sat',
                    v: 140
                }, {
                    l: 'Sun',
                    v: 90
                }], '#4fc3f7');
                buildBar('signup-chart', [{
                    l: 'Sep',
                    v: 98
                }, {
                    l: 'Oct',
                    v: 112
                }, {
                    l: 'Nov',
                    v: 89
                }, {
                    l: 'Dec',
                    v: 120
                }, {
                    l: 'Jan',
                    v: 135
                }, {
                    l: 'Feb',
                    v: 142
                }]);
            }

            /* ══════════════════════════════════════════════════════════════
               ATTENDANCE
            ══════════════════════════════════════════════════════════════ */
            const attendanceMembers = [{
                    id: 1,
                    name: 'Alex Kim',
                    initials: 'AK',
                    color: '#e8ff47',
                    plan: 'Annual'
                },
                {
                    id: 2,
                    name: 'Sara Reed',
                    initials: 'SR',
                    color: '#4fc3f7',
                    plan: 'Monthly'
                },
                {
                    id: 3,
                    name: 'Mike Osei',
                    initials: 'MO',
                    color: '#a78bfa',
                    plan: 'Trial'
                },
                {
                    id: 4,
                    name: 'Jane Park',
                    initials: 'JP',
                    color: '#fb923c',
                    plan: 'Quarterly'
                },
                {
                    id: 5,
                    name: 'Leo Chen',
                    initials: 'LC',
                    color: '#4ade80',
                    plan: 'Annual'
                },
                {
                    id: 6,
                    name: 'Raza Ali',
                    initials: 'RA',
                    color: '#f472b6',
                    plan: 'Monthly'
                },
                {
                    id: 7,
                    name: 'Nina Shah',
                    initials: 'NS',
                    color: '#facc15',
                    plan: 'Annual'
                },
                {
                    id: 8,
                    name: 'Omar Farooq',
                    initials: 'OF',
                    color: '#38bdf8',
                    plan: 'Quarterly'
                },
            ];

            // attStatus[id] = null | 'present' | 'absent'
            let attStatus = {};
            // timein[id] = string time when marked present
            let attTimeIn = {};
            let attHistory = [];

            try {
                attHistory = JSON.parse(localStorage.getItem('ph_attHistory') || '[]');
            } catch (e) {}

            function initAttendance() {
                const today = new Date();
                const dateStr = today.toISOString().split('T')[0];
                const picker = document.getElementById('att-date-picker');
                if (!picker.value) picker.value = dateStr;
                updateDateLabel(picker.value);

                // Load saved status for this date if exists
                const saved = attHistory.find(r => r.date === picker.value);
                attStatus = {};
                attTimeIn = {};
                if (saved) {
                    saved.records.forEach(r => {
                        attStatus[r.id] = r.status;
                        attTimeIn[r.id] = r.timeIn || '—';
                    });
                } else {
                    attendanceMembers.forEach(m => {
                        attStatus[m.id] = null;
                        attTimeIn[m.id] = '—';
                    });
                }

                renderAttTable();
                renderAttHistory();
            }

            function updateDateLabel(dateStr) {
                const d = new Date(dateStr + 'T00:00:00');
                const label = d.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('att-date-label').textContent =
                    (dateStr === today ? 'Today · ' : 'Viewing · ') + label;
            }

            function onDateChange() {
                const date = document.getElementById('att-date-picker').value;
                updateDateLabel(date);

                const saved = attHistory.find(r => r.date === date);
                attStatus = {};
                attTimeIn = {};
                if (saved) {
                    saved.records.forEach(r => {
                        attStatus[r.id] = r.status;
                        attTimeIn[r.id] = r.timeIn || '—';
                    });
                } else {
                    attendanceMembers.forEach(m => {
                        attStatus[m.id] = null;
                        attTimeIn[m.id] = '—';
                    });
                }
                renderAttTable();
            }

            function renderAttTable() {
                const filter = (document.getElementById('att-search')?.value || '').toLowerCase();
                const tbody = document.getElementById('att-table-body');
                const filtered = attendanceMembers.filter(m => m.name.toLowerCase().includes(filter));

                tbody.innerHTML = filtered.map((m, i) => {
                    const s = attStatus[m.id];
                    const t = attTimeIn[m.id] || '—';
                    return `
    <tr>
      <td style="color:var(--muted);font-size:.85rem;">${i+1}</td>
      <td>
        <div style="display:flex;align-items:center;">
          <div class="mem-avatar" style="background:${m.color};color:#000;">${m.initials}</div>
          <span style="font-weight:500;">${m.name}</span>
        </div>
      </td>
      <td><span style="font-size:.8rem;color:var(--muted);">${m.plan}</span></td>
      <td style="font-size:.85rem;color:var(--muted);">${s==='present' ? t : '—'}</td>
      <td>${statusBadge(s)}</td>
      <td>
        <div style="display:flex;gap:6px;">
          <button
            class="att-mark-btn present ${s==='present'?'active':''}"
            onclick="markMember(${m.id},'present')"
            title="Mark Present">
            <i class="fa fa-check"></i> Present
          </button>
          <button
            class="att-mark-btn absent ${s==='absent'?'active':''}"
            onclick="markMember(${m.id},'absent')"
            title="Mark Absent">
            <i class="fa fa-xmark"></i> Absent
          </button>
        </div>
      </td>
    </tr>`;
                }).join('');

                updateAttStats();
            }

            function statusBadge(s) {
                if (s === 'present') return `<span class="badge-status badge-active">Present</span>`;
                if (s === 'absent') return `<span class="badge-status badge-expired">Absent</span>`;
                return `<span class="badge-status badge-trial" style="color:var(--muted);">—</span>`;
            }

            function markMember(id, status) {
                if (attStatus[id] === status) {
                    // toggle off
                    attStatus[id] = null;
                    attTimeIn[id] = '—';
                } else {
                    attStatus[id] = status;
                    attTimeIn[id] = status === 'present' ? now() : '—';
                }
                renderAttTable();
            }

            function markAll(status) {
                attendanceMembers.forEach(m => {
                    attStatus[m.id] = status;
                    attTimeIn[m.id] = status === 'present' ? now() : '—';
                });
                renderAttTable();
            }

            function resetAll() {
                attendanceMembers.forEach(m => {
                    attStatus[m.id] = null;
                    attTimeIn[m.id] = '—';
                });
                document.getElementById('att-search').value = '';
                renderAttTable();
            }

            function updateAttStats() {
                const total = attendanceMembers.length;
                const present = Object.values(attStatus).filter(s => s === 'present').length;
                const absent = Object.values(attStatus).filter(s => s === 'absent').length;
                const rate = total ? Math.round((present / total) * 100) : 0;

                document.getElementById('att-total').textContent = total;
                document.getElementById('att-present').textContent = present;
                document.getElementById('att-absent').textContent = absent;
                document.getElementById('att-rate').textContent = rate + '%';
            }

            function saveAttendance() {
                const date = document.getElementById('att-date-picker').value;
                if (!date) {
                    showToast('Please select a date first!', true);
                    return;
                }

                const records = attendanceMembers.map(m => ({
                    id: m.id,
                    name: m.name,
                    plan: m.plan,
                    status: attStatus[m.id] || 'unmarked',
                    timeIn: attTimeIn[m.id] || '—'
                }));
                const present = records.filter(r => r.status === 'present').length;
                const rate = Math.round((present / records.length) * 100) + '%';

                // upsert by date
                attHistory = attHistory.filter(r => r.date !== date);
                attHistory.unshift({
                    date,
                    savedAt: now(),
                    records,
                    rate
                });
                if (attHistory.length > 15) attHistory.pop();

                try {
                    localStorage.setItem('ph_attHistory', JSON.stringify(attHistory));
                } catch (e) {}
                renderAttHistory();
                showToast('✅ Attendance saved for ' + date);
            }

            function renderAttHistory() {
                const el = document.getElementById('att-history');
                if (!attHistory.length) {
                    el.innerHTML =
                        `<div style="color:var(--muted);font-size:.85rem;text-align:center;padding:24px;">No saved records yet. Mark attendance and click Save.</div>`;
                    return;
                }

                el.innerHTML = attHistory.map(r => {
                    const present = r.records.filter(x => x.status === 'present');
                    const absent = r.records.filter(x => x.status === 'absent');
                    return `
    <div class="history-entry">
      <div class="history-date">
        <div class="hd">${formatDate(r.date)}</div>
        <div class="ht">${r.savedAt}</div>
      </div>
      <div style="flex:1;display:flex;flex-wrap:wrap;align-items:center;">
        ${present.map(p => `<span class="name-pill p"><i class="fa fa-check" style="font-size:9px;"></i> ${p.name}</span>`).join('')}
        ${absent.map(a  => `<span class="name-pill a"><i class="fa fa-xmark" style="font-size:9px;"></i> ${a.name}</span>`).join('')}
        ${!present.length && !absent.length ? `<span style="color:var(--muted);font-size:.8rem;">No records marked</span>` : ''}
      </div>
      <div class="history-rate">${r.rate}</div>
    </div>`;
                }).join('');
            }

            function clearHistory() {
                if (!confirm('Clear all attendance history?')) return;
                attHistory = [];
                try {
                    localStorage.removeItem('ph_attHistory');
                } catch (e) {}
                renderAttHistory();
                showToast('History cleared');
            }

            function exportAttendance() {
                const date = document.getElementById('att-date-picker').value;
                let csv = 'Name,Plan,Status,Time In\n';
                attendanceMembers.forEach(m => {
                    const s = attStatus[m.id] || 'Unmarked';
                    const t = attTimeIn[m.id] || '—';
                    csv += `"${m.name}","${m.plan}","${s}","${s === 'present' ? t : '—'}"\n`;
                });
                const a = document.createElement('a');
                a.href = URL.createObjectURL(new Blob([csv], {
                    type: 'text/csv'
                }));
                a.download = `attendance-${date || 'export'}.csv`;
                a.click();
                showToast('📥 CSV downloaded!');
            }

            /* ── Helpers ── */
            function now() {
                return new Date().toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }

            function formatDate(ds) {
                const d = new Date(ds + 'T00:00:00');
                return d.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });
            }

            function showToast(msg, isErr) {
                const t = document.createElement('div');
                t.className = 'toast-msg';
                t.style.background = isErr ? '#ff4757' : 'var(--accent)';
                t.style.color = isErr ? '#fff' : '#000';
                t.textContent = msg;
                document.body.appendChild(t);
                setTimeout(() => t.remove(), 2800);
            }

            /* ── Init ── */
            buildCharts();
        </script>
    </body>

</x-layout>
