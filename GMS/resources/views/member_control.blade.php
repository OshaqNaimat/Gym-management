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
            }, 3000);
        </script>
    @endif

    <x-admin-navbar />
    <x-admin-sidebar />

    <div id="page-members" class="content">
        <div class="section-head mb-3">
            <div>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">All Members</h2>
                <div style="font-size:.8rem;color:var(--muted);">{{ $members->count() }} total members</div>
            </div>
            <div style="display:flex;gap:8px;">

                {{-- Plan Filter --}}
                <select class="form-select form-select-sm" style="width:140px;" id="planFilter">
                    <option value="all">All Plans</option>
                    <option value="Annual">Annual</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Trial">Trial</option>
                </select>

                <button class="btn-accent" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                    <i class="fa fa-plus me-1"></i> Add Member
                </button>
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
                <tbody id="membersTable">
                    @foreach ($members as $member)
                        @php
                            $expiry = match ($member->plan) {
                                'Trial' => $member->created_at->copy()->addDay(),
                                'Monthly' => $member->created_at->copy()->addMonth(),
                                'Quarterly' => $member->created_at->copy()->addMonths(3),
                                'Annual' => $member->created_at->copy()->addYear(),
                                default => null,
                            };
                            $isExpired = $expiry && $expiry->isPast();
                            $colors = [
                                '#e8ff47',
                                '#4fc3f7',
                                '#a78bfa',
                                '#fb923c',
                                '#4ade80',
                                '#f472b6',
                                '#facc15',
                                '#38bdf8',
                            ];
                            $color = $colors[$member->id % count($colors)];
                            $initials = strtoupper(
                                substr($member->name, 0, 1) .
                                    (strpos($member->name, ' ') !== false
                                        ? substr($member->name, strpos($member->name, ' ') + 1, 1)
                                        : ''),
                            );
                        @endphp
                        <tr data-plan="{{ $member->plan }}" style="{{ $isExpired ? 'order:-1' : '' }}">
                            <td>
                                <div style="display:flex;align-items:center;">
                                    <div class="mem-avatar" style="background:{{ $color }};">{{ $initials }}
                                    </div>
                                    {{ $member->name }}
                                </div>
                            </td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->plan ?? 'N/A' }}</td>
                            <td>{{ $expiry ? $expiry->format('M d, Y') : 'N/A' }}</td>
                            <td>
                                @if ($isExpired)
                                    <span class="badge-status badge-expired">Expired</span>
                                @elseif($member->plan === 'Trial')
                                    <span class="badge-status badge-trial">Trial</span>
                                @else
                                    <span class="badge-status badge-active">Active</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn-outline-accent" style="padding:4px 10px;font-size:11px;"
                                    data-bs-toggle="modal" data-bs-target="#editMemberModal{{ $member->id }}">
                                    Edit
                                </button>
                            </td>
                        </tr>

                        {{-- Edit Modal for each member --}}
                        <div class="modal fade" id="editMemberModal{{ $member->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit — {{ $member->name }}</h5>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ route('admin.updateMember', $member->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $member->name }}" required>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Roll Number</label>
                                                    <input type="text" name="roll_number" class="form-control"
                                                        value="{{ $member->roll_number }}">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ $member->email }}" required>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        value="{{ $member->phone }}">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Plan</label>
                                                    <select name="plan" class="form-select">
                                                        <option value="Trial"
                                                            {{ $member->plan == 'Trial' ? 'selected' : '' }}>Trial
                                                        </option>
                                                        <option value="Monthly"
                                                            {{ $member->plan == 'Monthly' ? 'selected' : '' }}>
                                                            Monthly</option>
                                                        <option value="Quarterly"
                                                            {{ $member->plan == 'Quarterly' ? 'selected' : '' }}>
                                                            Quarterly</option>
                                                        <option value="Annual"
                                                            {{ $member->plan == 'Annual' ? 'selected' : '' }}>Annual
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Amount</label>
                                                    <input type="number" name="amount" class="form-control"
                                                        value="{{ $member->amount }}" min="0">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Gender</label>
                                                    <select name="gender" class="form-select">
                                                        <option value="Male"
                                                            {{ $member->gender == 'Male' ? 'selected' : '' }}>Male
                                                        </option>
                                                        <option value="Female"
                                                            {{ $member->gender == 'Female' ? 'selected' : '' }}>Female
                                                        </option>
                                                        <option value="Other"
                                                            {{ $member->gender == 'Other' ? 'selected' : '' }}>Other
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">New Password <small
                                                            class="text-muted">(leave blank to keep)</small></label>
                                                    <input type="password" name="password" class="form-control"
                                                        minlength="6" placeholder="••••••">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control" placeholder="••••••">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-outline-accent"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn-accent">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Member Modal --}}
    <form action="{{ route('admin.addMember') }}" method="POST" class="modal fade" id="addMemberModal"
        tabindex="-1">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Member</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
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
                            <input type="text" name="roll_number" class="form-control" placeholder="1, 2, 3..."
                                value="{{ old('roll_number') }}">
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
                            <label class="form-label">Password <small class="text-muted">(min. 6)</small></label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="abcd123...."
                                minlength="6" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Repeat password" minlength="6" required>
                            <div class="invalid-feedback" id="password-match-error">Passwords do not match.</div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="+92 300..."
                                value="{{ old('phone') }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Plan</label>
                            <select name="plan" class="form-select">
                                <option value="Trial" {{ old('plan') == 'Trial' ? 'selected' : '' }}>Trial
                                </option>
                                <option value="Monthly" {{ old('plan') == 'Monthly' ? 'selected' : '' }}>Monthly
                                </option>
                                <option value="Quarterly" {{ old('plan') == 'Quarterly' ? 'selected' : '' }}>Quarterly
                                </option>
                                <option value="Annual" {{ old('plan') == 'Annual' ? 'selected' : '' }}>Annual
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" class="form-control" placeholder="e.g. 5000"
                                min="0" value="{{ old('amount') }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                </option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                </option>
                            </select>
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

    {{-- Plan Filter Script --}}
    <script>
        document.getElementById('planFilter').addEventListener('change', function() {
            const plan = this.value;
            document.querySelectorAll('#membersTable tr').forEach(function(row) {
                if (plan === 'all' || row.dataset.plan === plan) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Password match check
        document.getElementById('submit-btn').addEventListener('click', function(e) {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            const errorEl = document.getElementById('password-match-error');
            const confirmInput = document.getElementById('password_confirmation');
            if (password !== confirm) {
                e.preventDefault();
                confirmInput.classList.add('is-invalid');
                errorEl.style.display = 'block';
            } else {
                confirmInput.classList.remove('is-invalid');
                errorEl.style.display = 'none';
            }
        });
    </script>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal(document.getElementById('addMemberModal')).show();
            });
        </script>
    @endif

</x-layout>
