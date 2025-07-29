# Laravel Query Builder

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
