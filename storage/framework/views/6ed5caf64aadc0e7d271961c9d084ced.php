

<?php $__env->startSection('page-title', __('Manage Themes')); ?>

<?php $__env->startSection('action-button'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><?php echo e(__('Manage Themes')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ basic-table ] start -->
   <div class="border border-primary rounded p-3">
        <?php
            $user = \Auth::guard('admin')->user();
            $store = App\Models\Store::where('id', $user->current_store)->first();
        ?>
        <div class="row uploaded-picss gy-4">
            <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="theme-card border-primary theme1  selected">
                        <input class="form-check-input email-template-checkbox d-none" type="radio" id="themes_<?php echo e(!empty($folder)?$folder:''); ?>" name="theme" value="<?php echo e(!empty($folder)?$store->theme_id== $folder :0); ?>"  <?php if(!empty($folder)?$store->theme_id== $folder :0 ): ?> checked="checked" <?php endif; ?> data-url="<?php echo e(route('admin.theme.change',[!empty($folder)?$folder:''])); ?>"/>

                        <label for="themes_<?php echo e(!empty($folder)?$folder:''); ?>">
                            <img src="<?php echo e(asset('themes/'.$folder.'/theme_img/img_1.png')); ?>" class="front-img">
                        </label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
   </div>
    <!-- [ basic-table ] end -->
</div>
<!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-script'); ?>
<script type="text/javascript">

    $(".email-template-checkbox").click(function(){
    
        var chbox = $(this);
        $.ajax({
            url: chbox.attr('data-url'),
            data: {_token: $('meta[name="csrf-token"]').attr('content'), status: chbox.val()},
            type: 'post',
            success: function (response) {
                if (response.is_success) {
                    show_toastr('Success', response.success, 'success');
                    if (chbox.val() == 1) {
                        $('#' + chbox.attr('id')).val(0);
                    } else {
                        $('#' + chbox.attr('id')).val(1);
                    }
                } else {
                    show_toastr('Error', response.error, 'error');
                }
            },
            error: function (response) {
                response = response.responseJSON;
                if (response.is_success) {
                    show_toastr('Error', response.error, 'error');
                } else {
                    show_toastr('Error', response, 'error');
                }
            }
        })
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ayman/Downloads/AnaLive/resources/views/theme/front_theme.blade.php ENDPATH**/ ?>