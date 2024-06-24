<?php $__env->startSection('content'); ?>


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <h1 class="page-title"><?php echo e($details->name); ?></h1>

            <div class="page-text">
                <p><?php echo e($details->short_des); ?></p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="service-content">
                        <?php echo $details->description; ?>

                    </div>

                    <a href="<?php echo e(route('front.contact')); ?>" class="default-btn book-btn">Contact Us</a>
                </div>

                <div class="col-lg-6">
                    <figure class="srv-images">
                        <img src="<?php echo e(asset($details->image)); ?>" alt="">
                    </figure>
                </div>
            </div>


        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/yoga-darshan.blade.php ENDPATH**/ ?>