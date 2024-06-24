<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route('front.index')}}">
                        <img src="{{ asset('frontend/img/logo.png')}}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="overlay" style="display:none"></div>
                    <div class="collapse navbar-collapse">
                        <button class="navbar-toggler menuClose-icon" type="button">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.4 14L0 12.6L5.6 7L0 1.4L1.4 0L7 5.6L12.6 0L14 1.4L8.4 7L14 12.6L12.6 14L7 8.4L1.4 14Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('front.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">Exchange</a>
                            </li>
                            <li class="nav-item dropdown">
                              
                                <a class="nav-link " href="https://www.google.co.in/">
                                    About Us
                                </a>
                                <button class="dropdown-toggle mobiledrop" data-bs-toggle="dropdown">
                                    <i class="far fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
                                    <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
                                    <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">Support</a>
                            </li>
                        </ul>


                        <div class="extra_nav">
                            <ul class="navbar-nav ms-auto">

                                <li class="nav-item langugae_filter currency-filter for_desktop">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle nav-link dropdown-toggle lang_drop"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="flag_ico"><img src="{{ asset('frontend/img/dollar.png')}}" alt=""></span> USD
                                            <i class="far fa-chevron-down"></i>
                                        </button>

                                        <ul class="dropdown-menu lang_dropdown">
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/dollar.png')}}" alt="">
                                                    </span> USD</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/JPY.png')}}" alt="">
                                                    </span> JPY
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/CHY.png')}}" alt="">
                                                    </span> CHY
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/Peso.png')}}" alt="">
                                                    </span> PESO
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link header_border_btn" href="{{ route('front.login')}}">Log in</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link header_filled_btn" href="{{ route('front.register')}}">Sign up</a>
                                </li>


                                <li class="nav-item langugae_filter for_desktop">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle nav-link dropdown-toggle lang_drop"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="flag_ico"><img src="{{ asset('frontend/img/en_flag.png')}}" alt=""></span> English
                                            <i class="far fa-chevron-down"></i>
                                        </button>
                                        <ul class="dropdown-menu lang_dropdown">
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/en_flag.png')}}" alt="">
                                                    </span> English</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/japanese.png')}}" alt="">
                                                    </span> Japanese
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/Chinese.png')}}" alt="">
                                                    </span> Chinese
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                    <span class="flag_ico">
                                                        <img src="{{ asset('frontend/img/Spanish.png')}}" alt="">
                                                    </span> Spanish
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- For Mobile -->
                    <div class="extra_nav for_mobile">
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item langugae_filter">
                                <div class="dropdown">
                                    <button class="dropdown-toggle nav-link dropdown-toggle lang_drop" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="flag_ico"><img src="{{ asset('frontend/img/en_flag.png')}}" alt=""></span> En
                                        <i class="far fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu lang_dropdown">
                                        <li>
                                            <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                <span class="flag_ico">
                                                    <img src="{{ asset('frontend/img/en_flag.png')}}" alt="">
                                                </span> En</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                <span class="flag_ico">
                                                    <img src="{{ asset('frontend/img/japanese.png')}}" alt="">
                                                </span> Ja
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                <span class="flag_ico">
                                                    <img src="{{ asset('frontend/img/Chinese.png')}}" alt="">
                                                </span> Ch
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item lang_country" href="javascript:void(0)">
                                                <span class="flag_ico">
                                                    <img src="{{ asset('frontend/img/Spanish.png')}}" alt="">
                                                </span> Sp
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <!--  ======= User DropDown =========  -->
                    <div class="nav-item dropdown user_dropdown">

                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="user-drop" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('frontend/img/user.png')}}" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="user-drop">
                            <div class="user_info">
                                <div class="user_name">
                                    <div>Alex Willson</div>
                                    <div class="user_email">
                                        <small>alexwillson@gmail.com</small>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#!"><i class="ion-android-person"></i> My Profile</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="ion-log-out"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
