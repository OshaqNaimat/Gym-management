<x-layout>


    </head>

    <body>

        <div class="bg-wrapper"></div>
        <div class="bg-grid"></div>

        <!-- Theme Toggle -->
        {{-- <button class="theme-toggle" onclick="toggleTheme()" title="Switch Theme" aria-label="Toggle theme">
            <div class="toggle-knob" id="themeKnob">🌙</div>
        </button> --}}

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
                            <div class="tab-bar ">
                                <button class="tab-btn active" {{-- onclick="switchTab('login')" --}}>Sign In</button>
                                {{-- <button class="tab-btn" onclick="switchTab('signup')">Sign Up</button> --}}
                            </div>

                            @if ($errors->any())
                                <div style="color: red; background: #ffeeee; padding: 10px; margin-bottom: 10px;">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <!-- ── LOGIN ── -->
                            <form action="{{ route('login.post') }}" method="POST" class="form-section active"
                                id="login">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-icon-wrap">
                                        <span class="icon">✉</span>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="you@pumphouse.com" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <div class="input-icon-wrap"
                                        style="position: relative; display: flex; align-items: center;">
                                        <span class="icon">🔒</span>
                                        <input type="password" name="password" id="passwordInput" class="form-control"
                                            placeholder="••••••••" required />
                                        <button type="button"
                                            onclick="
                const input = document.getElementById('passwordInput');
                const icon = document.getElementById('toggleIcon');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.textContent = '🙈';
                } else {
                    input.type = 'password';
                    icon.textContent = '👁️';
                }
            "
                                            style="position: absolute; right: 10px; background: none; border: none; cursor: pointer; padding: 0; line-height: 1;">
                                            <span id="toggleIcon">👁️</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" />
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <a href="#" class="form-link">Forgot password?</a> --}}
                                </div>

                                <!-- Remove the <a> tag. The button should submit the form. -->
                                <button type="submit" class="btn-pump">
                                    Access Dashboard
                                </button>
                            </form>

                            <!-- ── SIGNUP ── -->
                            {{-- <div class="form-section" id="signup">
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
                            <!-- end forms --> --}}

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
        </script>
    </body>

</x-layout>
