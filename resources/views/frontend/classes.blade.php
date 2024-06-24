@extends('frontend.layouts.master')
@section('content')


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 order-lg-2">
                    <h1 class="page-title">{{ $page_data['name']}}</h1>
                    <p>{!! $page_data['descriptions'] !!}</p>

                </div>

                <div class="col-lg-6 order-lg-1">
                    <figure class="srv-images">
                        <img src="{{ asset($page_data['image'])}}" alt="">
                    </figure>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    {!!  $page_data['short_description'] ?? '' !!}
                </div>
                <div class="col-md-12">

                </div>

                <div class="col-md-6">
                    <div class="class-block">
                        <div class="subTitle"> {{ $page_data['name_contact_us_frist']}}
                        </div>
                        <div class="cls-btn"><a href="{{ route('front.contact')}}" class="default-btn">Contact Us</a></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="class-block">
                        <div class="subTitle">{{ $page_data['name_contact_us_second']}}
                        </div>
                        <div class="cls-btn"><a href="{{ route('front.contact')}}" class="default-btn">Contact Us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
