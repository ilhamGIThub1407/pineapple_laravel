@extends('layouts.main')
@section('container')
<main class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Search Results</h1>
            </div>

            @if($products->count() > 0)
            <div class="info-cards autoDisplay">
                @foreach($products as $product)
                <div class="card autoDisplay">
                    <h1>{{ $product->product_name }}</h1>
                    <p>{{ $product->product_description }}</p>

                    <video src="{{ asset($product->product_video) }}" autoplay loop muted plays-inline></video>
                    <a href="{{ url('products/'.$product->id) }}">
                        <button>Details</button>
                    </a>

                </div>
                @endforeach
            </div>
            @else
            <div.alert class="alert alert-info">
                Data Not Found
        </div>
        @endif

        @if($blogs->count() > 0)
        <div class="container">
            <p class="section-subtitle">
                Get started with our <strong class="strong">best stories</strong>
            </p>

            <ul class="has-scrollbar">
                @foreach($blogs as $blog)
                <li class="scrollbar-item">
                    <div class="blog-card">

                        <figure class="card-banner img-holder" style="--width: 500; --height: 600;">
                            <img src="{{ asset($blog->image) }}" width="500" height="600" loading="lazy"
                                alt="{{ $blog->title }}" class="img-cover">
                        </figure>

                        <div class="card-content">
                            <h3 class="h4">
                                <a href="{{ url('blog/'.$blog->slug) }}" class="card-title hover:underline">
                                    {{ $blog->title }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    </div>
</main>
@endsection