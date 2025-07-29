# Laravel Query Builder

## syntax
```
->select('name','email') //select specifig table column.
->select('email as student_email') //select email table column and rename it `student_email`
->distinct() //only select unique value, duplicate value will select once.
->pluck('name') // return value as array
->pluck('email','name') // return name as key & email as value
->where('city','ctg') //find records where `city` set to `ctg`
->where('age','>',20) //find records where `age` is bigger 20
->where('age','<',20) //find records where `age` is smaller 20
->where('age','=',20) //find records where `age` is equal 20
->where('age','<>',20) //find records where `age` is not 20
->where('name','like','A%') //find records where `name` starts with A
->where([        // used multiple array in single where..
    ['city','=','ctg'],
    ['age','>',20]
])
orWhere('age','<',20) // check where() & orWhere() condition, one of it gets result
whereBetween('id',[3,6]) // select records between id (3 to 6)
whereNotBetween('age',[18,20]) // select no records between age (18 to 20). opposite of whereBetween().
whereIn('city',['ctg','dhaka']) // select city where `ctg` & `dhaka`
whereNotIn('city',['ctg','dhaka']) // don't select city where `ctg` & `dhaka`. opposite of whereIn().
whereNull('email') // select record where email is null/blank.
whereNotNull('email') //Dont select record where email is null/blank. opposite of whereNull().
whereDate('created_at','2025-07-29') //Select record from `created_at` table where date is `2025-07-29`
whereMonth('created_at','6') //Select record from `created_at` table where month is 6 or june
whereDay('created_at','27') //Select record from `created_at` table where day is 27
whereYear('created_at','2025') //Select record from `created_at` table where year is 2025
whereTime('created_at','08:01:32') //Select record from `created_at` table where Time is 08:01:32
orderBy('id','asc') //order records by Ascending Order (1,2,3)
orderBy('id','desc') //order records by Descending Order (3,2,1). Also can do multiple order at a time.
first() //return first record
latest() //return latest record
oldest() //return oldest record
inRandomOrder() //returen record randomly.
limit(3) or take(3) //returen only 3 records
offset(3) or skip(3) //returen records from 3 serial
count() //count the records
max('age') //return maximum value of age
min('age') //return minimum value of age
avg('age') //return avarage value of age
sum('age') //return all age value addition.

```

### step-1
make controller file
```
php artisan make:controller UserController
```
above cmd will create below file
```
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{

}
```

### step-2
include DB class at top must.
```
use Illuminate\Support\Facades\DB;
```

### step-3
create public method showUsers().<br>
get all data from `tbl_students` table form database.<br>
pass all data to view `students.blade.php` file with `data` variable<br>
```
class UserController extends Controller
{
    public function showUsers(){
        $students = DB::table('tbl_students')->get();
        return view('students', ['data' => $students]);
    }
}
```

### step-4
create view file `resources\views\students.blade.php`<br>
loop data with `@foreach ($data as $user)` <br>
view value with `{{$user->id}}`<br>
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
          crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-3 pt-3">
        <table class="table table-sm table-striped">
            <h2>All Students</h2>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>City</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            @foreach ($data as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
</body>
</html>
```

## example-2
`web.php`
```
Route::get('/student/{id}',[UserController::class,'singleUser'])->name('student');
```

`UserController.php`
```
    public function singleUser($id){
        $student = DB::table('tbl_students')->where('id',$id)->get();
        return view('student', ['data' => $student]);
    }
```
`student.blade.php`
```
<h1>Students Details</h1>

@foreach ($data as $student)
    <h3>Name: {{ $student->name }}</h3>
    <h3>Email: {{ $student->email }}</h3>
    <h3>Age: {{ $student->age }}</h3>
    <h3>City: {{ $student->city }}</h3>
@endforeach
```
