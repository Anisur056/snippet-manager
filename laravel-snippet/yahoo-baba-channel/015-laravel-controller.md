# Laravel Controller
## artisan syntax
This will create a controller 
```
php artisan make:controller PageController
```
Running the artisan comment will create a controller page name `app\Http\Controllers\PageController.php`
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

}
```
Now, make your own method.
```
class PageController extends Controller
{
    public function showUser()
    {
        return "<h1>Welcome to Controller Lecture.</h1>"; 
    }
}
```
open `routes\web.php`, create a route ontroller class with `showUser` method.
```
Route::get('/',[PageController::class,'showUser'])->name('home');
```

## example-1
# return view file with method in controller class file
```
class PageController extends Controller
{
    public function showUser()
    {
        return view('welcome'); 
    }
}
```

## example-2
# sending value in controller class with route
`route\web.php`
```
Route::get('/user/{id}',[PageController::class,'showUser'])->name('user');
```
`app\Http\Controllers\PageController.php`
```
class PageController extends Controller
{
    public function welcomePage()
    {
        return view('welcome'); 
    }

    public function showUser(string $name)
    {
        return view('user', ['id' => $name]); 
    }
}
```
`resources\views\user.blade.php`
```
<h2>User Details</h2>
<h3>Name: {{$id}} </h3>
```
