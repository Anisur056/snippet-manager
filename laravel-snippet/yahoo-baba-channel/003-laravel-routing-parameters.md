# laravel-routing-parameters
[single routing parameters]
```
Route::get('/post/{id}', function ($id) {
    return "<h1>Post ID: $id </h1>";
});
```

[multiple routing parameters]
```
Route::get('/post/{id}/comments/{comment}', function ($id,$comment) {
    return "<h1>Post ID: $id </h1><br>
    <h3>Your comment is: $comment </h3>";
});
```

[pass parameters as optional. here ? is set for optional parameters.
also, set id to null.]

[single routing parameters-optional]
```
Route::get('/post/{id?}', function ($id = null) {
    return "<h1>Post ID: $id </h1>";
});
```

[example-2]
```
Route::get('/post/{id?}', function ($id = null) {
    if($id){
        return "<h1>Post ID: $id </h1>";
    }else{
        return "<h1>No post id set.</h1>";
    }
});
```

[multiple routing parameters-optional]
```
Route::get('/post/{id?}/comments/{comment?}', function ($id = null, $comment = null) {
    return "<h1>Post ID: $id </h1><br>
    <h3>Your comment is: $comment </h3>";
});
```
