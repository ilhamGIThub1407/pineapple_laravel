@extends('layouts.main')
@section('container')

<section class="gadget-section">
    <div class="gadget-vid">
        <video loop autoplay muted plays-inline class="gadget-video">
            <source src="{{ asset('videos/blackpink.mp4') }}" type="video/mp4">
        </video>

        <div class="gadget-info">
            <h1>NEW RELEASE</h1>
            <p>Samsung Galaxy Blackpink Ver.</p>
            <button>Pre Order Now</button>
        </div>

        <h1 class="samsung-text">Long Lasting Battery Life</h1>
        <div class="next-btn">
            OTHER ITEM
        </div>
    </div>
</section>

<section id="about" class="about-section">
    <p>WELCOME to PineApple</p>

    <h1>" Think the Same, Conform Completely "</h1>

    <div class="image-box autoTakeFull">
        <img src="{{ asset('images/banner/blackpink1.jpeg') }}" alt="about-img">
    </div>

    <h4>Blackpink Edition is about the fans</h4>
    <h5>For a limited time, Blackpink fans can get their hands on the exclusive Galaxy Blackpink Edition. From the pink-on-black motif to a seamless integrated UX, the girls co-designed this edition for the fans from the inside out. Now is your chance to rock. Blackpink's signature pink in a whole new way.</h5>
</section>

<section class="info-section">
    <h3>Store. The best way to buy the products you love.</h3>
    <p>The latest. Take a look at what's new, right now.</p>

    <div class="info-cards autoDisplay">
        @foreach($products as $product)
            <div class="card autoDisplay">
                <h1>{{ $product->product_name }}</h1>
                <p>{{ $product->product_description }}</p>

                <video src="{{ asset($product->product_video) }}" autoplay loop muted plays-inline></video>
                <button>Details</button>
            </div>
        @endforeach
    </div>
</section>

<section class="contact-section">
    <p>Join PineApple</p>
    <h1>One account. Any device. Just for you.</h1>
    <button>LOGIN / SIGN-UP</button>
    <img class="img1" src="{{ asset('images/products/lisa_home.png') }}" alt="contact-img">
    <img class="img2" src="{{ asset('images/products/blackpink_home.png') }}" alt="contact-img">
    <img class="img3" src="{{ asset('images/products/samsung_home.png') }}" alt="contact-img">
</section>

@endsection