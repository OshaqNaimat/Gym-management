<x-layout>
    <x-admin-navbar />
    <x-admin-sidebar />

    <div id="page-attendance" class="content">

        <!-- Header -->
        <div class="section-head mb-1">
            <div>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">Attendance</h2>
                <div style="font-size:.8rem;color:var(--muted);" id="att-date-label">Loading...</div>
            </div>
            <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                <input type="date" class="form-control form-control-sm" id="att-date-picker" style="width:160px;"
                    value="{{ $date }}" onchange="onDateChange()">
                <button class="btn-outline-accent" onclick="exportAttendance()">
                    <i class="fa fa-download me-1"></i>Export CSV
                </button>
                <button class="btn-accent" onclick="saveAttendance()">
                    <i class="fa fa-floppy-disk me-1"></i>Save
                </button>
            </div>
        </div>


        <!-- Summary Cards -->
        <div class="row g-3 mb-4 mt-1">
            <div class="col-6 col-md-3">
                <div class="stat-card c1">
                    <div class="stat-icon"><i class="fa fa-users"></i></div>
                    <div class="stat-label">Total</div>
                    <div class="stat-value" id="att-total">{{ $totalCount }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card c4">
                    <div class="stat-icon" style="background:rgba(74,222,128,.15);color:#4ade80;">
                        <i class="fa fa-circle-check"></i>
                    </div>
                    <div class="stat-label">Present</div>
                    <div class="stat-value" id="att-present" style="color:#4ade80;">{{ $presentCount }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card c3">
                    <div class="stat-icon"><i class="fa fa-circle-xmark"></i></div>
                    <div class="stat-label">Absent</div>
                    <div class="stat-value" id="att-absent" style="color:#ff4757;">{{ $absentCount }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card"
                    style="background:linear-gradient(135deg,rgba(167,139,250,.12),rgba(167,139,250,.04));border:1px solid rgba(167,139,250,.2);">
                    <div class="stat-icon" style="background:rgba(167,139,250,.15);color:#a78bfa;">
                        <i class="fa fa-percent"></i>
                    </div>
                    <div class="stat-label">Rate</div>
                    <div class="stat-value" id="att-rate" style="color:#a78bfa;">{{ $rate }}%</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions + Search -->
        <div style="display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap;align-items:center;">
            <button onclick="markAll('present')"
                style="padding:7px 14px;border-radius:8px;border:1px solid rgba(74,222,128,.4);background:rgba(74,222,128,.08);color:#4ade80;cursor:pointer;font-size:13px;font-weight:600;">
                <i class="fa fa-check-double me-1"></i> Mark All Present
            </button>
            <button onclick="markAll('absent')"
                style="padding:7px 14px;border-radius:8px;border:1px solid rgba(255,71,87,.3);background:rgba(255,71,87,.06);color:#ff4757;cursor:pointer;font-size:13px;font-weight:600;">
                <i class="fa fa-xmark me-1"></i> Mark All Absent
            </button>
            <button onclick="resetAll()"
                style="padding:7px 14px;border-radius:8px;border:1px solid var(--border);background:var(--surface2);color:var(--muted);cursor:pointer;font-size:13px;font-weight:600;">
                <i class="fa fa-rotate-left me-1"></i> Reset
            </button>
            <div style="margin-left:auto;">
                <input type="text" class="att-search" id="att-search" placeholder="🔍  Search member..."
                    oninput="renderAttTable()">
            </div>
        </div>

        <!-- Attendance Table -->
        <div class="table-card mb-4">
            <table>
                <thead>
                    <tr>
                        <th>Roll No.</th>
                        <th>Member</th>
                        <th>Plan</th>
                        <th>Time In</th>
                        <th>Status</th>
                        <th>Mark Attendance</th>
                    </tr>
                </thead>
                <tbody id="att-table-body"></tbody>
            </table>
        </div>

        <!-- Attendance History -->
        <div class="section-head mb-3">
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.2rem;letter-spacing:1px;">
                <i class="fa fa-clock-rotate-left me-2" style="color:var(--accent);"></i>Recent Attendance History
            </h2>
        </div>
        <div class="chart-card" id="att-history">
            @if ($history->isEmpty())
                <div style="color:var(--muted);font-size:.85rem;text-align:center;padding:20px;">
                    No saved records yet.
                </div>
            @else
                @foreach ($history as $date => $records)
                    @php
                        $present = $records->where('status', 'present');
                        $absent = $records->where('status', 'absent');
                        $rate = $records->count() ? round(($present->count() / $records->count()) * 100) : 0;
                    @endphp
                    <div class="history-entry">
                        <div class="history-date">
                            <div class="hd">{{ \Carbon\Carbon::parse($date)->format('M d, Y') }}</div>
                        </div>
                        <div style="flex:1;display:flex;flex-wrap:wrap;align-items:center;">
                            @foreach ($present as $r)
                                <span class="name-pill p"><i class="fa fa-check" style="font-size:9px;"></i>
                                    {{ $r->user->name }}</span>
                            @endforeach
                            @foreach ($absent as $r)
                                <span class="name-pill a"><i class="fa fa-xmark" style="font-size:9px;"></i>
                                    {{ $r->user->name }}</span>
                            @endforeach
                        </div>
                        <div class="history-rate">{{ $rate }}%</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Pass DB members to JS --}}
    <script>
        const attendanceMembers = @json($membersJs);
        const savedAttendance = @json($attendance);
        const saveUrl = "{{ route('admin.saveAttendance') }}";
        const csrfToken = "{{ csrf_token() }}";

        // ── State ──
        let attStatus = {};
        let attTimeIn = {};

        // Load existing attendance from DB
        attendanceMembers.forEach(m => {
            const rec = Object.values(savedAttendance).find(r => r.user_id == m.id);
            attStatus[m.id] = rec ? rec.status : null;
            attTimeIn[m.id] = rec ? (rec.time_in || '—') : '—';
        });

        // ── Init ──
        document.addEventListener('DOMContentLoaded', () => {
            updateDateLabel(document.getElementById('att-date-picker').value);
            renderAttTable();
        });

        function updateDateLabel(dateStr) {
            const d = new Date(dateStr + 'T00:00:00');
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('att-date-label').textContent =
                (dateStr === today ? 'Today · ' : 'Viewing · ') +
                d.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
        }

        function onDateChange() {
            const date = document.getElementById('att-date-picker').value;
            window.location.href = '{{ route('admin.attendanceControl') }}?date=' + date;
        }

        function renderAttTable() {
            const filter = (document.getElementById('att-search')?.value || '').toLowerCase();
            const tbody = document.getElementById('att-table-body');
            const filtered = attendanceMembers.filter(m => m.name.toLowerCase().includes(filter));

            tbody.innerHTML = filtered.map((m, i) => {
                const s = attStatus[m.id];
                const t = attTimeIn[m.id] || '—';
                return `
                <tr>

<td style="color:var(--muted);font-size:.85rem;">${m.roll_number ?? '—'}</td>
                    <td>
                        <div style="display:flex;align-items:center;">
                            <div class="mem-avatar" style="background:${m.color};color:#000;">${m.initials}</div>
                            <span style="font-weight:500;">${m.name}</span>
                        </div>
                    </td>
                    <td><span style="font-size:.8rem;color:var(--muted);">${m.plan}</span></td>
                    <td style="font-size:.85rem;color:var(--muted);">${s==='present' ? t : '—'}</td>
                    <td>${statusBadge(s)}</td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <button class="att-mark-btn present ${s==='present'?'active':''}"
                                onclick="markMember(${m.id},'present')">
                                <i class="fa fa-check"></i> Present
                            </button>
                            <button class="att-mark-btn absent ${s==='absent'?'active':''}"
                                onclick="markMember(${m.id},'absent')">
                                <i class="fa fa-xmark"></i> Absent
                            </button>
                        </div>
                    </td>
                </tr>`;
            }).join('');

            updateAttStats();
        }

        function statusBadge(s) {
            if (s === 'present') return `<span class="badge-status badge-active">Present</span>`;
            if (s === 'absent') return `<span class="badge-status badge-expired">Absent</span>`;
            return `<span class="badge-status badge-trial" style="color:var(--muted);">—</span>`;
        }

        function markMember(id, status) {
            attStatus[id] = attStatus[id] === status ? null : status;
            attTimeIn[id] = attStatus[id] === 'present' ? now() : '—';
            renderAttTable();
        }

        function markAll(status) {
            attendanceMembers.forEach(m => {
                attStatus[m.id] = status;
                attTimeIn[m.id] = status === 'present' ? now() : '—';
            });
            renderAttTable();
        }

        function resetAll() {
            attendanceMembers.forEach(m => {
                attStatus[m.id] = null;
                attTimeIn[m.id] = '—';
            });
            document.getElementById('att-search').value = '';
            renderAttTable();
        }

        function updateAttStats() {
            const total = attendanceMembers.length;
            const present = Object.values(attStatus).filter(s => s === 'present').length;
            const absent = Object.values(attStatus).filter(s => s === 'absent').length;
            const rate = total ? Math.round((present / total) * 100) : 0;
            document.getElementById('att-total').textContent = total;
            document.getElementById('att-present').textContent = present;
            document.getElementById('att-absent').textContent = absent;
            document.getElementById('att-rate').textContent = rate + '%';
        }

        async function saveAttendance() {
            const date = document.getElementById('att-date-picker').value;
            if (!date) {
                showToast('Please select a date first!', true);
                return;
            }

            const records = {};
            attendanceMembers.forEach(m => {
                records[m.id] = {
                    status: attStatus[m.id] || 'unmarked',
                    time_in: attTimeIn[m.id] || null,
                };
            });

            const res = await fetch(saveUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    date,
                    records
                }),
            });

            const data = await res.json();
            if (data.success) {
                showToast('✅ Attendance saved for ' + date);
                setTimeout(() => location.reload(), 1000);
            } else {
                showToast('❌ Something went wrong', true);
            }
        }

        function exportAttendance() {
            const date = document.getElementById('att-date-picker').value;
            let csv = 'Name,Plan,Status,Time In\n';
            attendanceMembers.forEach(m => {
                const s = attStatus[m.id] || 'Unmarked';
                const t = attTimeIn[m.id] || '—';
                csv += `"${m.name}","${m.plan}","${s}","${s === 'present' ? t : '—'}"\n`;
            });
            const a = document.createElement('a');
            a.href = URL.createObjectURL(new Blob([csv], {
                type: 'text/csv'
            }));
            a.download = `attendance-${date || 'export'}.csv`;
            a.click();
            showToast('📥 CSV downloaded!');
        }

        function now() {
            return new Date().toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function showToast(msg, isErr) {
            const t = document.createElement('div');
            t.className = 'toast-msg';
            t.style.background = isErr ? '#ff4757' : 'var(--accent)';
            t.style.color = isErr ? '#fff' : '#000';
            t.textContent = msg;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 2800);
        }
    </script>
</x-layout>
