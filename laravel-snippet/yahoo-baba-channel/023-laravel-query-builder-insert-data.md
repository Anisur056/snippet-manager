# Laravel Query Builder Insert Data
## syntax
### inserting single data
```
    public function addStudent(){
        $data_add = DB::table('tbl_students')
                        ->insert([
                            'name' => 'Ramim-1',
                            'email' => 'ramim-1@gmail.com',
                            'age' => 21,
                            'city' => 'baokhali',
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
        if($data_add){
            echo "<h1>Data Successfully Added.</h1>";
        }else{
            echo "<h1>Data Failed.</h1>";
        }
    }
```

### inserting multiple data/ Multidimention array
```
    public function addStudent(){
        $data_insert = DB::table('tbl_students')
                        ->insert([
                            [
                                'name' => 'Ramim-3',
                                'email' => 'ramim-3@gmail.com',
                                'age' => 21,
                                'city' => 'baokhali',
                                'created_at' => now(),
                                'updated_at' => now()
                            ],
                            [
                                'name' => 'Ramim-4',
                                'email' => 'ramim-4@gmail.com',
                                'age' => 21,
                                'city' => 'baokhali',
                                'created_at' => now(),
                                'updated_at' => now()
                            ]
                        ]);
        if($data_insert){
            echo "<h1>Data Successfully Added.</h1>";
        }else{
            echo "<h1>Data Failed.</h1>";
        }
    }
```

### If duplicate entry found ignore insert data `->insertOrIgnore()`
```
    public function addStudent(){
        $data_insert = DB::table('tbl_students')
                        ->insertOrIgnore([
                                'name' => 'Ramim-4',
                                'email' => 'ramim-4@gmail.com',
                                'age' => 21,
                                'city' => 'baokhali',
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
        if($data_insert){
            echo "<h1>Data Successfully Added.</h1>";
        }else{
            echo "<h1>Email aredy existes. email is set to uniqe value</h1>";
        }
    }
```

### Insert data & return inserted id.
```
    public function addStudent(){
        $data_insert = DB::table('tbl_students')
                        ->insertGetId([
                                'name' => 'Ramim-5',
                                'email' => 'ramim-5@gmail.com',
                                'age' => 21,
                                'city' => 'baokhali',
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
        return $data_insert;
    }
```

### update record where id set.
```
    public function updateStudent(){
        $data_update = DB::table('tbl_students')
                        ->where('id',2)
                        ->update([
                            'city' => 'DHAKA',
                            'age' => 20,
                            'updated_at' => now(),
                        ]);

        if($data_update){
            echo "<h1>Data updated successfully.</h1>";
        }else{
            echo "<h1>Data Already Updated.</h1>";
        }
    }
```

### example-1
`web.php`
```
Route::get('/student-add',[UserController::class,'addStudent']);
```
`UserController.php`
```
    public function addStudent(){
        $student = DB::table('tbl_students')
                        ->insert([
                            'name' => 'Ramim-1',
                            'email' => 'ramim-1@gmail.com',
                            'age' => 21,
                            'city' => 'baokhali',
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
    }
```


