# Laravel Eloquent Many To Many Relationships

## Step-1 `database\migrations\0001_01_01_000000_create_users_table.php`
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
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->unique();
            $table->timestamps();
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();

            $table->foreignId('role_id')
                    ->references('id')
                    ->on('roles')
                    ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('user_roles');
    }
};

```

## `database\seeders\DatabaseSeeder.php`
```
<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\User_role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Yahoo Baba', 'email' => 'yahoobaba@example.com'],
            ['name' => 'Salman Khan', 'email' => 'salamn@example.com'],
            ['name' => 'Deepika Padukone', 'email' => 'deepika@example.com'],
            ['name' => 'Abhishek Bachan', 'email' => 'abhishek@example.com'],
        ];

        foreach ($users as $u) {
            User::create($u);
        }

        $aa = [
            ['role_name' => 'Administrator'],
            ['role_name' => 'Author'],
            ['role_name' => 'Contributor'],
            ['role_name' => 'Edittor'],
        ];

        foreach ($aa as $a) {
            Role::create($a);
        }

        $aa = [
            ['user_id' => 1,'role_id' => 3],
            ['user_id' => 1,'role_id' => 4],
            ['user_id' => 4,'role_id' => 4],
            ['user_id' => 4,'role_id' => 1],
            ['user_id' => 1,'role_id' => 2],
        ];

        foreach ($aa as $a) {
            User_role::create($a);
        }
    }
}

```


## Step-2 `artisan command`
```
php artisan make:model User --controller --resource
php artisan make:model Role --controller --resource
php artisan make:model User_role --controller --resource
```

## Step-3 `routes\web.php`
```
<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
```

## Step-4 `app\Models\User.php`
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_roles');
    }
}
```

`app\Models\Role.php`
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
```

## Step-5 `app\Http\Controllers\UserController.php`
```
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(4);
        return $user->roles;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
```

## Step-6 `app\Http\Controllers\PostController.php`
```
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
```
