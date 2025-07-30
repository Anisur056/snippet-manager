# Laravel Query Builder Insert Data With Form
## step-1
### create a view route, url- `/student-add-form`, view- `student-add-form` & named it `->name('student-add-form');`
```
Route::view('/student-add-form','student-add-form')->name('student-add-form');
```

## step-2
### create a view- `student-add-form` add html form. @csrf is required. form action will be`action="{{ route('student-add') }}"`
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
          crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-3 pt-3">
        <h2>Add Student Record</h2>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('student-add') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
</body>
</html>
```

## step-3
### create post route `/student-add`, add controller `UserController::class,'addStudent'`, named route as `->name('student-add');`
```
Route::post('/student-add',[UserController::class,'addStudent'])->name('student-add');
```

## step-4
### create a method `addStudent(Request $req)` & insert the value from `Request $req`
```
    public function addStudent(Request $req){
        $data_insert = DB::table('tbl_students')
                        ->insert([
                                'name' => $req->name,
                                'email' => $req->email,
                                'age' => $req->age,
                                'city' => $req->city,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
        if($data_insert){
            return redirect()->route('students');
        }
    }
```
