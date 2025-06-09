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

<section class="order">
    <div class="container">
        <h2 class="mt-4 mb-4">Order a Gadget</h2>

        <form id="order-form" class="order-form">
            <p>
                Please fill out the form below to place your order. <br>
                Our admin will contact you for confirmation and payment.
            </p>

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <textarea name="address" class="form-control" id="address" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="gadget" class="form-label">Select a Gadget</label>
                <select class="form-control" id="gadget" name="gadget" required>
                    <option value="" disabled selected>-- Choose a gadget --</option>

                    <optgroup label="Laptops">
                        <option value="macbook_air_m2">MacBook Air M2</option>
                        <option value="macbook_pro_m3">MacBook Pro M3</option>
                        <option value="asus_rog_strix">ASUS ROG Strix</option>
                        <option value="lenovo_ideapad">Lenovo IdeaPad</option>
                        <option value="acer_nitro5">Acer Nitro 5</option>
                    </optgroup>

                    <optgroup label="Smartphones">
                        <option value="samsung_galaxy_A80">Samsung Galaxy A80</option>
                        <option value="iphone_14_pro">iPhone 14 Pro</option>
                        <option value="iphone_15_pro">iPhone 15 Pro</option>
                        <option value="galaxy_x_BTS">Galaxy x BTS La Parfumerie</option>
                        <option value="samsung_galaxy_A">Samsung Galaxy A</option>
                    </optgroup>

                    <optgroup label="Tablets">
                        <option value="ipad_air_5">iPad Air 5</option>
                        <option value="samsung_tab_s9">Samsung Galaxy Tab S9</option>
                        <option value="xiaomi_pad6">Xiaomi Pad 6</option>
                    </optgroup>

                    <optgroup label="Accessories">
                        <option value="airpods_pro_2">AirPods Pro 2</option>
                        <option value="logitech_mouse">Logitech MX Master 3S</option>
                        <option value="anker_powerbank">Anker Powerbank 20000mAh</option>
                    </optgroup>
                </select>
            </div>

            <div class="mb-3">
                <label for="order_detail" class="form-label">Additional Notes or Request</label>
                <textarea name="order_detail" id="order_detail" class="form-control" rows="4" placeholder="Write any specific color, model, or delivery instruction here..."></textarea>
            </div>

            <div class="mb-3 text-center">
                <input id="submit" type="submit" name="submit" value="Submit Order" class="btn btn-primary">
            </div>
        </form>
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