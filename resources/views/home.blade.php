<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>


    <link rel="stylesheet" href="{{ asset('/css/home.css') }}" type="text/css">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('/images/logo/3ird.svg') }}">
    <title>3ird</title>
    <style>
        .attribution {
            font-size: 11px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .attribution a {
            color: hsl(228, 45%, 44%);
        }
    </style>
</head>
<body class="">

<div class="container">
    <section class="child-container">
        <div class="logo-container">
            <img src="{{ asset('/images/home/logo.svg') }}" alt="Huddle" />
        </div>
        <div class="details-container">
            <div class="image-mockup">
                <img src="{{ asset('/images/home/illustration-mockups.svg') }}" alt="mockup" />
            </div>
            <article>
                <h2>We Are Building A Community Fans Will Love</h2>
                <p>
                    3ird re-imagines the way we build communities. You have a voice,
                    but so does your audience. Create connections with your users as
                    you engage in genuine discussion.
                </p>
                <a href="/buy/create">Register</a>
            </article>
        </div>
        <div class="menu-container">
            <a href="#"><img src="{{ asset('/images/home/facebook.svg') }}" alt="facebook" /></a>
            <a href="#"><img src="{{ asset('/images/home/twitter.svg') }}" alt="twitter" /></a>
            <a href="#"><img src="{{ asset('/images/home/instagram.svg') }}" alt="instagram" /></a>
        </div>
    </section>
</div>
<footer>
    <p class="attribution">
        Challenge by
        <a href="https://www.frontendmentor.io?ref=challenge" target="_blank"
        >Frontend Mentor</a
        >. Coded by
        <a href="https://github.com/Naythankik" target="_blank"
        >Nathaniel Abolarin</a
        >.
    </p>
</footer>
<script src="{{ asset('js/sell.js') }}"></script>
</body>
</html>







