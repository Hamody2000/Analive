<?php
    $currantLang = \Auth::user()->lang;
    if ($currantLang == null) {
        $currantLang = 'en';
    }
    $user = \Auth::user();
    $current_store = \App\Models\Store::where('id', $user->current_store)->first();


    $displaylang = App\Models\Utility::languages();
    $theme_id = !empty($theme_id) ? $theme_id : APP_THEME();
    $settings = App\Models\Setting::pluck('value','name')->toArray();

    if(empty($settings['disable_lang'])){
        $settings = App\Models\Utility::Seting();
    }
    $toDisable = explode(',',$settings['disable_lang']);

        foreach($displaylang as $key => $data){
            if (str_contains($settings['disable_lang'], $key)) {
               unset($displaylang[$key]);
            }

        }
?>

<?php if(isset($cust_theme_bg) && $cust_theme_bg == 'on'): ?>
    <header class="dash-header transprent-bg">
    <?php else: ?>
        <header class="dash-header">
<?php endif; ?>
<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar">
                        <img alt="#" style="height:inherit;"
                            src="<?php echo e(!empty(Auth::guard('admin')->user()->profile_image) ? get_file(Auth::guard('admin')->user()->profile_image, APP_THEME()) : asset(Storage::url('uploads/profile/avatar.png'))); ?>"
                            class="header-avtar">

                    </span>
                    <span class="hide-mob ms-2">
                        <?php if(!Auth::guest()): ?>
                            <?php echo e(__('Hi, ')); ?><?php echo e(!empty(Auth::guard('admin')->user()) ? Auth::guard('admin')->user()->name : ''); ?>!
                        <?php else: ?>
                            <?php echo e(__('Guest')); ?>

                        <?php endif; ?>
                    </span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">

                    <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span><?php echo e(__('Profile')); ?></span>
                    </a>
                    <form method="POST" action="<?php echo e(route('admin.logout')); ?>" id="form_logout">
                        <a href="route('admin.logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="dropdown-item">
                            <i class="ti ti-power"></i>
                            <?php echo csrf_field(); ?>
                            <?php echo e(__('Log Out')); ?>

                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="ms-auto">
        <ul class="list-unstyled">
                <?php if (is_impersonating($guard = null)) : ?>
                    <li class="dropdown dash-h-item drp-company">
                        <a class="btn btn-danger btn-sm me-3"
                            href="<?php echo e(route('admin.exit.admin')); ?>"><i class="ti ti-ban"></i>
                            <?php echo e(__('Exit Admin Login')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth::user()->can('Create Admin Store')): ?>
                    <li class="dropdown dash-h-item drp-language">
                        <a href="#!" class="dropdown-item dash-head-link dropdown-toggle arrow-none me-0 cust-btn bg-primary" data-size="lg"
                            data-url="<?php echo e(route('admin.stores.create')); ?>" data-ajax-popup="true"
                            data-title="<?php echo e(__('Create New Store')); ?>">
                            <i class="ti ti-circle-plus"></i>
                            <span class="text-store"><?php echo e(__('Create New Store')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->can('Change Admin Store')): ?>
                    <li class="dash-h-item drp-language menu-lnk has-item">
                        <?php
                            $store_id = Auth::guard('admin')->user()->current_store;
                            $store = App\Models\Store::find($store_id);
                        ?>
                        <a class="dash-head-link arrow-none me-0 cust-btn megamenu-btn bg-warning" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false"
                            data-bs-placement="bottom" data-bs-original-title="Select your bussiness">
                            <i class="ti ti-building-store me-1"></i>
                            <span class="hide-mob"><?php echo e($store->name); ?></span>
                            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                        </a>
                        <?php
                            if (Auth::guard('admin')->user()->type != 'admin')
                            {
                                // $user = App\Models\Admin::find(\Auth::guard('admin')->user()->created_by);
                                $user_1 = App\Models\Admin::where('id',\Auth::user()->id)->first();
                                $assign_store = $user_1->is_assign;
                                $value = explode(',',$assign_store);
                                $user = App\Models\Store::whereIn('id',$value)->get();
                            }
                            else
                            {
                                $user = Auth::guard('admin')->user();
                            }
                        ?>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                            <?php if(Auth::guard('admin')->user()->type != 'admin'): ?>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($store->is_active): ?>
                                        <a href="<?php if(Auth::guard('admin')->user()->current_store == $store->id): ?> # <?php else: ?> <?php echo e(route('admin.changes_store', $store->id)); ?> <?php endif; ?>"
                                            class="dropdown-item">
                                            <?php if(Auth::guard('admin')->user()->current_store == $store->id): ?>
                                                <i class="ti ti-checks text-primary"></i>
                                            <?php endif; ?>
                                            <?php echo e($store->name); ?>

                                        </a>
                                    <?php else: ?>
                                        <a href="#!" class="dropdown-item">
                                            <i class="ti ti-lock"></i>
                                            <span><?php echo e($store->name); ?></span>
                                            <?php if(isset($store->pivot->permission)): ?>
                                                <?php if($store->pivot->permission == 'admin'): ?>
                                                    <span class="badge bg-dark"><?php echo e(__($store->pivot->permission)); ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-dark"><?php echo e(__('Shared')); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php $__currentLoopData = $user->stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($store->is_active): ?>
                                        <a href="<?php if(Auth::guard('admin')->user()->current_store == $store->id): ?> # <?php else: ?> <?php echo e(route('admin.changes_store', $store->id)); ?> <?php endif; ?>"
                                            class="dropdown-item">
                                            <?php if(Auth::guard('admin')->user()->current_store == $store->id): ?>
                                                <i class="ti ti-checks text-primary"></i>
                                            <?php endif; ?>
                                            <?php echo e($store->name); ?>

                                        </a>
                                    <?php else: ?>
                                        <a href="#!" class="dropdown-item">
                                            <i class="ti ti-lock"></i>
                                            <span><?php echo e($store->name); ?></span>
                                            <?php if(isset($store->pivot->permission)): ?>
                                                <?php if($store->pivot->permission == 'admin'): ?>
                                                    <span class="badge bg-dark"><?php echo e(__($store->pivot->permission)); ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-dark"><?php echo e(__('Shared')); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        
                        
                    </li>
                <?php endif; ?>

            
            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0 bg-info" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world nocolor me-1"></i>
                    <span class=""><?php echo e(Str::upper($currantLang)); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>

                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php $__currentLoopData = $displaylang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('admin.change.language', $key)); ?>"
                            class="dropdown-item <?php echo e($currantLang == $key ? 'text-primary' : ''); ?>">
                            <span><?php echo e(Str::ucfirst($lang)); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Auth::user()->type == 'superadmin'): ?>
                        <a href="<?php echo e(route('admin.manage.language', [$currantLang])); ?>"
                            class="dropdown-item border-top py-1 text-primary"><?php echo e(__('Manage Languages')); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
    </div>
</div>
</header>
<?php /**PATH F:\Hussein\Lean\Developments\AnaOnline_New_git\Analive\resources\views/partision/header.blade.php ENDPATH**/ ?>