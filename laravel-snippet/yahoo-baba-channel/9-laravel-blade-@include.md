# Laravel Template Including Subviews

## syntax
```
@include('header')
@include('pages.header') {{-- inside a `pages` folder --}}
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


