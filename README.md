# CSM Task Manager

🌐 **Live Demo:** [https://soumik31.github.io/csmtaskmanager.github.io/](https://soumik31.github.io/csmtaskmanager.github.io/)

A task management web application used by the CSM (Customer Service Management) SOC team to track, escalate, and resolve network incidents in real-time. Features live pending-time calculations, task history logging, search by date/name, and CSV export.

---

## Tech Stack

- HTML5 / CSS3 / JavaScript (ES6+)
- Supabase (PostgreSQL backend + REST API)
- Bootstrap 4.3
- jQuery 3.x
- Moment.js + Bootstrap Datetimepicker

Hosted on **GitHub Pages** with **Supabase** as the backend database.

---

## Live Demo

Visit the live site: **[https://soumik31.github.io/csmtaskmanager.github.io/](https://soumik31.github.io/csmtaskmanager.github.io/)**

### Login Credentials

| Username | Password  |
|----------|-----------|
| admin    | admin123  |
| john.doe | pass1234  |
| jane.smith | pass5678 |

---

## Features

- **User Authentication** — Login/logout with session management
- **Dashboard** — View all pending tasks with live pending-time calculation (auto-refreshes every 60s)
- **Create Task** — 80+ predefined task names, 50+ escalation groups, severity levels, datetime pickers
- **Edit Task** — Update status, escalation group, severity, add history notes
- **Search by Date** — Filter tasks by date range
- **Search by Name** — Filter tasks by keyword
- **History Tracking** — Expandable history log for each task showing all updates
- **CSV Export** — Export search results to CSV file

---

## Project Structure

```
/
├── index.html              # Login page
├── home.html               # Dashboard (pending tasks)
├── form.html               # Create new task
├── action.html             # Edit existing task
├── searchdate.html         # Search by date range
├── searchname.html         # Search by name keyword
├── export.js               # CSV export module
├── js/
│   ├── supabase-config.js  # Supabase client + auth utilities
│   └── app.js              # Shared utility functions
├── css/                    # Stylesheets
├── build/                  # Datetimepicker assets
├── images/                 # Logo and background
└── fonts/                  # Glyphicons
```

---

## Notes

- Passwords are stored in plaintext — this is a portfolio/demo project
- Backend powered by Supabase (PostgreSQL + REST API)
- No server-side code required — runs entirely as static files on GitHub Pages
- Originally built as a PHP/MySQL application for Grameenphone CSM SOC team, converted to static for GitHub Pages hosting
