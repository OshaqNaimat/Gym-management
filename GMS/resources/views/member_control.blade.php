<x-layout>
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
    <form class="modal fade" id="addMemberModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Member</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6"><label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="John Doe">
                        </div>
                        <div class="col-6"><label class="form-label">Roll Number</label>
                            <input type="text" class="form-control" placeholder="1, 2, 3...">
                        </div>
                        <div class="col-6"><label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="john@email.com">
                        </div>
                        <div class="col-6"><label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="abcd123....">
                        </div>
                        <div class="col-6"><label class="form-label">Phone</label>
                            <input type="text" class="form-control" placeholder="+92 300...">
                        </div>
                        <div class="col-6"><label class="form-label">Plan</label>
                            <select class="form-select">
                                <option>Trial</option>
                                <option>Monthly</option>
                                <option>Quarterly</option>
                                <option>Annual</option>
                            </select>
                        </div>
                        <div class="col-6"><label class="form-label">Amount</label>
                            <input type="number" class="form-control" placeholder="e.g. 21" min="1"
                                max="31">
                        </div>
                        <div class="col-6"><label class="form-label">Gender</label><select class="form-select">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-outline-accent" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-accent" data-bs-dismiss="modal">Add Member</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>
