<?php $__env->startSection('content'); ?>
    <style>
        .invalid-feedback {
            display: inline;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5"> <?php echo e(Config('constants.EVENTS.EVENTS_TITLE')); ?> Edit
                        </h5>

                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('dashboard')); ?>" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route($model . '.index')); ?>"
                                    class="text-muted"><?php echo e(Config('constants.EVENTS.EVENTS_TITLE')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php echo $__env->make('admin.elements.quick_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <form action="<?php echo e(route($model . '.update', base64_encode($userDetails->id))); ?>" method="post"
                    class="mws-form" autocomplete="off" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-1"></div>
                                <div class="col-xl-10">
                                    <h3 class="mb-10 font-weight-bold text-dark">
                                        <?php echo e(Config('constants.EVENTS.EVENTS_TITLE')); ?> Information
                                    </h3>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="title">Title</label><span class="text-danger"> * </span>
                                                <input type="text" name="title" value="<?php echo e($userDetails->name); ?>"
                                                    class="form-control form-control-solid form-control-lg <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="image">Image</label><span class="text-danger"> * </span>
                                                <input type="file" name="image"
                                                    class="form-control form-control-solid form-control-lg <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                <a class="fancybox-buttons" data-fancybox-group="button"
                                                    href="<?php echo e($userDetails->image); ?>">
                                                    <img height="50" width="50"
                                                        src="<?php echo e(asset($userDetails->image)); ?>" />

                                                </a>

                                                
                                            </div>
                                        </div>
                                        <?php if($userDetails->short_description !== null): ?>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label for="short_des">Short Description</label>
                                                <input type="text" name="short_des"
                                                    value="<?php echo e($userDetails->short_description); ?>"
                                                    class="form-control form-control-solid form-control-lg <?php $__errorArgs = ['short_des'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <?php $__errorArgs = ['short_des'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <?php else: ?>

                                        <?php endif; ?>

                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label for="description">Description</label><span class="text-danger"> *
                                                </span>
                                                <textarea class="ckeditor form-control" name="description"><?php echo e(old('description', $userDetails->description)); ?></textarea>
                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <button type="submit"
                                            class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            UPDATE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/admin/Events/edit.blade.php ENDPATH**/ ?>