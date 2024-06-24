@extends('frontend.layouts.master')
@section('content')


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <h1 class="page-title">{{ $details->name}}</h1>

            <div class="page-text">
                <p>{{ $details->short_description}}</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="service-content">
                        {!! $details->description !!}
                    </div>

                    <a href="{{ route('front.contact')}}" class="default-btn book-btn">Contact Us</a>
                </div>

                <div class="col-lg-6">
                    <figure class="srv-images">
                        <img src="{{ asset($details->image)}}" alt="">
                    </figure>
                </div>
            </div>


        </div>
    </section>
@stop
