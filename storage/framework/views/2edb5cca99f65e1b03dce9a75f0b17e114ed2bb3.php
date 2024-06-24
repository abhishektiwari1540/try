<?php $i = 1; ?>

<?php $__env->startSection('content'); ?>
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            <?php echo e(Config('constants.CMS_MANAGER.CMS_PAGES_TITLE')); ?> Edit </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('dashboard')); ?>" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route($modelName . '.index')); ?>" class="text-muted"> <?php echo e($sectionNamePlural); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php echo $__env->make('admin.elements.quick_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


        <div class="d-flex flex-column-fluid">
            <div class="container">
                <form action="<?php echo e(route($modelName . '.update', base64_encode($modelDetails->id))); ?>" method="POST"
                    class="mws-form" autocomplete="off" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="slug" value="<?php echo e($modelDetails->slug); ?>">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h3 class="font-weight-bold text-dark">
                                        <?php echo e($sectionNameSingular); ?> Information
                                    </h3>
                                    <div class="row mt-5">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label name="page_name">Page Name</label> <span class="text-danger"> *
                                                </span>
                                                <input type="text" name="page_name"
                                                    class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['page_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('page_name') ?? $modelDetails->page_name); ?>">
                                                <?php if($errors->has('page_name')): ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($errors->first('page_name')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label name="title">
                                                    <?php if($modelDetails->slug == 'welcome-page'): ?>
                                                        First title
                                                    <?php elseif($modelDetails->slug == 'about-author'): ?>
                                                        Author Name
                                                    <?php else: ?>
                                                        Title
                                                    <?php endif; ?>

                                                </label> <span class="text-danger"> * </span>
                                                <input type="text" name="title"
                                                    class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('title') ?? $modelDetails->title); ?>">
                                                <?php if($errors->has('title')): ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($errors->first('title')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if($modelDetails->slug == 'about-author'): ?>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="sub_title">Designation</label> <span class="text-danger"> *
                                                    </span>
                                                    <input type="text" name="sub_title"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['sub_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('sub_title') ?? $modelDetails->sub_title); ?>">
                                                    <?php if($errors->has('sub_title')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('sub_title')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-xl-6">
                                                <div class="form-group">
                                                    <label name="short_description">Company Name</label> <span class="text-danger"> *
                                                    </span>
                                                    <input type="text" name="short_description"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('short_description') ?? $modelDetails->short_description); ?>">
                                                    <?php if($errors->has('short_description')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('short_description')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                            </div>

                                        <?php endif; ?>
                                        <?php if($modelDetails->slug == 'events-page'): ?>
                                        <?php endif; ?>
                                        <?php if($modelDetails->slug == 'banner'): ?>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="sub_title">Sub Title</label> <span class="text-danger"> *
                                                    </span>
                                                    <input type="text" name="sub_title"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['sub_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('sub_title') ?? $modelDetails->sub_title); ?>">
                                                    <?php if($errors->has('sub_title')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('sub_title')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($modelDetails->slug == 'our-philosophy'): ?>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger"> </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        accept="image/*">
                                                    <?php if($errors->has('image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($errors->has('Frist_image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('Frist_image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(!empty($modelDetails->image)): ?>
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="<?php echo e($modelDetails->image); ?>">
                                                        <img height="50" width="50"
                                                            src="<?php echo e(asset($modelDetails->image)); ?>" />

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($modelDetails->slug == 'term-conditions'): ?>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger"> </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        accept="image/*">
                                                    <?php if($errors->has('image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($errors->has('Frist_image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('Frist_image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(!empty($modelDetails->image)): ?>
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="<?php echo e($modelDetails->image); ?>">
                                                        <img height="50" width="50"
                                                            src="<?php echo e(asset($modelDetails->image)); ?>" />

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($modelDetails->slug == 'banner'): ?>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger">
                                                    </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        accept="image/*">
                                                    <?php if($errors->has('image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($errors->has('Frist_image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('Frist_image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(!empty($modelDetails->image)): ?>
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="<?php echo e($modelDetails->image); ?>">
                                                        <img height="50" width="50"
                                                            src="<?php echo e(asset($modelDetails->image)); ?>" />

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>


                                        <?php if($modelDetails->slug == 'about-author'): ?>
                                            



                                        <?php endif; ?>

                                        <?php if($modelDetails->slug == 'welcome'): ?>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger">
                                                    </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        accept="image/*">
                                                    <?php if($errors->has('image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($errors->has('Frist_image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('Frist_image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(!empty($modelDetails->image)): ?>
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="<?php echo e($modelDetails->image); ?>">
                                                        <img height="50" width="50"
                                                            src="<?php echo e(asset($modelDetails->image)); ?>" />

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>


                                        <?php if($modelDetails->slug == 'welcome-page'): ?>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="second_title">
                                                        <?php if($modelDetails->slug == 'welcome-page'): ?>
                                                            Second title
                                                        <?php else: ?>
                                                            Title
                                                        <?php endif; ?>
                                                    </label> <span class="text-danger"> * </span>
                                                    <input type="text" name="second_title"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['second_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('second_title') ?? $modelDetails->title); ?>">
                                                    <?php if($errors->has('second_title')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('second_title')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image">
                                                        <?php if($modelDetails->slug == 'welcome-page'): ?>
                                                            Second Image
                                                        <?php else: ?>
                                                            Image
                                                        <?php endif; ?>
                                                    </label><span class="text-danger"> </span>
                                                    <input type="file" name="second_image"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['second_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        accept="image/*">
                                                    <?php if($errors->has('second_image')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('second_image')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(!empty($modelDetails->image)): ?>
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="<?php echo e($modelDetails->image); ?>">
                                                        <img height="50" width="50"
                                                            src="<?php echo e(asset($modelDetails->image)); ?>" />

                                                    </a>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="first_name">Second Description</label><span
                                                        class="text-danger"> * </span>
                                                    <textarea name="second_des"
                                                        class="form-control form-control-solid form-control-lg ckeditor <?php $__errorArgs = ['second_des'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('second_des')); ?>"></textarea>
                                                    <?php if($errors->has('second_des')): ?>
                                                        <div class=" invalid-feedback">
                                                            <?php echo e($errors->first('second_des')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="first_name">Frist Description</label><span
                                                        class="text-danger"> * </span>
                                                    <textarea name="frist_des"
                                                        class="form-control form-control-solid form-control-lg ckeditor <?php $__errorArgs = ['frist_des'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('frist_des')); ?>"></textarea>
                                                    <?php if($errors->has('frist_des')): ?>
                                                        <div class=" invalid-feedback">
                                                            <?php echo e($errors->first('frist_des')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>





                                        <?php if($modelDetails->slug == 'banner'): ?>


                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_title">Button Text</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_title"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['button_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('button_title') ?? $modelDetails->button_title); ?>">
                                                    <?php if($errors->has('button_title')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('button_title')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_link">Button Link</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_link"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['button_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('button_link') ?? $modelDetails->button_link); ?>">
                                                    <?php if($errors->has('button_link')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('button_link')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($modelDetails->slug == 'about-page'): ?>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_title">Button Text</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_title"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['button_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('button_title') ?? $modelDetails->button_title); ?>">
                                                    <?php if($errors->has('button_title')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('button_title')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_link">Button Link</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_link"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['button_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('button_link') ?? $modelDetails->button_link); ?>">
                                                    <?php if($errors->has('button_link')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('button_link')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($modelDetails->slug == 'welcome-title'): ?>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_title">Button Text</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_title"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['button_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('button_title') ?? $modelDetails->button_title); ?>">
                                                    <?php if($errors->has('button_title')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('button_title')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_link">Button Link</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_link"
                                                        class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['button_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('button_link') ?? $modelDetails->button_link); ?>">
                                                    <?php if($errors->has('button_link')): ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($errors->first('button_link')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom gutter-b">
                        <?php if($modelDetails->slug != 'banner'): ?>
                            <div class="card-header card-header-tabs-line" style="">
                                <div class="card-toolbar border-top">
                                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                        <?php if(!empty($languages)): ?>
                                            <?php $i = 1; ?>
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo e($i == $language_code ? 'active' : ''); ?>"
                                                        data-toggle="tab" href="#<?php echo e($language->title); ?>">
                                                        <span class="symbol symbol-20 mr-3">
                                                            <img src="<?php echo e(url(Config::get('constants.LANGUAGE_IMAGE_PATH') . $language->image)); ?>"
                                                                alt="">
                                                        </span>
                                                        <span class="nav-text"><?php echo e($language->title); ?></span>
                                                    </a>
                                                </li>
                                                <?php $i++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <?php if($modelDetails->slug != 'banner'): ?>
                                <div class="tab-content" style="">
                                    <?php if(!empty($languages)): ?>
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="tab-pane fade <?php echo e($i == $language_code ? 'show active' : ''); ?>"
                                                id="<?php echo e($language->title); ?>" role="tabpanel"
                                                aria-labelledby="<?php echo e($language->title); ?>">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="form-group">
                                                                    <?php if($i == 1): ?>
                                                                        <label for="<?php echo e($language->id); ?>.title">
                                                                            <?php if($modelDetails->slug == 'about-author'): ?>
                                                                                Author Name
                                                                            <?php else: ?>
                                                                                Page Title
                                                                            <?php endif; ?>

                                                                        </label><span class="text-danger"> *
                                                                        </span>
                                                                        <input type="text" name="title"
                                                                            class="form-control form-control-solid form-control-lg <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                            value="<?php echo e(old('title') ?? $modelDetails->title); ?>">
                                                                        <?php if($errors->has('title')): ?>
                                                                            <div class="invalid-feedback">
                                                                                <?php echo e($errors->first('title')); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <label for="<?php echo e($language->id); ?>.title">Page
                                                                            Title</label><span class="text-danger"> </span>
                                                                        <input type="text"
                                                                            name="data[<?php echo e($language->id); ?>][title]"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            value="<?php echo e($multiLanguage[$language->id]['title'] ?? old('title')); ?>">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <?php if($modelDetails->slug == 'term-conditions'): ?>
                                                                <div class="col-xl-12">
                                                                    <div class="form-group">
                                                                        <div
                                                                            id="kt-ckeditor-1-toolbar<?php echo e($language->id); ?>">
                                                                        </div>
                                                                        <?php if($i == 1): ?>
                                                                            <label>Short Description </label><span
                                                                                class="text-danger"> * </span>
                                                                            <textarea id="short_description_<?php echo e($language->id); ?>" name="short_description"
                                                                                class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                                       <?php echo e(old('short_description') ?? $modelDetails->short_description); ?> </textarea>
                                                                            <?php if($errors->has('short_description')): ?>
                                                                                <div
                                                                                    class="alert invalid-feedback admin_login_alert">
                                                                                    <?php echo e($errors->first('short_description')); ?>

                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <label>Short Description </label>
                                                                            <textarea name="data[<?php echo e($language->id); ?>][short_description]" id="short_description_<?php echo e($language->id); ?>"
                                                                                class="form-control form-control-solid form-control-lg"><?php echo e($multiLanguage[$language->id]['short_description'] ?? old('short_description')); ?></textarea>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <script src="<?php echo e(asset('/js/ckeditor/ckeditor.js')); ?>"></script>
                                                                    <script>
                                                                        CKEDITOR.replace(<?php echo 'short_description_' . $language->id; ?>, {
                                                                            filebrowserUploadUrl: '<?php echo URL()->to('base/uploder'); ?>',
                                                                            removeButtons: 'New Page,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteWord,Save,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,RadioButton,HiddenField,Strike,Subscript,Superscript,Language,Link,Unlink,Anchor,ShowBlocks',
                                                                            enterMode: CKEDITOR.ENTER_BR
                                                                        });
                                                                        CKEDITOR.config.allowedContent = true;
                                                                        CKEDITOR.config.removePlugins = 'scayt';
                                                                    </script>
                                                                </div>
                                                            <?php endif; ?>



                                                            <div class="col-xl-12">
                                                                <div class="form-group">
                                                                    <div id="kt-ckeditor-1-toolbar<?php echo e($language->id); ?>">
                                                                    </div>
                                                                    <?php if($i == 1): ?>
                                                                        <label>Description </label><span
                                                                            class="text-danger"> * </span>
                                                                        <textarea id="body_<?php echo e($language->id); ?>" name="body"
                                                                            class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                                       <?php echo e(old('body') ?? $modelDetails->body); ?> </textarea>
                                                                        <?php if($errors->has('body')): ?>
                                                                            <div
                                                                                class="alert invalid-feedback admin_login_alert">
                                                                                <?php echo e($errors->first('body')); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <label>Description </label>
                                                                        <textarea name="data[<?php echo e($language->id); ?>][body]" id="body_<?php echo e($language->id); ?>"
                                                                            class="form-control form-control-solid form-control-lg"><?php echo e($multiLanguage[$language->id]['body'] ?? old('body')); ?></textarea>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <script src="<?php echo e(asset('/js/ckeditor/ckeditor.js')); ?>"></script>
                                                                <script>
                                                                    CKEDITOR.replace(<?php echo 'body_' . $language->id; ?>, {
                                                                        filebrowserUploadUrl: '<?php echo URL()->to('base/uploder'); ?>',
                                                                        removeButtons: 'New Page,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteWord,Save,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,RadioButton,HiddenField,Strike,Subscript,Superscript,Language,Link,Unlink,Anchor,ShowBlocks',
                                                                        enterMode: CKEDITOR.ENTER_BR
                                                                    });
                                                                    CKEDITOR.config.allowedContent = true;
                                                                    CKEDITOR.config.removePlugins = 'scayt';
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex justify-content-between border-top mt-2 pt-5">
                                <button button type="submit"
                                    class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/admin/cms-manager/edit.blade.php ENDPATH**/ ?>