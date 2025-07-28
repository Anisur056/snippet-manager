# Laravel Migration Modifiers
## syntax
```
php artisan make:migration update_students_table --table=students
```

```
//works above maridaDB 10.5.2
$table->renameColumn('name','names');
```

```
$table->dropColumn('percentage');
$table->dropColumn(['percentage','descriptiontion']);
```

```
$table->string('city',30)->default('no city')->change();
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
