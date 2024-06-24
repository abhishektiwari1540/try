@extends('frontend.layouts.master')
@section('content')


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 hide-cta-mobile">
                    <figure class="cta-image">
                        <img src="{{ asset($contact_page['image']) }}" alt="">
                    </figure>

                </div>

                <div class="col-lg-6">
                    <div class="cta-block">
                        <div class="contact-h">Let’s Connect</div>
                        <h2 class="section-heading">
                            {{ $contact_page['page_name'] }}
                        </h2>
                        <p>{!! $contact_page['body'] !!}
                        </p>
                        <p>Drop us an email at: <a
                                href="mailto:{{ Config('Contact.email_address') }}">{{ Config('Contact.email_address') }}</a><br>
                            or send us a message</p>
                        <form method="POST" id="contact_form" action="{{ route('front.contact') }}">
                            @csrf
                            <div class="form-floating form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                    required>
                                <label for="name">Name</label>
                                <div id="error_name" class="text-danger"></div>
                            </div>

                            <div class="form-floating form-group">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                    required>
                                <label for="email">Email address</label>
                                <div id="error_email" class="text-danger"></div>
                            </div>
                            <div class="form-floating form-group">
                                <input type="text" name="phone_number" class="form-control" id="phone_number"
                                    placeholder="Phone Number" oninput="validateInput()" required>
                                <label for="email">Phone Number</label>
                                <div id="error_phone_number" class="text-danger"></div>
                                <span id="error" class="error text-danger" style="display: none">Please enter a number
                                    with 10-12 digits.</span>
                            </div>

                            <div class="form-floating form-group">
                                <textarea name="message" class="form-control" placeholder="Message" id="message" required></textarea>
                                <label for="message">Message</label>
                                <div id="error_message" class="text-danger"></div>
                            </div>

                            <input type="hidden" name="g-recaptcha-response" value="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}">
                            <button type="button" data-sitekey="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}"
                                data-callback='onSubmit' id="form_submit_btn"
                                class="mt-3 g-recaptcha primary-btn default-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
