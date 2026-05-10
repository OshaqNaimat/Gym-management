<x-layout>
    <div id="page-payments" class="content">
        <div class="section-head mb-3">
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">Payments</h2>
            <button class="btn-accent"><i class="fa fa-download me-1"></i> Export CSV</button>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-sm-4">
                <div class="stat-card c1">
                    <div class="stat-label">Total Collected</div>
                    <div class="stat-value">$48,290</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stat-card c3">
                    <div class="stat-label">Outstanding</div>
                    <div class="stat-value">$3,410</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stat-card c4">
                    <div class="stat-label">Transactions</div>
                    <div class="stat-value">412</div>
                </div>
            </div>
        </div>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#e8ff47;">AK</div>Alex Kim
                            </div>
                        </td>
                        <td>Annual</td>
                        <td style="color:#4ade80;font-weight:600;">$599</td>
                        <td>Feb 18, 2026</td>
                        <td>Card</td>
                        <td><span class="badge-status badge-active">Paid</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#4fc3f7;">SR</div>Sara Reed
                            </div>
                        </td>
                        <td>Monthly</td>
                        <td style="color:#4ade80;font-weight:600;">$59</td>
                        <td>Feb 16, 2026</td>
                        <td>Cash</td>
                        <td><span class="badge-status badge-active">Paid</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#fb923c;">JP</div>Jane Park
                            </div>
                        </td>
                        <td>Quarterly</td>
                        <td style="color:var(--accent2);font-weight:600;">$149</td>
                        <td>Feb 10, 2026</td>
                        <td>Card</td>
                        <td><span class="badge-status badge-expired">Failed</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="mem-avatar" style="background:#4ade80;">LC</div>Leo Chen
                            </div>
                        </td>
                        <td>Annual</td>
                        <td style="color:#4ade80;font-weight:600;">$599</td>
                        <td>Feb 08, 2026</td>
                        <td>Transfer</td>
                        <td><span class="badge-status badge-active">Paid</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
