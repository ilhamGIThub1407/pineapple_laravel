<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pineapple Website</title>
    <link rel="stylesheet" href="{{ asset('css/style.css?load_time='.date('Y-m-d H:i:s')) }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
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
                    <p><a href="">Home</a></p>
                    <p><a href="">About</a></p>
                    <p><a href="">Products</a></p>
                    <p><a href="">Blogs</a></p>
                    <p><a href="">Order</a></p>
                </div>
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

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>