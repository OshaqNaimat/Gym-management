<x-layout>


    </head>

    <body>

        <div class="bg-wrapper"></div>
        <div class="bg-grid"></div>

        <!-- Theme Toggle -->
        <button class="theme-toggle" onclick="toggleTheme()" title="Switch Theme" aria-label="Toggle theme">
            <div class="toggle-knob" id="themeKnob">🌙</div>
        </button>

        <div class="container-fluid px-0" style="min-height:100vh;">
            <div class="row g-0" style="min-height:100vh;">

                <!-- ── Left Brand Panel ── -->
                <div class="col-xl-6 col-lg-4 col-md-3 d-none d-xl-flex d-lg-flex d-md-flex align-items-center">
                    <div class="brand-panel">
                        <!-- <div class="brand-tag">Est. 2020 &nbsp;·&nbsp; Elite Fitness</div> -->

                        <div class="brand-name m-0 p-0">
                            Pump<span>House</span>
                        </div>
                        <div class="brand-sub">Gym Management System</div>

                        <div class="brand-divider"></div>

                        <p class="brand-desc">
                            Your all-in-one platform for managing memberships, tracking workouts,
                            scheduling sessions, and running your gym like a machine.
                        </p>

                        <!-- <div class="stat-row">
          <div class="stat">
            <div class="stat-num">500+</div>
            <div class="stat-label">Members</div>
          </div>
          <div class="stat">
            <div class="stat-num">24/7</div>
            <div class="stat-label">Access</div>
          </div>
          <div class="stat">
            <div class="stat-num">30+</div>
            <div class="stat-label">Programs</div>
          </div>
        </div> -->

                        <!-- decorative barbell -->
                        <div class="barbell">
                            <div class="bb-plate lg"></div>
                            <div class="bb-plate"></div>
                            <div class="bb-bar"></div>
                            <div class="bb-plate"></div>
                            <div class="bb-plate lg"></div>
                        </div>
                    </div>
                </div>

                <!-- ── Right Auth Panel ── -->
                <div class="col-xl-6 col-lg-8 col-md-9 col-12">
                    <div class="auth-panel">
                        <div class="auth-card">

                            <!-- Tabs -->
                            <div class="tab-bar">
                                <button class="tab-btn active" onclick="switchTab('login')">Sign In</button>
                                <button class="tab-btn" onclick="switchTab('signup')">Sign Up</button>
                            </div>

                            <!-- ── LOGIN ── -->
                            <div class="form-section active" id="login">
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-icon-wrap">
                                        <span class="icon">✉</span>
                                        <input type="email" class="form-control" placeholder="you@pumphouse.com" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <div class="input-icon-wrap">
                                        <span class="icon">🔒</span>
                                        <input type="password" class="form-control" placeholder="••••••••" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Login As</label>
                                    <div class="input-icon-wrap role-select-wrap">
                                        <span class="icon">👤</span>
                                        <select class="form-select" id="loginRole"
                                            onchange="updateRoleBadge('loginRole','loginBadge')">
                                            <option value="">-- Select Role --</option>
                                            <option value="member">Member</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <span class="role-badge" id="loginBadge"></span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" />
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <a href="#" class="form-link">Forgot password?</a>
                                </div>

                                <button class="btn-pump">Access Dashboard</button>

                                <div class="or-divider">No account?&nbsp;
                                    <a href="#" class="form-link"
                                        onclick="switchTab('signup');return false;">Register here</a>
                                </div>
                            </div>

                            <!-- ── SIGNUP ── -->
                            <div class="form-section" id="signup">
                                <div class="row g-0">
                                    <div class="col-12 pe-2">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" placeholder="John" />
                                        </div>
                                    </div>
                                    <!-- <div class="col-6 ps-2">
                <div class="form-group">
                  <label class="form-label">Last Name</label>
                  <input type="text" class="form-control" placeholder="Doe"/>
                </div>
              </div> -->
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-icon-wrap">
                                        <span class="icon">✉</span>
                                        <input type="email" class="form-control" placeholder="you@pumphouse.com" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <div class="input-icon-wrap">
                                        <span class="icon">📞</span>
                                        <input type="tel" class="form-control" placeholder="+92 300 0000000" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Register As</label>
                                    <div class="input-icon-wrap role-select-wrap">
                                        <span class="icon">👤</span>
                                        <select class="form-select" id="signupRole"
                                            onchange="updateRoleBadge('signupRole','signupBadge')">
                                            <option value="">-- Select Role --</option>
                                            <option value="member">Member</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <span class="role-badge" id="signupBadge"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <div class="input-icon-wrap">
                                        <span class="icon">🔒</span>
                                        <input type="password" class="form-control"
                                            placeholder="Create a strong password" />
                                    </div>
                                </div>

                                <!-- <div class="form-group">
              <label class="form-label">Confirm Password</label>
              <div class="input-icon-wrap">
                <span class="icon">🔒</span>
                <input type="password" class="form-control" placeholder="Repeat password"/>
              </div>
            </div> -->

                                <!-- <div class="form-check mt-2">
              <input class="form-check-input" type="checkbox" id="terms"/>
              <label class="form-check-label" for="terms">
                I agree to the <a href="#" class="form-link" style="color:var(--gold);">Terms &amp; Conditions</a>
              </label>
            </div> -->

                                <button class="btn-pump">Create Account</button>

                                <div class="or-divider">Already a member?&nbsp;
                                    <a href="#" class="form-link"
                                        onclick="switchTab('login');return false;">Sign in</a>
                                </div>
                            </div>
                            <!-- end forms -->

                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function toggleTheme() {
                const isLight = document.body.classList.toggle('light-theme');
                document.getElementById('themeKnob').textContent = isLight ? '☀️' : '🌙';
            }

            function switchTab(tab) {
                document.querySelectorAll('.tab-btn').forEach((b, i) => {
                    b.classList.toggle('active', (tab === 'login' && i === 0) || (tab === 'signup' && i === 1));
                });
                document.querySelectorAll('.form-section').forEach(s => s.classList.remove('active'));
                document.getElementById(tab).classList.add('active');
            }

            function updateRoleBadge(selectId, badgeId) {
                const val = document.getElementById(selectId).value;
                const badge = document.getElementById(badgeId);
                if (val === 'admin') badge.textContent = '⚡ ADMIN';
                else if (val === 'member') badge.textContent = '🏋 MEMBER';
                else badge.textContent = '';
            }
            document.querySelector('#login .btn-pump').addEventListener('click', function() {
                const email = document.querySelector('#login input[type="email"]').value.trim();
                const password = document.querySelector('#login input[type="password"]').value.trim();
                const role = document.getElementById('loginRole').value;

                if (!email || !password) {
                    alert('Please enter your email and password.');
                    return;
                }
                if (!role) {
                    alert('Please select a role.');
                    return;
                }

                if (role === 'admin') {
                    window.location.href = './admin-dashboard.php';
                } else {
                    window.location.href = './member-dashboard.php';
                }
            });
        </script>
    </body>

</x-layout>
