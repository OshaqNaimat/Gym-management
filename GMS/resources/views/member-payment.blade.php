<x-layout>
    <x-member-navbar />
    <x-member-sidebar />
    <div id="page-payments" class="content">
        <div class="section-head mb-4">
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;">My Payments
            </h2>
            <!-- <button class="btn-outline-accent"><i class="fa fa-download me-1"></i>Download Receipt</button> -->
        </div>
        <!-- <div class="row g-3 mb-4">
      <div class="col-md-4"><div class="stat-card c1"><div class="stat-icon"><i class="fa fa-dollar-sign"></i></div><div class="stat-label">Total Paid</div><div class="stat-value">$1,198</div><div class="stat-sub">Lifetime payments</div></div></div>
      <div class="col-md-4"><div class="stat-card c4"><div class="stat-icon"><i class="fa fa-circle-check"></i></div><div class="stat-label">Status</div><div class="stat-value">Clear</div><div class="stat-sub">No dues pending</div></div></div>
      <div class="col-md-4"><div class="stat-card c2"><div class="stat-icon"><i class="fa fa-clock"></i></div><div class="stat-label">Next Due</div><div class="stat-value">Feb '27</div><div class="stat-sub">$599 annual renewal</div></div></div>
    </div> -->
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="color:var(--muted);font-size:.85rem;">#INV-0042</td>
                        <td>Annual Plan</td>
                        <td style="color:#4ade80;font-weight:600;">$599</td>
                        <td>Feb 18, 2026</td>
                        <td>Card</td>
                        <td><span class="badge-status badge-active">Paid</span></td>
                    </tr>
                    <tr>
                        <td style="color:var(--muted);font-size:.85rem;">#INV-0021</td>
                        <td>Annual Plan</td>
                        <td style="color:#4ade80;font-weight:600;">$599</td>
                        <td>Feb 18, 2025</td>
                        <td>Card</td>
                        <td><span class="badge-status badge-active">Paid</span></td>
                    </tr>
                    <tr>
                        <td style="color:var(--muted);font-size:.85rem;">#INV-0060</td>
                        <td>Annual Plan</td>
                        <td style="color:var(--accent);font-weight:600;">$599</td>
                        <td>Feb 18, 2027</td>
                        <td>—</td>
                        <td><span class="badge-status badge-pending">Upcoming</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
