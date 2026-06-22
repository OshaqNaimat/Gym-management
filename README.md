  # 🏋️ Pump House — Gym Management System

A full-stack gym management system built with **Laravel 12** and **vanilla JS**, featuring a dark-themed admin panel and a dedicated member portal.

---

## 📸 Screenshots

## 🔑 Admin Portal

**Dashboard**  
![Admin Dashboard](GMS/screenshot/admin-dashboard.png)

**Members**  
![Members](GMS/screenshot/admin-member-control.png)

**Attendance**  
![Attendance](GMS/screenshot/admin-attendence-control.png)

**Payments**  
![Payments](GMS/screenshot/admin-payment-control.png)

**Reports**  
![Reports](GMS/screenshot/admin-reports-control.png)

**Settings**  
![Settings](GMS/screenshot/admin-setting-control.png)

---

## 👤 Member Portal

**Dashboard**  
![Member Dashboard](GMS/screenshot/member-dashboard.png)

**Attendance**  
![Member Attendance](GMS/screenshot/member-attendence.png)

**Cardio Tracker**  
![Cardio](GMS/screenshot/member-cardio.png)

**Payments**  
![Member Payments](GMS/screenshot/member-payemts.png)

**Profile**  
![Profile](GMS/screenshot/member-profile.png)

---

## Demo Website

🌐 **Live Demo:** http://myfitgym.free.nf/

### Test Account

- **Email:** `TestU@gmail.com`
- **Password:** `123456789`

---

## ✨ Features

### 🔐 Authentication
- Separate login for **Admin** and **Members**
- Role-based access control
- Password change functionality

### 👑 Admin Panel
- **Dashboard** — Revenue overview, active members, expired plans, weekly attendance charts with hover tooltips
- **Members** — Add, edit, search, filter by plan, highlight from global search
- **Attendance** — Daily attendance marking (Present / Absent), export to CSV, date picker
- **Payments** — Add payments, track status (Paid / Pending), export to CSV
- **Reports** — Monthly sign-ups chart, revenue by plan breakdown
- **Settings** — Gym details, opening hours (Weekdays / Saturday / Sunday), password change
- **Global Search** — Live search across members and payments with dropdown results

### 👤 Member Portal
- **Dashboard** — Personal stats, attendance rate, days left on plan, today's calories burned
- **My Attendance** — Monthly calendar view, attendance rate, present/absent count
- **My Cardio** — Log cardio sessions, auto-calculated calories (MET formula), dual chart (calories + duration last 7 days), session history
- **Payments** — View personal payment history and invoices
- **My Profile** — View personal info, set body weight, change password

### 🎨 UI/UX
- Dark theme with yellow accent (`#e8ff47`)
- Light mode toggle
- Fully responsive — mobile sidebar with overlay
- Bar chart hover tooltips across all charts
- Search highlight blink animation (via `sessionStorage`)
- Open Now / Closed indicator based on gym hours

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 12 (PHP 8.2) |
| Frontend | Blade Templates, Vanilla JS, Bootstrap 5 |
| Database | MySQL |
| Charts | Chart.js (Cardio page), Custom JS bar charts |
| Styling | Custom CSS with CSS Variables |
| Icons | Font Awesome 6 |
| Fonts | Bebas Neue, DM Sans, Barlow |

---

## ⚙️ Installation

### Requirements
- PHP >= 8.2
- Composer
- MySQL
- Node.js (optional, for assets)

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/OshaqNaimat/Gym-management.git
cd Gym-management

# 2. Install dependencies
composer install

# 3. Copy environment file
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Configure your database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pumphouse_db
DB_USERNAME=root
DB_PASSWORD=

# 6. Run migrations
php artisan migrate

# 7. Seed the database (if seeder exists)
php artisan db:seed

# 8. Serve the application
php artisan serve
```


---

## 🗄️ Database Structure

| Table | Purpose |
|-------|---------|
| `users` | Members and admin accounts |
| `attendances` | Daily attendance records |
| `payments` | Payment transactions |
| `cardio_logs` | Member cardio sessions |
| `gym_settings` | Gym info and opening hours |
| `notifications` | Admin notifications |

---

## 📁 Project Structure

```
app/
├── Http/Controllers/
│   ├── AuthController.php
│   ├── MemberController.php
│   ├── MemberDashboardController.php
│   ├── MemberProfileController.php
│   ├── MemberPaymentController.php
│   ├── MemberattendanceController.php
│   ├── CardioController.php
│   ├── AttendanceController.php
│   ├── PaymentController.php
│   ├── ReportController.php
│   ├── SearchController.php
│   └── SettingController.php
├── Models/
│   ├── User.php
│   ├── Attendance.php
│   ├── Payment.php
│   ├── CardioLog.php
│   └── GymSetting.php
resources/
├── views/
│   ├── components/         # Layouts, sidebars, navbars
│   ├── member/             # Member portal pages
│   └── admin/              # Admin panel pages
```

---

## 🧮 Cardio Calorie Formula

Calories are calculated using the **MET (Metabolic Equivalent of Task)** formula:

```
Calories = MET × Weight (kg) × Duration (hours)
```

| Exercise | MET Value |
|----------|-----------|
| Skipping | 11.0 |
| Running | 9.8 |
| Treadmill | 8.0 |
| Cycling | 7.5 |
| Walking | 3.5 |

---

## 🚀 Upcoming Features

- [ ] WhatsApp / SMS alerts for expiring plans
- [ ] Equipment / inventory management
- [ ] Workout logging (sets, reps, weight)
- [ ] Admin cardio overview across all members
- [ ] PWA support for mobile

---

## 👨‍💻 Author

**OSHAQ NAIMAT**
Built solo as a full-stack Laravel project.

---

> Pump House Gym Management System — Built with ☕ and Laravel
