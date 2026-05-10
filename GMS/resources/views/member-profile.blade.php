<x-layout>
    <x-member-navbar />
    <x-member-sidebar />
    <div id="page-profile" class="content">
        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:24px;">
            My
            Profile</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="chart-card" style="text-align:center;">
                    @php
                        $parts = explode(' ', Auth::user()->name);
                        $initials = strtoupper(
                            substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''),
                        );
                    @endphp
                    <div
                        style="width:90px;height:90px;border-radius:50%;background:var(--accent);color:#000;font-family:'Bebas Neue',sans-serif;font-size:32px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;border:3px solid rgba(245,197,24,.3);">
                        {{ $initials }}
                    </div>
                    <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">
                        {{ Auth::user()->name }}
                    </div>
                    <div style="font-size:12px;color:var(--muted);margin-top:4px;">Roll #0042</div>
                    <span class="member-plan-badge" style="margin-top:10px;display:inline-flex;"><i class="fa fa-crown"
                            style="font-size:9px;"></i> Annual Member</span>
                    <div style="margin-top:20px;display:flex;justify-content:space-around;">
                        <div style="text-align:center;">
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;color:var(--accent);">
                                22</div>
                            <div style="font-size:10px;color:var(--muted);letter-spacing:1px;text-transform:uppercase;">
                                Check-ins</div>
                        </div>
                        <div style="text-align:center;">
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;color:var(--accent);">
                                88%</div>
                            <div style="font-size:10px;color:var(--muted);letter-spacing:1px;text-transform:uppercase;">
                                Rate</div>
                        </div>
                        <div style="text-align:center;">
                            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;color:var(--accent);">
                                1yr</div>
                            <div style="font-size:10px;color:var(--muted);letter-spacing:1px;text-transform:uppercase;">
                                Member</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="chart-card">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Personal Information</h2>
                    <div class="row g-3">
                        <div class="col-6"><label class="form-label">First Name</label><input type="text"
                                class="form-control" value="Alex"></div>
                        <div class="col-6"><label class="form-label">Last Name</label><input type="text"
                                class="form-control" value="Kim"></div>
                        <div class="col-12"><label class="form-label">Email</label><input type="email"
                                class="form-control" value="alex@email.com"></div>
                        <div class="col-6"><label class="form-label">Phone</label><input type="text"
                                class="form-control" value="+92 300 1234567"></div>
                        <div class="col-6"><label class="form-label">Gender</label><select class="form-select">
                                <option selected>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select></div>
                        <div class="col-12"><label class="form-label">Address</label><input type="text"
                                class="form-control" value="123 Street, Rawalpindi"></div>
                    </div>
                    <button class="btn-accent mt-3">Save Changes</button>
                </div>
                <div class="chart-card mt-3">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Change Password</h2>
                    <div class="row g-3">
                        <div class="col-12"><label class="form-label">Current Password</label><input type="password"
                                class="form-control" placeholder="••••••••"></div>
                        <div class="col-6"><label class="form-label">New Password</label><input type="password"
                                class="form-control" placeholder="••••••••"></div>
                        <div class="col-6"><label class="form-label">Confirm Password</label><input type="password"
                                class="form-control" placeholder="••••••••"></div>
                    </div>
                    <button class="btn-outline-accent mt-3">Update Password</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
