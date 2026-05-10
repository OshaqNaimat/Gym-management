<x-layout>
    <x-admin-navbar />
    <x-admin-sidebar />
    <div id="page-attendance" class="content">

        <!-- Header -->
        <div class="section-head mb-1">
            <div>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">Attendance
                </h2>
                <div style="font-size:.8rem;color:var(--muted);" id="att-date-label">Loading...</div>
            </div>
            <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                <input type="date" class="form-control form-control-sm" id="att-date-picker" style="width:160px;"
                    onchange="onDateChange()">
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
</x-layout>
