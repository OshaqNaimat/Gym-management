<x-layout>
    <x-admin-navbar />
    <x-admin-sidebar />
    <div id="page-reports" class="content">
        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:20px;">
            Reports
        </h2>
        <div class="row g-3">

            {{-- Monthly Sign-ups Chart --}}
            <div class="col-md-6">
                <div class="chart-card">
                    <div class="section-head">
                        <h2>Monthly Sign-ups</h2>
                    </div>
                    <div class="chart-bars" id="signup-chart"></div>
                    @if ($signups->isEmpty())
                        <div style="color:var(--muted);text-align:center;padding:20px;font-size:.85rem;">
                            No signup data yet.
                        </div>
                    @endif
                </div>
            </div>

            {{-- Revenue by Plan --}}
            <div class="col-md-6">
                <div class="chart-card">
                    <div class="section-head">
                        <h2>Revenue by Plan</h2>
                    </div>
                    <div style="margin-top:10px;">
                        @if ($revenueByPlan->isEmpty())
                            <div style="color:var(--muted);text-align:center;padding:20px;font-size:.85rem;">
                                No payment data yet.
                            </div>
                        @else
                            @php
                                $planColors = [
                                    'Annual' => 'var(--accent)',
                                    'Quarterly' => '#a78bfa',
                                    'Monthly' => '#4fc3f7',
                                    'Trial' => '#fb923c',
                                ];
                            @endphp
                            @foreach ($revenueByPlan as $plan => $revenue)
                                @php
                                    $percent = $totalRevenue > 0 ? round(($revenue / $totalRevenue) * 100) : 0;
                                    $color = $planColors[$plan] ?? '#4ade80';
                                @endphp
                                <div class="prog-row">
                                    <div class="prog-label">
                                        <span>{{ $plan }}</span>
                                        <span>$ {{ number_format($revenue) }}</span>
                                    </div>
                                    <div class="prog-bar-bg">
                                        <div class="prog-bar-fill"
                                            style="width:{{ $percent }}%;background:{{ $color }};"></div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Monthly signups chart from DB
        const signupData = @json($signups);

        document.addEventListener('DOMContentLoaded', () => {
            const el = document.getElementById('signup-chart');
            if (!el) return;

            const entries = Object.entries(signupData);
            if (!entries.length) return;

            const max = Math.max(...entries.map(([, v]) => v));

            el.innerHTML = entries.map(([month, count], i) => `
    <div class="bar-wrap" style="position:relative;">
        <div class="bar-tooltip">${count} sign-up${count !== 1 ? 's' : ''}<br><span>${month}</span></div>
        <div class="bar" style="height:${Math.round((count/max)*100)}%;background:${i === entries.length-1 ? 'var(--accent)' : 'var(--surface2)'};border-radius:4px 4px 0 0;"></div>
        <div class="bar-label">${month}</div>
    </div>
`).join('');
        });
    </script>
</x-layout>
