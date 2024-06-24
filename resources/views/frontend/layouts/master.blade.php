<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Yoga Meditation Plus:: {{ ucfirst(request()->segment(1) ?? 'home') }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('frontend/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('frontend/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('frontend/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('frontend/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('frontend/img/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap  v5.3.0  CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!--  Font-Awesome-5 CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
    <!-- Swiper 8.1.5 -->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <!-- Select2 4.1.0 CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Custom Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

</head>

<body>
    <!-- loader  -->
    <div class="loader-wrapper" style="display: none;">
        <div class="loader">
            <img src="{{ asset('frontend/img/logo.png') }}" alt="">
        </div>
    </div>
    <!-- Back to Top -->
    <div class="progress-wrap cursor-pointer">
        <svg class="arrowTop" width="16" height="16" viewBox="0 0 16 16" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M8.99996 15.9999H6.99996V3.99991L1.49996 9.49991L0.0799561 8.07991L7.99996 0.159912L15.92 8.07991L14.5 9.49991L8.99996 3.99991V15.9999Z"
                fill="black" />
        </svg>

        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    @if (request()->segment(1) === 'elements')
        @include('frontend.layouts.header2')
    @else
        @include('frontend.layouts.header')
    @endif



    @yield('content')
    @include('frontend.layouts.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- Bootstrap v5.3.0  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper 10.0.3 -->
    <script src="{{ asset('frontend/js/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script>
        //Sticky Sidebar
        var newWindowWidth = $(window).width();
        if (newWindowWidth >= 991) {
            $('.theia-sticky').theiaStickySidebar({
                //'containerSelector': '',
                'additionalMarginTop': 130,
            });
        }

        // Match Height
        $(function() {
            $(".swiper-slide").matchHeight();
        });


        var swiper = new Swiper(".tsm-swiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }

        });


        // Swiper
        var swiper = new Swiper(".grade_swipersilder", {
            spaceBetween: 30,
            //cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            mousewheel: true,
            //keyboard: true,
            breakpoints: {
                575: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },

                767: {
                    slidesPerView: 2,
                },

                991: {
                    slidesPerView: 3,
                },

                1200: {
                    slidesPerView: 3,

                },
            },
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#phone_number').on('input', function() {
                var inputField = $(this);
                var value = inputField.val().replace(/\D/g, '');
                if (value.length > 12) {
                    inputField.val(value.substring(0, 12));
                    $('#error').show();
                } else {
                    $('#error').hide();
                }
            }).on('keypress', function(event) {
                return (event.which >= 48 && event.which <= 57) || event.which === 8 || event.which === 46;
            });
        });
    </script>
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
        $(document).ready(function() {
            $('#language-select').change(function() {
                $(".loader-wrapper").show();
                $.ajax({
                    url: $('#language-form').attr('action'),
                    type: 'POST',
                    data: $('#language-form').serialize(),
                    success: function(response) {
                        $(".loader-wrapper").hide();
                        if (response.success) {
                            toastr.success(response.success);

                                location.reload();


                        } else {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#language-form').find('.text-danger').each(function() {
                            $(this).text('');
                        });
                        $(".loader-wrapper").hide();
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(index, html) {
                            });
                        } else {
                            toastr.error("An error occurred while submitting the form.");
                        }

                        return false;
                    }
                });
            });
        });
    </script>

    <script>
        function onSubmit(token) {
            if (token) {
                $('#form_submit_btn').trigger('click', {
                    token: token
                });
                return true;
            } else {
                return false;
            }
        }
        $(document).ready(function() {
            $('#form_submit_btn').on('click', function(e, data) {

                if (!data || !data.token) {
                    e.preventDefault();
                    return false;
                }
                $(".loader-wrapper").show();
                $.ajax({
                    url: $('#contact_form').attr('action'),
                    type: 'POST',
                    data: $('#contact_form').serialize(),
                    success: function(response) {
                        $(".loader-wrapper").hide();
                        if (response.success) {
                            toastr.success(response.success);
                            $('#contact_form')[0].reset();
                            $('#contact_form').find('.is-invalid').removeClass('is-invalid');
                            $('#contact_form').find('.text-danger').each(function() {
                                $(this).text('');
                            });

                        } else {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#contact_form').find('.text-danger').each(function() {
                            $(this).text('');
                        });
                        $(".loader-wrapper").hide();
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(index, html) {
                                $('#contact_form').find('input[name="' + index + '"]')
                                    .addClass(
                                        'is-invalid');
                                $('#contact_form').find('textarea[name="' + index +
                                        '"]')
                                    .addClass('is-invalid');
                                $('#error_' + index).text(html);
                            });
                        } else {
                            toastr.error("An error occurred while submitting the form.");
                        }

                        return false;
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#check1').change(function() {
                if ($(this).is(':checked')) {
                    $('#terms_conditions').val('1');
                } else {
                    $('#terms_conditions').val('0');
                }
            });
        });
    </script>
    @if(Session::has('message_login'))
    <script>
        $(document).ready(function() {
            toastr.success('{{ Session::get('message_login') }}');
            setTimeout(function() {
                @php
                Session::forget('message_login');
                @endphp
            }, 6000);
        });
    </script>
    @if(Session::has('success'))
    <script>
        $(document).ready(function() {
            toastr.success('{{ Session::get('success') }}');
            setTimeout(function() {
                @php
                    Session::forget('success');
                @endphp
            }, 5000);
        });
    </script>
@endif



@endif

    @yield('front_js')
</body>

</html>
