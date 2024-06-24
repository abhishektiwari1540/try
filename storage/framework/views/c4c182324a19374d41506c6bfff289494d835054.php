<?php $__env->startSection('content'); ?>
  <!-- Hero Section -->
    <section class="page-content">
        <div class="container">
            <h1 class="page-title"><?php echo e($Events_page['title']); ?></h1>

            <div class="page-text">
                <p><?php echo $Events_page['body']; ?></p>
            </div>
            <div class="service-section">
                <div class="row g-lg-5">
                    <?php $__empty_1 = true; $__currentLoopData = $frontlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4 col-sm-6 col-6">
                        <a href="events/<?php echo e($data->slug); ?>" class="srv-block">
                            <div class="srv-image">
                                <img src="<?php echo e(asset($data->image)); ?>" alt="">
                            </div>
                            <h4 class="srv-title"><?php echo e($data->name); ?></h4>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <?php endif; ?>



                </div>
            </div>
            <!--  service-section END-->


        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/events.blade.php ENDPATH**/ ?>