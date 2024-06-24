<?php $__env->startSection('content'); ?>



    <!-- Hero Section -->
    <section class="page-content">
        <div class="container">


            <div class="row">
                <div class="col-lg-6"> <h1 class="page-title">Yoga of Breathing</h1>
                    <div class="service-content">
                        <ul>
                            <li>
                                <p>Introduction to Yogic science of Breath: Prana Energy, Breath, life force and prana body</p>
                            </li>
                            <li>
                                <p>Nadis: The Energy Channels</p>
                            </li>
                            <li>
                                <p>Awakening and circulating prana</p>
                            </li>
                            <li>
                                <p>Raising and storing prana energy, Expansion relaxation and contraction of prana</p>
                            </li>
                            <li>
                                <p>Chakras, energy plexuses</p>
                            </li>
                            <li>
                                <p>Prana shuddhi (Purification)                              </p>
                            </li>
                            <li>
                                <p>Disease and Pranic healing</p>
                            </li>
                            <li>
                                <p>Self-healing and healing others</p>
                            </li>
                            <li>
                                <p>Prana Nidra (Pranic Sleep)</p>
                            </li>
                            <li>
                                <p>Prana pratishtha (The Science of Consecration)</p>
                            </li>
                        </ul>
                    </div>

                    <a href="<?php echo e(route('front.contact')); ?>" class="default-btn book-btn">Contact Us</a>
                </div>

                <div class="col-lg-6">
                    <figure class="srv-images">
                        <img src="<?php echo e(asset('frontend/img/breath2.jpg')); ?>" alt="">
                    </figure>
                </div>
            </div>


        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/yoga-of-breathing.blade.php ENDPATH**/ ?>