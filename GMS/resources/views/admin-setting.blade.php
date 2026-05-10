<x-layout>
    <x-admin-navbar />
    <x-admin-sidebar />

    {{-- Flash Message --}}
    @if (session('success'))
        <div id="flash-message"
            style="position:fixed;top:20px;right:20px;z-index:9999;background:#4ade80;color:#000;padding:15px 20px;border-radius:10px;font-weight:600;box-shadow:0 4px 15px rgba(0,0,0,0.3);">
            ✅ {{ session('success') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('flash-message').style.display = 'none', 3000);
        </script>
    @endif

    <div id="page-settings" class="content">
        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:24px;">
            Settings
        </h2>
        <div class="row g-4">

            {{-- Gym Details --}}
            <div class="col-md-6">
                <div class="chart-card">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Gym Details
                    </h2>
                    <form action="{{ route('admin.updateGym') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Gym Name</label>
                            <input type="text" name="gym_name" class="form-control" value="{{ $settings->gym_name }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $settings->email }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $settings->phone }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $settings->address }}"
                                required>
                        </div>
                        @error('gym_name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn-accent">Save Changes</button>
                    </form>
                </div>
            </div>

            {{-- Opening Hours --}}
            <div class="col-md-6">
                <div class="chart-card">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Opening Hours
                    </h2>
                    <form action="{{ route('admin.updateHours') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Weekdays</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="time" name="weekday_open" class="form-control"
                                        value="{{ $settings->weekday_open }}">
                                </div>
                                <div class="col">
                                    <input type="time" name="weekday_close" class="form-control"
                                        value="{{ $settings->weekday_close }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Saturday</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="time" name="saturday_open" class="form-control"
                                        value="{{ $settings->saturday_open }}">
                                </div>
                                <div class="col">
                                    <input type="time" name="saturday_close" class="form-control"
                                        value="{{ $settings->saturday_close }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sunday</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="time" name="sunday_open" class="form-control"
                                        value="{{ $settings->sunday_open }}">
                                </div>
                                <div class="col">
                                    <input type="time" name="sunday_close" class="form-control"
                                        value="{{ $settings->sunday_close }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-accent">Save Hours</button>
                    </form>
                </div>
            </div>

            {{-- Change Password --}}
            <div class="col-md-6">
                <div class="chart-card">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Change Password
                    </h2>
                    <form action="{{ route('admin.updatePassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password"
                                class="form-control
                                @error('current_password') is-invalid @enderror"
                                placeholder="Enter current password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password <small class="text-muted">(min. 6)</small></label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter new password" minlength="6">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Repeat new password">
                        </div>
                        <button type="submit" class="btn-accent">Change Password</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-layout>
