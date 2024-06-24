@extends('frontend.layouts.master')
@section('content')



    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-6">
                    <h1 class="page-title">{{ $data['title']}}</h1>
                    {!! $data['body'] !!}
                </div>

                <div class="col-lg-6">
                    <figure class="srv-images">
                        <img src="{{ asset($data['image'])}}" alt="">
                    </figure>
                </div>
            </div>

            {!! $data['short_description'] !!}
                Email - <a href="mailto:{{ $setting['email_address'] }}">{{ $setting['email_address'] }}</a></p>

        </div>
    </section>

@stop
