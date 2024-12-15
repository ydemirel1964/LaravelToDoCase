Laravel Task Planner


Overview

This project is a Laravel-based application designed to efficiently plan tasks for developers. It organizes tasks based on their difficulty, duration, and developer efficiency, ensuring that no developer works more than 45 hours per week. Tasks that exceed the weekly limit are automatically scheduled for subsequent weeks.


Features

Assign tasks to developers based on efficiency.
Prioritize tasks by difficulty and duration.
Limit developer workloads to 45 hours per week.
Generate weekly task plans for all developers.


Requirements

PHP >= 8.0
Laravel >= 9.x
Composer
MySQL (or any preferred database)


Installation

1. Clone the Repository
git clone <repository-url>
cd <project-directory>

2.Install Dependencies
composer install

3. Environment Setup
Copy the .env.example file to .env and update the following values:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

4. Generate Application Key
php artisan key:generate

5. Run Migrations
php artisan migrate

6. Seed the Database
You can seed the database with developers
php artisan db:seed

7. Start the Server
php artisan serve



Usage

1. Adding Tasks
Add tasks to the tasks table run command

php artisan tasks:fetch

