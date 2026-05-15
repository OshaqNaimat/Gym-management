<x-layout>
    <x-member-navbar />
    <x-member-sidebar />

    <div id="page-profile" class="content">
        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:24px;">
            My Profile
        </h2>

        <div class="row g-4">

            {{-- ── Left: Avatar Card ─────────────────────────────────────── --}}
            <div class="col-md-4">
                <div class="chart-card" style="text-align:center;">
                    @php
                        $parts = explode(' ', $user->name);
                        $initials = strtoupper(
                            substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''),
                        );
                    @endphp

                    <div
                        style="width:90px;height:90px;border-radius:50%;background:var(--accent);color:#000;
                        font-family:'Bebas Neue',sans-serif;font-size:32px;display:flex;align-items:center;
                        justify-content:center;margin:0 auto 16px;border:3px solid rgba(245,197,24,.3);">
                        {{ $initials }}
                    </div>

                    <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">
                        {{ $user->name }}
                    </div>

                    <div style="font-size:12px;color:var(--muted);margin-top:4px;">
                        Roll #{{ $user->roll_number ?? 'N/A' }}
                    </div>

                    <span class="member-plan-badge" style="margin-top:10px;display:inline-flex;">
                        <i class="fa fa-crown" style="font-size:9px;"></i>
                        {{ $user->plan ?? 'No Plan' }}
                    </span>

                    {{-- Quick stats --}}
                    <div style="margin-top:20px;display:flex;justify-content:space-around;">
                        <div style="text-align:center;">
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;color:var(--accent);">
                                {{ $thisMonthCheckins }}
                            </div>
                            <div style="font-size:10px;color:var(--muted);letter-spacing:1px;text-transform:uppercase;">
                                Check-ins
                            </div>
                        </div>
                        <div style="text-align:center;">
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;color:var(--accent);">
                                {{ $attendanceRate }}%
                            </div>
                            <div style="font-size:10px;color:var(--muted);letter-spacing:1px;text-transform:uppercase;">
                                Rate
                            </div>
                        </div>
                        <div style="text-align:center;">
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;color:var(--accent);">
                                {{ $memberDuration }}
                            </div>
                            <div style="font-size:10px;color:var(--muted);letter-spacing:1px;text-transform:uppercase;">
                                Member
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── Right: Info + Password ────────────────────────────────── --}}
            <div class="col-md-8">

                {{-- Personal Information (read-only) --}}
                <div class="chart-card">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Personal Information
                    </h2>
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" value="{{ explode(' ', $user->name)[0] }}"
                                disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="{{ explode(' ', $user->name)[1] ?? '—' }}"
                                disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="{{ $user->phone ?? '—' }}" disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Gender</label>
                            <input type="text" class="form-control" value="{{ $user->gender ?? '—' }}" disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Plan</label>
                            <input type="text" class="form-control" value="{{ $user->plan ?? 'No Plan' }}" disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Roll Number</label>
                            <input type="text" class="form-control" value="{{ $user->roll_number ?? 'N/A' }}"
                                disabled>
                        </div>
                    </div>
                    <p style="font-size:11px;color:var(--muted);margin-top:12px;margin-bottom:0;">
                        <i class="fa fa-circle-info"></i>
                        To update your information, please contact the gym admin.
                    </p>
                </div>

                {{-- Change Password --}}
                <div class="chart-card mt-3">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Change Password
                    </h2>

                    {{-- Success message --}}
                    @if (session('password_success'))
                        <div
                            style="background:rgba(74,222,128,.12);border:1px solid rgba(74,222,128,.3);
                            color:#4ade80;border-radius:8px;padding:10px 14px;margin-bottom:16px;font-size:13px;">
                            <i class="fa fa-circle-check"></i> {{ session('password_success') }}
                        </div>
                    @endif

                    {{-- Error message --}}
                    @if (session('password_error') || $errors->any())
                        <div
                            style="background:rgba(248,113,113,.12);border:1px solid rgba(248,113,113,.3);
                            color:#f87171;border-radius:8px;padding:10px 14px;margin-bottom:16px;font-size:13px;">
                            <i class="fa fa-circle-exclamation"></i>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('member.updatePassword') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control"
                                    placeholder="••••••••" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control" placeholder="••••••••"
                                    required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="••••••••" required>
                            </div>
                        </div>
                        <button type="submit" class="btn-outline-accent mt-3">Update Password</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-layout>
