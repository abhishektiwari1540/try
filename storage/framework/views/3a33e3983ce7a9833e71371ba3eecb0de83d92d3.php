<?php $__env->startSection('content'); ?>
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            <?php echo e(Config('constants.CLASS.CLASS')); ?>

                        </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(url('Admin/index')); ?>" class="text-muted">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php echo $__env->make('admin.elements.quick_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        
        <?php
        // require_once '/helper.php';
        $createPermission = functionCheckPermission('ClassController@create');
        $viewPermission = functionCheckPermission('ClassController@view');
        $deletePermission = functionCheckPermission('ClassController@delete');
        $statusPermission = functionCheckPermission('ClassController@changeStatus');

        ?>
        <?php
            // dd($results);
        ?>
        <div class="d-flex flex-column-fluid">
            <div class=" container ">
                <form method="get" role="form" action="<?php echo e(route("$model.index")); ?>" class="kt-form kt-form--fit mb-0"
                    autocomplete="off">
                    <input type="hidden" name="display">
                    <!-- Your form fields and content here -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card card-custom card-stretch card-shadowless">
                                <div class="card-header">
                                    <div class="card-title">
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                                        <div id="collapseOne6" class="collapse <?php echo !empty($searchVariable) ? 'show' : ''; ?>"
                                            data-parent="#accordionExample6">
                                            <div>
                                                <div class="row mb-6">
                                                    <div class="col-lg-3 mb-lg-5 mb-6">
                                                        <label>Status</label>
                                                        <select name="is_active" class="form-control select2init"
                                                            value="<?php echo e($searchVariable['is_active'] ?? ''); ?>">
                                                            <option value="">All</option>
                                                            <option value="1"
                                                                <?php echo e(isset($searchVariable['is_active']) && $searchVariable['is_active'] == 1 ? 'selected' : ''); ?>>
                                                                Activate</option>
                                                            <option value="0"
                                                                <?php echo e(isset($searchVariable['is_active']) && $searchVariable['is_active'] == 0 ? 'selected' : ''); ?>>
                                                                Deactivate</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 mb-lg-5 mb-6">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name" value="<?php echo e($searchVariable['name'] ?? ''); ?>">
                                                    </div>

                                                    

                                                    <div class="col-lg-3 mb-lg-5 mb-6">
                                                        <label>Date From</label>
                                                        <div class="input-group date" id="datepickerfrom"
                                                            data-target-input="nearest">
                                                            <input type="text" name="date_from"
                                                                value="<?php echo e(isset($searchVariable['date_from']) ? $searchVariable['date_from'] : ''); ?>"
                                                                class="form-control datetimepicker-input"
                                                                placeholder="Date To" data-target="#datepickerfrom"
                                                                data-toggle="datetimepicker">

                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="ki ki-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-lg-5 mb-6">
                                                        <label>Date To</label>
                                                        <div class="input-group date" id="datepickerto"
                                                            data-target-input="nearest">
                                                            <input type="text" name="date_to"
                                                                value="<?php echo e(isset($searchVariable['date_to']) ? $searchVariable['date_to'] : ''); ?>"
                                                                class="form-control datetimepicker-input"
                                                                placeholder="Date To" data-target="#datepickerto"
                                                                data-toggle="datetimepicker">

                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="ki ki-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-8">
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                                            <span>
                                                                <i class="la la-search"></i>
                                                                <span>Search</span>
                                                            </span>
                                                        </button>
                                                        &nbsp;&nbsp;
                                                        <a href='<?php echo e(route("$model.index")); ?>'
                                                            class="btn btn-secondary btn-secondary--icon">
                                                            <span>
                                                                <i class="la la-close"></i>
                                                                <span>Clear Search</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dataTables_wrapper ">
                                        <div class="table-responsive">
                                            <table
                                                class="table dataTable table-head-custom table-head-bg table-borderless table-vertical-center"
                                                id="taskTable">
                                                <thead>
                                                    <tr class="text-uppercase">
                                                        <th
                                                            class="<?php echo e($sortBy == 'name' && $order == 'desc' ? 'sorting_desc' : ($sortBy == 'name' && $order == 'asc' ? 'sorting_asc' : 'sorting')); ?>">
                                                            <a
                                                                href="<?php echo e(route($model . '.index', [
                                                                    'sortBy' => 'name',
                                                                    'order' => $sortBy == 'name' && $order == 'desc' ? 'asc' : 'desc',
                                                                    $query_string,
                                                                ])); ?>">
                                                                Name</a>
                                                        </th>
                                                        <th
                                                            class="<?php echo e($sortBy == 'is_active' && $order == 'desc' ? 'sorting_desc' : ($sortBy == 'is_active' && $order == 'asc' ? 'sorting_asc' : 'sorting')); ?>">
                                                            <a
                                                                href="<?php echo e(route($model . '.index', [
                                                                    'sortBy' => 'is_active',
                                                                    'order' => $sortBy == 'is_active' && $order == 'desc' ? 'asc' : 'desc',
                                                                    $query_string,
                                                                ])); ?>">
                                                                Status</a>
                                                        </th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!$results->isEmpty()): ?>
                                                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="text-dark-75 mb-1 font-size-lg">
                                                                        <?php echo e(ucfirst($result->name) ?? ''); ?> </div>
                                                                </td>
                                                                <td>
                                                                    <?php if($result->is_active == 1): ?>
                                                                        <span
                                                                            class="label label-lg label-light-success label-inline">Activated</span>
                                                                    <?php else: ?>
                                                                        <span
                                                                            class="label label-lg label-light-danger label-inline">Deactivated</span>
                                                                    <?php endif; ?>

                                                                </td>
                                                                <td class="text-right pr-2">

                                                                    <?php if($result->is_active == 1): ?>
                                                                        
                                                                    <?php endif; ?>


                                                                    <a href="<?php echo e(route($model . '.edit', [base64_encode($result->id)])); ?>"
                                                                        class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        data-container="body" data-boundary="window"
                                                                        title="Edit" data-original-title="Edit">
                                                                        <span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="24px" height="24px"
                                                                                viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                    fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                        height="24" />
                                                                                    <path
                                                                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                                        fill="#000000" opacity="0.3" />
                                                                                    <path
                                                                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                                        fill="#000000" />
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                    <a href="<?php echo e(route($model . '.show', [base64_encode($result->id)])); ?>"
                                                                        class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        data-container="body" data-boundary="window"
                                                                        title="View" data-original-title="View">
                                                                        <span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="24px" height="24px"
                                                                                viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                    fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                        height="24" />
                                                                                    <path
                                                                                        d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z"
                                                                                        fill="#000000" />
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </a>



                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="6" style="text-align:center;">
                                                                <?php echo e(trans('Record not found.')); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php echo $__env->make('pagination.default', ['results' => $results], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/admin/Class/index.blade.php ENDPATH**/ ?>