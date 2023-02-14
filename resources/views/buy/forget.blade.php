<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="{{ asset('/images/logo/3ird.svg') }}">
    <title>3ird</title>
</head>
<body class="d-flex" style="background: hsl(257, 40%, 49%)">

<form method="post" action="/buy/forgot-password" class="mx-auto mt-5">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="Enter email..." aria-describedby="emailHelp">
       @error('email')
        <div id="emailHelp" class="form-text mb-3">
            {{ $message }}
        </div>
        <a href="/login" class="mx-auto text-decoration-none">You can create account,if you don't have  any?</a>
        @enderror
        @if(session('status'))
            <div id="emailHelp" class="form-text">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>