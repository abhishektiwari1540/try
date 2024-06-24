<!-- Header -->
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="<?php echo e(route('front.index')); ?>">

                        <img src="<?php echo e($system_document[0]['image']); ?>" alt="">
                    </a>
                    <div class="overlay" style="display:none"></div>
                    <div class="collapse navbar-collapse">
                        <button class="navbar-toggler menuClose-icon" type="button">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.4 14L0 12.6L5.6 7L0 1.4L1.4 0L7 5.6L12.6 0L14 1.4L8.4 7L14 12.6L12.6 14L7 8.4L1.4 14Z"
                                    fill="white" />
                            </svg>

                        </button>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item <?php echo e(request()->routeIs('front.index') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('front.index')); ?>">Home</a>
                            </li>
                            <li class="nav-item <?php echo e(request()->routeIs('front.classes') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('front.classes')); ?>">Classes</a>
                            </li>
                            <li class="nav-item <?php echo e(request()->routeIs('front.events') || request()->segment(1) === 'events' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('front.events')); ?>">Events & Programs</a>
                            </li>
                            <li class="nav-item <?php echo e(request()->routeIs('front.about') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('front.about')); ?>">About Us</a>
                            </li>
                            <li class="nav-item <?php echo e(request()->routeIs('front.contact') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('front.contact')); ?>">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php if(Auth::check()): ?>


                    <!--  ======= User DropDown =========  -->
                    <div class="nav-item dropdown user_dropdown">

                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="user-drop" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo e(asset('frontend/img/user.png')); ?>" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="user-drop">
                            <div class="user_info">
                                <div class="user_name">
                                    <div>Alex Willson</div>
                                    <div class="user_email">
                                        <small>alexwillson@gmail.com</small>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#!"><i class="ion-android-person"></i> My Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('front.logout')); ?>"><i class="ion-log-out"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </nav>

            </div>

        </div>
    </div>
</header>
<?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/layouts/header.blade.php ENDPATH**/ ?>