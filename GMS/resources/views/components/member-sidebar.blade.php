<x-layout>
    <!-- ── Sidebar ─────────────────────────────────────────────── -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <h1 class="pump-house">MYGYM</h1>
            <span>Member Portal</span>
        </div>

        <div class="nav-section">My Space</div>
        <a class="nav-item active" href="/member-dashboard"><i class="fa fa-gauge-high"></i> Dashboard</a>
        <a class="nav-item" href="/member-attendence"><i class="fa fa-clipboard-check"></i> My Attendance</a>
        <a href="{{ route('member.cardio') }}" class="nav-item {{ request()->is('my-cardio') ? 'active' : '' }}">
            <i class="fa fa-person-running"></i>
            My Cardio
        </a>

        <div class="nav-section">Account</div>
        <a class="nav-item" href="/member-payment"><i class="fa fa-credit-card"></i> Payments</a>

        <div class="nav-section">More</div>
        <a class="nav-item" href="/member-profile"><i class="fa fa-user"></i> My Profile</a>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-item"
                style="width:100%;background:none;border:none;cursor:pointer;text-align:left;color:var(--accent2);">
                <i class="fa fa-right-from-bracket"></i> Logout
            </button>
        </form>

        <div class="sidebar-bottom">
            <div class="member-chip">
                <div class="member-avatar-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="role">{{ Auth::user()->plan ?? 'Member' }}</div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
