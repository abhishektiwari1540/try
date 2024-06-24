<?php $__env->startSection('content'); ?>

    <style type="text/css">
        .star-widget input {
            display: none;
        }

        .star-widget label {
            font-size: 35px;
            color: #444;
            padding: 10px;
            float: right;
            transition: all .2s ease;
        }

        input:not(:checked)~label:hover,
        input:not(:checked)~label:hover~label {
            color: #fd4;
        }

        input:checked~label {
            color: #fd4;

        }

        /*
#rate-1:checked ~ .rating-desc:before {
    content: "Poor😋";
}
#rate-2:checked ~ .rating-desc:before {
    content: "Not bad";
}
#rate-3:checked ~ .rating-desc:before {
    content: "Average";
}
#rate-4:checked ~ .rating-desc:before {
    content: "Good😋";
}
#rate-5:checked ~ .rating-desc:before {
    content: "Excellent😋";
} */

        .rating-desc {
            width: 100%;
            font-size: 20px;
            font-weight: 600;
            margin: 5px 0 20px 0;
            text-align: center;
            transition: all .2s ease;
        }

        .textarea textarea {
            border: 1px solid #e4e5e7;
            background: white;
            color: #6C6C6E;
            padding: 22px;
            font-size: 16px;
            margin-top: 15px;
            letter-spacing: -0.011em;
            border-radius: 10px;
            resize: none;
        }

        .textarea textarea:focus {
            border-color: #36bb91 !important;
            background: white;
            color: #1a1a1a;
            outline: none;
        }

        .btn {
            height: 45px;
            width: 100%;
            margin: 15px 0;
        }

        .btn:active {
            border: none;
        }

        :not(.btn-check)+.btn:active {
            outline: none;
        }

        .btn button {
            height: 100%;
            width: 60%;
            outline: none;
            background: #36bb91;
            color: #fff;
            font-size: 17px;
            font-weight: 600;
            border-radius: 15px;
            cursor: pointer;
            border: none;
        }

        .btn button:hover {
            background: #1a5e49;
        }

        .star-rating-bx {
            background-color: #fff;
            box-shadow: 0px 4px 40px 0px rgb(0 0 0 / 5%);
            border-radius: 10px;
            padding: 40px;
        }

        @media (max-width:576px) {
            .star-rating-bx {
                padding: 20px 15px;
            }
        }

        .star-icon {
            padding-bottom: 20px;
        }

        .modal-title {
            font-weight: 600;
        }

        #error-comment,
        #error-rating {
            color: red;
        }
    </style>

    <input id="range-slider__range" type="range" value="0" min="0" max="100">
    <span id="range-slider__value">0</span>
    <section class="section mb-5 pb-5">
        <div class="star-rating-bx">
            <h2 class="text-center">Feedback</h2>
            <div class="star-widget">
                <form method="GET" name="feedback" action="#" onsubmit="feedBack(); return false">
                    <input type="radio" name="star" id="rate-5" value="5">
                    <label for="rate-5" class="fa-solid fa-star"></label>
                    <input type="radio" name="star" id="rate-4" value="4">
                    <label for="rate-4" class="fa-solid fa-star"></label>
                    <input type="radio" name="star" id="rate-3" value="3">
                    <label for="rate-3" class="fa-solid fa-star"></label>
                    <input type="radio" name="star" id="rate-2" value="2">
                    <label for="rate-2" class="fa-solid fa-star"></label>
                    <input type="radio" name="star" id="rate-1" value="1">
                    <label for="rate-1" class="fa-solid fa-star"></label>
                    <p id="error-rating"></p>

                </form>
            </div>
        </div>
    </section>
    <!-- progress bar -->
    <style type="text/css">
        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
            padding: 0;
        }

        #progressbar li {
            list-style-type: none;
            color: #000;
            font-size: 15px;
            width: 16.33%;
            float: left;
            position: relative;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 60px;
            height: 60px;
            line-height: 60px;
            display: block;
            font-size: 16px;
            color: #3b475b;
            background: #e3e7ed;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            z-index: 9;
            position: relative;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 4px;
            background: #e3e7ed;
            position: absolute;
            left: -50%;
            top: 28px;
            /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps blue*/
        /*The number of the step and the connector before it = blue*/
        #progressbar li.complete:before,
        #progressbar li.complete:after {
            background: #14c367;
            color: white;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #14c367;
            color: white;
        }

        #progressbar li.active {
            color: #14c367;
            text-decoration: underline;
        }

        .AddFormBar {
            text-align: center;
            position: relative;
            margin-top: 30px;
            /*    background: #ddd;*/
        }

        .form_action_btn {
            text-align: right;
            position: absolute;
            bottom: 30px;
            right: 31px;
        }

        /*Create New Tenancy*/
    </style>
    <div class="container">
        <div class="AddFormBar">
            <ul id="progressbar">
                <li class="complete">Tenant Info</li>
                <li class="complete">Property</li>
                <li class="active">Charges</li>
                <li class="">Payments</li>
                <li class="">Agreement</li>
                <li class="">Move-In</li>
            </ul>
        </div>
    </div>
    <!-- progress bar -->

    <style type="text/css">
        .WhychoosePoints {
            list-style: none;
            margin-left: 1em;
            counter-reset: line;
        }

        .weProvidePoint {
            position: relative;
            padding: 30px 30px;
        }

        .WhychoosePoints .weProvidePoint:before {
            position: absolute;
            left: 20px;
            top: 13px;
            color: #c0d5f6;
            counter-increment: line;
            content: counter(line);
            font-size: 35px;
            font-weight: 700;
        }

        .lightBg {
            background-color: #f3faff;
        }

        .pointText {
            z-index: 1;
            position: relative;
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }
    </style>
    <div class="WhychoosePoints mt-5 pt-5 ">
        <div class="container lightBg">
            <div class="row gx-5">
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="weProvidePoint">
                        <p class="pointText">Competitive pricing for projects Competitive pricing for projects</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <style type="text/css">
        .sw-process-wrap {
            margin: 60px 0 0 0;
            padding-bottom: 180px;
            text-align: center;
            position: relative;
        }

        .sw-process-wrap ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sw-process-wrap ul li:nth-child(1) .sw-build-bg {
            width: 215px;
            height: 110px;
            border-top-left-radius: 126px;
            border-top-right-radius: 126px;
        }

        .sw-process-wrap ul li:nth-child(2) .sw-build-bg {
            width: 325px;
            height: 168px;
            border-top-left-radius: 186px;
            border-top-right-radius: 186px;
        }

        .sw-process-wrap ul li:nth-child(3) .sw-build-bg {
            width: 520px;
            height: 265px;
            border-top-left-radius: 300px;
            border-top-right-radius: 300px;
            margin-left: -25%;

        }

        .sw-process-wrap ul li:nth-child(4) .sw-build-bg {
            width: 345px;
            height: 190px;
            border-top-left-radius: 223px;
            border-top-right-radius: 223px;
            margin-left: -4%;

        }

        .sw-process-wrap ul li:nth-child(5) .sw-build-bg {
            width: 220px;
            height: 125px;
            border-top-left-radius: 150px;
            border-top-right-radius: 150px;
            margin-left: -30%;

        }

        .sw-process-wrap ul li:nth-child(6) .sw-build-bg {
            width: 196px;
            height: 98px;
            border-top-left-radius: 98px;
            border-top-right-radius: 98px;
        }

        .sw-process-wrap ul li.active .sw-build-bg {
            background-color: #ff5457;
        }

        .sw-build-bg {
            background-color: #ff545745;
            border-bottom: 0;
            position: relative;
            cursor: pointer;
        }

        .sw-process-wrap h4 {
            margin-top: 54px;
            font-size: 18px;
            color: #505a7a;
            line-height: 28px;
            position: relative;
            top: 0;
        }

        .sw-build-bg::before {
            position: absolute;
            top: 100%;
            background: #252e49;
            width: 7px;
            height: 7px;
            content: "";
            border-radius: 100%;
            -moz-border-radius: 100%;
            -webkit-border-radius: 100%;
            left: 0;
            right: 0;
            margin: 39px auto 0;
            -ms-border-radius: 100%;
        }

        .sw-build-bg::after {
            content: "";
            left: 0;
            background: #252e49;
            top: 100%;
            position: absolute;
            width: 1px;
            height: 33px;
            right: 0;
            margin: 6px auto 0;
        }

        .sw-process-wrap ul li.active .sw-build-bg::before {
            margin: 89px auto 0;
            background: #ff5457;
        }

        .sw-process-wrap ul li.active .sw-build-bg::after {
            height: 83px;
            background: #ff5457;
        }

        .sw-build-bg::after,
        .sw-build-bg::before,
        .sw-process-wrap h4,
        .sw-process-wrap ul li.active .sw-build-bg::after,
        .sw-process-wrap ul li.active .sw-build-bg::before {
            transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
        }

        .sw-build-bg::after,
        .sw-build-bg::before,
        .sw-process-wrap h4,
        .sw-process-wrap ul li.active .sw-build-bg::after,
        .sw-process-wrap ul li.active .sw-build-bg::before {
            transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
        }

        .black {
            color: red !important;
        }

        @media (min-width: 768px) {
            .sw-process-wrap ul li.active h4 {
                /*    font-size: 28px;*/
                top: 56px;
                color: #ff5457;
            }

            .sw-process-wrap ul li:nth-child(1) {
                margin-right: -10%;
            }

            .sw-process-wrap ul li {
                display: inline-block;
                vertical-align: bottom;
            }

            .sw-build-content {
                opacity: 0;
                position: absolute;
                left: 0;
                right: 0;
                top: 68%;
                transition: all 0.5s;
                -moz-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                -ms-transition: all 0.5s;
            }

            .sw-build-content p:last-child {
                margin-bottom: 0;
            }

            .sw-build-content {
                bottom: 0;
                top: auto;
            }

            .sw-process-wrap ul li {
                display: inline-block;
                vertical-align: bottom;
            }

            .sw-process-wrap ul li:nth-child(3) {
                margin-right: -20%;
            }

            .sw-process-wrap ul li:nth-child(5) {
                margin-right: -10%;
            }

            .sw-process-wrap ul li:nth-child(6) {
                margin-right: -10%;
            }

            .sw-process-wrap ul li.active .sw-build-content {
                opacity: 1;
            }

        }
    </style>

    <div class="buildSteps">
        <div class="container">
            <div class="sw-process-wrap">
                <ul>
                    <li class="active">
                        <div class="wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                            <div class="sw-build-bg d-none d-md-block"></div>
                            <h4>Consulting and Prototyping</h4>
                        </div>
                        <div class="sw-build-content">
                            <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">We gather
                                and analyse your requirements during the planning phase. We
                                carry
                                out this detailed analyse report to technical expert team for research to define proper
                                technological stack. In this stage of process, we prepare project specifications,
                                wireframes
                                and other project document. Project team and deliverables for each sprint will be
                                defined
                                while planning stage.</p>
                        </div>
                    </li>
                    <li class="">
                        <div class="wow fadeInLeft" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                            <div class="sw-build-bg d-none d-md-block"></div>
                            <h4>Analyzing & Planning</h4>
                        </div>
                        <div class="sw-build-content">
                            <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Based on
                                defined wireframes, our creative designer team define UI/UX of
                                the
                                application by consulting with you regarding the your suggestion/idea about theme.</p>
                        </div>
                    </li>
                    <li class="">
                        <div class="wow fadeInLeft" data-wow-delay="0.6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <div class="sw-build-bg d-none d-md-block"></div>
                            <h4>UI/UX Design</h4>
                        </div>
                        <div class="sw-build-content">
                            <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> After
                                planning and design phase, technical team will start
                                development. As
                                defined sprints, Development will be accomplished by the team. Generally, sprint lasts
                                in 2
                                weeks which will allow us to gradually demonstrate about the progress of the
                                development.</p>
                        </div>
                    </li>
                    <li class="">
                        <div class="wow fadeInLeft" data-wow-delay="0.9s"
                            style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInLeft;">
                            <div class="sw-build-bg d-none d-md-block"></div>
                            <h4>Development Phase</h4>
                        </div>
                        <div class="sw-build-content">
                            <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> We
                                understand the importance of quality assurance and we usually
                                perform iterative testing while development phases and deliver bug free build before
                                actual
                                release of the application to have your end user most pleasant user experience</p>
                        </div>
                    </li>
                    <li class="">
                        <div class="wow fadeInLeft" data-wow-delay="0.9s"
                            style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInLeft;">
                            <div class="sw-build-bg d-none d-md-block"></div>
                            <h4>Testing Phase</h4>
                        </div>
                        <div class="sw-build-content">
                            <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> We
                                understand the importance of quality assurance and we usually
                                perform iterative testing while development phases and deliver bug free build before
                                actual
                                release of the application to have your end user most pleasant user experience</p>
                        </div>
                    </li>
                    <!--    <li class="">
                    <div class="wow fadeInLeft" data-wow-delay="1.1s" style="visibility: visible; animation-delay: 1.1s; animation-name: fadeInLeft;">
                        <div class="sw-build-bg d-none d-md-block"></div>
                        <h4>Deployment & Support</h4>
                    </div>
                    <div class="sw-build-content">
                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">We also offer post release support after launching your product
                            in the market. Support and maintenance helps you to improvise product based on your
                            customers' feedback.</p>
                    </div>
                </li> -->
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Tags</h2>
        <select class="js-select2 form-select">
            <option></option>
            <option>Pizza</option>
            <option>Taco</option>
            <option>Kofte</option>
            <option>Burger</option>
            <option>Chicken</option>
        </select>

        <select class="js-select2-multi form-select" multiple="multiple">
            <option></option>
            <option>Pizza</option>
            <option>Taco</option>
            <option>Kofte</option>
            <option>Burger</option>
            <option>Chicken</option>
        </select>


        <select class="js-states form-select">
            <optgroup label="Alaskan/Hawaiian Time Zone">
                <option value="AK">Alaska</option>
                <option value="HI">Hawaii</option>
            </optgroup>
            <optgroup label="Pacific Time Zone">
                <option value="CA">California</option>
                <option value="NV">Nevada</option>
                <option value="OR">Oregon</option>
                <option value="WA">Washington</option>
            </optgroup>
            <optgroup label="Mountain Time Zone">
                <option value="AZ">Arizona</option>
                <option value="CO">Colorado</option>
                <option value="ID">Idaho</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NM">New Mexico</option>
                <option value="ND">North Dakota</option>
                <option value="UT">Utah</option>
                <option value="WY">Wyoming</option>
            </optgroup>
            <optgroup label="Central Time Zone">
                <option value="AL">Alabama</option>
                <option value="AR">Arkansas</option>
                <option value="IL">Illinois</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="OK">Oklahoma</option>
                <option value="SD">South Dakota</option>
                <option value="TX">Texas</option>
                <option value="TN">Tennessee</option>
                <option value="WI">Wisconsin</option>
            </optgroup>
            <optgroup label="Eastern Time Zone">
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="IN">Indiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="OH">Ohio</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WV">West Virginia</option>
            </optgroup>
        </select>


    </div>


    <div class="container">
        <section class="pt-5 pb-5">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h4><a href="https://codepen.io/piyushpd/pen/MWmezEb" target="_blank">Floating Input Label
                                With
                                Input And Select with Select2 Plugin</a></h4>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 mt-5 mb-5">
                        <div class="form-area">
                            <div class="form-inner">
                                <form action="javascript:void(0);">
                                    <div class="form-group floating-group">
                                        <label class="floating-label">Full Name</label>
                                        <input type="text" class="form-control floating-control" />
                                    </div>
                                    <div class="form-group floating-group">
                                        <label class="floating-label">Email Address</label>
                                        <input type="email" class="form-control floating-control" />
                                    </div>
                                    <div class="form-group floating-group floating-diff">
                                        <label class="floating-label">Select Country</label>
                                        <select id="country" name="country" class="form-control floating-control">
                                            <option value="">Select Country</option>
                                            <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="India">India</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                        </select>
                                    </div>
                                    <div class="form-group select2Part w-100 floating-group">
                                        <label class="floating-label">Select State</label>
                                        <select name="" id=""
                                            class="form-control customSelect floating-control">
                                            <option value="">Select State</option>
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2</option>
                                            <option value="3">Category 3</option>
                                            <option value="4">Category 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group select2Part select2multiple w-100 floating-group">
                                        <label class="floating-label">Select Tags</label>
                                        <select name="" id=""
                                            class="form-control customSelectMultiple floating-control" multiple>
                                            <option value="Afganistan">Afghanistan <span class="black">test
                                                    value</span></option>
                                            <option value="Albania">Albania</option>
                                            <option value="India">India</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                        </select>
                                    </div>
                                    <div class="form-group floating-group">
                                        <label class="floating-label">Password</label>
                                        <input type="password" class="form-control floating-control"
                                            value="" />
                                    </div>
                                    <div class="form-group floating-group">
                                        <label class="floating-label">Message</label>
                                        <textarea name="" id="" rows="4" class="form-control floating-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary form-submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <style type="text/css">
        .swiper-slide img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .swiper-slide {
            min-height: 150px;
            height: 420px;
            background-color: #ddd;
        }

        .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 16px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--swiper-theme-color);
        }

        .autoplay-progress svg {
            --progress: 0;
            position: absolute;
            left: 0;
            top: 0px;
            z-index: 10;
            width: 100%;
            height: 100%;
            stroke-width: 4px;
            stroke: var(--swiper-theme-color);
            fill: none;
            stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
        }
    </style>
    <div class="container mb-5 pb-5">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
                <div class="swiper-slide">
                    <img src="<?php echo e(asset('frontend/img/swiper1.jpg')); ?>" alt="swiper image" loading="lazy">

                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
        </div>



        <button>Update</button>

    </div>

    <style>
        body {
            /*  font-family: 'Ubuntu', sans-serif; */
            font-weight: bold;
        }

        .select2-container {
            min-width: 400px;
        }

        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option:before {
            content: "";
            display: inline-block;
            position: relative;
            height: 20px;
            width: 20px;
            border: 2px solid #e9e9e9;
            border-radius: 4px;
            background-color: #fff;
            margin-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option[aria-selected=true]:before {
            font-family: fontAwesome;
            content: "\f00c";
            color: #fff;
            background-color: #f77750;
            border: 0;
            display: inline-block;
            padding-left: 3px;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #fff;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #eaeaeb;
            color: #272727;
        }

        .select2-container--default .select2-selection--multiple {
            margin-bottom: 10px;
        }

        .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-radius: 4px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #f77750;
            border-width: 2px;
        }

        .select2-container--default .select2-selection--multiple {
            border-width: 2px;
        }

        .select2-container--open .select2-dropdown--below {

            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

        }

        .select2-selection .select2-selection--multiple:after {
            content: 'hhghgh';
        }

        /* select with icons badges single*/
        .select-icon .select2-selection__placeholder .badge {
            display: none;
        }

        .select-icon .placeholder {
            /*  display: none; */
        }

        .select-icon .select2-results__option:before,
        .select-icon .select2-results__option[aria-selected=true]:before {
            display: none !important;
            /* content: "" !important; */
        }

        .select-icon .select2-search--dropdown {
            display: none;
        }
    </style>

    <div class="container">
        <div class="row">
            <h4>checkbox</h4>
            <select class="js-select2 with-checkbox" multiple="multiple">
                <option value="O1" data-badge="">Option1</option>
                <option value="O2" data-badge="">Option2</option>
                <option value="O3" data-badge="">Option3</option>
                <option value="O4" data-badge="">Option4</option>
                <option value="O5" data-badge="">Option5</option>
                <option value="O6" data-badge="">Option6</option>
                <option value="O7" data-badge="">Option7</option>
            </select>
        </div>
    </div>
        
        <!-- Bootstrap v5.3.0  -->
        
        <!--  Swiper 11.0.5 -->
        
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('front_js'); ?>
        <script>
            $(document).ready(function() {


                var slider = document.getElementsByID("range-slider__range");
                var output = document.getElementsByID("range-slider__value");

                output.innerHTML = slider.value;

                // This function input current value in span and add progress colour in range
                slider.oninput = function() {

                    output.innerHTML = this.value;

                    var value = (this.value - this.min) / (this.max - this.min) * 100;

                    this.style.background = 'linear-gradient(to right, #82CFD0 0%, #82CFD0 ' + value +
                        '%, #d7dcdf ' + value + '%, #d7dcdf 100%)'
                }



                $(".sw-process-wrap ul li").click(function() {
                    $(".sw-process-wrap ul li.active").removeClass("active");
                    $(this).addClass("active")
                })
                $(".sw-process-wrap ul li").hover(function() {
                    $(".sw-process-wrap ul li.active").removeClass("active");
                    $(this).addClass("active")
                })
            });



            <
            !--Initialize Swiper-- >
            // autoplay-progress
            const progressCircle = document.querySelector(".autoplay-progress svg");
            const progressContent = document.querySelector(".autoplay-progress span");
            // autoplay-progress
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,


                // slide Effects

                // cube
                //     effect: "cube",
                // grabCursor: true,
                // cubeEffect: {
                //   shadow: true,
                //   slideShadows: true,
                //   shadowOffset: 20,
                //   shadowScale: 0.94,
                // },
                // cards
                // effect: "cards",
                // flip
                // effect: "flip",
                // coverflow
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 30,
                    stretch: 0,
                    depth: 150,
                    modifier: 1,
                    slideShadows: true,
                },
                // lazy image loading
                lazy: true,
                // slidesPerView:4,
                //    grid: {
                //      rows: 2,
                //    },
                mousewheel: {
                    forceToAxis: true,
                },

                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,

                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },

                // autoplay slide

                speed: 3000,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },

                // autoplay slide

                // Autoplay progress
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        progressCircle.style.setProperty("--progress", 1 - progress);
                        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                    }
                },
                // Autoplay progress
                // breakpoints POints
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 0,
                    },
                },
            });

            // swiper
            $(document).ready(function() {
                $(".js-select2").select2({
                    closeOnSelect: false,
                    placeholder: "Select",
                    checkbox: true,

                    minimumResultsForSearch: -1,
                });

                $(".js-select2-multi").select2({
                    closeOnSelect: false,
                    placeholder: "Placeholder",
                    // allowHtml: true,
                    allowClear: true,
                    tags: true // создает новые опции на лету
                });
            });


            // ----floatin input label in input and select

            $('.floating-group').find('.floating-control').each(function(index, ele) {
                var $ele = $(ele);
                if ($ele.val() != '' || $ele.is(':selected') === true) {
                    $ele.parents('.floating-group').addClass('focused');
                }
            })

            $('.floating-control').on('focus', function(e) {
                $(this).parents('.floating-group').addClass('focused');
            }).on('blur', function() {
                if ($(this).val().length > 0) {
                    $(this).parents('.floating-group').addClass('focused');
                } else {
                    $(this).parents('.floating-group').removeClass('focused');
                }
            });
            $('.floating-control').on('change', function(e) {
                if ($(this).is('select')) {
                    if ($(this).val() === $("option:first", $(this)).val()) {
                        $(this).parents('.floating-group').removeClass('focused');
                    } else {
                        $(this).parents('.floating-group').addClass('focused');
                    }
                }
            })


            // --------select2-------
            $(document).ready(function() {
                //---- select2 single----
                $('.customSelect').each(function() {
                    var dropdownParents = $(this).parents('.select2Part')
                    $(this).select2({
                        dropdownParent: dropdownParents,
                        minimumResultsForSearch: -1
                    }).on("select2:open", function(e) {
                        $(this).parents('.floating-group').addClass('focused');
                    }).on("select2:close", function(e) {
                        if ($(this).find(':selected').val() === '') {
                            $(this).parents('.floating-group').removeClass('focused');
                        }
                    });
                });

                //---- select2 multiple----
                $('.customSelectMultiple').each(function() {
                    var dropdownParents = $(this).parents('.select2Part');
                    // var placehldrget = $(this).attr("data-placeholder");
                    $(this).select2({
                        dropdownParent: dropdownParents,
                        // placeholder: placehldrget,
                        // tags: true,
                        // closeOnSelect: false,
                    }).on("select2:open", function(e) {
                        $(this).parents('.floating-group').addClass('focused');
                    }).on("select2:close", function(e) {
                        if ($(this).val() != '') {
                            $(this).parents('.floating-group').addClass('focused');
                        } else {
                            $(this).parents('.floating-group').removeClass('focused');
                        }
                    }).on("select2:select", function(e) {
                        $(this).parents('.floating-group').addClass('focused');
                    }).on("select2:unselect", function(e) {
                        $(this).parents('.floating-group').addClass('focused');
                    })
                });
            });
        </script>


        <script>
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;

            function onYouTubeIframeAPIReady() {
                player = new YT.Player('id-JjWqkhvXVKA', {
                    height: '360',
                    width: '600',
                    videoId: 'JjWqkhvXVKA',
                    playerVars: {
                        autoplay: 1, // 在讀取時自動播放影片
                        controls: 0, // 在播放器顯示暫停／播放按鈕
                        modestbranding: 1, // 隱藏YouTube Logo
                        loop: 1, // 讓影片循環播放
                        // fs: 0, // 隱藏全螢幕按鈕
                        // cc_load_policty: 0, // 隱藏字幕
                        // iv_load_policy: 3, // 隱藏影片註解
                        autohide: 0, // 當播放影片時隱藏影片控制列
                        mute: 1, // 靜音
                        playsinline: 1,
                        // playlist: 'JjWqkhvXVKA,JjWqkhvXVKA',
                        playlist: 'JjWqkhvXVKA',
                    },
                    events: {
                        'onReady': onPlayerReady,
                        // 'onStateChange': onPlayerStateChange
                    },
                });
            }
            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                // event.target.mute();
                // event.target.setVolume(0);
                event.target.setVolume(50);
                event.target.playVideo();
            }
            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.
            // var done = false;
            // function onPlayerStateChange(event) {
            // 	if (event.data == YT.PlayerState.PLAYING && !done) {
            // 		setTimeout(stopVideo, 6000);
            // 		done = true;
            // 	}
            // }
            // function stopVideo() {
            // 	player.stopVideo();
            // }
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/elements.blade.php ENDPATH**/ ?>