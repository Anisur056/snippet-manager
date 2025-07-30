# Laravel Query Builder Update Data With Form
## step-1
### create a view route, url- `/student-update-form/{id}`, controller method- `updateStudentForm` & named it `->name('student-update-form');`
```
Route::get('/student-update-form/{id}','updateStudentForm')->name('student-update-form');
```

## step-2
create a view file- `student-update-form` add html form. @csrf is required.
form action will be`action="{{ route('student-update', $data->id) }}"`
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
        <h2>Update Student Record</h2>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('student-update', $data->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" value="{{ $data->age }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $data->city }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
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
### create `updateStudentForm($id)` in controller file
```
    public function updateStudentForm($id){
        // $student = DB::table('tbl_students')->where('id',$id)->get();
        $student = DB::table('tbl_students')->find($id);
        return view('student-update-form', ['data' => $student]);
    }
```

## step-4
### create post route url-`/student-update/{id}`, controller- `updateStudent`, named- `->name('student-update');`
```
Route::post('/student-update/{id}','updateStudent')->name('student-update');
```
## step-5
### create controller method- `updateStudent(Request $req)` & update the record
```
    public function updateStudent(Request $req){
        $data_update = DB::table('tbl_students')
                        ->where('id',$req->id)
                        ->update(
                            [
                                'name' => $req->name,
                                'email' => $req->email,
                                'age' => $req->age,
                                'city' => $req->city,
                                'updated_at' => now()
                            ]
                        );
        
        if($data_update){
            return redirect()->route('students');
        }
    }
```
