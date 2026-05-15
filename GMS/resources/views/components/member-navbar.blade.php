<x-layout>
    {{-- navbar --}}
    <div class="main">
        <div class="topbar">
            <button class="icon-btn d-lg-none" onclick="document.getElementById('sidebar').classList.toggle('open')">
                <i class="fa fa-bars"></i>
            </button>
            <div class="topbar-title" id="page-title">Dashboard</div>
            {{-- <div class="topbar-search">
                <i class="fa fa-magnifying-glass"></i>
                <input type="text" placeholder="Search...">
            </div> --}}
            <div class="topbar-actions">
                <!-- <div class="icon-btn" onclick="showPage('announcements')"><i class="fa fa-bell"></i><div class="badge-dot"></div></div> -->
                <div class="icon-btn" id="themeToggle" onclick="toggleTheme()" title="Toggle Theme">
                    <i class="fa fa-moon" id="themeIcon"></i>
                </div>
            </div>
        </div>
</x-layout>
