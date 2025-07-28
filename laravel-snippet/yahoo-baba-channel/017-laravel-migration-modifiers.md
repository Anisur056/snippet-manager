# Laravel Migration Modifiers
## syntax
```
php artisan make:migration update_students_table --table=students
```

### place the column `after` another column (MySQL).
```
$table->after('create_date');
```

### set INTEGER columns as auto-incrementign (primary key).
```
$table->autoIncrement();
```

### add a comment to a column.
```
$table->comment('my comment');
```

### place the column "first" in the table
```
$table->first();
```

### set the starting value of an auto-incrementing field.
```
$table->from($interger);
```

### Make the column `invisible` to `SELECT *` quries.
```
$table->invisible();
```

### set INTEGER columns as UNSIGNED. no (-) number allowed. only normal number accept
```
$table->unsigned();
```

### set TIMESTAMP columns to use CURRENT_TIMESTAMP as default value.
```
$table->useCurrent();
```

### set TIMESTAMP columns to use CURRENT_TIMESTAMP when a record is updated.
```
$table->useCurrentOnUpdate();
```

```
//works above maridaDB 10.5.2
// rename table column
$table->renameColumn('name','names');
```

```
// Delete table column
$table->dropColumn('percentage');
$table->dropColumn(['percentage','descriptiontion']);
```

```
// create city table 30 char limit, deafault value set `no city`, then apply changes with change().
$table->string('city',30)->default('no city')->change();
```

```
public function up(): void
{
    //Rename Table
    Schema::rename('students', 'student');

    //drop/delete table
    Schema::drop('students_log');

    //if exist then drop/delete table
    Schema::dropIfExists('students_log');
}
```

migration file will created in`database\migrations\` folder
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
        Schema::table('students', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
```

modify it as needed.
```
$table->time('admition-date');
```

run migrate command.
```
php artisan migrate
```
