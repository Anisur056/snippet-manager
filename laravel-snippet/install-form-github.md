# Install laravel from github

1. clone from github.
2. run this in terminal/cmd
```
composer install
```
 
3. `.env.example` to `.env` rename
4. run this in terminal/cmd
```
php artisan key:generate
```

5. run this in terminal/cmd
```
php artisan migrate
```

6. If the project includes seeders for sample data, you might also run:
```
php artisan db:seed
```

7. finally run
```
php artisan serve
```
