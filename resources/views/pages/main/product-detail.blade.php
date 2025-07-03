@extends('layouts.main')
@section('container')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $detail->product_name }}</h1>
                <p>Discover everything you need to know about your favorite gadget in one place. On this page, you'll find detailed information about the product — including its name, key features, and a hands-on video demonstration to help you make a confident decision.

                    We provide real visuals and complete descriptions so you can experience the product before making a purchase. Whether you're a tech enthusiast or a first-time buyer, this page is designed to give you the clarity and assurance you need.

                    Scroll through the product details, explore other items on the list, and enjoy a closer look at the latest innovations in technology.
                </p>
            </div>
        </div>
    </div>
</div>

<main class="content">
    <div class="container">
        <div class="row page-content">
            <div class="col-lg-2">
                <ul class="list-group list-group-flush">
                    @foreach($products as $product)
                    <li class="list-group-item">
                        <a href="{{ url('products/'.$product->id) }}">{{ $product->product_name }}</a>

                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-10 text-start">
                <video
                    src="{{ asset($detail->product_video) }}"
                    class="w-100 mb-4 rounded"
                    controls
                    preload="auto"
                    style="max-height: 500px; object-fit: cover;">
                    Your browser does not support the video tag.
                </video>

                {!! $detail->product_description !!}
            </div>
        </div>
    </div>
</main>

@endsection