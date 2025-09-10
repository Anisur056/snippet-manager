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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->foreignId('student_id')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('contacts');
    }
};
```

## Step-2 `artisan command`
```
php artisan make:model Student --controller --resource
php artisan make:model Contact --controller --resource
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

Route::resource('student', StudentController::class);
Route::resource('contact', ContactController::class);
```

## Step-4 `app\Models\Student.php`
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function contact(){
        return $this->hasOne(Contact::class);
    }
}
```

`app\Models\Contact.php`
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
```

## Step-5 `app\Http\Controllers\StudentController.php`
```
<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::with('contact')->get();

        // $student = Student::with('contact')->find(2);

        // $student = Student::with('contact')->where('age','7')->get();

        // $student = Student::withWhereHas('contact', function($query){
        //     $query->where('city','Sylet');
        // })->get();

        // $student = Student::where('gender','Male')
        //     ->withWhereHas('contact', function($query){
        //     $query->where('city','Sylet');
        // })->get();

        // $student = Student::where('gender','Female')
        //     ->WhereHas('contact', function($query){
        //     $query->where('city','Sylet');
        // })->get(); // Show only Student record, not contact record

        return $student;
        // echo $student->name. "<br>";
        // echo $student->contact->email. "<br>";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::create([
            'name'=> 'Anisur Rahman',
            'age'=>'23',
            'gender'=>'Male',
        ]);

        $student->contact()->create([
            'email'=> 'anis@gmail.com',
            'phone'=> '012168965252',
            'address'=> 'Kodomtoli',
            'city'=> 'Ctg',
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
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
```

## Step-6 `app\Http\Controllers\ContactController.php`
```
<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::with('student')->get();
        return $contact;
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
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
```


