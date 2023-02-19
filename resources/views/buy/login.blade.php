<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css">
    <link rel="icon" type="image/jpg" href="{{ asset('/images/logo/3ird.svg') }}">
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
                <div class="input">
                    <input type="text" name="email"  placeholder="3ird@example.com" value="{{old('email')}}" autocomplete="on">
                    @error('email')
                    <p>{{$message}}</p>
                    @enderror
                    @error('username')
                    <p>{{ $message}}</p>
                    @enderror
                </div>

                <div class="input" style="position: relative">
                    <input type="password" name="password" id="pwd" placeholder="Password" value="{{ old('password') }}">
                    <div class="hide">
                        <input type="checkbox" onclick="showPassword()" title="show password">
                    </div>
                    @error('password')
                    <p>{{$message}}</p>
                    @enderror
                </div>

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