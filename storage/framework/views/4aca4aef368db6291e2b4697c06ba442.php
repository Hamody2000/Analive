

<?php $__env->startSection('page-title', __('Plan Request')); ?>

<?php $__env->startSection('action-button'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><?php echo e(__('Plan Request')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table dataTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Plan Name')); ?></th>
                                    <th><?php echo e(__('Max Products')); ?></th>
                                    <th><?php echo e(__('Max Stores')); ?></th>
                                    <th><?php echo e(__('Duration')); ?></th>
                                    <th><?php echo e(__('Created at')); ?></th>
                                    <th class="text-end"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $plan_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($prequest->user->name); ?></td>
                                        <td><?php echo e($prequest->plan->name); ?> </td>
                                        <td><?php echo e($prequest->plan->max_products .' Products'); ?></td>
                                        <td><?php echo e($prequest->plan->max_stores .' Stores'); ?></td>
                                        <td><?php echo e(($prequest->duration == 'Month') ? __('One Month') : __('One Year')); ?></td>
                                        <td><?php echo e(\App\Models\Utility::dateFormat($prequest->created_at,true)); ?></td>
                                        
                                        
                                        
                                        <td class="text-end">
                                            <div>
                                                <a href="<?php echo e(route('admin.response.request',[$prequest->id,1])); ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="<?php echo e(route('admin.response.request',[$prequest->id,0])); ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('custom-script'); ?>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Hussein\Lean\Developments\AnaOnline_New\AnaLive\AnaLive\resources\views/plan_request/index.blade.php ENDPATH**/ ?>