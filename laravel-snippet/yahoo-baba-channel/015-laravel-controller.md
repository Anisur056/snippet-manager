# Laravel Controller
## syntax
This artisan command will create a `PageController.php` file.
```
php artisan make:controller PageController
```
Running the above command will create a controller file in `app\Http\Controllers\PageController.php`
```
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller
{

}
```

This artisan command will create a `TestingController.php` file with `__invoke()` method. this method trigger automatically when loaded.
```
php artisan make:controller TestingController --invokable
```
Running the above command will create a controller file in `app\Http\Controllers\TestingController.php`
```
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

    }
}

```

## Grouping same controller class. this help code organize
```
Route::controller(PageController::class)->group(function(){
    Route::get('/','welcomePage')->name('home');
    Route::get('/user/{id}','showUser')->name('user');
});
```


## example-1
run artisan cmd.
```
php artisan make:controller PageController
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

## example-2
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

## example-3
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

## example-4
# controller with __invoke() method.
run artisan cmd.
```
php artisan make:controller TestingController --invokable
```
return test view
```
    public function __invoke(Request $request)
    {
        return view('test');
    }
```

create route with TestingController class.
```
Route::get('/test',TestingController::class)->name('test');
```

`resources\views\test.blade.php`
```
<h1>This is testing Page.</h1>
```
