# Laravel Blade Syntax
Blade provides a clean and convenient way to create views in laravel

Below differance between php vs blade template.

# example-1
[php]
```
<?php
    echo "Hello";
?>
```
[blade]
```
{{"Hello"}}
```

# example-2
[php]
```
<?php
    echo $name;
?>
```
[blade]
```
{{ $name }}
```

# example-3
For output direct html or js code.
[php]
```
<?php
    echo "<h1>Hello</h1>";
?>
```
[blade]
```
{!! "<h1>Hello</h1>" !!}
```

# example-4
[php]
```
<?php
    
?>
```
[blade]
```
@php

@endphp
```

# example-5
[php]
```
<?php
    //Comment
?>
```
[blade]
```
{-- Comment--}
```

# example-6
[php]
```
<?php
    if (condition) {
        # code...
    } elseif {
        # code...
    } else {
        # code...
    }
?>
```
[blade]
```
@if (condition)
    # code...
@elseif(condition)
    # code...
@else
    # code...
@endif
```

# example-7
[php]
```
<?php
    switch($type) {
        case 1:
            # first case
            break;
        case 2:
            # second case
            break;
        default:
            # default case
    }
?>
```
[blade]
```
@switch($type)
    @case(1)
        # first case
        @break
    @case(2)
        # second case
        @break
    @default
        #default case
@endswitch
```

# example-8
[php]
```
<?php
    if (isset($record)) {
        # code...
    }
?>
```
[blade]
```
@isset($record)
    # code...
@endisset
```

# example-9
[php]
```
<?php
    if (empty($record)) {
        # code...
    }
?>
```
[blade]
```
@empty($record)
    # code...
@endempty
```

# example-10
[php]
```
<?php
    for ($i=0; $i < ; $i++) { 
        # code...
    }
?>
```
[blade]
```
@for ($i = 0; $i < $count; $i++)
    # code...
@endfor
```

# example-11
[php]
```
<?php
    foreach ($variable as $key) {
        echo $key;
    }
?>
```
[blade]
```
@foreach ($collection as $item)
    This is user {{ $item }}
@endforeach
```

# example-12
[php]
```
<?php
    while ($a <= 10) {
        # code...
    }
?>
```
[blade]
```
@while (condition)
    # do loop
@endwhile
```

# example-13
[blade]
```
@forelse ($collection as $item)
    # do loop
@empty
    # if empty do this    
@endforelse
```

# example-14
[blade]
```
@continue
```

# example-15
[blade]
```
@break
```
