<?php $__env->startSection('content'); ?>

    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <div class="aboutUsContent">
                <p class="page-subtitle"><?php echo e($about_page['title']); ?></p>
                <?php echo $about_page['body']; ?>

                <a href="<?php echo e($about_page['button_link']); ?>" class="default-btn book-btn"><?php echo e($about_page['button_title']); ?></a>
            </div>


        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/about-us.blade.php ENDPATH**/ ?>