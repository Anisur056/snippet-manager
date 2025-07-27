# Laravel Blade PHP in Javascript
## syntax
@json() used for convert php variable to javascript json variable.
```
@php
    $user = "Yahoo Baba";
    $fruits = ["apple", "orange", "banana", "grapes"];
@endphp

var data = @json($fruits);
console.log(data);
```

## example-1
```
@php
    $user = "Yahoo Baba";
    $fruits = ["apple", "orange", "banana", "grapes"];
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <script>
    var data = @json($fruits);
    console.log(data);

    data.forEach(function(entry){
        var pTag = document.createElement("p");
        pTag.innerHTML = entry;
        document.body.appendChild(pTag)
    });
    
    </script>
</body>
</html>
```
