<?php $__env->startSection('content'); ?>


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
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
                <p class="thanksMsg">
                   Your payment of $453.00 has been successfully received.

                </p>
                <div class="loginbtn-block">
                    <a href="<?php echo e(route('front.home')); ?>" class="default-btn">
                        Back to Home
                    </a>
                </div>
            </div>


        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/thank-you.blade.php ENDPATH**/ ?>