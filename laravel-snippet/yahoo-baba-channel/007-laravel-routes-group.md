# laravel-routes-group
Laravel route groups allow you to organize and apply shared attributes, like prefixes or middleware, to multiple routes at once

[example]
```
Route::prefix('page')->group(function(){
    Route::get('/about', function () {
        return "<h1>About Page</h1>";
    })->name('about');
    Route::get('/gallery', function () {
        return "<h1>Gallery Page</h1>";
    })->name('gallery');
    Route::get('/post/firstpost', function () {
        return "<h1>First Post Page</h1>";
    })->name('post');
});
```

[welcome.blade.php]
```
<h2><center>Welcome to Home page</center></h2>


<a href="{{route('about')}}">about</a>
<a href="{{route('gallery')}}">gallery</a>
<a href="{{route('post')}}">post</a>
```

[404 page]
```
Route::fallback(function () {
    return "Page Not Found";
});
```
