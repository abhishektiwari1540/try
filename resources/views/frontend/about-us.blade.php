@extends('frontend.layouts.master')
@section('content')

    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <div class="aboutUsContent">
                <p class="page-subtitle">{{ $about_page['title']}}</p>
                {!! $about_page['body'] !!}
                <a href="{{ $about_page['button_link'] }}" class="default-btn book-btn">{{ $about_page['button_title']}}</a>
            </div>


        </div>
    </section>
@stop
