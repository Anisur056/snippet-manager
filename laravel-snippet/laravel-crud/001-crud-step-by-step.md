## step-1
```
php artisan make:model User --migration --seed --controller --resource
```

## step-2
`database\migrations\2025_08_01_050325_create_users_table.php`
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('age');
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
```

## step-3
```
php artisan migrate
```

## step-4
`database\seeders\UserSeeder.php`
https://fakerphp.org/formatters/
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email(),
                'age' => $faker->randomNumber(2, true),
                'city' => $faker->city(),
            ]);
        }
    }
}
```

## step-5
`database\seeders\DatabaseSeeder.php`
```
<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);
    }
}
```

## step-6
```
php artisan db:seed
```

## step-7
`route\web.php`
```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users',UserController::class);
```

## step-8
`app\Http\Controllers\UserController.php` 
### Show all user- json
```
    public function index()
    {
        $users = User::all();
        return $users;
    }
```
### Show all user- array-foreach
```
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            echo $user->name;
            echo "<br>";
        }
    }
```
### send data to view file
```
    public function index()
    {
        $users = User::all(); //retreve all data in JSON Format.
        return view('students',compact('users'));

        // Available Method.

        // $users = User::all(); //retreve all data in JSON Format.
        // $users = User::orderBy('id', 'asc')->get(); //get all data in order by .
        // $users = User::find(2); //select perticular data, primary id=2, return single array.
        // $users = User::find([2,4],['name','email']); //select 2, 4 number id & return name & email column
        // $users = User::count(); // return totol record count.
        // $users = User::min('age'); // return minimum number in columen age. only works in integer number
        // $users = User::max('age'); // return maximum number in columen age. only works in integer number
        // $users = User::where('city','Juanatown')->get(); // search where city is Juanatown & get it.
        // $users = User::whereCity('Juanatown')->get(); // search where city is Juanatown & get it.
        // $users = User::where('city','Juanatown')->where('age','>',50)->get(); // search where city is Juanatown also age bigger then 50 & get it.
        // $users = User::where('city','Juanatown')->orWhere('age','>',50)->get(); // search where city is Juanatown or age bigger then 50 & get it.
        // $users = User::select('name','email')->get(); // only select name & email column
        // $users = User::where('city','Juanatown')->toSql(); // show sql command.
        // $users = User::where('city','Juanatown')->toRawSql(); // /show RAW sql command.
        // $users = User::whereNot('age',20)->get(); // /get record which is not 20 age.
        // $users = User::whereBetween('age',[20,30])->get(); // /get record betweeen 20 to 30 age.
        // $users = User::whereNotBetween('age',[20,30])->get(); // /get opposite of record betweeen 20 to 30 age.
        // $users = User::whereIn('city',['Juanatown','Felicitaberg'])->get(); // select city only 'Juanatown','Felicitaberg' .
        // $users = User::where('city','Juanatown')->first(); // return only first 1 record.
        // if(User::where('id',1)->exists()){
            //if condition true, do something.
        // }
        // return $users;
    }
```
### create view file to show all data
`resources\views\students.blade.php`
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
            rel="stylesheet"    
            integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
            crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->age}}</td>
                        <td>{{$user->city}}</td>
                    </tr> 
                @endforeach
    
            </tbody>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" 
            crossorigin="anonymous"></script>
</body>
</html>
```

