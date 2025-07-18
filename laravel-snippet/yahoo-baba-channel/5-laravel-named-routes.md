# laravel-named-routes
allow you to assign a name to a specific route, 
which can then be used to generate URLs and redirects throughout your application, 
making it easier to manage and update links.

[syntax]
```
Route::get('/profile', function () {
    // ...
})->name('profile');
```

[usage]
```
<a href="{{ route('profile') }}">My Profile</a>
```

# [example-1]
```
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
```

[welcome.blade.php]
```
<h2><center>Welcome to Home page</center></h2>

<a href="{{route('about')}}">about-us</a>
```

[about.blade.php]
```
<h2><center>This is about page</center></h2>

<a href="{{route('home')}}">Home Page</a>
```
