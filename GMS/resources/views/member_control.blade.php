<x-layout>

    {{-- Flash Message --}}
    @if (session('success'))
        <div id="flash-message"
            style="position:fixed;top:20px;right:20px;z-index:9999;background:#4ade80;color:#000;padding:15px 20px;border-radius:10px;font-weight:600;box-shadow:0 4px 15px rgba(0,0,0,0.3);">
            ✅ {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('flash-message').style.display = 'none';
            }, 3000); // disappears after 3 seconds
        </script>
    @endif
    <x-admin-navbar />
    <x-admin-sidebar />
    <div id="page-members" class="content">
        <div class="section-head mb-3">
            <div>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">All
                    Members</h2>
                <div style="font-size:.8rem;color:var(--muted);">1,284 total members</div>
            </div>
            <div style="display:flex;gap:8px;">
                <select class="form-select form-select-sm" style="width:140px;">
                    <option>All Plans</option>
                    <option>Annual</option>
                    <option>Monthly</option>
                    <option>Quarterly</option>
                    <option>Trial</option>
                </select>
                <button class="btn-accent" data-bs-toggle="modal" data-bs-target="#addMemberModal"><i
                        class="fa fa-plus me-1"></i> Add Member</button>
            </div>
        </div>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Email</th>
                        <th>Plan</th>
                        <th>Expiry</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#e8ff47;">AK</div>Alex Kim
                            </div>
                        </td>
                        <td>alex@email.com</td>
                        <td>Annual</td>
                        <td>Feb 2027</td>
                        <td><span class="badge-status badge-active">Active</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#4fc3f7;">SR</div>Sara Reed
                            </div>
                        </td>
                        <td>sara@email.com</td>
                        <td>Monthly</td>
                        <td>Mar 2026</td>
                        <td><span class="badge-status badge-active">Active</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#a78bfa;">MO</div>Mike Osei
                            </div>
                        </td>
                        <td>mike@email.com</td>
                        <td>Trial</td>
                        <td>Mar 2026</td>
                        <td><span class="badge-status badge-trial">Trial</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#fb923c;">JP</div>Jane Park
                            </div>
                        </td>
                        <td>jane@email.com</td>
                        <td>Quarterly</td>
                        <td>Feb 2026</td>
                        <td><span class="badge-status badge-expired">Expired</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#4ade80;">LC</div>Leo Chen
                            </div>
                        </td>
                        <td>leo@email.com</td>
                        <td>Annual</td>
                        <td>Feb 2027</td>
                        <td><span class="badge-status badge-active">Active</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#f472b6;">RA</div>Raza Ali
                            </div>
                        </td>
                        <td>raza@email.com</td>
                        <td>Monthly</td>
                        <td>Mar 2026</td>
                        <td><span class="badge-status badge-active">Active</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#facc15;">NS</div>Nina Shah
                            </div>
                        </td>
                        <td>nina@email.com</td>
                        <td>Annual</td>
                        <td>Jan 2027</td>
                        <td><span class="badge-status badge-active">Active</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#38bdf8;">OF</div>Omar Farooq
                            </div>
                        </td>
                        <td>omar@email.com</td>
                        <td>Quarterly</td>
                        <td>Apr 2026</td>
                        <td><span class="badge-status badge-active">Active</span></td>
                        <td><button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- add a member form --}}
    <form action="{{ route('admin.addMember') }}" method="POST" class="modal fade" id="addMemberModal" tabindex="-1">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Member</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="John Doe"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label">Roll Number</label>
                            <input type="text" name="roll_number"
                                class="form-control @error('roll_number') is-invalid @enderror" placeholder="1, 2, 3..."
                                value="{{ old('roll_number') }}">
                            @error('roll_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="john@email.com"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label">Password
                                <small class="text-muted">(min. 6 characters)</small>
                            </label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="abcd123...."
                                minlength="6" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="col-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Repeat password" minlength="6" required>
                            <div class="invalid-feedback" id="password-match-error">
                                Passwords do not match.
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="+92 300..."
                                value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label">Plan</label>
                            <select name="plan" class="form-select @error('plan') is-invalid @enderror">
                                <option value="Trial" {{ old('plan') == 'Trial' ? 'selected' : '' }}>Trial
                                </option>
                                <option value="Monthly" {{ old('plan') == 'Monthly' ? 'selected' : '' }}>Monthly
                                </option>
                                <option value="Quarterly" {{ old('plan') == 'Quarterly' ? 'selected' : '' }}>Quarterly
                                </option>
                                <option value="Annual" {{ old('plan') == 'Annual' ? 'selected' : '' }}>Annual
                                </option>
                            </select>
                            @error('plan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount"
                                class="form-control @error('amount') is-invalid @enderror" placeholder="e.g. 5000"
                                min="0" value="{{ old('amount') }}">
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                </option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                </option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-accent" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-accent" id="submit-btn">Add Member</button>
                </div>
            </div>
        </div>
    </form>

    {{-- Password match check --}}
    <script>
        document.getElementById('submit-btn').addEventListener('click', function(e) {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            const errorEl = document.getElementById('password-match-error');
            const confirmInput = document.getElementById('password_confirmation');

            if (password !== confirm) {
                e.preventDefault(); // stop form submit
                confirmInput.classList.add('is-invalid');
                errorEl.style.display = 'block';
            } else {
                confirmInput.classList.remove('is-invalid');
                errorEl.style.display = 'none';
            }
        });
    </script>

    {{-- Reopen modal if validation fails --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal(document.getElementById('addMemberModal')).show();
            });
        </script>
    @endif
</x-layout>
