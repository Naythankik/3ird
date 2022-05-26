<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/seller.css') }}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>3ird</title>
</head>

<body class="bg-info">

<center>
    <div class="p-3 m-3">
        <h3 class="ms-3 mt-5 text-warning fw-bold">SIGN UP</h3>
        <form method="post" action="/sell" enctype="multipart/form-data">

            @csrf
            <div class="input-group mb-2 w-50">
                <span class="input-group-text" id="basic-addon1">First Name</span>
                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{old('first_name')}}" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            @error('first_name')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror

            <div class="input-group mb-2 w-50">
                <span class="input-group-text" id="basic-addon1">Last Name</span>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            @error('last_name')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <span class="input-group-text" id="basic-addon1">Username</span>
                <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            @error('username')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <span class="input-group-text" id="basic-addon2">Email</span>
                <input type="text" class="form-control" name="email" placeholder="Seller's Email" value="{{old('email')}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            @error('email')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <span class="input-group-text" id="basic-addon2">Telephone</span>
                <input type="text" class="form-control" name="telephone" value="{{old('telephone')}}" placeholder="Seller's Telephone" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            @error('telephone')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <input type="file" class="form-control" name="profile" id="basic-url" aria-describedby="basic-addon3">
            </div>

            @error('profile')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <span class="input-group-text">Address</span>
                <input type="text" name="address" placeholder="Enter address" value="{{old('age')}}" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
            @error('age')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <span class="input-group-text">Date Of Birth</span>
                <input type="text" name="age" placeholder="YYYY-MM-DD" value="{{old('age')}}" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
            @error('age')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <span class="input-group-text">Password</span>
                <input type="password" name="password"  class="form-control" placeholder="********" aria-label="Username">
            </div>
            @error('password')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <div class="input-group mb-2 w-50">
                <span class="input-group-text">Confirm Password</span>
                <input type="password" name="password_2" placeholder="********" class="form-control" aria-label="With textarea"></input>
            </div>
            @error('password_2')
            <p class="alert alert-danger w-50 p-1">{{$message}}</p>
            @enderror


            <button class="btn btn-primary fw-bold text-dark fst-normal mt-4" type="submit">SUBMIT</button>
        </form>
    </div>
    <a href="/sell/login" class="text-decoration-none text-dark">have an account?</a>
    <a href="/" class="text-decoration-none text-light">Do you want to buy?</a>
</center>

</body>
</html>