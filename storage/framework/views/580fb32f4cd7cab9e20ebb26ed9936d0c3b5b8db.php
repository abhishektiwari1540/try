<?php $__env->startSection('content'); ?>



    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-6">
                    <h1 class="page-title"><?php echo e($data['title']); ?></h1>
                    <?php echo $data['body']; ?>

                </div>

                <div class="col-lg-6">
                    <figure class="srv-images">
                        <img src="<?php echo e(asset($data['image'])); ?>" alt="">
                    </figure>
                </div>
            </div>

            <?php echo $data['short_description']; ?>

                Email - <a href="mailto:<?php echo e($setting['email_address']); ?>"><?php echo e($setting['email_address']); ?></a></p>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/refund-policy.blade.php ENDPATH**/ ?>