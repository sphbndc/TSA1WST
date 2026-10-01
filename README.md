# Tasks for Today Management System

An IT0049 task manager built with CodeIgniter 4, PHP, and MySQL. Public pages show tasks and profile information. Logged-in users can create, edit, and archive tasks.

## Requirements

- PHP 8.2 or newer
- Composer 2.0.14 or newer
- PHP extensions required by CodeIgniter 4

## Run locally

Install the dependencies from the project folder:

```sh
composer install
cp env .env
```

This project defaults to SQLite for local development. If your PHP installation does not load SQLite3 by default, enable it with `-d extension=sqlite3` for each command:

```sh
php -d extension=sqlite3 spark migrate
php -d extension=sqlite3 spark db:seed TaskSeeder
php -d extension=sqlite3 -S localhost:8080 -t public
```

Open <http://localhost:8080>. The database is stored at `writable/tasks.sqlite`.

## Database structure

- `app/Database/Migrations/2026-09-29-000001_CreateTasksAndUsers.php` creates the `tasks` and `users` tables.
- `app/Database/Migrations/2026-10-01-000002_AddAuthenticationAndSoftDeleteFields.php` adds password and archive fields.
- `app/Database/Seeds/TaskSeeder.php` inserts the ten task records and one demo user with a hashed password.
- `app/Models/TaskModel.php` filters tasks by date and returns the full date-ordered list.
- `app/Models/UserModel.php` retrieves the demo profile.
- `database/import.sql` creates and fills a fresh MySQL database.
- `database/upgrade_tsa2.sql` updates the TSA1 MySQL tables without replacing their task data.

Run a migration with `php spark migrate` and seed the sample records with `php spark db:seed TaskSeeder`.

## Pages

- `/` - tasks whose date matches the current date in the Asia/Manila timezone
- `/tasks` - all tasks ordered by date
- `/profile` - the demo user
- `/about` - project and developer information
- `/login` - sign in to manage tasks
- `/tasks/new` - create a task after signing in
- `/tasks/{id}/edit` - edit a task after signing in

The demo login is `joseph` with password `Today2026!`.

## Deploy to InfinityFree

1. Create a MySQL database in the InfinityFree control panel.
2. For a new database, import `database/import.sql` in phpMyAdmin. For the existing TSA1 database, import `database/upgrade_tsa2.sql` once; it adds the new columns and keeps the existing tasks.
3. Edit `.env` in the site's `htdocs` folder and set the database values shown in your hosting control panel:

   ```ini
   CI_ENVIRONMENT = production
   app.baseURL = 'http://daybooktsa1.infinityfreeapp.com/'
   database.default.hostname = sqlXXX.infinityfree.com
   database.default.database = if0_XXXXXXXX_tasks
   database.default.username = if0_XXXXXXXX
   database.default.password = your-database-password
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

4. Extract the deployment ZIP inside the subdomain's `htdocs` folder. It contains the CodeIgniter app, dependencies, writable files, and front controller in that folder to fit InfinityFree's file restrictions. The ZIP does not contain `.env`, so the existing hosting database settings stay in place.
5. Confirm `index.php`, `app/`, `vendor/`, `writable/`, `.env`, and `assets/` are directly inside `htdocs`.

Use the database hostname listed for your database in the InfinityFree control panel. It differs from the phpMyAdmin server address.

The profile uses a demo email address (`joseph@example.com`). Change the demo password after deployment if you keep the login enabled.
