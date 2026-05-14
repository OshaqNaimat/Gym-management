<x-layout>
    <div class="main">
        <div class="topbar">
            <button class="icon-btn d-lg-none" onclick="document.getElementById('sidebar').classList.toggle('open')">
                <i class="fa fa-bars"></i>
            </button>
            <div class="topbar-title" id="page-title">Dashboard</div>
            <div class="topbar-search" style="position: relative; flex: 1; max-width: 520px; margin: 0 auto;">
                <i class="fa fa-magnifying-glass"></i>
                <input type="text" id="globalSearch" placeholder="Search members, payments...">

                <!-- Dropdown Results -->
                <div class="search-dropdown" id="searchDropdown">
                    <div id="searchResults"></div>
                </div>
            </div>
            <div class="topbar-actions">

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

            const searchInput = document.getElementById('globalSearch');
            const searchDropdown = document.getElementById('searchDropdown');
            const searchResults = document.getElementById('searchResults');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const query = this.value.trim();

                if (query.length < 2) {
                    searchDropdown.classList.remove('show');
                    return;
                }

                searchTimeout = setTimeout(() => {
                    fetch(`/search?q=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            let html = '';

                            if (data.members && data.members.length > 0) {
                                html += `<div class="search-section-title">Members</div>`;
                                data.members.forEach(m => {
                                    html += `
                                <div class="search-item">
                                    <strong>${m.name}</strong>
                                    <span>${m.email} • ${m.phone ?? 'No phone'} • ${m.plan ?? 'No plan'}</span>
                                </div>`;
                                });
                            }

                            if (data.payments && data.payments.length > 0) {
                                html += `<div class="search-section-title">Payments</div>`;
                                data.payments.forEach(p => {
                                    html += `
                                <div class="search-item">
                                    <strong>${p.user?.name ?? 'Unknown'} — Rs. ${p.amount}</strong>
                                    <span>${p.plan} • ${p.method} • ${p.status} • ${p.date}</span>
                                </div>`;
                                });
                            }

                            if (!html) {
                                html =
                                    `<div class="search-empty">No results found for "<strong>${query}</strong>"</div>`;
                            }

                            searchResults.innerHTML = html;
                            searchDropdown.classList.add('show');
                        });
                }, 300); // 300ms debounce — waits for user to stop typing
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target)) {
                    searchDropdown.classList.remove('show');
                }
            });
        </script>

</x-layout>
