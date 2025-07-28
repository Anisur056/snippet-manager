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
