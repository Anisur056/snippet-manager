# Laravel Blade @prepend
## syntax
@prepend always add before specified section. 
```
@prepend('style')
  <style> \\css goes here. </style>
@endprepend()
```

## example-1
`main.blade.php`
```
@stack('style')
```
`welcome.blade.php`
```
@prepend('style')
  <style> \\css goes here. </style>
@endprepend()
```
