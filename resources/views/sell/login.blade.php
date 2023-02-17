<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/seller.css') }}" type="text/css">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('/images/logo/3ird.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
    <title>3ird</title>
</head>

<body style="background: hsl(257, 40%, 49%)">

<div class="parent-container">
    <!-- navigation bar  -->
    <nav>
        <a href="/sell/create" class="logo-image">
            <img src="{{ asset('/images/logo/3ird.svg') }}" alt="3ird" />
        </a>
        <div class="nav-menu">
            <a href="#">Features</a>
            <a href="/login">Buy</a>
            <a href="/sell/login">Sign In</a>
        </div>
    </nav>

    <!-- body contents -->
    <section>
        <div class="containers">
            <div class="top-container">
                <div class="top-left-container">
                    <h1>Register as a seller on 3ird to reach out to your clients faster.</h1>
                    <p>
                        3ird stores your most important products in one secure location.
                        Access them wherever you need, share and collaborate with friends,
                        family, and co-workers.
                    </p>
                </div>
                <div class="top-right-container">
                    <form method="post" action="/sell/login" class="p-4 m-3">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleDropdownFormEmail1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleDropdownFormEmail1" placeholder="3ird@example.com" value="{{old('username')}}">
                        </div>
                        @error('username')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror
                        @if(session('username'))
                            <p class="alert alert-danger p-1">{{session('username')}}</p>
                        @endif
                        <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="****" value="{{ old('password') }}">
                        </div>
                        @error('password')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror
                        @if(session('password'))
                            <p class="alert alert-danger p-1">{{session('password')}}</p>
                        @endif
                        <button type="submit" class="btn btn-primary mt-3">Sign in</button>



                    </form>
                    <a href="/sell/create" class="text-dark">Create account?</a>
                </div>
            </div>
        </div>
    </section>

    <div class="ref">
        <a href="/" class="text-light">Do you want to buy?</a>
    </div>

</div>

<script src="https://kit.fontawesome.com/b98f00e78a.js" crossorigin="anonymous"></script>

</body>
</html>


