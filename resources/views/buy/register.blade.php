<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" type="text/css">
    <link rel="shortcut icon" type="imaage/jpg" href="{{ Storage::url('public/logo/3ird.jpg') }}">
    <title>Document</title>
</head>
<body>

<div class="header" style="cursor: default;">3ird Corporation</div>
<div class="body">
    <div class="body-header">
        <p>Create new accounts</p><br>
        <p>It's Quick and easy</p>
    </div>
    <hr>
    <div class="body-content">
        @error('dob')
        <p id="age">{{ $message }}</p>
        @enderror
        @error('emptyDate')
        <p id="age">{{ $message }}</p>
        @enderror
        @error('gender')
        <p id="age">{{ $message }}</p>
        @enderror
        @error('gend')
        <p id="age">{{ $message }}</p>
        @enderror
        <form method="post" action="/buy" enctype="multipart/form-data">
            @csrf
            <div class="names">
                <input type="text" name="first_name" id="fname" placeholder="First Name" value="{{old('first_name')}}">
                <input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}">
            </div>
            <div class="error-names">
                @error('first_name')
                <p>{{ $message }}</p>
                @enderror
                @error('last_name')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="email">
                <input type="text" name="email" placeholder="Email Address" value="{{old('email')}}">
                <input type="text" name="username" placeholder="Username" value="{{old('username')}}">
            </div>
            <div class="error-email">
                @error('email')
                <p>{{$message}}</p>
                @enderror
                @error('username')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="phone">
                <input type="text" name="telephone" placeholder="Mobile Number" value="{{old('telephone')}}">
            </div>
            <div class="error-phone">
                @error('telephone')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="phone">
                <input type="text" name="address" placeholder="Address" value="{{old('address')}}">
            </div>
            <div class="error-phone">
                @error('address')
                <p>{{$message}}</p>
                @enderror
            </div>
            <input type="file" name="profile" class="custom-file-input">
            <div class="error-phone">
                @error('profile')
                <p>{{$message}}</p>
                @enderror
            </div>
            <span style="background-color: white; float:left; color: grey; font-size: 11px;">Date of birth</span>
            <div class="date">
                <input type="text" name="dob" value="" hidden>
                <select name="day" id="day">
                    <option value="" disabled selected hidden>Day</option>
                </select>
                <select name="month" id="month">
                    <option value="" selected disabled hidden>Month</option>
                </select>
                <select name="year" id="year">
                    <option value="" selected disabled hidden>Year</option>
                </select>
            </div>
            <span style="background-color: white; float:left ; color: grey;font-size: 11px;">Gender</span>
            <div class="gender">
                <span>Male<input type="radio" name="gender" value="male" id="male"></span>
                <span>Female<input type="radio" name="gender" value="female" id="female"></span>
                <span>Custom<input type="radio" name="gender" id="custom" value="custom"></span>
            </div>
            <div class="gender-select" style="background-color: white;" hidden>
                <div class="custom-gender">
                    <select name="genderCustom" id="custom-gender">
                        <option value="" selected disabled hidden>Select your pronoun</option>
                        <option value="she/her">She: "Wish her a happy birthday!"</option>
                        <option value="he/him">He: "Wish him a happy birthday!"</option>
                        <option value="they/them">They: "Wish them a happy birthday!"</option>
                    </select>
                </div>
                <div class="gender-option">
                    <input type="text" name="gender1" placeholder="Gender (optional)">
                </div>
            </div>
            <div class="passwords">
                <input type="password" name="password" placeholder="Enter password">
                <input type="password" name="password_2" placeholder="Confirm password">
            </div>
            <div class="error-email">
                @error('password')
                <p>{{$message}}</p>
                @enderror
                @error('password_2')
                <p>{{$message}}</p>
                @enderror
            </div>
            <p>People who use our service may have uploaded your contact information to 3ird.</p>
            <p>By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Data Policy</a> and <a href="#">Cookie Policy</a>.
                You may receive EMAIL notifications from us.</p>
            <div class="submit">
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <div class="account">
            <a href="/login">Already Have an account?</a>
        </div>
    </div>
</div>

</body>
<script src="{{ asset('js/register.js') }}"></script>
</html>




