# Laravel Query Builder With Pagination
## syntax
```
->simplePaginate(2);
```

```

```
## step-1
### use `->simplePaginate();` method, to use pagination, set parameter for show number of content to load.
```
    public function showUsers(){
        $students = DB::table('tbl_students')
                    ->simplePaginate(2);
        return view('students', ['data' => $students]);
    }
```

## step-2
### loop table data. it will show only 2 record per page.
```
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
                <th>Preview</th>
                <th>Delete</th>
                <th>Update</th>
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
                    <td><a class="btn btn-primary btn-sm" href="{{ route('student', $user->id) }}">View</a></td>
                    <td><a class="btn btn-danger btn-sm" href="{{ route('student-deleter', $user->id) }}">Delete</a></td>
                    <td><a class="btn btn-warning btn-sm" href="{{ route('student-update-form', $user->id) }}">Update</a></td>
                </tr>
            @endforeach
        </table>
```

## step-3
### use `$data->links()` in view file to show next & previous links button.
```
        <div class="mt-5">
            {{ $data->links() }}
        </div>
```
