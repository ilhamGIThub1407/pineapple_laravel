@extends('layouts.main')
@section('container')

<section class="section featured" aria-label="featured post">
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
</section>
@endsection