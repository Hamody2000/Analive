
<?php
    $theme_name = !empty(APP_THEME()) ? APP_THEME() : '';
    $profile = asset(Storage::url('uploads/logo/'));
    $favicon = \App\Models\Utility::GetValueByName('favicon',$theme_name);
    $favicon = get_file($favicon , APP_THEME());

    $settings = \App\Models\Setting::where('store_id',getCurrentStore())->where('theme_id', $theme_name)->pluck('value', 'name')->toArray();
    // $settings = App\Models\Setting::pluck('value','name')->toArray();

    $cust_darklayout = \App\Models\Utility::GetValueByName('cust_darklayout',$theme_name);
    $cust_theme_bg = \App\Models\Utility::GetValueByName('cust_theme_bg',$theme_name);
    $SITE_RTL = \App\Models\Utility::GetValueByName('SITE_RTL',$theme_name);

    $color = 'theme-3';
    if (!empty($settings['color'])) {
        $color = $settings['color'];
    }

    $lang = (!empty(Auth::guard('admin')->user())) ? Auth::guard('admin')->user()->lang : 'en';
    if ($lang == 'ar' || $lang == 'he') {
        $SITE_RTL = 'on';
    }

    $superadmin = \App\Models\Admin::where('type','superadmin')->first();
    $superadmin_setting = \App\Models\Setting::where('store_id',$superadmin->current_store)->where('theme_id', $superadmin->theme_id)->pluck('value', 'name')->toArray();

    $settings_data = \App\Models\Utility::Seting();
?>

<!DOCTYPE html>
<html lang="en" dir="<?php echo e(isset($SITE_RTL) && $SITE_RTL == 'on'? 'rtl' : ''); ?>">

<head>
    <title> <?php echo e(isset($settings['title_text']) ? $settings['title_text'] : $superadmin_setting['title_text']); ?> - <?php echo $__env->yieldContent('page-title'); ?> </title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />
    <meta name="base-url" content="<?php echo e(URL::to('/')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e((!empty($favicon))? $favicon.'?timestamp=' . time() : $profile.'/logo-sm.svg'.'?timestamp=' . time()); ?>" type="image/x-icon" />
    <!-- notification css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/notifier.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">
    <!-- datatable css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">

    <?php if($cust_darklayout == 'on' && $SITE_RTL == 'on'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php elseif($cust_darklayout == 'on'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>" id="main-style-link">
    <?php elseif($SITE_RTL == 'on'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>
    

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/flatpickr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?><?php echo e("?v=".time()); ?>">

    <style>
        <?php echo isset($superadmin_setting['storecss']) ? $superadmin_setting['storecss'] :  $settings_data['storecss']; ?>

    </style>

    <!-- Photo Editor -->
    <link rel="stylesheet" href="<?php echo e(asset('editor_assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('editor_assets/css/loader.css')); ?>">
    <link href="<?php echo e(asset('editor_assets/css/boxicons.min.css')); ?>" rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End Photo Editor -->

</head>

<body class=<?php echo e($color); ?>>
    <?php echo $__env->make('partision.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partision.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- [ Main Content ] start -->
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-xl-5">
                            <div class="page-header-title">
                                <h4 class="m-b-10"><?php echo $__env->yieldContent('page-title'); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <?php if(\Request::route()->getName() != 'admin.dashboard'): ?>
                                    <a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Home')); ?></a>
                                    <?php endif; ?>
                                </li>
                                <?php echo $__env->yieldContent('breadcrumb'); ?>
                            </ul>
                        </div>
                        <div class="col-xl-7">
                            <?php echo $__env->yieldContent('action-button'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    
        <div id="commanModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelCommanModelLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelCommanModelLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <div id="commanModelOver" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelCommanModelLabel"
        aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelCommanModelLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <div id="commanModelOver2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelCommanModelLabel"
        aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelCommanModelLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
    
    <?php echo $__env->make('partision.settingPopup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partision.footerlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('custom-script'); ?>
    <?php echo $__env->yieldPushContent('custom-script1'); ?>

    <?php if($message = Session::get('success')): ?>
        <script>
            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo $message; ?>', 'success')
        </script>
    <?php endif; ?>

    <?php if($message = Session::get('error')): ?>
        <script>
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo $message; ?>', 'error')
        </script>
    <?php endif; ?>

</body>

<?php if($superadmin_setting['enable_cookie'] == 'on'): ?>
    <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

</html>
<?php /**PATH C:\Users\01026\OneDrive\Desktop\Abd_elrahman\anaonline\AnaLive\resources\views/layouts/app.blade.php ENDPATH**/ ?>