# Laravel Pass Data (Route to View file)
Passing data form web route to view file.
## syntax
```
Route::get('/users', function () {
    return view('users',['user'=>'Yahoo Baba', 'city' => 'Delhi']);
})->name('users');
```
## syntax-2
```
Route::get('/users', function () {
    return view('users')->with('user','Yahoo Baba')->with('city','Delhi');
})->name('users');
```
## syntax-3
```
Route::get('/users', function () {
    return view('users')->withUser('Yahoo Baba')->withCity('Delhi');
})->name('users');
```
## syntax-4
Sending Multi Dimansional Array
```
Route::get('/users', function () {
    $names = [
        1=> ['name'=>'anis','phone'=>'000','city'=>'ctg'],
        2=> ['name'=>'anis-1','phone'=>'000-1','city'=>'ctg-1'],
        3=> ['name'=>'anis-2','phone'=>'000-2','city'=>'ctg-2'],
        4=> ['name'=>'anis-3','phone'=>'000-3','city'=>'ctg-3'],
    ];
    return view('users',['user'=>$names]);
})->name('users');
```

## example-1
`routes\web.php`
```
Route::get('/users', function () {
    return view('users',['user'=>'Yahoo Baba', 'city' => 'Delhi']);
})->name('users');
```

`users.blade.php`
```
<h1> {{ $user }} </h1>
<h2> {{ $city }} </h2>
```

## example-2
Sending Multi Dimansional Array
`routes\web.php`
```
Route::get('/users', function () {
    $names = [
        1=> ['name'=>'anis','phone'=>'000','city'=>'ctg'],
        2=> ['name'=>'anis-1','phone'=>'000-1','city'=>'ctg-1'],
        3=> ['name'=>'anis-2','phone'=>'000-2','city'=>'ctg-2'],
        4=> ['name'=>'anis-3','phone'=>'000-3','city'=>'ctg-3'],
    ];
    return view('users',['user'=>$names]);
})->name('users');

```

`users.blade.php`
```
@foreach ($user as $id => $u)
    <h1> {{ $id }} ================</h1>
    <h1> {{ $u['name'] }} </h1>
    <h1> {{ $u['phone'] }} </h1>
    <h1> {{ $u['city'] }} </h1>
@endforeach
```
