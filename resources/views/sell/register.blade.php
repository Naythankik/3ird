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
                    <form method="post" action="/sell" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">First Name</span>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('first_name')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror

                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Last Name</span>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('last_name')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('username')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon2">Email</span>
                            <input type="email" class="form-control" name="email" placeholder="Seller's Email" value="{{ old('email') }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        @error('email')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon2">Telephone</span>
                            <input type="tel" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="Seller's Telephone" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        @error('telephone')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <input type="file" class="form-control" name="profile" id="basic-url" aria-describedby="basic-addon3">
                        </div>

                        @error('profile')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <span class="input-group-text">Address</span>
                            <input type="text" name="address" placeholder="Enter address" value="{{ old('address') }}" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                        @error('age')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <span class="input-group-text">Date Of Birth</span>
                            <input type="date" name="age" placeholder="YYYY-MM-DD" value="{{ old('age') }}" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                        @error('age')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <span class="input-group-text">Password</span>
                            <input type="password" name="password"  class="form-control" placeholder="********" aria-label="Username">
                        </div>
                        @error('password')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2">
                            <span class="input-group-text">Confirm Password</span>
                            <input type="password" name="password_2" placeholder="********" class="form-control" aria-label="With textarea"></input>
                        </div>
                        @error('password_2')
                        <p class="alert alert-danger p-1">{{$message}}</p>
                        @enderror

                        <button class="btn btn-primary fw-bold text-dark fst-normal my-3"
                                type="submit">SUBMIT</button>
                    </form>
                    <a href="/sell/login" class="text-dark">Have an account?</a>
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


