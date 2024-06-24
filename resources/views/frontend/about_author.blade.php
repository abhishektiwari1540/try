@extends('frontend.layouts.master')
@section('content')


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            {{-- <img src="{{ $about_author->image}}" alt=""> --}}

            <h1 class="page-title">{{$about_author->title}}, {{$about_author->sub_title}}</h1>
            <div class="subTitle fs-02">{{$about_author->short_description}}</div>
            <p>{!!$about_author->body!!}
            </p>




        </div>
    </section>

@stop
