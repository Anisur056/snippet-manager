# Laravel Migration Primary & Foreign Key

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
