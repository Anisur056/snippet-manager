# Laravel Routing
```
https://www.youtube.com/watch?v=oCf9Bb-crPc&list=PL0b6OzIxLPbz7JK_YYrRJ1KxlGG4diZHJ&index=6
```

# artisan route command
[route related help]
```
php artisan route -h
```

[route list]
```
php artisan route:list
```

[route list only user created]
```
php artisan route:list --except -vendor
```

[route search]
```
php artisan route:list --path=.....
```

# laravel route script (routes/web.php)
[create route named /home, that open (home.blade.php) view file]
```
Route::get('/home', function () {
    return view('home');
});
```

[another way to create route named /home-2, that open same (home.blade.php) view file. first parameter is route name, second parameter is view file name.]
```
Route::view('/home-2','home');
```

[create route name /welcome, that output html code.]
```
Route::get('/welcome', function () {
    return "<h2><center>Welcome to Laravel!</center></h2>";
});
```
