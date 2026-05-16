<x-layout>

    <x-member-navbar />
    <x-member-sidebar />


    {{-- Flash Messages --}}
    @if (session('success'))
        <div id="flash-message"
            style="position:fixed;top:20px;right:20px;z-index:9999;background:#4ade80;color:#000;padding:15px 20px;border-radius:10px;font-weight:600;box-shadow:0 4px 15px rgba(0,0,0,0.3);">
            🔥 {{ session('success') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('flash-message').style.display = 'none', 3000)
        </script>
    @endif

    @if (session('error'))
        <div id="flash-error"
            style="position:fixed;top:20px;right:20px;z-index:9999;background:#f87171;color:#000;padding:15px 20px;border-radius:10px;font-weight:600;box-shadow:0 4px 15px rgba(0,0,0,0.3);">
            ⚠️ {{ session('error') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('flash-error').style.display = 'none', 4000)
        </script>
    @endif

    <div class="content">

        {{-- Header --}}
        <div class="section-head mb-3">
            <div>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">My Cardio</h2>
                <div style="font-size:.8rem;color:var(--muted);">Track your cardio sessions & calories</div>
            </div>
            @if (!$user->weight)
                <a href="{{ route('member.profile') }}"
                    style="background:#f87171;color:#000;padding:8px 16px;border-radius:8px;font-weight:600;font-size:13px;text-decoration:none;">
                    ⚠️ Set your weight first
                </a>
            @else
                <button class="btn-accent" data-bs-toggle="modal" data-bs-target="#logCardioModal">
                    <i class="fa fa-plus me-1"></i> Log Cardio
                </button>
            @endif
        </div>

        {{-- Stats Row --}}
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:16px;margin-bottom:24px;">
            <div class="stat-card">
                <div style="font-size:10px;letter-spacing:2px;color:var(--muted);text-transform:uppercase;">Total
                    Sessions</div>
                <div style="font-family:'Bebas Neue',sans-serif;font-size:2rem;color:var(--accent);">
                    {{ $totalSessions }}</div>
            </div>
            <div class="stat-card">
                <div style="font-size:10px;letter-spacing:2px;color:var(--muted);text-transform:uppercase;">Total
                    Calories</div>
                <div style="font-family:'Bebas Neue',sans-serif;font-size:2rem;color:#f87171;">
                    {{ number_format($totalCalories, 1) }} kcal</div>
            </div>
            <div class="stat-card">
                <div style="font-size:10px;letter-spacing:2px;color:var(--muted);text-transform:uppercase;">Avg Duration
                </div>
                <div style="font-family:'Bebas Neue',sans-serif;font-size:2rem;color:#4fc3f7;">{{ round($avgDuration) }}
                    min</div>
            </div>
            <div class="stat-card">
                <div style="font-size:10px;letter-spacing:2px;color:var(--muted);text-transform:uppercase;">Total
                    Distance</div>
                <div style="font-family:'Bebas Neue',sans-serif;font-size:2rem;color:#a78bfa;">
                    {{ number_format($totalDistance, 1) }} km</div>
            </div>
        </div>

        {{-- Chart --}}
        <div class="table-card mb-4" style="padding:24px;">
            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:16px;">
                Last 7 Days — Calories & Duration
            </div>
            <canvas id="cardioChart" height="100"></canvas>
        </div>

        {{-- Log History Table --}}
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Exercise</th>
                        <th>Duration</th>
                        <th>Distance</th>
                        <th>Calories</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->logged_at->format('M d, Y') }}</td>
                            <td>
                                <span style="display:inline-flex;align-items:center;gap:6px;">
                                    @switch($log->exercise_type)
                                        @case('Running')
                                            🏃
                                        @break

                                        @case('Cycling')
                                            🚴
                                        @break

                                        @case('Skipping')
                                            🪢
                                        @break

                                        @case('Treadmill')
                                            🏃
                                        @break

                                        @case('Walking')
                                            🚶
                                        @break

                                        @default
                                            🏋️
                                    @endswitch
                                    {{ $log->exercise_type }}
                                </span>
                            </td>
                            <td>{{ $log->duration }} min</td>
                            <td>{{ $log->distance ? $log->distance . ' km' : '—' }}</td>
                            <td style="color:#f87171;font-weight:600;">{{ $log->calories }} kcal</td>
                            <td style="color:var(--muted);font-size:12px;">{{ $log->notes ?? '—' }}</td>
                            <td>
                                <form action="{{ route('member.cardio.destroy', $log->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this log?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background:rgba(248,113,113,.15);border:1px solid rgba(248,113,113,.3);color:#f87171;padding:4px 10px;border-radius:6px;font-size:11px;cursor:pointer;">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align:center;color:var(--muted);padding:40px;">
                                    No cardio sessions logged yet. Hit <strong>Log Cardio</strong> to start! 💪
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        {{-- Log Cardio Modal --}}
        <div class="modal fade" id="logCardioModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Log Cardio Session</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('member.cardio.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Exercise Type</label>
                                    <select name="exercise_type" class="form-select" required>
                                        <option value="">Select...</option>
                                        <option value="Running">🏃 Running</option>
                                        <option value="Cycling">🚴 Cycling</option>
                                        <option value="Treadmill">🏃 Treadmill</option>
                                        <option value="Skipping">🪢 Skipping</option>
                                        <option value="Walking">🚶 Walking</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Duration (minutes)</label>
                                    <input type="number" name="duration" class="form-control" placeholder="e.g. 30"
                                        min="1" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Distance (km) <small
                                            class="text-muted">optional</small></label>
                                    <input type="number" name="distance" class="form-control" placeholder="e.g. 3.5"
                                        step="0.1" min="0">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="logged_at" class="form-control" value="{{ date('Y-m-d') }}"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Notes <small class="text-muted">optional</small></label>
                                    <input type="text" name="notes" class="form-control"
                                        placeholder="e.g. Morning run, felt great!">
                                </div>
                            </div>

                            {{-- Weight reminder --}}
                            <div
                                style="margin-top:16px;padding:10px 14px;background:rgba(var(--accent-rgb),.08);border-radius:8px;font-size:12px;color:var(--muted);">
                                <i class="fa fa-circle-info"></i>
                                Calories will be calculated using your weight
                                <strong style="color:var(--accent);">{{ $user->weight }} kg</strong>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-outline-accent" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn-accent">
                                <i class="fa fa-fire me-1"></i> Log Session
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Chart JS --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('cardioChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                            label: 'Calories (kcal)',
                            data: @json($chartCalories),
                            backgroundColor: 'rgba(248,113,113,0.7)',
                            borderRadius: 6,
                            yAxisID: 'y',
                        },
                        {
                            label: 'Duration (min)',
                            data: @json($chartDuration),
                            backgroundColor: 'rgba(79,195,247,0.7)',
                            borderRadius: 6,
                            yAxisID: 'y1',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ccc'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#aaa'
                            },
                            grid: {
                                color: 'rgba(255,255,255,0.05)'
                            }
                        },
                        y: {
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                color: '#f87171'
                            },
                            grid: {
                                color: 'rgba(255,255,255,0.05)'
                            },
                            title: {
                                display: true,
                                text: 'Calories',
                                color: '#f87171'
                            }
                        },
                        y1: {
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                color: '#4fc3f7'
                            },
                            grid: {
                                drawOnChartArea: false
                            },
                            title: {
                                display: true,
                                text: 'Duration (min)',
                                color: '#4fc3f7'
                            }
                        },
                    }
                }
            });
        </script>

    </x-layout>
