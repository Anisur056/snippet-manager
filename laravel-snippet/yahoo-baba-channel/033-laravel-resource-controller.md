# Laravel Resource Controller

## syntax
```
php artisan make:controller studentController --resource
```
show route list.
```
php artisan route:list --name=students
```
olny create `'create','update','show'` route
```
Route::resource('students',studentController::class)->only([
    'create','update','show'
]);
```
create opposite of `'create','update','show'` route
```
Route::resource('students',studentController::class)->except([
    'create','update','show'
]);
```
rename resource route names.
```
Route::resource('students',studentController::class)->names([
    'index' => 'students-list',
    'create' => 'students-add-from',
    'store' => 'students-add-db',
    'show' => 'students-single',
    'edit' => 'students-edit-from',
    'update' => 'students-edit-db',
    'destroy' => 'students-delete',
]);
```
create multiple resource controller route
```
Route::resource([
    'students' => studentController::class,
    'employees' => employeesController::class,
    'teachers' => teachersController::class
]);
```

create nested resource controller route
```
Route::resource('students.comments',commentsController::class);
Route::resource('students.comments',commentsController::class)->shallow(); //to hide user id.
```

### step-1
create a resource controller. this will create below code
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
```

### step-2
create a resource route, also include controller class
```
Route::resource('users',studentController::class);
```
```
use App\Http\Controllers\studentController;
```

## example-2
Create nested Resource Controller
```
php artisan make:controller commentsController --resource
```
modify `web.php`
```
Route::resource('students.comments',commentsController::class);
```
include controller class at top
```
use App\Http\Controllers\commentsController;
```
to check route list
```
php artisan route:list --name=comments
```

