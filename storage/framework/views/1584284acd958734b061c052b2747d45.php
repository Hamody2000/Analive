<?php echo e(Form::open(['route' => 'admin.stores.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>


<?php
    $superadmin = \App\Models\Admin::where('type','superadmin')->first();
    $superadmin_setting = \App\Models\Setting::where('store_id',$superadmin->current_store)->where('theme_id', $superadmin->theme_id)->pluck('value', 'name')->toArray();
?>

<?php if((Auth::guard('admin')->user()->type == 'superadmin') && (!empty($superadmin_setting['chatgpt_key']))): ?>
    <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-primary me-2 ai-btn mb-3" data-size="lg" data-ajax-popup-over="true" data-url="<?php echo e(route('admin.generate',['store'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i> <?php echo e(__('Generate with AI')); ?>

        </a>
    </div>
<?php endif; ?>
<?php if((Auth::guard('admin')->user()->type == 'admin') && ($plan->enable_chatgpt == 'on')): ?>
    <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-primary me-2 ai-btn mb-3" data-size="lg" data-ajax-popup-over="true" data-url="<?php echo e(route('admin.generate',['store'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i> <?php echo e(__('Generate with AI')); ?>

        </a>
    </div>
<?php endif; ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo Form::label('', __('Store Name'), ['class' => 'form-label']); ?>

        <?php echo Form::text('storename', null, ['class' => 'form-control']); ?>

    </div>

    <?php if(Auth::user()->can('Create Admin Store')): ?>
        <div class="form-group  col-md-12">
            <?php
                $user = \Auth::guard('admin')->user();
                $store = App\Models\Store::where('id', $user->current_store)->first();
            ?>
            <?php echo Form::label('', __('Theme'), ['class' => 'form-label']); ?>

            <ul class="uploaded-pics row">
                <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="col-xl-4 col-lg-4 col-md-6">
                        <div class="theme-card border-primary theme1">
                        <input class="form-check-input email-template-checkbox d-none" type="radio" id="theme_<?php echo e(!empty($value)?$value:''); ?>" name="theme_id" value="<?php echo e(!empty($value)? $value :''); ?>"  <?php if(!empty($value)?$store->theme_id== $value :0 ): ?> checked="checked" <?php endif; ?>/>
                        <label for="theme_<?php echo e(!empty($value)?$value:''); ?>">
                            <img src="<?php echo e(asset('themes/'.$value.'/theme_img/img_1.png')); ?>" />
                        </label>
                    </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(Auth::guard('admin')->user()->type == 'superadmin'): ?>
        <div class="form-group col-md-12">
            <?php echo Form::label('', __('Name'), ['class' => 'form-label']); ?>

            <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo Form::label('', __('Email'), ['class' => 'form-label']); ?>

            <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo Form::label('', __('Password'), ['class' => 'form-label']); ?>

            <?php echo e(Form::password('password',array('class'=>'form-control'))); ?>

        </div>
    <?php endif; ?>

    <div class="modal-footer pb-0">
        <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
        <input type="submit" value="Create" class="btn btn-primary">
    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH /home/ayman/Downloads/AnaLive/resources/views/store/create.blade.php ENDPATH**/ ?>