# Laravel Template Including Subviews

## syntax
```
@include('header')

{{-- inside a `pages` folder --}}
@include('pages.header')

{{-- sending single values in view file --}}
@include('pages.header',['header_name' => 'header-1'])

{{-- sending array values in view file --}}
$fruits = ['apple', 'banana', 'organge', 'grapes'];
@include('pages.header',['fruit_names' => $fruits])

{{-- sending associative/key-value arrays values in view file --}}
$fruits = ['one'=>'apple', 'two'=>'banana', 'three'=>'organge', 'four'=>'grapes'];
@include('pages.header',['fruit_names' => $fruits])
```


## example-1
create view file `resources/views/pages/header.blade.php` & `resources/views/pages/footer.blade.php`

`resources/views/welcome.blade.php`
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test-laravel</title>
</head>
<body>
    @include('pages.header')

    {{'Welcome to home page'}}

    @include('pages.footer')
</body>
</html>
```

## example-2
`resources/views/welcome.blade.php`
```
@include('pages.header',['header_name' => 'header-1'])
```

`resources/views/pages/header.blade.php`
```
<p> {{ 'header file called: '. $header_name }} </p>
```

## example-3
`resources/views/welcome.blade.php`
```
@php
    $fruits = ['apple', 'banana', 'organge', 'grapes'];
@endphp

@include('pages.header',['fruit_names' => $fruits])
```

`resources/views/pages/header.blade.php`
```
@foreach ($fruit_names as $single_name)
    <p> {{ $single_name }} </p>
@endforeach
```

## example-4
`resources/views/welcome.blade.php`
```
@php
    $fruits = ['one'=>'apple', 'two'=>'banana', 'three'=>'organge', 'four'=>'grapes'];
@endphp

@include('pages.header',['fruit_names' => $fruits])
```

`resources/views/pages/header.blade.php`
```
@foreach ($fruit_names as $key => $value)
    <p> {{ $key }} -fruid is- {{ $value }} </p>
@endforeach
```

## example-5
`resources/views/welcome.blade.php`
```
@php
    // $fruits = ['one'=>'apple', 'two'=>'banana', 'three'=>'organge', 'four'=>'grapes'];
    $fruits = [];
@endphp

@include('pages.header',['fruit_names' => $fruits])
```

`resources/views/pages/header.blade.php`
```
@forelse ($fruit_names as $key => $value)
    <p> {{ $key }} -fruid is- {{ $value }} </p>
@empty
    <p>No value found.</p>    
@endforelse
```
