<?php $__env->startSection('content'); ?>


    <!-- Hero Section -->
    <section class="section-padding features-slider" style="background-image: url(<?php echo e(asset($data_banner->image) ?? ''); ?>);">
        <div class="container h-100">
            <div class="row align-items-center h-100">

                <div class="col-md-6 offset-md-6">
                    <div class="slider-text">
                        <h1 class="hero-heading">
                            <?php echo e($data_banner->title); ?>

                        </h1>
                        <div class="section-title"><?php echo e($data_banner->sub_title); ?></div>
                        <a href="<?php echo e($data_banner->button_link); ?>" class="primary-btn default-btn"><?php echo e($data_banner->button_title); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Section -->
    <section class="section-padding welcome-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="welcome-element">
                        <h2 class="section-heading">
                           <?php echo e($welcome_page_data['page_name']); ?> <?php echo e($welcome_page_data['sub_title']); ?>

                        </h2>
                        <div class="welcome-text">
                            <p><?php echo $welcome_page_data['body']; ?></p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <figure class="welome-img">
                        <img src="<?php echo e(asset($welcome_page_data['image'])); ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- Philosophy Section -->
    <section class="section-padding philosophy-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="philosophy-element">
                        <h2 class="section-heading">
                            <?php echo e($welcome_page_Philosophy['page_name']); ?>

                        </h2>
                        <div class="welcome-text">
                            <p><?php echo $welcome_page_Philosophy['body']; ?></p>


                        </div>
                    </div>
                </div>

                <div class="col-lg-6 order-lg-1">
                    <figure class="welome-img">
                        <img src="<?php echo e(asset($welcome_page_Philosophy['image'])); ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Section -->
    <section class="section-padding register-section">
        <div class="container">
            <div class="flex-register">
                <h2 class="reg-h2"><?php echo e($welcome_page_title['body']); ?></h2>
                <div class="reg-btn">
                    <a href="<?php echo e($welcome_page_title['button_link']); ?>" class="primary-btn default-btn"><?php echo e($welcome_page_title['button_title']); ?></a>

                </div>
            </div>
        </div>
    </section>
    <!-- Tesimonials Section -->
    <section class="section-padding testimonials-section">
        <div class="container">
            <div class="section-subheading">
                <?php echo e($Testimonials['page_name']); ?>

            </div>
            <h2 class="section-heading">
               <?php echo $Testimonials['body']; ?>

            </h2>

            <div class="position-relative">
                <div class="web-tsm-swiper">
                    <div class="swiper tsm-swiper">
                        <div class="swiper-wrapper">
                            <?php $__empty_1 = true; $__currentLoopData = $Testimonials_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="swiper-slide">
                                <div class="tsm-flex">
                                    <div class="quote">“</div>
                                    <div class="tsm-text">
                                      <?php echo $item['comments']; ?>

                                    </div>
                                    <div class="tsm-author"><?php echo e($item['name']); ?></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                       <P class="text-center">We Have No Data Now</P>
                            <?php endif; ?>


                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-next nextCar_btn"></div>
                <div class="swiper-button-prev prevCar_btn"></div>
            </div>
        </div>
    </section>
    <section class="section-padding contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 hide-cta-mobile">
                    <figure class="cta-image">
                        <img src="<?php echo e(asset($contact_page['image'])); ?>" alt="">
                    </figure>

                </div>

                <div class="col-lg-6">
                    <div class="cta-block">
                        <h2 class="section-heading">
                            <?php echo e($contact_page['page_name']); ?>

                        </h2>
                        <p><?php echo $contact_page['body']; ?>

                        </p>
                        <p>Drop us an email at: <a
                                href="mailto:<?php echo e($setting['email_address']); ?>"><?php echo e($setting['email_address']); ?></a><br>
                            or send us a message</p>
                            <form method="POST" id="contact_form" action="<?php echo e(route('front.contact')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-floating form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                    <label for="name">Name</label>
                                    <div id="error_name" class="text-danger"></div>
                                </div>

                                <div class="form-floating form-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    <label for="email">Email address</label>
                                    <div id="error_email" class="text-danger"></div>
                                </div>
                                <div class="form-floating form-group">
                                    <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number" oninput="validateInput()" required>
                                    <label for="email">Phone Number</label>
                                    <div id="error_phone_number" class="text-danger"></div>
                                    <span id="error" class="error text-danger" style="display: none">Please enter a number with 10-12 digits.</span>
                                </div>

                                <div class="form-floating form-group">
                                    <textarea name="message" class="form-control" placeholder="Message" id="message" required></textarea>
                                    <label for="message">Message</label>
                                    <div id="error_message" class="text-danger"></div>
                                </div>
                                <input type="hidden" name="g-recaptcha-response" value="<?php echo e(env('GOOGLE_CAPTCHA_SITE_KEY')); ?>">
                                <button type="button"  data-sitekey="<?php echo e(env('GOOGLE_CAPTCHA_SITE_KEY')); ?>" data-callback='onSubmit' id="form_submit_btn" class="mt-3 g-recaptcha primary-btn default-btn">Submit</button>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppa\htdocs\iraaspurohit_html\resources\views/frontend/index.blade.php ENDPATH**/ ?>