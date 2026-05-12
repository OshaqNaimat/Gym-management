<x-layout>
    <div class="main">
        <div class="topbar">
            <button class="icon-btn d-lg-none" onclick="document.getElementById('sidebar').classList.toggle('open')">
                <i class="fa fa-bars"></i>
            </button>
            <div class="topbar-title" id="page-title">Dashboard</div>
            <div class="topbar-search">
                <i class="fa fa-magnifying-glass"></i>
                <input type="text" placeholder="Search members, classes...">
            </div>
            <div class="topbar-actions">
                <!-- Bell Icon -->
                <!-- Bell Icon -->
                <div class="icon-btn" id="bellBtn">
                    <i class="fa fa-bell"></i>

                    @if (isset($unreadCount) && $unreadCount > 0)
                        <div class="badge-dot"></div>
                    @endif

                    <div class="notification-dropdown">
                        @forelse(isset($notifications) ? $notifications : [] as $notification)
                            <div class="notification-item {{ $notification->is_read ? '' : 'unread' }}">
                                <strong>{{ $notification->title }}</strong>
                                <p>{{ $notification->message }}</p>
                                <small>{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        @empty
                            <div class="notification-item">
                                <p>No notifications</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="icon-btn" id="themeToggle" onclick="toggleTheme()" title="Toggle Theme">
                    <i class="fa fa-moon" id="themeIcon"></i>
                </div>
            </div>
        </div>
        <script>
            const bellBtn = document.getElementById('bellBtn');

            bellBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // ← prevents the outside-click from firing immediately
                this.classList.toggle('active');
            });

            document.addEventListener('click', function() {
                bellBtn.classList.remove('active');
            });
        </script>

</x-layout>
