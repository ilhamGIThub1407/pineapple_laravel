<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pineapple Website</title>
    <link rel="stylesheet" href="{{ asset('css/style.css?load_time='.date('Y-m-d H:i:s')) }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @if($current_page != 'login')
        <div class="container">
            <header>
                <div class="head-left">
                    <img src="{{ asset('images/pineapple_Grey.png') }}" alt="logo">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>

                <div class="head-right">

                    @if($navigations)
                        @foreach($navigations as $navigation)
                            <p><a href="">{{ $navigation->name }}</a></p>
                        @endforeach
                    @endif    

                    
                    <!-- <p><a href="">About</a></p>
                    <p><a href="">Products</a></p>
                    <p><a href="">Blogs</a></p>
                    <p><a href="">Order</a></p>
                    <p><a href="">Login</a></p> -->

                </div>

                @if(session('isLoggedIn'))
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expand="false">
                            {{ session('user_name') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:avoid(0); " class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                                    Logout
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif


            </header>
        </div>
    @endif

    @yield('container')

    @if($current_page != 'login')
    <section class="footer">
        <p> &copy; PineApple 2025 . All Rights Reserved </p>
        <ul>
            <li><a href=""><img src="{{ asset('images/icons/instagram.png') }}" alt="contact-img"></a></li>
            <li><a href=""><img src="{{ asset('images/icons/meta.png') }}" alt="contact-img"></a></li>
            <li><a href=""><img src="{{ asset('images/icons/tiktok.png') }}" alt="contact-img"></a></li>
            <li><a href=""><img src="{{ asset('images/icons/youtube.png') }}" alt="contact-img"></a></li>
        </ul>
        <p>Privacy Policy</p>
    </section>
    @endif

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @if($javascript_file)
    <script src="{{ asset('js/'.$javascript_file) }}"></script>
    @endif
</body>

</html>