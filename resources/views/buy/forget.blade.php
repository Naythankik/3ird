<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forget.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="{{ asset('/images/logo/3ird.svg') }}">
    <title>3ird</title>
</head>
<body style="background: hsl(257, 40%, 49%)">

<!-- The Header of the page -->
<header>
    <div class="logo-image">
        <img src="{{ asset('./images/logo/3ird.svg') }}" alt="3ird" />
    </div>
    <nav class="header-nav">
        <a href="/buy/create" class="nav-links">Register</a>
        <a href="/buy/login" class="nav-links">Login</a>
        <a href="" class="nav-links">Contact</a>
    </nav>
    <button type="submit">Sell Products</button>
    <button type="submit" id="menu" onclick="hamburger(this)">
        <img src="{{ asset('./images/logo/icon-hamburger.svg') }}" alt="menu" class="menu" />
        <img src="{{ asset('./images/logo/icon-close.svg') }}" alt="close" class="close" hidden />
    </button>
</header>

<!-- The main content of the page -->
<main>
    <section class="top-section">
        <div class="top-left-section">
            <h1>3ird Corporation</h1>
            <p>
                3ird re-imagines the way we build communities. You have a voice, but so does your audience. Create connections with your users as you engage in genuine discussion.
            </p>
        </div>
        <div class="top-right-section">
            <form method="post" action="/buy/forgot-password" class="mx-auto mt-5">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">
                        Please enter your email address or mobile number to search for your account.
                    </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="Enter email..." aria-describedby="emailHelp">
                    @error('email')
                    <div id="emailHelp" class="form-text mb-3">
                        {{ $message }}
                    </div>
                    <a href="/login" class="mx-auto text-decoration-none">
                        You can create account,if you don't have  any?
                    </a>
                    @enderror

                    @if(session('status'))
                        <div id="emailHelp" class="form-text">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </section>
</main>

<script src="{{ asset('js/forget.js') }}"></script>
</body>
</html>