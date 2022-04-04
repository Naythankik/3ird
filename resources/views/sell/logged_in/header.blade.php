<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/sell">
            <img src="{{ Storage::url('public/logo/3ird.jpg') }}" style="width: 70px; border-radius: 5px;" alt="No Image">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="products/create">Post a Products</a></li>
                        <li><a class="dropdown-item" href="/products">Check Store</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">View Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex w-50">
                <input class="form-control me-2" type="search" placeholder="Search products, brands and categories..." aria-label="Search">
                <button class="me-3 btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="/sell/logout" class="ms-2 btn btn-outline-danger">Logout</a>
        </div>
    </div>
</nav>
