@extends('frontend.layouts.master')
@section('content')


    <!-- Hero Section -->
    <section class="page-content privacy-page">
        <div class="container">

            <div class="float-image">
                <figure class="srv-images">
                    <img src="{{ asset($page_data['image']) }}" alt="">
                </figure>
            </div>
            <h1 class="page-title">{{ $page_data['page_name'] }}</h1>{!!$page_data['body']!!}Email :<a href="mailto:{{ $setting['email_address'] }}" style="text-decoration: underline;">{{ $setting['email_address'] }}</a><br>
            <form class="privacy-form" method="POST" id="contact_form" action="{{ route('front.contact') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row g-md-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label"> Name <span>*</span></label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            <div id="error_name" class="invalid-feedback text-danger"></div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Phone Number <span>*</span></label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" required
                                oninput="validateInput()">
                            <span id="error" class="error text-danger" style="display: none">Please enter a number with
                                10-12 digits.</span>
                                <div id="error_phone_number" class="invalid-feedback text-danger"></div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Email <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="email" required>
                            <div id="error_email" class="invalid-feedback text-danger"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Message" id="message" required></textarea>
                            {{-- <div id="message-error" class="text-danger"></div> --}}
                            <div id="error_message" class="invalid-feedback text-danger"></div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Terms & Conditions <span>*</span></label>
                                <div class="select_remendor_Block mt-2">
                                    <div class="custom_checkbox d-flex align-items-center">
                                        <input type="checkbox" name="terms_conditions" id="terms_conditions" required>
                                        <label for="terms_conditions" class="LoginForgotDis">I have read and agree to the Terms of
                                            service agreement.</label>

                                    </div>
                                    <div id="error_terms_conditions" class="invalid-feedback text-danger" style="display: flex"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="g-recaptcha-response" value="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}">
                    <button type="button" data-sitekey="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                        id="form_submit_btn" class="mt-3 g-recaptcha primary-btn default-btn">Accept</button>
            </form>

        </div>
    </section>


@stop

@section('front_js')


@stop
