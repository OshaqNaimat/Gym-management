<x-layout>
    <x-admin-navbar />
    <x-admin-sidebar />
    <div id="page-reports" class="content">
        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:20px;">
            Reports</h2>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="chart-card">
                    <div class="section-head">
                        <h2>Monthly Sign-ups</h2>
                    </div>
                    <div class="chart-bars" id="signup-chart"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-card">
                    <div class="section-head">
                        <h2>Revenue by Plan</h2>
                    </div>
                    <div style="margin-top:10px;">
                        <div class="prog-row">
                            <div class="prog-label"><span>Annual ($599)</span><span>$29,351</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:72%;background:var(--accent);"></div>
                            </div>
                        </div>
                        <div class="prog-row">
                            <div class="prog-label"><span>Monthly ($59)</span><span>$11,682</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:45%;background:#4fc3f7;"></div>
                            </div>
                        </div>
                        <div class="prog-row">
                            <div class="prog-label"><span>Quarterly ($149)</span><span>$7,257</span></div>
                            <div class="prog-bar-bg">
                                <div class="prog-bar-fill" style="width:28%;background:#a78bfa;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
