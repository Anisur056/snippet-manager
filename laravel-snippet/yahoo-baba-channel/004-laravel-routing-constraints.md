# laravel-routing-constraints
This is used to restrict the parameters that can be passed to a route. 
This can be useful in situations where you want to ensure that only certain types of data are accepted

[syntax]
1. `whereNumber('id')` [only accept number]
2. `whereAlpha('name')` [only accept letter]
3. `whereAlphaNumeric('name')` [only accept number & letter]
4. `whereIn('name',['movie','song'])` [only accept given value]
5. `where('id','[@0-9a-zA-Z]+')` [only accept given regular exprestion]


[example- only accept number]
```
Route::get('/post/{id}', function ($id) {
    return "<h1>Post ID: $id </h1>";
})->whereNumber('id');
```

[example- only accept letter]
```
Route::get('/post/{id}', function ($id) {
    return "<h1>Post ID: $id </h1>";
})->whereAlpha('id');
```

[only accept number & letter]
```
Route::get('/post/{id}', function ($id) {
    return "<h1>Post ID: $id </h1>";
})->whereAlphaNumeric('id');
```

[only accept given value]
```
Route::get('/post/{id}', function ($page) {
    return "<h1>Post ID: $page </h1>";
})->whereIn('id',['movie','song']);
```

[only accept given regular exprestion.
In this example only accept @ symbol, 0 to 0, a to z letter, A to Z letter]
```
Route::get('/post/{id}', function ($page) {
    return "<h1>Post ID: $page </h1>";
})->where('id','[@0-9a-zA-Z]+');
```

[multi parameters, first parameter accept only number, second parameter accept only a to z letter & whitespace character ]
[find all regular expressions: https://www.w3schools.com/php/php_regex.asp]
```
Route::get('/post/{id}/comment/{commentid}', function ( $page, $comment) {
    return "<h1>Post ID: $page </h1><br><h1>Comment is: $comment </h1>";
})->where('id','[0-9]+')->where('commentid','[a-z\s]+');
```
