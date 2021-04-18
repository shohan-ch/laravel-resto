<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-phone"></i> +1 5589 55488 55
            <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sat: 11:00
                AM - 23:00 PM</span>
        </div>
        <div class="languages">
            <ul>
                {{-- <li>En</li>
                <li><a href="#">De</a></li> --}}
                <li>
                    <a href="{{ route('cart.index') }}">
                        <span style="font-size: 19px;"> Cart</span>
                        <i class="icofont-shopping-cart" style="font-size: 22px;"></i>
                        @if( Cart::instance('default')->count()>0)
                        <span class="badge badge-light">{{ Cart::instance('default')->count() }}</span>
                        @endif
                    </a>

                </li>
                <li><a href="{{ route('login') }}"><i class="icofont-ui-user"></i> Login</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="/">Restaurantly</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#specials">Specials</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#chefs">Chefs</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li>
                <li>

                    <div class="searchbar d-flex justify-content-between">
                        <input class="search_input" type="text" name="" placeholder="Search...">
                        <a href="#" class="search_icon"><i class="icofont-search-1"></i></a>
                    </div>

                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->