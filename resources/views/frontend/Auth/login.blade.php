
@extends('frontend.layouts.main')
@section('content')
{{-- @php
    // dd(Session::all());
    Session::put('lang_id', $request->language ?? 1);
    dd(Session::get('lang_id'))
@endphp --}}
    <!-- Form Section -->
    <section class="formSection loginform">
        <div class="fuild-container">
            <div class="row m-0 g-0">
                <div class="col-md-5 col-lg-6">
                    <div class="formSideImage ">
                        <img src="{{ asset('frontend/img/login-image.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-lg-6 onMobileBg">
                    <div class="formCard">
                        <div class="formHeader">
                            <p class="loginSubTitle">Welcome Back!</p>
                            <h1 class="formTitle">Sign In</h1>
                        </div>
                        <form class="formBlock" id="sign_up_form" method="post" action="{{ route('front.login_page')}}">
                            @csrf
                            <div class="inputIcon-group">
                                <span class="inputIcon">
                                    <img src="{{ asset('frontend/img/user-name.png')}}" alt="Input Icon">
                                </span>
                                <div class="form-floating form-group">
                                    <input type="text" name="user_name" class="form-control" id="username" placeholder="Enter User Name Or Email">
                                    <label for="username">Username/Email</label>
                                    <div id="error_user_name" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="inputIcon-group">
                                <span class="inputIcon">
                                    <img src="{{ asset('frontend/img/password.png')}}" alt="Input Icon">
                                </span>
                                <div class="form-floating form-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder=" ">
                                    <label for="password">Password</label>
                                    <div id="error_password" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form_buttonRow">
                                <button type="button" id="form_submit_btn" class="mt-3 primary-btn default-btn w-100 text-center">Sign In</button>
                            </div>
                        </form>
                        <div class="orDivider">
                            <span class="orDividerText">or Sign Up with</span>
                        </div>
                        <div class="signupWithSocial">
                            <a href="#!" class="signupSocialLink withFB"><img src="{{ asset('frontend/img/facebook.png')}}" alt="Icon"></a>
                            <a href="#!" class="signupSocialLink withGoogle"><img src="{{ asset('frontend/img/google.png')}}" alt="Icon"></a>
                            <a href="#!" class="signupSocialLink withTwitter"><img src="{{ asset('frontend/img/twitter.png')}}" alt="Icon"></a>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form Section -->
@stop
@section('front_js')
<script>
    function loaderShow() {
        $(".loader-wrapper").show();
    }

    function loaderHide() {
        $(".loader-wrapper").hide();
    }
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // function onSubmit(token) {
    //     if (token) {
    //         $('#form_submit_btn').trigger('click', {
    //             token: token
    //         });
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    $(document).ready(function() {
        $('#form_submit_btn').on('click', function(e, data) {
            $(".loader-wrapper").show();
            $(".loader-wrapper").show();
            $.ajax({
                url: $('#sign_up_form').attr('action'),
                type: 'POST',
                data: $('#sign_up_form').serialize(),
                success: function(response) {
                    $(".loader-wrapper").hide();
                    if (response.success) {
                        // toastr.success(response.success);
                        $('#sign_up_form')[0].reset();
                        $('#sign_up_form').find('.is-invalid').removeClass('is-invalid');
                        $('#sign_up_form').find('.text-danger').each(function() {
                            $(this).text('');
                        });
                        window.location.href = "{{ route('front.index') }}";
                    } else {
                        toastr.error(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    $('#sign_up_form').find('.text-danger').each(function() {
                        $(this).text('');
                    });
                    $(".loader-wrapper").hide();
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, html) {
                            $('#sign_up_form').find('input[name="' + index + '"]')
                                .addClass('is-invalid');
                            $('#sign_up_form').find('textarea[name="' + index + '"]')
                                .addClass('is-invalid');
                            $('#error_' + index).text(html);
                        });
                    } else {
                        toastr.error("An error occurred while submitting the form.");
                    }
                }
            });
        });
    });
</script>


@stop
