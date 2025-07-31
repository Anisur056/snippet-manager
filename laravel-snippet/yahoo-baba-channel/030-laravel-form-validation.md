# Laravel Form Validation
## syntax
```
public function addStudent(Request $req){
    $req->validate([
        'name' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric',
        'city' => 'required',
    ]);
}
```
for show error in view file.
```
<span class="text-danger"> @error('name') {{$message}} @enderror </span>
```
for show red border in input field
```
class="form-control @error('name') is-invalid @enderror"
```
for return old submited value in html input
```
value="{{ old('name') }}"
```
show error at top
```
{{-- Show Error at top --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{$error}}</div>
    @endforeach
@endif
```


### step-1
```
    public function addStudent(Request $req){

        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'city' => 'required',
        ]);

        $data_insert = DB::table('tbl_students')
                        ->insert([
                                'name' => $req->name,
                                'email' => $req->email,
                                'age' => $req->age,
                                'city' => $req->city,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
        if($data_insert){
            return redirect()->route('students');
        }
    }
```

### step-2
```
    <div class="container mt-3 pt-3">
        <h2>Add Student Record</h2>

        {{-- Show Error at top --}}
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endif --}}

        <div class="row">
            <div class="col-4">
                <form action="{{ route('student-add') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input  value="{{ old('name') }}" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror"   
                                name="name">
                        <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input  value="{{ old('email') }}" 
                                type="text" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email">
                        <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input  value="{{ old('age') }}" 
                                type="number" 
                                class="form-control @error('age') is-invalid @enderror" 
                                name="age">
                        <span class="text-danger"> @error('age') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select name="city"
                                class="form-select">
                            <option>---select one---</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Feni">Feni</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Chowmuhani">Chowmuhani</option>
                            <option value="Maijdee">Maijdee</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Savar">Savar</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Kaliakair">Kaliakair</option>
                            <option value="Sreepur">Sreepur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Bhairab">Bhairab</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Tarabo">Tarabo</option>
                            <option value="Ghorashal">Ghorashal</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Jashore">Jashore</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Magura">Magura</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Netrakona">Netrakona</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Saidpur">Saidpur</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
```

### Available Validation Rules
Below is a list of all available validation rules and their function:<br>
https://laravel.com/docs/12.x/validation#available-validation-rules<br>
https://www.youtube.com/watch?v=x30sdZueaTg


```
Booleans ---------
Accepted
Accepted If
Boolean
Declined
Declined If

Strings -----------
Active URL
Alpha
Alpha Dash
Alpha Numeric
Ascii
Confirmed
Current Password
Different
Doesnt Start With
Doesnt End With
Email
Ends With
Enum
Hex Color
In
IP Address
JSON
Lowercase
MAC Address
Max
Min
Not In
Regular Expression
Not Regular Expression
Same
Size
Starts With
String
Uppercase
URL
ULID
UUID

Numbers-------------
Between
Decimal
Different
Digits
Digits Between
Greater Than
Greater Than Or Equal
Integer
Less Than
Less Than Or Equal
Max
Max Digits
Min
Min Digits
Multiple Of
Numeric
Same
Size

Arrays----------------
Array
Between
Contains
Distinct
In Array
In Array Keys
List
Max
Min
Size

Dates----------------
After
After Or Equal
Before
Before Or Equal
Date
Date Equals
Date Format
Different
Timezone

Files---------------
Between
Dimensions
Extensions
File
Image
Max
MIME Types
MIME Type By File Extension
Size

Database-----------
Exists
Unique

Utilities----------
Any Of
Bail
Exclude
Exclude If
Exclude Unless
Exclude With
Exclude Without
Filled
Missing
Missing If
Missing Unless
Missing With
Missing With All
Nullable
Present
Present If
Present Unless
Present With
Present With All
Prohibited
Prohibited If
Prohibited If Accepted
Prohibited If Declined
Prohibited Unless
Prohibits
Required
Required If
Required If Accepted
Required If Declined
Required Unless
Required With
Required With All
Required Without
Required Without All
Required Array Keys
Sometimes
```
