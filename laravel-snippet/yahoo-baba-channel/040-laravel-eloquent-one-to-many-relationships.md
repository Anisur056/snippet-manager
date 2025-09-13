# Laravel Eloquent One To One Relationships

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

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->longText('description');
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('posts');
    }
};
```

## `database\seeders\DatabaseSeeder.php`
```
<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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

        $posts = [
            ['title' => 'Post-1', 'description' => 'Post Description 1', 'user_id' => '1'],
            ['title' => 'Post-2', 'description' => 'Post Description 2', 'user_id' => '2'],
            ['title' => 'Post-3', 'description' => 'Post Description 3', 'user_id' => '2'],
            ['title' => 'Post-4', 'description' => 'Post Description 4', 'user_id' => '3'],
            ['title' => 'Post-5', 'description' => 'Post Description 5', 'user_id' => '3'],
            ['title' => 'Post-6', 'description' => 'Post Description 6', 'user_id' => '3'],
        ];

        foreach ($posts as $u) {
            Post::create($u);
        }
    }
}
```


## Step-2 `artisan command`
```
php artisan make:model User --controller --resource
php artisan make:model Post --controller --resource
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
Route::resource('post', PostController::class);
```

## Step-4 `app\Models\User.php`
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function post(){
        return $this->hasMany(Post::class);
        // return $this->hasMany(Post::class,'user_id','id');
    }
}
```

`app\Models\Contact.php`
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

        public function user(){
        return $this->belongsTo(User::class);
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
        return $users = User::with('post')->get();
        // return $users = User::with('post')->find(2);

        // $users = User::find(2);
        // $users->post;
        // return $users;

        // return $users = User::doesntHave('post')->get(); //get data who doesn't have any post
        // return $users = User::has('post')->get(); //get data who have single post
        // return $users = User::has('post')->with('post')->get(); //get data post
        // return $users = User::has('post','>=',3)->with('post')->get(); //get data who have 3 post or above.
        // return $users = User::withCount('post')->get(); //get user with post count `post_count`
        // return $users = User::select(['name'])->withCount('post')->get(); //get user `name` only with post count `post_count`
        // return $users = User::select(['id','name'])->with('post')->get(); //get user `name` only with post data



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Option-1
        // $user = User::create([
        //     'name'=> 'Anisur Rahman',
        //     'email'=>'anis@gmail.com',
        // ]);

        // $user->post()->create([
        //     'title'=> 'anis@gmail.com',
        //     'description'=> 'lorem ..................',
        // ]);


        // Option-2 Single Entry
        // $user = User::find(5);

        // $user->post()->create([
        //     'title'=> 'Post-8',
        //     'description'=> 'Post Des- 8',
        // ]);


        // Option-3 Multi Entry
        $user = User::find(4);

        $user->post()->createMany([
            [
            'title'=> 'Post-9',
            'description'=> 'Post Des- 9',
            ],
            [
            'title'=> 'Post-10',
            'description'=> 'Post Des- 10',
            ],
        ]);
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
        // return $users = Post::get();
        // return $users = Post::with('user')->get();
        // return $users = Post::with('user')->find(2);

        // return $users = Post::withWhereHas('user',function($q){
        //     $q->where('name','Salman Khan')
        //         ->orWhere('name','Yahoo Baba');
        // })->get();

        // $users = User::where('name','Salman Khan')->get();
        // $posts = Post::whereBelongsTo($users)->get();
        // return $posts;


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
