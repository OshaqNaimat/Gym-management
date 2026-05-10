<x-layout>
    <!-- ── Sidebar ─────────────────────────────────────────────── -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <h1 class="pump-house">PUMP HOUSE</h1>
            <span>Member Portal</span>
        </div>

        <div class="nav-section">My Space</div>
        <a class="nav-item active" href="/member-dashboard"><i class="fa fa-gauge-high"></i> Dashboard</a>
        <a class="nav-item" href="/member-attendence"><i class="fa fa-clipboard-check"></i> My Attendance</a>
        <!-- <a class="nav-item" onclick="showPage('schedule')"><i class="fa fa-calendar-days"></i> Schedule</a> -->

        <div class="nav-section">Account</div>
        <a class="nav-item" href="/member-payment"><i class="fa fa-credit-card"></i> Payments</a>
        <!-- <a class="nav-item" onclick="showPage('membership')"><i class="fa fa-id-card"></i> My Membership</a> -->

        <div class="nav-section">More</div>
        <!-- <a class="nav-item" onclick="showPage('announcements')"><i class="fa fa-bell"></i> Announcements <span style="background:var(--accent);color:#000;font-size:9px;font-weight:700;padding:1px 6px;border-radius:10px;margin-left:4px;">3</span></a> -->
        <a class="nav-item" href="/member-profile"><i class="fa fa-user"></i> My Profile</a>

        <div class="sidebar-bottom">
            <div class="member-chip">
                <div class="member-avatar-sm">AK</div>
                <div>
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="role">Annual Member</div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
