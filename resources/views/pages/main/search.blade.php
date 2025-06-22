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
                        <button>Details</button>
                    </div>
                @endforeach
            </div>
            @else
            <div.alert class="alert alert-info">
                Data Not Found
            </div>
            @endif
        </div> 
    </div>
</main>
@endsection