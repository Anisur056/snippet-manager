# Laravel Blade js-inheritance @stack-@push 
Note: This also work for css also.
## syntax

```
@stack('script')
```
```
@push('script')
  <script>
    //all code goes here.
  </script>
@endpush
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

    @stack('script')
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

@push('script')
  <script>
    //all code goes here.
  </script>
@endpush
```
