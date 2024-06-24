<?php $__env->startSection('content'); ?>
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
		<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<div class="d-flex align-items-center flex-wrap mr-1">
				<div class="d-flex align-items-baseline flex-wrap mr-5">
					<h5 class="text-dark font-weight-bold my-1 mr-5">
						Add <?php echo e(Config('constants.SETTING.SETTING_TITLE')); ?> </h5>
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="<?php echo e(route('dashboard')); ?>" class="text-muted">Dashboard</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo e(route($model.'.index')); ?>" class="text-muted"><?php echo e('Back To Setting'); ?> </a>
						</li>
					</ul>
				</div>
			</div>
			<?php echo $__env->make("admin.elements.quick_links", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<div class="d-flex flex-column-fluid">
		<div class=" container ">
			<form action="<?php echo e(route($model.'.store')); ?>" method="post" class="mws-form" autocomplete="off" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-1"></div>
							<div class="col-xl-10">
								<h3 class="mb-10 font-weight-bold text-dark">
								</h3>
								<div class="row">
									<div class="col-xl-6">
										<div class="form-group">
											<lable>Title </lable><span class="text-danger"> * </span>
											<input type="text" name="title" class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title')); ?>">
											<?php if($errors->has('title')): ?>
											<div class=" invalid-feedback">
												<?php echo e($errors->first('title')); ?>

											</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<lable>key </lable><span class="text-danger"> * </span>
											<input type="text" name="key" class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('key')); ?>">
											<?php if($errors->has('key')): ?>
											<div class=" invalid-feedback">
												<?php echo e($errors->first('key')); ?>

											</div>
											<?php endif; ?>
											<small>e.g., 'Site.title'</small>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<lable>Value </lable><span class="text-danger"> * </span>
											<textarea name="value" class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="50" rows="10">
											<?php echo e(old('value')); ?></textarea>
											<?php if($errors->has('value')): ?>
											<div class=" invalid-feedback">
												<?php echo e($errors->first('value')); ?>

											</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<lable>Input Type </lable><span class="text-danger"> * </span>
											<input type="text" name="input_type" class="form-control form-control-solid form-control-lg  <?php $__errorArgs = ['input_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('input_type')); ?>">
											<?php if($errors->has('input_type')): ?>
											<div class=" invalid-feedback">
												<?php echo e($errors->first('input_type')); ?>

											</div>
											<?php endif; ?>
											<small><em><?php echo "e.g., 'text' or 'textarea'"; ?></em></small>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="editable">Editable<span class="text-danger"> * </span></label>
											<input checked="checked" name="editable" type="checkbox" id="editable">
											<input type="text" size="16" name="prependedInput2" id="prependedInput2" value="Editable" disabled="disabled" style="width:415px;" class="small">
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-between border-top mt-5 pt-10">
									<div>
										<button button type="submit" class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
											Submit
										</button>
									</div>
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
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wildtag/web/wildtag.dev.obdemo.com/public_html/resources/views/admin/settings/add.blade.php ENDPATH**/ ?>