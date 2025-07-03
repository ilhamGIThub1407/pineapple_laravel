@extends('layouts.main')
@section('container')
<section class="about__section" id="about">
    <div class="about__container container grid">
        <div class="about__data">
            <h2 class="section__title">
                {{ $page_detail->title }}
            </h2>

            <p class="about__description">
                {!! $page_detail->content !!}
            </p>
        </div>
        
        <img src="{{ $page_detail->image }}" alt="" class="about__img">
    </div>
</section>
@endsection