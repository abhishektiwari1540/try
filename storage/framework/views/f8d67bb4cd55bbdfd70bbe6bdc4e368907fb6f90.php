<?php $__env->startSection('content'); ?>


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">


            <div class="row">
                <div class="col-lg-6"> <h1 class="page-title">Yoga of Health Systems</h1>
                    <div class="service-content">
                        <ul>
                            <li>
                                <p>Are you sick?</p>
                            </li>
                            <li>
                                <p>Are you tired all the time? </p>
                            </li>
                            <li>
                                <p>Are you depressed and anxious?</p>
                            </li>
                            <li>
                                <p>Are you addicted to drugs, alcohol or caffeine? </p>
                            </li>
                            <li>
                                <p>Are you bothered by chronic pain?</p>
                            </li>
                            <li>
                                <p>Do you have low immunity? </p>
                            </li>
                            <li>
                                <p>Do you have a weak gut?</p>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-6">
                    <figure class="srv-images">
                        <img src="<?php echo e(asset('frontend/img/health.jpg')); ?>" alt="">
                    </figure>
                </div>
            </div>

            <div class="extra-section">
                <div class="row ">
                <div class="col-12">
                    <p>Think of yoga as Medicine that can benefit the healthy as well as the sick. With regular
                        practice,
                        amazing things will begin to happen. 
                        Our YMP special programs for each organ system can help you strengthen them individually.  78
                        organs
                        including 5 major vital organs will function better and return to their healthy optimum state. 
                    </p>
                </div>
            </div>
        </div>


            <div class="row">


                <div class="col-lg-8">
                    <figure class="srv-images">
                        <img src="<?php echo e(asset('frontend/img/health3.jpg')); ?>" alt="">
                    </figure>
                </div>
                <div class="col-lg-4">
                    <div class="service-content">
                        <ul>
                            <li>
                                <p>Brain and nervous system </p>
                            </li>
                            <li>
                                <p>Respiratory System</p>
                            </li>
                            <li>
                                <p>Immune and lymphatic System</p>
                            </li>
                            <li>
                                <p>Metabolic Balancing</p>
                            </li>
                            <li>
                                <p>Digestive System</p>
                            </li>
                            <li>
                                <p>Bones, Joints and Muscles</p>
                            </li>
                            <li>
                                <p>Reproductive and Sexual Health</p>
                            </li>
                            <li>
                                <p>Healthy Heart</p>
                            </li>
                            <li>
                                <p>Healthy Skin, hair and nails</p>
                            </li>
                            <li>
                                <p>Endocrine glands</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <a href="<?php echo e(route('front.contact')); ?>" class="default-btn book-btn">Contact Us</a>


        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/yoga-of-health-systems.blade.php ENDPATH**/ ?>