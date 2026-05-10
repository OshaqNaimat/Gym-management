<x-layout>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <h1 class="pump-house">PUMP HOUSE</h1>
            <span>Gym Management</span>
        </div>

        <div class="nav-section">Main</div>
        <a class="nav-item active" href="/admin-dashboard"><i class="fa fa-gauge-high"></i> Dashboard</a>
        <a class="nav-item" href="/member-control"><i class="fa fa-users"></i> Members</a>
        <a class="nav-item" href="/member-attendence"><i class="fa fa-clipboard-check"></i> Attendance</a>

        <div class="nav-section">Finance</div>
        <a class="nav-item" onclick="showPage('payments')"><i class="fa fa-credit-card"></i> Payments</a>
        <a class="nav-item" onclick="showPage('memberships')"><i class="fa fa-id-card"></i> Memberships</a>

        <div class="nav-section">System</div>
        <a class="nav-item" onclick="showPage('reports')"><i class="fa fa-chart-line"></i> Reports</a>
        <a class="nav-item" onclick="showPage('settings')"><i class="fa fa-gear"></i> Settings</a>

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
            <button type="submit" class="btn-logout" class="nav-item"><i class="fa fa-logout"></i>Logout</button>
        </form>
    </div>
</x-layout>
