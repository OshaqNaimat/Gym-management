<x-layout>
    <x-member-navbar />
    <x-member-sidebar />
    <!-- MY ATTENDANCE -->
    <div id="page-attendance" class="content">
        <div class="section-head mb-4">
            <div>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">My
                    Attendance</h2>
                <div style="font-size:.8rem;color:var(--muted);">February 2026</div>
            </div>
            <div style="display:flex;gap:8px;">
                <input type="month" class="form-control form-control-sm" value="2026-02" style="width:160px;">
                <button class="btn-accent"><i class="fa fa-download me-1"></i>Export</button>
            </div>
        </div>

        <!-- Stats -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card c1">
                    <div class="stat-icon"><i class="fa fa-calendar"></i></div>
                    <div class="stat-label">Working Days</div>
                    <div class="stat-value">25</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card c4">
                    <div class="stat-icon"><i class="fa fa-circle-check"></i></div>
                    <div class="stat-label">Present</div>
                    <div class="stat-value">22</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card c3">
                    <div class="stat-icon"><i class="fa fa-circle-xmark"></i></div>
                    <div class="stat-label">Absent</div>
                    <div class="stat-value">3</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card"
                    style="background:linear-gradient(135deg,rgba(167,139,250,.12),rgba(167,139,250,.04));border-color:rgba(167,139,250,.2);">
                    <div class="stat-icon" style="background:rgba(167,139,250,.15);color:#a78bfa;"><i
                            class="fa fa-percent"></i></div>
                    <div class="stat-label">Rate</div>
                    <div class="stat-value" style="color:#a78bfa;">88%</div>
                </div>
            </div>
        </div>

        <!-- Monthly attendance grid -->
        <div class="chart-card mb-4">
            <div class="section-head">
                <h2>February 2026 — Attendance Calendar</h2>
            </div>
            <div id="att-calendar" style="display:grid;grid-template-columns:repeat(7,1fr);gap:6px;"></div>
            <div style="display:flex;gap:16px;margin-top:16px;flex-wrap:wrap;">
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);">
                    <div style="width:12px;height:12px;border-radius:3px;background:rgba(74,222,128,.3);">
                    </div>Present
                </div>
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);">
                    <div style="width:12px;height:12px;border-radius:3px;background:rgba(255,71,87,.25);">
                    </div>Absent
                </div>
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);">
                    <div style="width:12px;height:12px;border-radius:3px;background:var(--surface2);"></div>No
                    Session
                </div>
            </div>
        </div>

        <!-- Attendance log table -->
        <div class="section-head mb-3">
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.2rem;letter-spacing:1px;">Attendance Log
            </h2>
        </div>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Check-in Time</th>
                        <th>Check-out Time</th>
                        <th>Duration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="att-log-body"></tbody>
            </table>
        </div>
    </div>
</x-layout>
