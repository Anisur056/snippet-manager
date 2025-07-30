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
### check if data exists, then update. otherwise it will insert new record.
```
    public function updateStudent(){
        $data_update = DB::table('tbl_students')
                        ->updateOrInsert(
                            [
                                'name' => 'sumon rahman-2',
                                'email' => 'sumon@gmail.com-2',
                            ],
                            [
                                'age' => 35,
                                'updated_at' => now()
                            ]
                        );

        if($data_update){
            echo "<h1>Data updated successfully.</h1>";
        }else{
            echo "<h1>Data Already Updated.</h1>";
        }
    }
```

### increment/decrement integer value in table record. 
```
    public function updateStudent(){
        $data_update = DB::table('tbl_students')
                        ->where('id',2)
                        ->increment('age'); //increment 1 at a time.
                        ->increment('age', 5); //increment 5 at a time.
                        ->decrement('age'); //decrement 1 at a time.
                        ->decrement('age', 5); //decrement 5 at a time.
                        ->decrement('age', 5,['city' => 'cumilla']); //decrement 5 at a time & also change city to cumilla
                        ->incrementEach([  //increment age to 2 & votes to 1 each time upate.
                            'age' => 2,
                            'votes' => 1,
                        ]);

        if($data_update){
            echo "<h1>Data updated successfully.</h1>";
        }else{
            echo "<h1>Data Already Updated.</h1>";
        }
    }
```
### upsert() check if email already exist. if found then update the entry, otherwise add new record.
```
    public function updateStudent(){
        $data_update = DB::table('tbl_students')
                        ->upsert(
                            [
                                'name' => 'Ramim-3',
                                'email' => 'ramim-10@gmail.com',
                                'age' => 21,
                                'city' => 'BOALKHALI',  
                            ],
                            ['email']
                        );

        if($data_update){
            echo "<h1>Data updated successfully.</h1>";
        }else{
            echo "<h1>Data Already Updated.</h1>";
        }
    }
```
### Delete data where id set to 1.
```
    public function deleteStudent(){
        $data_delete = DB::table('tbl_students')
                        ->where('id',1)
                        ->delete();
                        ->truncate(); // delete all table data & also reset id to 1.

        if($data_delete){
            echo "<h1>Data deleted successfully.</h1>";
        }else{
            echo "<h1>Data deletion failed.</h1>";
        }
    }
```

### example-1 (insert)
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

### example-2 (update)
`web.php`
```
Route::get('/student-update',[UserController::class,'updateStudent']);
```
`UserController.php`
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

### example-3 (delete)
`web.php`
```
Route::get('/student-delete',[UserController::class,'deleteStudent']);
```
`UserController.php`
```
    public function deleteStudent(){
        $data_delete = DB::table('tbl_students')
                        ->where('id',1)
                        ->delete();

        if($data_delete){
            echo "<h1>Data deleted successfully.</h1>";
        }else{
            echo "<h1>Data deletion failed.</h1>";
        }
    }
```
Delete from url - user input in address bar
`web.php`
```
Route::get('/student-delete/{id}',[UserController::class,'deleteStudent']);
```
`UserController.php`
```
    public function deleteStudent($id){
        $data_delete = DB::table('tbl_students')
                        ->where('id',$id)
                        ->delete();

        if($data_delete){
            echo "<h1>Data deleted successfully.</h1>";
        }else{
            echo "<h1>Data deletion failed.</h1>";
        }
    }
```




