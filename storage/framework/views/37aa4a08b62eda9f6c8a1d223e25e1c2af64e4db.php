<?php $__env->startSection('content'); ?>


    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            

            <h1 class="page-title"><?php echo e($about_author->title); ?>, <?php echo e($about_author->sub_title); ?></h1>
            <div class="subTitle fs-02"><?php echo e($about_author->short_description); ?></div>
            <p><?php echo $about_author->body; ?>

            </p>




        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/about_author.blade.php ENDPATH**/ ?>