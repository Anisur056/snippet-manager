## step-1
```
php artisan make:model Tbl_student --controller --resource --migration --seed
```

## step-2
`database\migrations\2025_07_31_183659_create_tbl_students_table.php`
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
            $table->string('student_name');
            $table->string('student_phone')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_students');
    }
};
```

## step-3
```
php artisan migrate
```

## step-4
`database\seeders\TblStudentSeeder.php`
https://fakerphp.org/formatters/
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tbl_student;
use Faker\Factory as Faker;

class TblStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Tbl_student::create([
                'student_name' => $faker->name,
                'student_phone' => $faker->e164PhoneNumber(),
            ]);
        }
    }
}
```

## step-5
```
php artisan db:seed
```
