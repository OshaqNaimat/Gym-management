<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgLg9B8z_PbnST8PeJJGHOdj_hLLTVej8xGQ&s"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <title>GMS</title>


</head>

<body>
    {{ $slot }}
</body>

<script>
    const today = new Date();
    const todayDay = today.getDate();
    const members = [{
            initials: "AK",
            color: "#e8ff47",
            name: "Alex Kim",
            email: "alex@email.com",
            plan: "Annual",
            feeDay: todayDay,
            feePlan: "Annual – $599",
            expiry: "Feb 2027",
            checkins: 48,
            status: "active",
        },
        {
            initials: "SR",
            color: "#4fc3f7",
            name: "Sara Reed",
            email: "sara@email.com",
            plan: "Monthly",
            feeDay: todayDay,
            feePlan: "Monthly – $59",
            expiry: "Mar 2026",
            checkins: 22,
            status: "active",
        },
        {
            initials: "MO",
            color: "#a78bfa",
            name: "Mike Osei",
            email: "mike@email.com",
            plan: "Trial",
            feeDay: todayDay,
            feePlan: "Trial (Expiring)",
            expiry: "Feb 28",
            checkins: 3,
            status: "trial",
        },
        {
            initials: "JP",
            color: "#fb923c",
            name: "Jane Park",
            email: "jane@email.com",
            plan: "Quarterly",
            feeDay: 10,
            feePlan: "Quarterly – $149",
            expiry: "Feb 10",
            checkins: 31,
            status: "expired",
        },
        {
            initials: "LC",
            color: "#4ade80",
            name: "Leo Chen",
            email: "leo@email.com",
            plan: "Annual",
            feeDay: 8,
            feePlan: "Annual – $599",
            expiry: "Feb 2027",
            checkins: 61,
            status: "active",
        },
        {
            initials: "TW",
            color: "#f472b6",
            name: "Tara White",
            email: "tara@email.com",
            plan: "Monthly",
            feeDay: todayDay,
            feePlan: "Monthly – $59",
            expiry: "Mar 2026",
            checkins: 14,
            status: "active",
        },
        {
            initials: "RS",
            color: "#fb923c",
            name: "Ryan Singh",
            email: "ryan@email.com",
            plan: "Annual",
            feeDay: 15,
            feePlan: "Annual – $599",
            expiry: "Jan 2027",
            checkins: 55,
            status: "active",
        },
        {
            initials: "KP",
            color: "#60a5fa",
            name: "Kim Patel",
            email: "kim@email.com",
            plan: "Quarterly",
            feeDay: todayDay,
            feePlan: "Quarterly – $149",
            expiry: "Apr 2026",
            checkins: 29,
            status: "active",
        },
    ];

    const classesData = [{
            name: "Morning HIIT",
            trainer: "Sarah Mills",
            time: "06:00",
            capacity: 20,
            enrolled: 18,
            days: "Mon-Sat",
            color: "#e8ff47",
        },
        {
            name: "Yoga Flow",
            trainer: "Diana Cruz",
            time: "08:30",
            capacity: 15,
            enrolled: 12,
            days: "Daily",
            color: "#4fc3f7",
        },
        {
            name: "Strength & Tone",
            trainer: "Marcus Lee",
            time: "11:00",
            capacity: 25,
            enrolled: 8,
            days: "Mon/Wed/Fri",
            color: "#a78bfa",
        },
        {
            name: "Spin Cycle",
            trainer: "Amy Torres",
            time: "17:30",
            capacity: 20,
            enrolled: 20,
            days: "Tue/Thu/Sat",
            color: "#fb923c",
        },
        {
            name: "Boxing Bootcamp",
            trainer: "Jake Russo",
            time: "19:00",
            capacity: 20,
            enrolled: 14,
            days: "Mon/Wed",
            color: "#f472b6",
        },
        {
            name: "Pilates Core",
            trainer: "Luna Reyes",
            time: "09:00",
            capacity: 12,
            enrolled: 10,
            days: "Tue/Thu",
            color: "#4ade80",
        },
    ];

    // const trainersData = [{
    //         initials: 'SM',
    //         color: '#e8ff47',
    //         name: 'Sarah Mills',
    //         specialty: 'HIIT & Cardio',
    //         classes: 3,
    //         rating: 4.9,
    //         members: 87
    //     },
    //     {
    //         initials: 'DC',
    //         color: '#4fc3f7',
    //         name: 'Diana Cruz',
    //         specialty: 'Yoga & Wellness',
    //         classes: 2,
    //         rating: 4.8,
    //         members: 62
    //     },
    //     {
    //         initials: 'ML',
    //         color: '#a78bfa',
    //         name: 'Marcus Lee',
    //         specialty: 'Strength Training',
    //         classes: 4,
    //         rating: 4.7,
    //         members: 95
    //     },
    //     {
    //         initials: 'AT',
    //         color: '#fb923c',
    //         name: 'Amy Torres',
    //         specialty: 'Cycling & Cardio',
    //         classes: 3,
    //         rating: 4.9,
    //         members: 74
    //     },
    //     {
    //         initials: 'JR',
    //         color: '#f472b6',
    //         name: 'Jake Russo',
    //         specialty: 'Boxing & Combat',
    //         classes: 2,
    //         rating: 4.6,
    //         members: 51
    //     },
    //     {
    //         initials: 'LR',
    //         color: '#4ade80',
    //         name: 'Luna Reyes',
    //         specialty: 'Pilates & Flexibility',
    //         classes: 2,
    //         rating: 4.8,
    //         members: 43
    //     },
    // ];

    // ── Page Navigation ───────────────────────────────────────────────────────────
    const pages = [
        "dashboard",
        "members",
        "payments",
        "classes", ,
        "memberships",
        "reports",
        "settings",
    ];

    function showPage(name) {
        pages.forEach((p) => {
            const el = document.getElementById("page-" + p);
            if (el) el.style.display = "none";
        });
        document.getElementById("page-" + name).style.display = "";
        document.getElementById("page-title").textContent =
            name.charAt(0).toUpperCase() + name.slice(1);
        document
            .querySelectorAll(".nav-item")
            .forEach((el) => el.classList.remove("active"));
        document.querySelectorAll(".nav-item").forEach((el) => {
            if (
                el.textContent
                .trim()
                .toLowerCase()
                .includes(name.toLowerCase().slice(0, 4))
            )
                el.classList.add("active");
        });
        if (name === "members") renderMembersTable();
        if (name === "classes") renderClasses();
        // if(name==='trainers') renderTrainers();
        if (name === "reports")
            setTimeout(
                () =>
                renderChart(
                    "signup-chart",
                    [42, 58, 67, 71, 88, 95, 102, 89, 76, 112, 138, 142],
                    [
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                        "Jan",
                        "Feb",
                    ],
                    "#a78bfa",
                ),
                100,
            );
    }

    // ── Fee Due — Inline Panel (Members page only) ────────────────────────────────
    function renderFeeAlert() {
        const due = members.filter((m) => m.feeDay === todayDay);
        const container = document.getElementById("fee-inline-alert");
        if (!container) return;
        if (!due.length) {
            container.innerHTML = "";
            return;
        }

        const dateStr = today.toLocaleDateString("en-US", {
            weekday: "long",
            month: "long",
            day: "numeric",
        });
        container.innerHTML = `
    <div class="fee-inline-panel">
      <div class="fee-inline-header">
        <div class="fee-inline-dot"></div>
        <i class="fa fa-triangle-exclamation" style="color:#ff6b6b;font-size:1rem;"></i>
        <div class="fee-inline-title">
          Fee Collection Day — <span>${due.length} member${due.length > 1 ? "s" : ""} due today</span>
          <div style="font-size:.73rem;font-weight:400;color:#fca5a5;margin-top:2px;">${dateStr} · Collect payments below</div>
        </div>
        <div class="fee-inline-badge">${due.length} Pending</div>
      </div>
      <div class="fee-inline-chips">
        ${due
          .map(
            (m) => `<div class="fee-inline-chip">
          <div class="fee-inline-chip-av" style="background:${m.color};">${m.initials}</div>
          ${m.name} <span style="opacity:.65;margin-left:2px;">· ${m.feePlan}</span>
        </div>`,
          )
          .join("")}
      </div>
    </div>`;
    }

    // ── Members Table ─────────────────────────────────────────────────────────────
    function renderMembersTable() {
        renderFeeAlert();
        document.getElementById("members-table-body").innerHTML = members
            .map((m) => {
                const isDue = m.feeDay === todayDay;
                return `<tr class="${isDue ? "fee-due-row" : ""}">
      <td><div style="display:flex;align-items:center;">
        <div class="mem-avatar" style="background:${m.color};">${m.initials}</div>${m.name}
        ${isDue ? '<span class="fee-due-tag"><i class="fa fa-circle-exclamation"></i> FEE DUE</span>' : ""}
      </div></td>
      <td style="color:var(--muted);font-size:.82rem;">${m.email}</td>
      <td>${m.plan}</td>
      <td style="${isDue ? "color:#ff6b6b;font-weight:700;animation:feePulseText 1.2s ease-in-out infinite;" : "color:var(--muted);"}">
        Day ${m.feeDay}${isDue ? " ← TODAY" : ""}
      </td>
      <td style="font-size:.82rem;">${m.expiry}</td>
      <td><span style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;">${m.checkins}</span></td>
      <td><span class="badge-status badge-${m.status}">${m.status.charAt(0).toUpperCase() + m.status.slice(1)}</span></td>
      <td>
        <button class="btn-outline-accent" style="padding:4px 10px;font-size:.72rem;margin-right:4px;">Edit</button>
        ${
          isDue
            ? '<button class="btn-accent" style="padding:4px 10px;font-size:.72rem;background:#ff2d44;">Collect</button>'
            : '<button class="btn-outline-accent" style="padding:4px 10px;font-size:.72rem;color:var(--accent2);border-color:rgba(255,71,87,.3);">Delete</button>'
        }
      </td>
    </tr>`;
            })
            .join("");
    }

    // ── Classes ───────────────────────────────────────────────────────────────────
    function renderClasses() {
        document.getElementById("classes-container").innerHTML = classesData
            .map(
                (c) => `
    <div class="col-md-6 col-xl-4">
      <div class="chart-card" style="border-top:3px solid ${c.color};">
        <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:12px;">
          <div><div style="font-weight:700;font-size:.95rem;">${c.name}</div><div style="font-size:.75rem;color:var(--muted);">${c.trainer}</div></div>
          <span style="font-family:'Bebas Neue',sans-serif;font-size:1rem;color:${c.color};">${c.time}</span>
        </div>
        <div style="margin-bottom:10px;">
          <div style="display:flex;justify-content:space-between;font-size:.75rem;margin-bottom:5px;"><span style="color:var(--muted);">Enrolled</span><span>${c.enrolled}/${c.capacity}</span></div>
          <div class="prog-bar-bg"><div class="prog-bar-fill" style="width:${Math.round((c.enrolled / c.capacity) * 100)}%;background:${c.color};"></div></div>
        </div>
        <div style="font-size:.73rem;color:var(--muted);">${c.days}</div>
      </div>
    </div>`,
            )
            .join("");
    }

    // ── Trainers ──────────────────────────────────────────────────────────────────
    // function renderTrainers() {
    //   document.getElementById('trainers-container').innerHTML = trainersData.map(t => `
    //     <div class="col-md-6 col-xl-4">
    //       <div class="chart-card" style="display:flex;flex-direction:column;gap:12px;">
    //         <div style="display:flex;align-items:center;gap:14px;">
    //           <div class="admin-avatar" style="width:48px;height:48px;font-size:1rem;background:${t.color};">${t.initials}</div>
    //           <div><div style="font-weight:700;">${t.name}</div><div style="font-size:.75rem;color:var(--muted);">${t.specialty}</div></div>
    //           <div style="margin-left:auto;font-family:'Bebas Neue',sans-serif;color:var(--accent);">★ ${t.rating}</div>
    //         </div>
    //         <div style="display:flex;gap:16px;">
    //           <div class="mini-metric"><div class="val" style="font-size:1.4rem;">${t.classes}</div><div class="lbl">Classes</div></div>
    //           <div class="mini-metric"><div class="val" style="font-size:1.4rem;">${t.members}</div><div class="lbl">Members</div></div>
    //         </div>
    //         <button class="btn-outline-accent" style="width:100%;text-align:center;">View Profile</button>
    //       </div>
    //     </div>`).join('');
    // }

    // ── Charts ────────────────────────────────────────────────────────────────────
    const months = [
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
        "Jan",
        "Feb",
    ];
    const revenueData = [
        32000, 34500, 29800, 38000, 41200, 39600, 43100, 45800, 42000, 44611, 46200,
        48290,
    ];
    const attendData = [120, 145, 160, 132, 178, 201, 188];
    const weekDays = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

    function renderChart(id, data, labels, color) {
        const el = document.getElementById(id);
        if (!el) return;
        const max = Math.max(...data);
        el.innerHTML = data
            .map((v, i) => {
                const h = Math.max(8, Math.round((v / max) * 100));
                const isCurrent = i === data.length - 1;
                return `<div class="bar-wrap"><div class="bar" style="height:${h}px;background:${isCurrent ? color : "var(--surface2)"};"></div><div class="bar-label">${labels[i]}</div></div>`;
            })
            .join("");
    }
    const themeToggle = document.getElementById("themeToggle");
    const themeIcon = themeToggle.querySelector("i");

    // Load saved theme
    if (localStorage.getItem("theme") === "light") {
        document.body.classList.add("light-mode");
        themeIcon.classList.remove("fa-moon");
        themeIcon.classList.add("fa-sun");
    }

    themeToggle.addEventListener("click", () => {
        document.body.classList.toggle("light-mode");

        if (document.body.classList.contains("light-mode")) {
            localStorage.setItem("theme", "light");
            themeIcon.classList.remove("fa-moon");
            themeIcon.classList.add("fa-sun");
        } else {
            localStorage.setItem("theme", "dark");
            themeIcon.classList.remove("fa-sun");
            themeIcon.classList.add("fa-moon");
        }
    });

    // ── Init ──────────────────────────────────────────────────────────────────────
    renderChart("revenue-chart", revenueData, months, "var(--accent)");
    renderChart("attend-chart", attendData, weekDays, "#4fc3f7");




    function showPage(page) {
        document.querySelectorAll('.content').forEach(c => c.style.display = 'none');
        document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));

        const el = document.getElementById('page-' + page);
        if (el) {
            el.style.display = 'block';
            el.style.animation = 'none';
            void el.offsetWidth;
            el.style.animation = '';
        }

        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(n => {
            if (n.getAttribute('onclick') && n.getAttribute('onclick').includes("'" + page + "'")) n.classList
                .add('active');
        });

        const titles = {
            dashboard: 'Dashboard',
            members: 'Members',
            attendance: 'Attendance',
            payments: 'Payments',
            memberships: 'Memberships',
            reports: 'Reports',
            settings: 'Settings'
        };
        document.getElementById('page-title').textContent = titles[page] || page;

        if (page === 'attendance') initAttendance();
        if (page === 'dashboard') buildCharts();

        // close mobile sidebar
        document.getElementById('sidebar').classList.remove('open');
    }

    /* ══════════════════════════════════════════════════════════════
       THEME TOGGLE
    ══════════════════════════════════════════════════════════════ */
    function toggleTheme() {
        document.body.classList.toggle('light');
        const icon = document.getElementById('themeIcon');
        icon.className = document.body.classList.contains('light') ? 'fa fa-sun' : 'fa fa-moon';
    }

    /* ══════════════════════════════════════════════════════════════
       CHARTS (simple bar charts)
    ══════════════════════════════════════════════════════════════ */
    function buildBar(containerId, data, color) {
        const el = document.getElementById(containerId);
        if (!el) return;
        const max = Math.max(...data.map(d => d.v));
        el.innerHTML = data.map(d => `
    <div class="bar-wrap">
      <div class="bar" style="height:${Math.round((d.v/max)*100)}%;background:${color||'var(--accent)'};"></div>
      <div class="bar-label">${d.l}</div>
    </div>`).join('');
    }

    function buildCharts() {
        buildBar('revenue-chart', [{
                l: 'Sep',
                v: 38000
            }, {
                l: 'Oct',
                v: 42000
            }, {
                l: 'Nov',
                v: 39000
            }, {
                l: 'Dec',
                v: 44000
            },
            {
                l: 'Jan',
                v: 46000
            }, {
                l: 'Feb',
                v: 48290
            }
        ]);
        buildBar('attend-chart', [{
            l: 'Mon',
            v: 210
        }, {
            l: 'Tue',
            v: 185
        }, {
            l: 'Wed',
            v: 230
        }, {
            l: 'Thu',
            v: 195
        }, {
            l: 'Fri',
            v: 260
        }, {
            l: 'Sat',
            v: 140
        }, {
            l: 'Sun',
            v: 90
        }], '#4fc3f7');
        buildBar('signup-chart', [{
            l: 'Sep',
            v: 98
        }, {
            l: 'Oct',
            v: 112
        }, {
            l: 'Nov',
            v: 89
        }, {
            l: 'Dec',
            v: 120
        }, {
            l: 'Jan',
            v: 135
        }, {
            l: 'Feb',
            v: 142
        }]);
    }

    /* ══════════════════════════════════════════════════════════════
       ATTENDANCE
    ══════════════════════════════════════════════════════════════ */
    const attendanceMembers = [{
            id: 1,
            name: 'Alex Kim',
            initials: 'AK',
            color: '#e8ff47',
            plan: 'Annual'
        },
        {
            id: 2,
            name: 'Sara Reed',
            initials: 'SR',
            color: '#4fc3f7',
            plan: 'Monthly'
        },
        {
            id: 3,
            name: 'Mike Osei',
            initials: 'MO',
            color: '#a78bfa',
            plan: 'Trial'
        },
        {
            id: 4,
            name: 'Jane Park',
            initials: 'JP',
            color: '#fb923c',
            plan: 'Quarterly'
        },
        {
            id: 5,
            name: 'Leo Chen',
            initials: 'LC',
            color: '#4ade80',
            plan: 'Annual'
        },
        {
            id: 6,
            name: 'Raza Ali',
            initials: 'RA',
            color: '#f472b6',
            plan: 'Monthly'
        },
        {
            id: 7,
            name: 'Nina Shah',
            initials: 'NS',
            color: '#facc15',
            plan: 'Annual'
        },
        {
            id: 8,
            name: 'Omar Farooq',
            initials: 'OF',
            color: '#38bdf8',
            plan: 'Quarterly'
        },
    ];

    // attStatus[id] = null | 'present' | 'absent'
    let attStatus = {};
    // timein[id] = string time when marked present
    let attTimeIn = {};
    let attHistory = [];

    try {
        attHistory = JSON.parse(localStorage.getItem('ph_attHistory') || '[]');
    } catch (e) {}

    function initAttendance() {
        const today = new Date();
        const dateStr = today.toISOString().split('T')[0];
        const picker = document.getElementById('att-date-picker');
        if (!picker.value) picker.value = dateStr;
        updateDateLabel(picker.value);

        // Load saved status for this date if exists
        const saved = attHistory.find(r => r.date === picker.value);
        attStatus = {};
        attTimeIn = {};
        if (saved) {
            saved.records.forEach(r => {
                attStatus[r.id] = r.status;
                attTimeIn[r.id] = r.timeIn || '—';
            });
        } else {
            attendanceMembers.forEach(m => {
                attStatus[m.id] = null;
                attTimeIn[m.id] = '—';
            });
        }

        renderAttTable();
        renderAttHistory();
    }

    function updateDateLabel(dateStr) {
        const d = new Date(dateStr + 'T00:00:00');
        const label = d.toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('att-date-label').textContent =
            (dateStr === today ? 'Today · ' : 'Viewing · ') + label;
    }

    function onDateChange() {
        const date = document.getElementById('att-date-picker').value;
        updateDateLabel(date);

        const saved = attHistory.find(r => r.date === date);
        attStatus = {};
        attTimeIn = {};
        if (saved) {
            saved.records.forEach(r => {
                attStatus[r.id] = r.status;
                attTimeIn[r.id] = r.timeIn || '—';
            });
        } else {
            attendanceMembers.forEach(m => {
                attStatus[m.id] = null;
                attTimeIn[m.id] = '—';
            });
        }
        renderAttTable();
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
      <td style="color:var(--muted);font-size:.85rem;">${i+1}</td>
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
          <button
            class="att-mark-btn present ${s==='present'?'active':''}"
            onclick="markMember(${m.id},'present')"
            title="Mark Present">
            <i class="fa fa-check"></i> Present
          </button>
          <button
            class="att-mark-btn absent ${s==='absent'?'active':''}"
            onclick="markMember(${m.id},'absent')"
            title="Mark Absent">
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
        if (attStatus[id] === status) {
            // toggle off
            attStatus[id] = null;
            attTimeIn[id] = '—';
        } else {
            attStatus[id] = status;
            attTimeIn[id] = status === 'present' ? now() : '—';
        }
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

    function saveAttendance() {
        const date = document.getElementById('att-date-picker').value;
        if (!date) {
            showToast('Please select a date first!', true);
            return;
        }

        const records = attendanceMembers.map(m => ({
            id: m.id,
            name: m.name,
            plan: m.plan,
            status: attStatus[m.id] || 'unmarked',
            timeIn: attTimeIn[m.id] || '—'
        }));
        const present = records.filter(r => r.status === 'present').length;
        const rate = Math.round((present / records.length) * 100) + '%';

        // upsert by date
        attHistory = attHistory.filter(r => r.date !== date);
        attHistory.unshift({
            date,
            savedAt: now(),
            records,
            rate
        });
        if (attHistory.length > 15) attHistory.pop();

        try {
            localStorage.setItem('ph_attHistory', JSON.stringify(attHistory));
        } catch (e) {}
        renderAttHistory();
        showToast('✅ Attendance saved for ' + date);
    }

    function renderAttHistory() {
        const el = document.getElementById('att-history');
        if (!attHistory.length) {
            el.innerHTML =
                `<div style="color:var(--muted);font-size:.85rem;text-align:center;padding:24px;">No saved records yet. Mark attendance and click Save.</div>`;
            return;
        }

        el.innerHTML = attHistory.map(r => {
            const present = r.records.filter(x => x.status === 'present');
            const absent = r.records.filter(x => x.status === 'absent');
            return `
    <div class="history-entry">
      <div class="history-date">
        <div class="hd">${formatDate(r.date)}</div>
        <div class="ht">${r.savedAt}</div>
      </div>
      <div style="flex:1;display:flex;flex-wrap:wrap;align-items:center;">
        ${present.map(p => `<span class="name-pill p"><i class="fa fa-check" style="font-size:9px;"></i> ${p.name}</span>`).join('')}
        ${absent.map(a  => `<span class="name-pill a"><i class="fa fa-xmark" style="font-size:9px;"></i> ${a.name}</span>`).join('')}
        ${!present.length && !absent.length ? `<span style="color:var(--muted);font-size:.8rem;">No records marked</span>` : ''}
      </div>
      <div class="history-rate">${r.rate}</div>
    </div>`;
        }).join('');
    }

    function clearHistory() {
        if (!confirm('Clear all attendance history?')) return;
        attHistory = [];
        try {
            localStorage.removeItem('ph_attHistory');
        } catch (e) {}
        renderAttHistory();
        showToast('History cleared');
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

    /* ── Helpers ── */
    function now() {
        return new Date().toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    function formatDate(ds) {
        const d = new Date(ds + 'T00:00:00');
        return d.toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
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

    /* ── Init ── */
    buildCharts();
    DATA══════════════════════════════════════════ * /
    const scheduleData = [{
            day: 'Mon',
            date: 17,
            type: 'Strength',
            time: '6:00 AM',
            tag: 'done',
            tagLabel: 'Done'
        },
        {
            day: 'Tue',
            date: 18,
            type: 'Cardio',
            time: '7:00 AM',
            tag: 'done',
            tagLabel: 'Done'
        },
        {
            day: 'Wed',
            date: 19,
            type: 'Rest Day',
            time: '—',
            tag: 'rest',
            tagLabel: 'Rest'
        },
        {
            day: 'Thu',
            date: 20,
            type: 'Strength',
            time: '6:00 AM',
            tag: 'done',
            tagLabel: 'Done'
        },
        {
            day: 'Fri',
            date: 21,
            type: 'HIIT',
            time: '6:30 AM',
            tag: 'today',
            tagLabel: 'Today'
        },
        {
            day: 'Sat',
            date: 22,
            type: 'Strength',
            time: '8:00 AM',
            tag: '',
            tagLabel: 'Upcoming'
        },
        {
            day: 'Sun',
            date: 23,
            type: 'Rest Day',
            time: '—',
            tag: 'rest',
            tagLabel: 'Rest'
        },
    ];

    const attLog = [{
            date: 'Feb 21',
            day: 'Friday',
            cin: '6:34 AM',
            cout: '8:10 AM',
            dur: '1h 36m',
            status: 'present'
        },
        {
            date: 'Feb 20',
            day: 'Thursday',
            cin: '6:28 AM',
            cout: '8:05 AM',
            dur: '1h 37m',
            status: 'present'
        },
        {
            date: 'Feb 19',
            day: 'Wednesday',
            cin: '—',
            cout: '—',
            dur: '—',
            status: 'absent'
        },
        {
            date: 'Feb 18',
            day: 'Tuesday',
            cin: '7:02 AM',
            cout: '8:30 AM',
            dur: '1h 28m',
            status: 'present'
        },
        {
            date: 'Feb 17',
            day: 'Monday',
            cin: '6:15 AM',
            cout: '7:58 AM',
            dur: '1h 43m',
            status: 'present'
        },
        {
            date: 'Feb 15',
            day: 'Saturday',
            cin: '8:10 AM',
            cout: '9:45 AM',
            dur: '1h 35m',
            status: 'present'
        },
        {
            date: 'Feb 13',
            day: 'Thursday',
            cin: '6:40 AM',
            cout: '8:00 AM',
            dur: '1h 20m',
            status: 'present'
        },
        {
            date: 'Feb 12',
            day: 'Wednesday',
            cin: '—',
            cout: '—',
            dur: '—',
            status: 'absent'
        },
        {
            date: 'Feb 10',
            day: 'Monday',
            cin: '6:20 AM',
            cout: '7:55 AM',
            dur: '1h 35m',
            status: 'present'
        },
    ];

    /* ══════════════════════════════════════════
       PAGE NAVIGATION
    ══════════════════════════════════════════ */
    function showPage(page) {
        document.querySelectorAll('.content').forEach(c => c.style.display = 'none');
        document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));

        const el = document.getElementById('page-' + page);
        if (el) {
            el.style.display = 'block';
            el.style.animation = 'none';
            void el.offsetWidth;
            el.style.animation = '';
        }

        document.querySelectorAll('.nav-item').forEach(n => {
            if (n.getAttribute('onclick') && n.getAttribute('onclick').includes("'" + page + "'")) n.classList
                .add('active');
        });

        const titles = {
            dashboard: 'Dashboard',
            attendance: 'My Attendance',
            schedule: 'Schedule',
            payments: 'My Payments',
            membership: 'My Membership',
            announcements: 'Announcements',
            profile: 'My Profile'
        };
        document.getElementById('page-title').textContent = titles[page] || page;

        if (page === 'dashboard') {
            buildDashCharts();
            buildDashSchedule();
        }
        if (page === 'attendance') {
            buildAttCalendar();
            buildAttLog();
        }
        if (page === 'schedule') {
            buildFullSchedule();
        }

        document.getElementById('sidebar').classList.remove('open');
    }

    /* ══════════════════════════════════════════
       THEME
    ══════════════════════════════════════════ */
    function toggleTheme() {
        document.body.classList.toggle('light');
        document.getElementById('themeIcon').className =
            document.body.classList.contains('light') ? 'fa fa-sun' : 'fa fa-moon';
    }

    /* ══════════════════════════════════════════
       BAR CHART
    ══════════════════════════════════════════ */
    function buildBar(id, data, color) {
        const el = document.getElementById(id);
        if (!el) return;
        const max = Math.max(...data.map(d => d.v));
        el.innerHTML = data.map(d => `
    <div class="bar-wrap">
      <div class="bar" style="height:${Math.round((d.v/max)*100)}%;background:${color||'var(--accent)'};"></div>
      <div class="bar-label">${d.l}</div>
    </div>`).join('');
    }

    let attTabMode = 'monthly';

    function buildDashCharts() {
        const monthly = [{
            l: 'Sep',
            v: 16
        }, {
            l: 'Oct',
            v: 18
        }, {
            l: 'Nov',
            v: 14
        }, {
            l: 'Dec',
            v: 20
        }, {
            l: 'Jan',
            v: 19
        }, {
            l: 'Feb',
            v: 22
        }];
        const weekly = [{
            l: 'Mon',
            v: 1
        }, {
            l: 'Tue',
            v: 1
        }, {
            l: 'Wed',
            v: 0
        }, {
            l: 'Thu',
            v: 1
        }, {
            l: 'Fri',
            v: 1
        }, {
            l: 'Sat',
            v: 1
        }, {
            l: 'Sun',
            v: 0
        }];
        buildBar('member-att-chart', attTabMode === 'monthly' ? monthly : weekly);
    }

    function switchAttTab(btn, mode) {
        document.querySelectorAll('.tab-nav .tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        attTabMode = mode;
        buildDashCharts();
    }

    /* ══════════════════════════════════════════
       DASHBOARD SCHEDULE (mini)
    ══════════════════════════════════════════ */
    function buildDashSchedule() {
        const el = document.getElementById('dash-schedule');
        if (!el) return;
        el.innerHTML = scheduleData.map(s => `
    <div class="schedule-row">
      <div class="sched-day ${s.tag==='today'?'today':''}">
        <div>${s.day}</div>
        <div class="dd">${s.date}</div>
      </div>
      <div class="sched-info">
        <div class="sn">${s.type}</div>
        <div class="st">${s.time}</div>
      </div>
      <span class="sched-tag ${s.tag}">${s.tagLabel}</span>
    </div>`).join('');
    }

    /* ══════════════════════════════════════════
       FULL SCHEDULE PAGE
    ══════════════════════════════════════════ */
    function buildFullSchedule() {
        const el = document.getElementById('full-schedule');
        if (!el) return;
        el.innerHTML = scheduleData.map(s => `
    <div class="schedule-row">
      <div class="sched-day ${s.tag==='today'?'today':''}">
        <div>${s.day}</div>
        <div class="dd">${s.date}</div>
      </div>
      <div class="sched-info" style="flex:1;">
        <div class="sn">${s.type}</div>
        <div class="st">${s.time !== '—' ? '<i class="fa fa-clock" style="font-size:10px;"></i> ' + s.time : 'Rest Day'}</div>
      </div>
      <span class="sched-tag ${s.tag}">${s.tagLabel}</span>
    </div>`).join('');
    }

    /* ══════════════════════════════════════════
       ATTENDANCE CALENDAR
    ══════════════════════════════════════════ */
    function buildAttCalendar() {
        const el = document.getElementById('att-calendar');
        if (!el) return;

        // Feb 2026 starts on Sunday
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        // Day headers
        let html = days.map(d =>
            `<div style="text-align:center;font-size:10px;letter-spacing:1px;color:var(--muted);padding:4px 0;">${d}</div>`
        ).join('');

        // Feb 1 2026 = Sunday (0)
        const present = [2, 3, 4, 6, 9, 10, 11, 13, 16, 17, 18, 20, 23, 24, 25, 27];
        const absent = [5, 12, 19, 26];

        for (let d = 1; d <= 28; d++) {
            const isPresent = present.includes(d);
            const isAbsent = absent.includes(d);
            const isToday = d === 22;
            let bg = 'var(--surface2)';
            let color = 'var(--muted)';
            let border = 'var(--border)';
            if (isPresent) {
                bg = 'rgba(74,222,128,.18)';
                color = '#4ade80';
                border = 'rgba(74,222,128,.3)';
            }
            if (isAbsent) {
                bg = 'rgba(255,71,87,.15)';
                color = '#ff4757';
                border = 'rgba(255,71,87,.25)';
            }
            if (isToday) {
                border = 'var(--accent)';
            }
            html += `<div style="
      aspect-ratio:1;display:flex;flex-direction:column;align-items:center;justify-content:center;
      border-radius:8px;background:${bg};border:1px solid ${border};color:${color};
      font-size:13px;font-weight:600;position:relative;cursor:default;
    ">
      ${d}
      ${isPresent ? '<i class="fa fa-check" style="font-size:8px;position:absolute;bottom:4px;"></i>' : ''}
      ${isAbsent  ? '<i class="fa fa-xmark" style="font-size:8px;position:absolute;bottom:4px;"></i>' : ''}
      ${isToday   ? '<div style="position:absolute;top:3px;right:4px;width:5px;height:5px;border-radius:50%;background:var(--accent);"></div>' : ''}
    </div>`;
        }
        el.innerHTML = html;
    }

    /* ══════════════════════════════════════════
       ATTENDANCE LOG TABLE
    ══════════════════════════════════════════ */
    function buildAttLog() {
        const tbody = document.getElementById('att-log-body');
        if (!tbody) return;
        tbody.innerHTML = attLog.map(r => `
    <tr>
      <td style="font-weight:600;">${r.date}</td>
      <td style="color:var(--muted);">${r.day}</td>
      <td>${r.cin}</td>
      <td>${r.cout}</td>
      <td style="font-weight:600;color:var(--accent);">${r.dur}</td>
      <td><span class="badge-status ${r.status==='present'?'badge-active':'badge-expired'}">${r.status==='present'?'Present':'Absent'}</span></td>
    </tr>`).join('');
    }

    /* ══════════════════════════════════════════
       INIT
    ══════════════════════════════════════════ */
    document.addEventListener('DOMContentLoaded', () => {
        buildDashCharts();
        buildDashSchedule();
    });
    document.addEventListener("DOMContentLoaded", function() {
        // Get current page URL path
        const currentPath = window.location.pathname;

        // Select all nav-items
        const navItems = document.querySelectorAll('.nav-item');

        navItems.forEach(item => {
            // Remove active class from everyone first
            item.classList.remove('active');

            // If the link's href matches the current path, add 'active'
            if (item.getAttribute('href') === currentPath) {
                item.classList.add('active');
            }
        });
    });
</script>

</html>
