<x-layout>
    <x-member-navbar />
    <x-member-sidebar />

    <!-- MY ATTENDANCE -->
    <div id="page-attendance" class="content">
        <div class="section-head mb-4">
            <div>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">My Attendance</h2>
                <div style="font-size:.8rem;color:var(--muted);">{{ $selected->format('F Y') }}</div>
            </div>
            <div style="display:flex;gap:8px;">
                {{-- Month filter — submits on change --}}
                <form method="GET" action="{{ route('member.attendance') }}" id="month-form">
                    <input type="month" name="month" class="form-control form-control-sm" value="{{ $monthInput }}"
                        style="width:160px;" onchange="document.getElementById('month-form').submit()">
                </form>
            </div>
        </div>

        <!-- Stats -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card c1">
                    <div class="stat-icon"><i class="fa fa-calendar"></i></div>
                    <div class="stat-label">Days in Month</div>
                    <div class="stat-value">{{ $daysInMonth }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card c4">
                    <div class="stat-icon"><i class="fa fa-circle-check"></i></div>
                    <div class="stat-label">Present</div>
                    <div class="stat-value">{{ $presentCount }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card c3">
                    <div class="stat-icon"><i class="fa fa-circle-xmark"></i></div>
                    <div class="stat-label">Absent</div>
                    <div class="stat-value">{{ $absentCount }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card"
                    style="background:linear-gradient(135deg,rgba(167,139,250,.12),rgba(167,139,250,.04));border-color:rgba(167,139,250,.2);">
                    <div class="stat-icon" style="background:rgba(167,139,250,.15);color:#a78bfa;">
                        <i class="fa fa-percent"></i>
                    </div>
                    <div class="stat-label">Rate</div>
                    <div class="stat-value" style="color:#a78bfa;">{{ $rate }}%</div>
                </div>
            </div>
        </div>

        <!-- Monthly Attendance Calendar -->
        <div class="chart-card mb-4">
            <div class="section-head">
                <h2>{{ $selected->format('F Y') }} — Attendance Calendar</h2>
            </div>

            {{-- Weekday headers --}}
            <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:6px;margin-bottom:4px;">
                @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                    <div style="text-align:center;font-size:10px;color:var(--muted);font-weight:600;padding:4px 0;">
                        {{ $day }}
                    </div>
                @endforeach
            </div>

            {{-- Calendar grid --}}
            <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:6px;">

                {{-- Empty cells for offset --}}
                @for ($i = 0; $i < $firstDayOffset; $i++)
                    <div></div>
                @endfor

                {{-- Day cells --}}
                @foreach ($calendarDays as $day)
                    @php
                        $bg = match ($day['status']) {
                            'present' => 'rgba(74,222,128,.25)',
                            'absent' => 'rgba(255,71,87,.2)',
                            default => 'var(--surface2)',
                        };
                        $border = match ($day['status']) {
                            'present' => '1px solid rgba(74,222,128,.4)',
                            'absent' => '1px solid rgba(255,71,87,.3)',
                            default => '1px solid var(--border)',
                        };
                        $numColor = match ($day['status']) {
                            'present' => '#4ade80',
                            'absent' => '#f87171',
                            default => 'var(--muted)',
                        };
                        $isToday = $day['date'] === now()->toDateString();
                    @endphp
                    <div
                        style="
                        background:{{ $bg }};
                        border:{{ $border }};
                        {{ $isToday ? 'outline:2px solid var(--accent);' : '' }}
                        border-radius:8px;
                        padding:8px 4px;
                        text-align:center;
                        min-height:52px;
                        display:flex;
                        flex-direction:column;
                        align-items:center;
                        justify-content:center;
                        gap:2px;">
                        <div style="font-size:13px;font-weight:700;color:{{ $numColor }};">{{ $day['day'] }}
                        </div>
                        @if ($day['status'] === 'present' && $day['time_in'])
                            <div style="font-size:9px;color:var(--muted);">{{ $day['time_in'] }}</div>
                        @elseif($day['status'] === 'present')
                            <div style="font-size:9px;color:#4ade80;">✓</div>
                        @elseif($day['status'] === 'absent')
                            <div style="font-size:9px;color:#f87171;">✗</div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Legend --}}
            <div style="display:flex;gap:16px;margin-top:16px;flex-wrap:wrap;">
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);">
                    <div style="width:12px;height:12px;border-radius:3px;background:rgba(74,222,128,.3);"></div>Present
                </div>
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);">
                    <div style="width:12px;height:12px;border-radius:3px;background:rgba(255,71,87,.25);"></div>Absent
                </div>
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);">
                    <div style="width:12px;height:12px;border-radius:3px;background:var(--surface2);"></div>Unmarked
                </div>
            </div>
        </div>

        <!-- Attendance Log Table -->
        <div class="section-head mb-3">
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.2rem;letter-spacing:1px;">Attendance Log</h2>
        </div>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Check-in Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($log as $record)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($record->date)->format('M d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($record->date)->format('l') }}</td>
                            <td>{{ $record->time_in ?? '—' }}</td>
                            <td>
                                @if ($record->status === 'present')
                                    <span
                                        style="
                                        background:rgba(74,222,128,.15);
                                        color:#4ade80;
                                        padding:3px 10px;
                                        border-radius:20px;
                                        font-size:11px;
                                        font-weight:600;">
                                        Present
                                    </span>
                                @else
                                    <span
                                        style="
                                        background:rgba(248,113,113,.15);
                                        color:#f87171;
                                        padding:3px 10px;
                                        border-radius:20px;
                                        font-size:11px;
                                        font-weight:600;">
                                        Absent
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;color:var(--muted);padding:24px;">
                                No attendance records for {{ $selected->format('F Y') }}.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
