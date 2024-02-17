

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('DeliveryBoy')); ?>

<?php $__env->stopSection(); ?>

<?php
    $logo = asset(Storage::url('uploads/profile/'));
?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item" aria-current="page"><?php echo e(__('DeliveryBoy')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create DeliveryBoy')): ?>
        <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
            <a href="#" class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="md" data-title="Create User"
                data-url="<?php echo e(route('admin.deliveryboy.create')); ?>" data-toggle="tooltip" title="<?php echo e(__('Create User')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $deliveryboys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryboy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card text-center">
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <div class="badge p-2 px-3 rounded bg-primary"><?php echo e(ucfirst($deliveryboy->type)); ?></div>
                            </h6>
                        </div>
                        <?php if(Gate::check('Edit DeliveryBoy') || Gate::check('Delete DeliveryBoy') || Gate::check('Reset Password')): ?>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit DeliveryBoy')): ?>
                                            <a href="#" class="dropdown-item"
                                                data-url="<?php echo e(route('admin.deliveryboy.edit', $deliveryboy->id)); ?>" data-size="md"
                                                data-ajax-popup="true" data-title="<?php echo e(__('Update User')); ?>">
                                                <i class="ti ti-edit"></i>
                                                <span class="ms-2"><?php echo e(__('Edit')); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Reset Password')): ?>
                                            <a href="#" class="dropdown-item"
                                                data-url="<?php echo e(route('admin.deliveryboy.reset', \Crypt::encrypt($deliveryboy->id))); ?>"
                                                data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Change Password')); ?>">
                                                <i class="ti ti-key"></i>
                                                <span class="ms-2"><?php echo e(__('Reset Password')); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete DeliveryBoy')): ?>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.deliveryboy.destroy', $deliveryboy->id], 'class' => 'd-inline']); ?>

                                            <a href="#" class="bs-pass-para dropdown-item show_confirm"
                                                data-confirm-yes="delete-form-<?php echo e($deliveryboy->id); ?>"><i class="ti ti-trash"></i>
                                                <span class="ms-2"><?php echo e(__('Delete')); ?></span>
                                            </a>
                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="img-fluid rounded-circle card-avatar">
                            <a href="<?php echo e(!empty($deliveryboy->avatar) ? asset(Storage::url('uploads/profile/' . $deliveryboy->avatar)) : asset(Storage::url('uploads/profile/avatar.png'))); ?>"
                                target="_blank">
                                <img src="<?php echo e(!empty($deliveryboy->avatar) ? asset(Storage::url('uploads/profile/' . $deliveryboy->avatar)) : asset(Storage::url('uploads/profile/avatar.png'))); ?>"
                                    class="img-user wid-80 round-img rounded-circle">
                            </a>
                        </div>
                        <h4 class="mt-2 text-primary"><?php echo e($deliveryboy->name); ?></h4>
                        <small class=""><?php echo e($deliveryboy->email); ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>
                <a class="btn-addnew-project" data-url="<?php echo e(route('admin.deliveryboy.create')); ?>" data-title="<?php echo e(__('Create User')); ?>"
                    data-ajax-popup="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create User')); ?>"><i
                        class="ti ti-plus text-white"></i>
                    <div class="bg-primary proj-add-icon">
                        <i class="ti ti-plus"></i>
                    </div>
                    <h6 class="mt-4 mb-2"><?php echo e(__('New User')); ?></h6>
                    <p class="text-muted text-center"><?php echo e(__('Click here to add New User')); ?></p>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Hussein\Lean\Developments\AnaOnline_New\AnaLive\AnaLive\resources\views/deliveryboy/index.blade.php ENDPATH**/ ?>