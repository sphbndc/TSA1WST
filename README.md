# Tasks for Today Management System

An IT0049 task manager built with CodeIgniter 4, PHP, and MySQL. The project uses CodeIgniter MVC controllers and views, models for database queries, a migration for the schema, and a seeder for the sample records.

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
- `app/Database/Seeds/TaskSeeder.php` inserts the ten task records and exactly one demo user.
- `app/Models/TaskModel.php` filters tasks by date and returns the full date-ordered list.
- `app/Models/UserModel.php` retrieves the demo profile.
- `database/import.sql` is a MySQL schema and data import for phpMyAdmin.

Run a migration with `php spark migrate` and seed the sample records with `php spark db:seed TaskSeeder`.

## Pages

- `/` - tasks whose date matches the current date in the Asia/Manila timezone
- `/tasks` - all tasks ordered by date
- `/profile` - the demo user
- `/about` - project and developer information

## Deploy to InfinityFree

1. Create a MySQL database in the InfinityFree control panel.
2. In phpMyAdmin, select that database and import `database/import.sql`.
3. Copy `env` to `.env` and set the values shown in your hosting control panel:

   ```ini
   CI_ENVIRONMENT = production
   database.default.hostname = sqlXXX.infinityfree.com
   database.default.database = if0_XXXXXXXX_tasks
   database.default.username = if0_XXXXXXXX
   database.default.password = your-database-password
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

4. Run `composer install --no-dev` locally and upload the project files. Place the contents of `public/` in `htdocs/`; keep `app/`, `vendor/`, `writable/`, and `.env` outside `htdocs/` at the same directory level.
5. Confirm `htdocs/index.php` can find `../app/Config/Paths.php`, and open the hosted site.

Use the database hostname listed for your database in the InfinityFree control panel. It differs from the phpMyAdmin server address.

The profile uses a demo email address (`joseph@example.com`). Update the seeder and `database/import.sql` if you want different demo details before publishing.
