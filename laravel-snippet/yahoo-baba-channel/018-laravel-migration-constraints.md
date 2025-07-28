# Laravel Migration Constraints
## syntax
### null value will accept. if no data send it will accept
```
$table->string('email')->nullable();
```
### no dublicate data accept.
```
$table->string('email')->unique();
or
$table->unique('email');
```
### if no data send, it will set default value.
```
$table->string('city')->default('ctg');
```
### set column as primary key.
```
$table->primary('user_id');
```
### set column as foreign key & link another table.
```
$table->foreign('user_id')->references('id')->on('users');
```
### Check to add data in database
```
DB::statement('ALTER TABLE users ADD CONSTRAINT age CHECK (age>18);');
```

