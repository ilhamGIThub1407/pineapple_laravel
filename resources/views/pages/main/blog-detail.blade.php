@extends('layouts.main')
@section('container')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $detail->title }}</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, accusamus quos nihil ipsum odit provident laborum ratione animi sunt deleniti!</p>
            </div>
        </div>
    </div>
</div>
<main class="content">
    <div class="container">
        <div class="row page-content">
            <div class="col-lg-2">
                <ul class="list-group list-group-flush">
                    @foreach($blogs as $blog)
                        <li class="list-group-item">
                            <a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-10 text-start">
                <img src="{{ asset($detail->image) }}" alt="{{ $detail->title }}" class="img-fluid mb-4">
                {!! $detail->content !!}
            </div>
        </div>
    </div>
</main>
@endsection