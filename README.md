# CSM Task Manager

A PHP/MySQL web app for managing and tracking operational tasks. Supports task creation, editing, status updates, search by name/date, and CSV export.

## Features

- Login with session-based auth
- Create, edit, and close tasks
- Search tasks by name or date range
- Export task table to CSV
- Pending task count badge on home screen
- Expandable task history per row

## Tech Stack

- PHP 7+
- MySQL / MariaDB
- Bootstrap 4
- jQuery

---

## Local Setup

### 1. Requirements

- PHP 7.3+
- MySQL or MariaDB
- A local server: [XAMPP](https://www.apachefriends.org/) / [WAMP](https://www.wampserver.com/) / [Laragon](https://laragon.org/)

### 2. Database

Import the provided SQL file into MySQL:

```bash
mysql -u root -p < database.sql
```

Or open `database.sql` in phpMyAdmin and run it.

### 3. Configuration

Edit `config.php` with your database credentials:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'csm_task_creater');
```

You can also set these as environment variables instead.

### 4. Run

Place the project folder inside your server's web root (e.g. `htdocs/` for XAMPP) and open:

```
http://localhost/csm-task-manager/
```

---

## Demo Login

| Username    | Password  |
|-------------|-----------|
| admin       | admin123  |
| john.doe    | pass1234  |
| jane.smith  | pass5678  |

---

## Project Structure

```
├── index.php          # Login page
├── process.php        # Login handler
├── home.php           # Dashboard - pending tasks
├── form.php           # Create task
├── action.php         # Edit task
├── searchname.php     # Search by task name
├── searchdate.php     # Search by date range
├── conn.php           # DB connection (uses config.php)
├── loginconn.php      # DB connection for login
├── config.php         # DB credentials (edit this)
├── mail.php           # Email report script (optional)
├── database.sql       # Full DB schema + demo data
├── export.js          # CSV export logic
├── css/               # Stylesheets
├── js/                # Scripts
├── images/            # Logo and background
└── build/             # Datetimepicker assets
```
