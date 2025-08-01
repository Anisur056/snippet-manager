# Laravel Blade @extends @yield @section
## syntax

### @extends lets you extend a template
```
@extends('layout.masterlayout')
```

### @yield is used to get content from a child page
```
@yield('header')
```

### @section inject content to master page
```
@section('header')
```

### 2nd parameter set default value
```
@yield('header','Set default value')
```

### @hasSection check if that section created or not. if section exists, then do some action else do another action. 
Note: if section created but no content published, then it counts as not set or no value set. If dublicate section provided, then only first section will show, second section will not show.
```
@hasSection('body-content')
    @yield('body-content')
@else
    <h2>No Content Fount.</h2>
@endif
```

### Too add user content with existed content.
```
// Main master page.
@section('sidebar')
    <a href="{{ route('home')}}">Home</a><br>
    <a href="{{ route('about')}}">about</a><br>
@show

// Child page.
@section('sidebar')
    @parent
    <p>Massage from home page.</p>
@endsection
```

## example-1
`routes\web.php`
```
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
```

`resources\views\layout\main.blade.php`
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
</head>
<body>
    <nav>
        <h2>Header navigation goes here</h2>
        <a href="{{ route('home')}}">Home</a>
        <a href="{{ route('about')}}">About</a>
    </nav>

    <aside>
        <h2>Sidebar goes here</h2>
    </aside>

    <main>
        @yield('body-content')
    </main>

    <footer>
        <h2>Footer goes here</h2>
    </footer>
</body>
</html>
```

`resources\views\welcome.blade.php`
```
@extends('layout.main')

@section('page-title')
    Laravel- Welcome
@endsection

@section('body-content')

    <h2>This is comming from `welcome.blade.php` page</h2>

@endsection
```

`resources\views\about.blade.php`
```
@extends('layout.main')

@section('page-title')
    Laravel- about
@endsection

@section('body-content')

    <h2>This is comming from `about.blade.php` page</h2>

@endsection
```

## example-2
` main.blade.php `
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
</head>
<body>
    <nav>
        <h2>Header navigation goes here</h2>
        <a href="{{ route('home')}}">Home</a>
        <a href="{{ route('about')}}">About</a>
    </nav>

    <aside>
        <h2>Sidebar goes here</h2>
        @section('sidebar')
            <a href="{{ route('home')}}">Home</a><br>
            <a href="{{ route('about')}}">about</a><br>
        @show
    </aside>

    <main>
        @hasSection('body-content')
            @yield('body-content')
        @else
            <h2>No Content Fount.</h2>
        @endif
    </main>

    <footer>
        <h2>Footer goes here</h2>
    </footer>
</body>
</html>
```

` welcome.blade.php `
```
@extends('layout.main')

@section('page-title')
    Laravel- Welcome
@endsection

@section('body-content')

    <h2>This is comming from `welcome.blade.php` page</h2>

@endsection

@section('sidebar')
    @parent
    <p>Massage from home page.</p>
@endsection
```

