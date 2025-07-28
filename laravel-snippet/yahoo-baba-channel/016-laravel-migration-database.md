# Laravel Migration Database
## syntax (migration cmd)
create `students` table migration file.
```
php artisan make:migration create_students_table
```
run all migration files and create table
```
php artisan migrate
```
check the status of migrated files.
```
php artisan migrate:status
```

## step-1: create a database in phpmysql or php code
```
CREATE DATABASE `test-db-laravel`;
```

## step-2: config .env file
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=test-db-laravel
DB_USERNAME=root
DB_PASSWORD=
```

## step-3: create migration file
```
php artisan make:migration create_students_table
```
note: in database, name of the table will be `students`, here `create_` & `_table` are laravel define code.

migration will create code below:
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
```

## step-4: Modify as needed.
```
$table->string('name');
$table->string('email');
$table->text('description');
```

## step-5: run migrate to create table in database.
```
php artisan migrate
```
