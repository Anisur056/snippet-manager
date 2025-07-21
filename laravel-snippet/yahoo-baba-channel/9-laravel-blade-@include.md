# Laravel Template Including Subviews

## syntax
```
@include('header')

{{-- inside a `pages` folder --}}
@include('pages.header')

{{-- sending single values in view file --}}
@include('pages.header',['header_name' => 'header-1'])
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

