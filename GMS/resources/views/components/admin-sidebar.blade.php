<x-layout>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <h1 class="pump-house">PUMP HOUSE</h1>
            <span>Gym Management</span>
        </div>

        <div class="nav-section">Main</div>
        <a class="nav-item {{ request()->is('admin-dashboard') ? 'active' : '' }}" href="/admin-dashboard">
            <i class="fa fa-gauge-high"></i> Dashboard
        </a>

        <a class="nav-item {{ request()->is('member-control') ? 'active' : '' }}" href="/member-control">
            <i class="fa fa-users"></i> Members
        </a>

        <a class="nav-item {{ request()->is('member-attendence-control') ? 'active' : '' }}"
            href="/member-attendence-control">
            <i class="fa fa-clipboard-check"></i> Attendance
        </a>
        <div class="nav-section">Finance</div>
        <a class="nav-item {{ request()->is('members-payments-control') ? 'active' : '' }}"
            href="/members-payments-control">
            <i class="fa fa-credit-card"></i> Payments
        </a>

        {{-- <a class="nav-item {{ request()->is('membership') ? 'active' : '' }}" href="/membership">
            <i class="fa fa-id-card"></i> Memberships
        </a> --}}
        <div class="nav-section">System</div>
        <a class="nav-item {{ request()->is('admin-reports') ? 'active' : '' }}" href="/admin-reports">
            <i class="fa fa-chart-line"></i> Reports
        </a>

        <a class="nav-item {{ request()->is('admin-setting') ? 'active' : '' }}" href="/admin-setting">
            <i class="fa fa-gear"></i> Settings
        </a>
        <div class="sidebar-bottom">
            <div class="admin-chip">
                <div class="admin-avatar">A</div>
                <div>
                    <div class="name">Welcome, {{ Auth::user()->name }}</div>
                    <div class="role">Role: {{ Auth::user()->role }}</div>
                </div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout " class="nav-item"
                style="width:100%;background:none;border:none;cursor:pointer;text-align:left;color:var(--accent2);"><i
                    class="fa fa-right-from-bracket"></i>
                Logout</button>
        </form>
    </div>
</x-layout>
