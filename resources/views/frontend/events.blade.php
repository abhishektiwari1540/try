


@extends('frontend.layouts.master')
@section('content')
  <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <h1 class="page-title">{{ $Events_page['title'] }}</h1>

            <div class="page-text">
                <p>{!! $Events_page['body'] !!}</p>
            </div>
            <div class="service-section">
                <div class="row g-lg-5">
                    @forelse ($frontlist as $data)
                    <div class="col-md-4 col-sm-6 col-6">
                        <a href="events/{{ $data->slug }}" class="srv-block">
                            <div class="srv-image">
                                <img src="{{ asset($data->image)}}" alt="">
                            </div>
                            <h4 class="srv-title">{{$data->name}}</h4>
                        </a>
                    </div>
                    @empty

                    @endforelse



                </div>
            </div>
            <!--  service-section END-->


        </div>
    </section>


@stop
