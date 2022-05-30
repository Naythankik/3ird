<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css">
    <link rel="shortcut icon" type="imaage/jpg" href="{{ Storage::url('public/logo/3ird.jpg') }}">
    <title>3ird</title>
</head>

<body>

        @if(session('status'))
            <p id="welcome">{{ session('status') }}!</p>
        @endif
<div class="body">
    <div class="header">
        <h3>3ird Corporation.</h3>
        <h4>3ird helps you connect with buyers and sellers in Nigeria.</h4>
    </div>
    <div class="contents">
        <div class="login">
            <form method="post" action="/login">
                @csrf
                <input type="text" name="email"  placeholder="3ird@example.com" value="{{old('email')}}" autocomplete="on">
                @error('email')
                <p>{{$message}}</p><br>
                @enderror
                @error('username')
                <p>{{ $message}}</p><br>
                @enderror
                <input type="password" name="password" id="pwd" placeholder="Password" value="{{ old('password') }}">
{{--                <input type="checkbox" onclick="showPassword()" title="show password" style="position: absolute;width: 2%; background: red; top: 220px;right: 208px">--}}
                @error('password')
                <p>{{$message}}</p><br>
                @enderror
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="hr">
            <a href="/buy/forgot-password">Forgotten password?</a>
        </div>
        <hr />
        <div class="register">
            <a href="/buy/create">Create New Account</a>
        </div>
        <div class="seller">
            <a href="/sell/create">Create an account </a>for selling
        </div>
    </div>
</div>
</body>

<script src="{{ asset('js/index.js') }}"></script>



</html>