@extends('frontend.layouts.main')
@section('content')

    <section class="formSection">
        <div class="fuild-container">
            <div class="row m-0 g-0">
                <div class="col-md-5 col-lg-6">
                    <div class="formSideImage ">
                        <img src="{{ asset('frontend/img/register-image.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-lg-6 onMobileBg">
                    <div class="formCard mw-100">

                        <div class="thanks-page">
                            <h1 class="thanks-title">
                               <div class="thanks-icon">
                                <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.252 11.5896C36.5878 10.3665 33.6235 9.68457 30.5 9.68457C18.902 9.68457 9.5 19.0866 9.5 30.6846C9.5 42.2825 18.902 51.6846 30.5 51.6846C42.098 51.6846 51.5 42.2825 51.5 30.6846C51.5 28.5553 51.1831 26.5 50.5939 24.5634" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
                                    <path d="M22.3623 29.3638L28.9301 35.9316L49.3998 15.4619" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                </div>
                                Thank You!
                            </h1>
                            <p class="thanksMsg">Your have successfully registered.</p>
                            <div class="loginbtn-block">
                                <a href="{{ route('front.login_page')}}" class="default-btn">
                                    Login Now
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form Section -->
@stop
