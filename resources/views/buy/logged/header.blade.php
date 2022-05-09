<nav class="mt-2 py-1 navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/buy">
            <img src="{{ Storage::url('public/logo/3ird.jpg') }}" style="width: 70px; border-radius: 5px;" alt="No Image">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @if(auth()->check())
                        @php
                            $count = DB::table('carts')->where('users_id',auth()->id())->count();
                        @endphp
                        <a href="/buy/cart" class="btn btn-primary position-relative mx-3">Cart
                            @if($count == 0)

                            @elseif($count > 9)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                        9<sup>+</sup>
                                    </span>
                            @else
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                        {{$count}}
                                    </span>
                            @endif
                            @endif
                        </a>
                </li>
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="/buy/category/automobile">Automobiles</a></li>
                            <li><a class="dropdown-item" href="/buy/category/sporting_goods">Sporting Goods</a></li>
                            <li><a class="dropdown-item" href="/buy/category/supermarket">Supermarket</a></li>
                            <li><a class="dropdown-item" href="/buy/category/health_&_beauty">Health & Beauty</a></li>
                            <li><a class="dropdown-item" href="/buy/category/home_&_office">Home & Office</a></li>
                            <li><a class="dropdown-item" href="/buy/category/phones_&_tablets">Phones & Tablets</a></li>
                            <li><a class="dropdown-item" href="/buy/category/computing">Computing</a></li>
                            <li><a class="dropdown-item" href="/buy/category/electronics">Electronics</a></li>
                            <li><a class="dropdown-item" href="/buy/category/fashion">Fashion</a></li>
                            <li><a class="dropdown-item" href="/buy/category/baby_products">Baby Products</a></li>
                            <li><a class="dropdown-item" href="/buy/category/goods">Goods</a></li>
                            <li><a class="dropdown-item" href="/buy/category/gaming">Gaming</a></li>
                            <li><a class="dropdown-item" href="/buy/category/others">Others</a></li>
                        </ul>
                    </div>
                </div>
                <li class="nav-item">
                    @if(auth()->check())
                        @php
                            $count = DB::table('wish_lists')->where('users_id',auth()->id())->count();
                        @endphp
                        <a href="/buy/list" class="btn btn-primary position-relative mx-3">WishList
                            @if($count == 0)

                            @elseif($count > 9)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                        9<sup>+</sup>
                                    </span>
                            @else
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                        {{$count}}
                                    </span>
                            @endif
                            @endif
                        </a>
                </li>
            </ul>
            <form class="d-flex w-50" method="GET" action="/buy/search">
                <input class="form-control me-2" name="q" type="search" placeholder="Search brands, category and products...." aria-label="Search">
                <button class="btn btn-outline-primary me-3" type="submit">Search</button>
            </form>
            <div class="dropdown">
                <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Hi,  {{ auth()->user()->username }}
                </button>
                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/buy/{{ auth()->id() }}/edit">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="/buy/{{ auth()->id() }}/profile">View profile</a></li>
                    <li><a class="dropdown-item" href="/buy/orders/{{auth()->id()}}"> Orders</a></li>
                    <li><a class="dropdown-item" href="">Contact Us</a></li>
                </ul>
            </div>
            <a href="/buy/logout" title="Do you want to log out?" class="ms-2 btn btn-outline-danger">Logout</a>
        </div>
    </div>
</nav>