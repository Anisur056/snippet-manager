# Laravel Migration Primary & Foreign Key
## syntax
```
$table->foreign('stu_id') // column to set foreign key
    ->references('id') // another table primary id 
    ->on('tbl_students') // another table name.
    ->onUpdate('cascade') // on update change value to
    ->onDelete('cascade'); // on delete, delete value to
```
or
```
$table->foreignId('stu_id')
    ->constrained('tbl_students');
    ->cascadeOnUpdate()
    ->cascadeOnDelete();
```

### remove foreign key form table column
```
$table->dropForeign(['stu_id']);
```

### remove Primary key form table column
```
$table->dropPrimary(['stu_id']);
```

### remove Unique key form table column
```
$table->dropUnique(['stu_id']);
```

## example-1
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
        Schema::create('tbl_students', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('email',40)->nullable()->unique();
        });

        Schema::create('tbl_libraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stu_id');
            $table->foreign('stu_id')
                ->references('id')
                ->on('tbl_students')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                // ->onUpdate('cascade') // on update change value to
                // ->onUpdate('restirct') // on update dont change value.
                // ->onDelete('set null') // on delete set null value
            $table->string('book');
            $table->date('due_date')->nullable();
            $table->boolean('status');
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_students');
        Schema::dropIfExists('tbl_libraries');
    }
};
```
