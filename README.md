# Morphdigi Assessment Project

Simple full-stack app using Vue.js (frontend), PHP (backend), and MySQL (database)

## Requirements Coverage

- Front-end (JavaScript, Vue.js):
  - Form submission for currency and transaction date
  - Data listing table showing currency and date
- Back-end (PHP):
  - Accepts submitted form data via `POST`
  - Saves data to MySQL
  - Queries data via `GET`
  - Returns JSON to frontend
- Database (MySQL):
  - `transactions` table with `currency_code` and `transaction_date`

## Project Files

- `index.html` - Vue.js UI (form + list)
- `api.php` - PHP API endpoint for `GET` and `POST`
- `database.sql` - SQL to create database/table

## Step-by-Step: Run Locally

1. Install and open XAMPP.
2. Start `Apache` and `MySQL` in XAMPP Control Panel.
3. Put this project in:
   - `C:\xampp\htdocs\morphdigi`
4. Create database/table:
   - Open `http://localhost/phpmyadmin`
   - Import `database.sql`
5. Open app:
   - `http://localhost/morphdigi/index.html`
6. Submit a transaction in the form.
7. Verify data appears in the table.

## API Quick Test

- Fetch all records:
  - Open `http://localhost/morphdigi/api.php`
- Add record (example with curl):
  - `curl -X POST http://localhost/morphdigi/api.php -H "Content-Type: application/json" -d "{\"currency\":\"USD\",\"date\":\"2026-03-21\"}"`

## Git Repository Requirement

This project is ready to be hosted in a Git repository. If not yet pushed, run:

1. `git init`
2. `git add .`
3. `git commit -m "Initial assessment project"`
4. Create remote repository (GitHub/GitLab/Bitbucket)
5. `git remote add origin <repo-url>`
6. `git push -u origin master`

