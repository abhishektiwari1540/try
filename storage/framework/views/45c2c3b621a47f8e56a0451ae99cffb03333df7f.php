<?php $__env->startSection('content'); ?>


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 order-lg-2">
                    <h1 class="page-title"><?php echo e($page_data['name']); ?></h1>
                    <p><?php echo $page_data['descriptions']; ?></p>

                </div>

                <div class="col-lg-6 order-lg-1">
                    <figure class="srv-images">
                        <img src="<?php echo e(asset($page_data['image'])); ?>" alt="">
                    </figure>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    <?php echo $page_data['short_description'] ?? ''; ?>

                </div>
                <div class="col-md-12">

                </div>

                <div class="col-md-6">
                    <div class="class-block">
                        <div class="subTitle"> <?php echo e($page_data['name_contact_us_frist']); ?>

                        </div>
                        <div class="cls-btn"><a href="<?php echo e(route('front.contact')); ?>" class="default-btn">Contact Us</a></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="class-block">
                        <div class="subTitle"><?php echo e($page_data['name_contact_us_second']); ?>

                        </div>
                        <div class="cls-btn"><a href="<?php echo e(route('front.contact')); ?>" class="default-btn">Contact Us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/classes.blade.php ENDPATH**/ ?>