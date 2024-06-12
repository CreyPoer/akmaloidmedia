<nav class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm navbar-default navbar-mobile navbar-scrolled container-fluid">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa-regular fa-newspaper me-2"></i>
            <strong>AKMALOID</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-expanded="false" aria-controls="navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
                <div class="row">
                </div>
            </div>
            <ul class="navbar-nav ms-auto fw-bold">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#Product">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#About">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#Service">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#Contact">Contact</a>
                </li>
            </ul>
            <hr>
            @guest
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="/register"><i class="fa-solid fa-user-plus me-1 fa-sm"></i><strong>DAFTAR</strong></a>
                </li>
                <li class="nav-item">
                    <div class="dropdown-center">
                        <a class="nav-link mx-2 text-uppercase" href="/login"><i class="fa-solid fa-door-open me-1 fa-sm"></i>
                            <strong style="color:#fff3cd" class="log">LOGIN</strong></a>
                    </div>
                </li>
            </ul>
            @endguest
            @auth
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-black" href="{{ route('show.cart' , Auth::user()->id) }}">
                    @if ($isicart == 0)
                        <i class="fa-solid fa-cart-shopping me-1 fa-lg"></i><strong>Cart</strong>
                    @else
                        <i class="fa-solid fa-cart-shopping me-1 fa-lg"></i><strong>Cart</strong>
                        <span class="badge bg-danger top-0 start-100 translate-middle ms-1">{{ $isicart }}</span>
                    @endif
                    </a>
                </li>
                <li class="nav-item">
                    <div class="dropdown-center">
                        <a class="nav-link mx-2 text-uppercase dropdown-toggle text-black" data-bs-toggle="dropdown"
                            aria-expanded="false" href="#"><i class="fa-solid fa-circle-user me-1 fa-lg"></i>
                            <strong style="color:#fff3cd" class="log">{{ $name }}</strong></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-uppercase" href="{{ route('pelanggan.profile',Auth::user()->id) }}"><strong>My Profile</strong></a></li>
                            <hr>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-dark dropdown-item text-uppercase btn-sm"><strong>Logout</strong></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>

