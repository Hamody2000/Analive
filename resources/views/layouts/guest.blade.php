@php

    $theme_name = APP_THEME();
    $profile = asset(Storage::url('uploads/logo/'));

    $company_logo = \App\Models\Utility::GetLogo($theme_name);

    $company_logo = get_file($company_logo , APP_THEME());


    $favicon = \App\Models\Utility::GetValueByName('favicon',$theme_name);

    $favicon = get_file($favicon , APP_THEME());

    $superadmin = \App\Models\Admin::where('type','superadmin')->first();
    $superadmin_setting = \App\Models\Setting::where('store_id',$superadmin->current_store)->where('theme_id', $superadmin->theme_id)->pluck('value', 'name')->toArray();

    $settings = \App\Models\Setting::where('created_by', '1')->pluck('value', 'name')->toArray();

    $cust_darklayout = \App\Models\Utility::GetValueByName('cust_darklayout',$theme_name);
    $cust_theme_bg = \App\Models\Utility::GetValueByName('cust_theme_bg',$theme_name);
    $SITE_RTL = \App\Models\Utility::GetValueByName('SITE_RTL',$theme_name);

    $color = 'theme-3';
    if (!empty($settings['color'])) {
        $color = $settings['color'];
    }


    $lang = !empty(session()->get('lang')) ? session()->get('lang') : $superadmin->default_language;
    if ($lang == 'ar' || $lang == 'he') {
        $SITE_RTL = 'on';
    }

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



@endphp

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{isset($SITE_RTL) && $SITE_RTL == 'on'? 'rtl' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ \App\Models\Utility::GetValueByName('title_text',$theme_name) ? \App\Models\Utility::GetValueByName('title_text',$theme_name) : config('app.name', 'Laravel') }} - @yield('page-title') </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Favicon icon -->
    <link rel="icon" href="{{(!empty($favicon))? $favicon.'?timestamp=' . time() : $profile.'/logo-sm.svg'.'?timestamp=' . time()}}" type="image/x-icon" />
    {{-- <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" /> --}}

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

    <!-- vendor css -->
    @if ($cust_darklayout == 'on' && $SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}" id="main-style-link">
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}" id="main-style-link">
    @elseif($cust_darklayout == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}" id="main-style-link">
    @elseif($SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}" id="main-style-link">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}{{ "?v=".time() }}">

    <!-- New Register Modifications -->
    <link rel="stylesheet" href="{{ asset('home_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/Libs/VideoPopUp/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/icons/iconsmind/line-icons.min.css') }}">
    <!-- flipster -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_assets/Libs/JqueryFlibster/jquery.flipster.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/glide.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/contact-form.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/media-box.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/css/skin.css') }}">
    <link rel="icon" href="{{ asset('home_assets/images/fassvicon.png') }}">
    <!-- End New Modifications -->
</head>

<body class={{$color}}>


    <div @if (\Request::route()->getName() == 'admin.register') class="register-page auth-wrapper auth-v3" @else class="auth-wrapper auth-v3" @endif  >

        <!-- <div class="login-back-img">
            <img src="{{ asset('assets/images/auth/img-bg-1.svg') }}" alt="" class="img-fluid login-bg-1" />
            <img src="{{ asset('assets/images/auth/img-bg-2.svg') }}" alt="" class="img-fluid login-bg-2" />
            <img src="{{ asset('assets/images/auth/img-bg-3.svg') }}" alt="" class="img-fluid login-bg-3" />
            <img src="{{ asset('assets/images/auth/img-bg-4.svg') }}" alt="" class="img-fluid login-bg-4" />
        </div> -->

        <div class="bg-auth-side bg-primary login-page"></div>

        <div class="auth-content">
            <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2">

                    <a class="navbar-brand" href="#">
                        <img src="{{isset($company_logo) && !empty($company_logo) ? $company_logo.'?timestamp=' . time() : $profile.'/logo-dark.svg'.'?timestamp=' . time()}}" alt="logo" class="brand_icon"/>
                    </a>

                    <div class="d-flex gap-3">
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="flex-grow: 0;">
                            <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    @include('landingpage::layouts.buttons')
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown dash-h-item drp-language ecom-lang-drp">
                            <a class="dash-head-link dropdown-toggle arrow-none me-0 bg-primary" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti ti-world nocolor"></i>
                                <span class="drp-text">{{Str::upper($lang)}}</span>
                                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                            </a>

                            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                @foreach($displaylang as $key => $language)
                                    <a href="{{ route('admin.changelanguage', $key) }}"
                                        class="dropdown-item {{ $lang == $key ? 'text-primary' : '' }}">
                                        <span>{{Str::ucfirst($language)}}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> --}}

                </div>

                {{-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <select name="language" id="language" class="btn btn-light-primary dropdown-toggle custom_btn ms-2 me-2 language_option_bg" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            @foreach(App\Models\Utility::languages() as $key => $language)
                                <option class="dropdown-item" @if($lang == $key) selected @endif value="{{ route('admin.changelanguage',$key) }}">{{Str::upper($language)}}</option>
                            @endforeach
                        </select>
                    </li>
                </ul> --}}
            </nav>


            <div class="">
                <div class="row align-items-center justify-content-center text-start">
                    <div class="col-xl-12">
                        <div class=" mx-auto my-4" style="width: {{ request()->is('admin/selling-from-store') || request()->is('admin/selling-from-home') || request()->is('admin/register') ? '100%' : '400px' }}">
                            @yield('content')
                        </div>
                    </div>

                </div>
            </div>
            <div class="auth-footer">
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-black"> &copy; {{date('Y')}} {{ (App\Models\Utility::GetValueByName('footer_text',$theme_name)) ? App\Models\Utility::GetValueByName('footer_text',$theme_name) : 'Ecommerce' }}
                            </p>
                        </div>
                        <div class="col-6 text-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signup ] end -->

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor-all.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

    <!-- New Register Modifcations -->
    <script src="{{ asset('home_assets/js/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('home_assets/Libs/VideoPopUp/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('home_assets/Libs/VideoPopUp/js/script.js') }}"></script>
    <script src="{{ asset('home_assets/js/main.js') }}"></script>
    <script src="{{ asset('home_assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('home_assets/js/glide.min.js') }}"></script>
    <script src="{{ asset('home_assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('home_assets/js/tab-accordion.js') }}"></script>
    <script src="{{ asset('home_assets/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('home_assets/js/contact-form/contact-form.js') }}"></script>
    <script src="{{ asset('home_assets/js/progress.js') }}"></script>
    <script src="{{ asset('home_assets/js/custom.js') }}"></script>

    <script src="{{ asset('home_assets/Libs/imagepreview/jpreview.js') }}"></script>
    <script src="{{ asset('home_assets/Libs/imagepreview/bootstrap-prettyfile.js') }}"></script>

    <script>
        $('input[type="file"]').prettyFile();
        $('.demo').jPreview();
    </script>

    <script>
        $(function () {
          $('[data-toggle="popover"]').popover()
        })
    </script>

    <script>
        $(document).ready(function(){
        $('#haveDomain').change(function(){
            if($(this).is(":checked")){
            $('.toggle-box').hide(); // hide all toggle-box divs
            $('#haveDomain_Box').show(); // show the haveDomain_Box div
            }
            else{
            $('.toggle-box').hide(); // hide all toggle-box divs
            }
        });

        $('#RegistrDomain').change(function(){
            if($(this).is(":checked")){
            $('.toggle-box').hide(); // hide all toggle-box divs
            $('#RegistrDomain_Box').show(); // show the RegistrDomain_Box div
            }
            else{
            $('.toggle-box').hide(); // hide all toggle-box divs
            }
        });

            $('#NoThanks').change(function(){
            if($(this).is(":checked")){
            $('.toggle-box').hide(); // hide all toggle-box divs
            $('#RegistrDomain_Box').hide(); // show the RegistrDomain_Box div
                $('#haveDomain_Box').hide(); // show the haveDomain_Box div
            }
        });


        });
    </script>

    <script>
        $(document).ready(function(){
            $('.anima .radioBTNN').change(function(){
            if($(this).is(":checked")){
                $(this).closest('.anima').find('.cnt-box').addClass('highlight');
                $(".anima").not($(this).closest('.anima')).find('.cnt-box').removeClass('highlight');
            }
            else{
                $(this).closest('.anima').find('.cnt-box').removeClass('highlight');
            }
            });
        });

        $(document).ready(function() {
            $(".anima .radioBTNN").change(function () {
            $(".anima .radioBTNN").not($(this)).prop('checked', false);
            })
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".PolicyPOPUP").click(function () {
            $('.PopUpPolicyModal').addClass('show');
                $('body').addClass('modal-open');
            });
                    $(".BTNCLOSEMODAL").click(function () {
            $('.PopUpPolicyModal').removeClass('show');
                $('body').removeClass('modal-open');
            });

        });
    </script>

    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("start1").setAttribute("min", today);
        document.getElementById("start2").setAttribute("min", today);
        document.getElementById("start3").setAttribute("min", today);
    </script>

    <script>
        const todayTwo = new Date();
        const minDate = new Date(todayTwo.getTime() - (100 * 24 * 60 * 60 * 1000)).toISOString().split('T')[0];
        const maxDate = new Date(todayTwo.getTime() + (0 * 24 * 60 * 60 * 1000)).toISOString().split('T')[0];
        const myElement = document.getElementById("MinDtate");
        myElement.setAttribute("min", minDate);
        myElement.setAttribute("max", maxDate);
    </script>
    <!-- End New Modifications -->
</body>

@if ($superadmin_setting['enable_cookie'] == 'on')
    @include('layouts.cookie_consent')
@endif

</html>
