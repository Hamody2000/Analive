<?php
    use App\Models\Utility;
    $settings = \Modules\LandingPage\Entities\LandingPageSetting::settings();
    $logo = get_file('storage/uploads/landing_page_image', 'grocery');

    $sup_logo = get_file('storage/uploads/logo', 'grocery');
    $adminSettings = Utility::Seting();
    $superadmin = \App\Models\Admin::where('type', 'superadmin')->first();
    $setting = \App\Models\Setting::where('store_id', $superadmin->current_store)
        ->pluck('value', 'name')
        ->toArray();
    $SITE_RTL = $setting['SITE_RTL'];

    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';

?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <title>
        <?php echo e(\App\Models\Utility::GetValueByName('title_text', APP_THEME()) ? \App\Models\Utility::GetValueByName('title_text', APP_THEME()) : 'EcommerceGo SaaS'); ?>

    </title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e(get_file($setting['favicon'] . '?timestamp=' . time(), 'grocery')); ?>"
        type="image/x-icon" />

    <!-- font css -->
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/tabler-icons.min.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/feather.css')); ?>" />
    <link rel="stylesheet" href="  <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/fonts/material.css')); ?>" />

    <!-- vendor css -->
    <link rel="stylesheet" href="  <?php echo e(Module::asset('LandingPage:Resources/assets/css/style.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/customizer.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/landing-page.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/custom.css')); ?>" />

    

    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/css/style-rtl.css')); ?>">
    <?php elseif($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/css/style.css')); ?>"
            id="main-style-link">
        <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/css/NewStyle.css')); ?>"
            id="main-style-link">
    <?php endif; ?>


</head>
<?php if($setting['cust_darklayout'] == 'on'): ?>

<body class="<?php echo e($color); ?> landing-dark landing-page">
<?php else: ?>
<body class="<?php echo e($color); ?> landing-page">

<?php endif; ?>

<!-- [ Header ] start -->
<header class="main-header">
    <?php if($settings['topbar_status'] == 'on'): ?>
        <div class="announcement bg-dark text-center p-2">
            <p class="mb-0"><?php echo $settings['topbar_notification_msg']; ?></p>
        </div>
    <?php endif; ?>
    <?php if($settings['menubar_status'] == 'on'): ?>
        <div class="container">
            <nav class="navbar navbar-expand-md  default top-nav-collapse">
                <div class="header-left custom-header-logo">
                    <a class="navbar-brand bg-transparent logo" href="#">
                        <img src="<?php echo e($logo . '/' . $settings['site_logo'] . '?timestamp=' . time()); ?>" class="logo"
                            alt="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home"><?php echo e($settings['home_title']); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features"><?php echo e($settings['feature_title']); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#plan"><?php echo e($settings['plan_title']); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq"><?php echo e($settings['faq_title']); ?></a>
                        </li>
                        <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                            <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->header == 'on'): ?>
                                    <li class="nav-item">
                                        <?php if(!empty($value->page_url)): ?>
                                            <a class="nav-link"
                                                href="<?php echo e($value->page_url); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                        <?php else: ?>
                                            <a class="nav-link"
                                                href="<?php echo e(route('custom.pages', $value->page_slug)); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                        <?php endif; ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                    <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="ms-auto d-flex justify-content-end gap-2">
                    <a href="<?php echo e(route('admin.login')); ?>" class="btn btn-outline-dark rounded"><span
                            class="hide-mob me-2">Login</span> <i data-feather="log-in"></i></a>
                    <?php if($adminSettings['SIGNUP'] == 'on'): ?>
                        <a href="<?php echo e(route('admin.register')); ?>" class="btn btn-outline-dark rounded"><span
                                class="hide-mob me-2">Register</span> <i data-feather="user-check"></i></a>
                    <?php endif; ?>
                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    <?php endif; ?>

</header>
<!-- [ Header ] End -->

<!-- [ Banner ] start -->
<?php if($settings['home_status'] == 'on'): ?>
    <section class="main-banner bg-primary BannerHomePage" id="home" style="background-image: url('<?php echo e(asset('home_assets/images/bg.svg')); ?>') !important;">
        <div class="container-offset">
            <div class="row gy-3 g-0 align-items-center">
                <div class="col-xxl-4 col-md-6">
                    <!-- <span class="badge py-2 px-3 bg-white text-dark rounded-pill fw-bold mb-3">
                        <?php echo e($settings['home_offer_text']); ?></span> -->
                    <h1 class="mb-3">
                        <?php echo e($settings['home_heading']); ?>

                    </h1>
                    <h6 class="mb-0"><?php echo e($settings['home_description']); ?></h6>
                    <div class="d-flex gap-3 mt-4 banner-btn">
                        <a href="<?php echo e(route('admin.login')); ?>" class="btn btn-outline-dark LoginToShop">Login To Shop</a>
                        <?php if($adminSettings['SIGNUP'] == 'on'): ?>
                            <a href="<?php echo e(route('admin.register')); ?>" class="btn btn-outline-dark LoginToShop">Register New Shop</a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-xxl-8 col-md-6">
                    <div class="dash-preview">
                        <img class="img-fluid preview-img" src="<?php echo e($logo . '/' . $settings['home_banner']); ?>"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div class="row g-0 gy-2 mt-4 align-items-center">
                <div class="col-xxl-3">
                    <p class="mb-0">Trusted by <b class="fw-bold"><?php echo e($settings['home_trusted_by']); ?></b></p>
                </div>
                <div class="col-xxl-9">
                    <div class="row gy-3 row-cols-9">
                        <?php $__currentLoopData = explode(',', $settings['home_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $home_logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-auto custom-header-logo">
                                <img src="<?php echo e($logo . '/' . $home_logo); ?>" alt="" class="img-fluid"
                                    style="width: 130px;">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
<?php endif; ?>
<!-- [ Banner ] start -->

<!-- [ features ] start -->
<?php if($settings['feature_status'] == 'on'): ?>
    <section class="features-section section-gap bg-dark" id="features">
        <div class="container">
            <div class="row gy-3">
                <div class="col-xxl-4">
                    <span class="d-block mb-2 text-uppercase text-white"><?php echo e($settings['feature_title']); ?></span>
                    <div class="title mb-4">
                        <h2><b class="fw-bold"><?php echo $settings['feature_heading']; ?></b></h2>
                    </div>
                    <p class="mb-3"><?php echo $settings['feature_description']; ?></p>
                    <?php if($settings['feature_buy_now_link']): ?>
                        <a href="<?php echo e(route('admin.register')); ?>"
                            class="btn btn-primary rounded-pill d-inline-flex align-items-center">Register Now <i
                                data-feather="lock" class="ms-2"></i></a>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-8">
                    <div class="row">
                        <?php if(is_array(json_decode($settings['feature_of_features'], true)) ||
                                is_object(json_decode($settings['feature_of_features'], true))): ?>
                            <?php $__currentLoopData = json_decode($settings['feature_of_features'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-sm-6 d-flex">
                                    <div class="card <?php echo e($key == 0 ? 'bg-primary' : ''); ?>">
                                        <div class="card-body">
                                            <span class="theme-avtar avtar avtar-xl mb-4">
                                                <img src="<?php echo e($logo . '/' . $value['feature_logo']); ?>" alt="">
                                            </span>
                                            <h3 class="mb-3 <?php echo e($key == 0 ? '' : 'text-white'); ?>">
                                                <?php echo $value['feature_heading']; ?></h3>
                                            <p class=" f-w-600 mb-0 <?php echo e($key == 0 ? 'text-body' : ''); ?>">
                                                <?php echo $value['feature_description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="title text-center mb-4">
                        <span class="d-block mb-2 text-uppercase text-white"><?php echo e($settings['feature_title']); ?></span>
                        <h2 class="mb-4"><?php echo $settings['highlight_feature_heading']; ?></h2>
                        <p><?php echo $settings['highlight_feature_description']; ?></p>
                    </div>
                    <div class="features-preview">
                        <img class="img-fluid m-auto d-block"
                            src="<?php echo e($logo . '/' . $settings['highlight_feature_image']); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ features ] start -->

<!-- [ element ] start -->
<?php if($settings['feature_status'] == 'on'): ?>
    <section class="element-section  section-gap ">
        <div class="container">
            <?php if(is_array(json_decode($settings['other_features'], true)) ||
                    is_object(json_decode($settings['other_features'], true))): ?>
                <?php $__currentLoopData = json_decode($settings['other_features'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key % 2 == 0): ?>
                        <div class="row align-items-center justify-content-center mb-4">
                            <div class="col-lg-4 col-md-6">
                                <div class="title mb-4">
                                    <span class="d-block fw-bold mb-2 text-uppercase">Features</span>
                                    <h2>
                                        <?php echo $value['other_features_heading']; ?>

                                    </h2>
                                </div>
                                <p class="mb-3"><?php echo $value['other_featured_description']; ?></p>
                                <a href="<?php echo e(route('admin.register')); ?>"
                                    class="btn btn-primary rounded-pill d-inline-flex align-items-center">Register Now <i
                                        data-feather="lock" class="ms-2"></i></a>
                            </div>
                            <div class="col-lg-7 col-md-6 res-img">
                                <div class="img-wrapper">
                                    <img src="<?php echo e($logo . '/' . $value['other_features_image']); ?>" alt=""
                                        class="img-fluid header-img">
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row align-items-center justify-content-center mb-4">
                            <div class="col-lg-7 col-md-6 m-bottom-img">
                                <div class="img-wrapper">
                                    <img src="<?php echo e($logo . '/' . $value['other_features_image']); ?>" alt=""
                                        class="img-fluid header-img">
                                </div>
                            </div>
                            <div class="col-lg-4  col-md-6">
                                <div class="title mb-4">
                                    <span class="d-block fw-bold mb-2 text-uppercase">Features</span>
                                    <h2>
                                        <?php echo $value['other_features_heading']; ?>

                                    </h2>
                                </div>
                                <p class="mb-3"><?php echo $value['other_featured_description']; ?></p>
                                <a href="<?php echo e(route('admin.register')); ?>"
                                    class="btn btn-primary rounded-pill d-inline-flex align-items-center">Register Now <i
                                        data-feather="lock" class="ms-2"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>
<!-- [ element ] end -->

<!-- [ element ] start -->
<?php if($settings['discover_status'] == 'on'): ?>
    <section class="bg-dark section-gap">
        <div class="container">
            <div class="row mb-2 justify-content-center">
                <div class="col-xxl-6">
                    <div class="title text-center mb-4">
                        <span class="d-block mb-2 text-uppercase text-white">DISCOVER</span>
                        <h2 class="mb-4"><?php echo $settings['discover_heading']; ?></h2>
                        <p><?php echo $settings['discover_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(is_array(json_decode($settings['discover_of_features'], true)) ||
                        is_object(json_decode($settings['discover_of_features'], true))): ?>
                    <?php $__currentLoopData = json_decode($settings['discover_of_features'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xxl-3 col-sm-6 col-lg-4 ">
                            <div class="card   border <?php echo e($key == 1 ? 'bg-primary' : 'bg-transparent'); ?>">
                                <div class="card-body text-center">
                                    <span class="theme-avtar avtar avtar-xl mx-auto mb-4">
                                        <img src="<?php echo e($logo . '/' . $value['discover_logo']); ?>" alt="">
                                    </span>
                                    <h3 class="mb-3 <?php echo e($key == 1 ? '' : 'text-white'); ?> "><?php echo $value['discover_heading']; ?>

                                    </h3>
                                    <p class="<?php echo e($key == 1 ? 'text-body' : ''); ?>">
                                        <?php echo $value['discover_description']; ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
            <div class="d-flex flex-column justify-content-center flex-sm-row gap-3 mt-3">
                

                <?php if($settings['discover_buy_now_link']): ?>
                    <a href="<?php echo e(route('admin.register')); ?>" class="btn btn-primary rounded-pill">Register Now
                        <i data-feather="lock" class="ms-2"></i> </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ element ] end -->

<!-- [ Screenshots ] start -->
<?php if($settings['screenshots_status'] == 'on'): ?>
    <section class="screenshots section-gap">
        <div class="container">
            <div class="row mb-2 justify-content-center">
                <div class="col-xxl-6">
                    <div class="title text-center mb-4">
                        <span class="d-block mb-2 fw-bold text-uppercase">SCREENSHOTS</span>
                        <h2 class="mb-4"><?php echo $settings['screenshots_heading']; ?></h2>
                        <p><?php echo $settings['screenshots_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 gx-4">
                <?php if(is_array(json_decode($settings['screenshots'], true)) || is_object(json_decode($settings['screenshots'], true))): ?>
                    <?php $__currentLoopData = json_decode($settings['screenshots'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="screenshot-card">
                                <div class="img-wrapper">
                                    <img src="<?php echo e($logo . '/' . $value['screenshots']); ?>"
                                        class="img-fluid header-img mb-4 shadow-sm" alt="">
                                </div>
                                <h5 class="mb-0"><?php echo $value['screenshots_heading']; ?></h5>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ Screenshots ] start -->

<!-- [ subscription ] start -->
<?php if($settings['plan_status']): ?>
    <section class="subscription bg-primary section-gap" id="plan" style="display:none">
        <div class="container">
            <div class="row mb-2 justify-content-center">
                <div class="col-xxl-6">
                    <div class="title text-center mb-4">
                        <span class="d-block mb-2 fw-bold text-uppercase">PLAN</span>
                        <h2 class="mb-4"><?php echo $settings['plan_heading']; ?></h2>
                        <p><?php echo $settings['plan_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                    $collection = \App\Models\Plan::take(3)
                        ->orderBy('price', 'ASC')
                        ->get();
                ?>
                <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div
                            class="card price-card shadow-none bg-white <?php echo e($key == 1 ? 'bg-light-primary' : ''); ?> <?php echo e($key == 2 ? 'bg-dark' : ''); ?>">
                            <div class="card-body">
                                <span class="price-badge bg-white text-success"><?php echo e($value->name); ?></span>
                                <span
                                    class="mb-4 f-w-600 p-price"><?php echo e(!empty($adminSettings['CURRENCY']) ? $adminSettings['CURRENCY'] : '$'); ?><?php echo e($value->price); ?><small
                                        class="text-sm">/<?php echo e($value->duration); ?></small></span>
                                <p>
                                    <?php echo $value->description; ?>

                                </p>
                                <ul class="list-unstyled my-3">
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->max_stores != -1 ? $value->max_stores . ' Store' : 'Unlimited'); ?>

                                                </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label" for="customCheckc1">
                                                <?php echo e($value->max_products != -1 ? $value->max_products . ' Products' : 'Unlimited'); ?>

                                                </label>
                                        </div>
                                    </li>
                                    

                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->enable_custdomain == 'on' ? 'Enable' : 'Disable'); ?>

                                                Custom Domain</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->enable_custsubdomain == 'on' ? 'Enable' : 'Disable'); ?>

                                                Sub Domain</label>
                                        </div>
                                    </li>
                                    
                                    
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->pwa_store == 'on' ? 'Enable' : 'Disable'); ?>

                                                Progressive Web App (PWA)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->enable_chatgpt == 'on' ? 'Enable' : 'Disable'); ?>

                                                Chatgpt</label>
                                        </div>
                                    </li>

                                </ul>
                                <?php if($adminSettings['SIGNUP'] == 'on'): ?>
                                    <div class="d-grid">
                                        <a href="<?php echo e(route('admin.register')); ?>"
                                            class="btn btn-primary rounded-pill">Start with
                                            Starter <i data-feather="log-in" class="ms-2"></i> </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ subscription ] end -->

<!-- [ FAqs ] start -->
<?php if($settings['faq_status'] == 'on'): ?>
    <section class="faqs section-gap bg-gray-100" id="faq">
        <div class="container">
            <div class="row mb-2">
                <div class="col-xxl-6">
                    <div class="title mb-4">
                        <span class="d-block mb-2 fw-bold text-uppercase"><?php echo e($settings['faq_title']); ?></span>
                        <h2 class="mb-4"><?php echo $settings['faq_heading']; ?></h2>
                        <p><?php echo $settings['faq_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php if(is_array(json_decode($settings['faqs'], true)) || is_object(json_decode($settings['faqs'], true))): ?>
                            <?php $__currentLoopData = json_decode($settings['faqs'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key % 2 == 0): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="<?php echo e('flush-heading' . $key); ?>">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="<?php echo e('#flush-' . $key); ?>"
                                                aria-expanded="false" aria-controls="<?php echo e('flush-collapse' . $key); ?>">
                                                <?php echo $value['faq_questions']; ?>

                                            </button>
                                        </h2>
                                        <div id="<?php echo e('flush-' . $key); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="<?php echo e('flush-heading' . $key); ?>"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php echo $value['faq_answer']; ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <?php if(is_array(json_decode($settings['faqs'], true)) || is_object(json_decode($settings['faqs'], true))): ?>
                            <?php $__currentLoopData = json_decode($settings['faqs'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key % 2 != 0): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="<?php echo e('flush-heading' . $key); ?>">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="<?php echo e('#flush-' . $key); ?>"
                                                aria-expanded="false" aria-controls="<?php echo e('flush-collapse' . $key); ?>">
                                                <?php echo $value['faq_questions']; ?>

                                            </button>
                                        </h2>
                                        <div id="<?php echo e('flush-' . $key); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="<?php echo e('flush-heading' . $key); ?>"
                                            data-bs-parent="#accordionFlushExample2">
                                            <div class="accordion-body">
                                                <?php echo $value['faq_answer']; ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ FAqs ] end -->


<!-- [ Footer ] start -->
<footer class="site-footer bg-gray-100">
    <div class="container">
        <div class="footer-row">
            <div class="ftr-col cmp-detail">
                <div class="footer-logo mb-3">
                    <a href="#" class="logo">
                        <img src="<?php echo e($logo . '/' . $settings['site_logo'] . '?timestamp=' . time()); ?>"
                            alt="logo">
                    </a>
                </div>
                <p>
                    <?php echo $settings['site_description']; ?>

                </p>

            </div>
            <div class="ftr-col">
                <ul class="list-unstyled">

                    <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                        <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->footer == 'on' && $value->header == 'off'): ?>
                                <li>
                                    <?php if(!empty($value->page_url)): ?>
                                        <a href="<?php echo e($value->page_url); ?>"><?php echo $value->menubar_page_name; ?></a>
                                    <?php else: ?>
                                        <a
                                            href="<?php echo e(route('custom.pages', $value->page_slug)); ?>"><?php echo $value->menubar_page_name; ?></a>
                                    <?php endif; ?>

                                </li>
                            <?php endif; ?>
                            <?php if($value->footer == 'on' && $value->header == 'on'): ?>
                                <li>
                                    <?php if(!empty($value->page_url)): ?>
                                        <a href="<?php echo e($value->page_url); ?>"><?php echo $value->menubar_page_name; ?></a>
                                    <?php else: ?>
                                        <a
                                            href="<?php echo e(route('custom.pages', $value->page_slug)); ?>"><?php echo $value->menubar_page_name; ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>



                </ul>
            </div>
            <div class="ftr-col">
                <ul class="list-unstyled">
                    <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                        <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->header == 'on' && $value->footer == 'off'): ?>
                                <li class="nav-item">
                                    <?php if(!empty($value->page_url)): ?>
                                        <a href="<?php echo e($value->page_url); ?>"><?php echo $value->menubar_page_name; ?></a>
                                    <?php else: ?>
                                        <a
                                            href="<?php echo e(route('custom.pages', $value->page_slug)); ?>"><?php echo $value->menubar_page_name; ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                </ul>
            </div>

            <?php if($settings['joinus_status'] == 'on'): ?>
                <div class="ftr-col ftr-subscribe">
                    <h2><?php echo $settings['joinus_heading']; ?></h2>
                    <p><?php echo $settings['joinus_description']; ?></p>
                    <form method="post" action="<?php echo e(route('join_us_store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-wrapper border border-dark">
                            <input type="text" name="email" placeholder="Type your email address...">
                            <button type="submit" class="btn btn-dark rounded-pill">Join Us!</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="border-top border-dark text-center p-2">
        



            <p class="mb-0"> &copy;  <?php echo e(date('Y')); ?>

                <?php echo e($adminSettings['footer_text'] ? $adminSettings['footer_text'] : config('app.name', 'E-CommerceGo')); ?>

            </p>


    </div>
</footer>
<?php if($adminSettings['enable_cookie'] == 'on'): ?>
    <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!-- [ Footer ] end -->

<!-- Required Js -->
<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/popper.min.js')); ?>"></script>
<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/feather.min.js')); ?>"></script>

<script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener("scroll", function() {
        let cOst = document.documentElement.scrollTop;
        if (cOst == 0) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
        } else if (cOst > ost) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
            document.querySelector(".navbar").classList.remove("default");
        } else {
            document.querySelector(".navbar").classList.add("default");
            document
                .querySelector(".navbar")
                .classList.remove("top-nav-collapse");
        }
        ost = cOst;
    });
    // End [ Menu hide/show on scroll ]

    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbar-example",
    });
    feather.replace();
</script>

</body>

</html>
<?php /**PATH C:\Users\01026\OneDrive\Desktop\Abd_elrahman\anaonline\AnaLive\Modules/LandingPage\Resources/views/layouts/landingpage.blade.php ENDPATH**/ ?>