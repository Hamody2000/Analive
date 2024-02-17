<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>An Online</title>
    <meta name="description" content="">

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

    <script src="https://kit.fontawesome.com/7ecf8dac4e.js" crossorigin="anonymous"></script>
    <style>
        body > nav.menu-transparent, .menu-transparent .form-control, .menu-transparent .btn, .menu-transparent .menu-cnt > ul > li:hover > a, .menu-transparent .lan-menu > li > a, .menu-transparent .btn:hover, .menu-big-box.menu-transparent .menu-box, .menu-transparent .menu-mini, .menu-transparent .lan-menu > li:hover > a {
    background: #37517e;
}
    </style>
</head>
<body>
    <div id="preloader"></div>
    <nav class="menu-classic menu-fixed menu-transparent menu-one-page align-right light" data-menu-anima="fade-bottom" data-scroll-detect="true">
        <div class="container">
            <div class="menu-brand">
                <a href="index.html">
                    <img class="logo-default" src="home_assets/images/logo-light.svg" alt="logo" />
                    <img class="logo-retina" src="home_assets/images/logo-light.svg" alt="logo" />
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul>
                    <li class="active">
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="index.html">About</a>
                    </li>
                    <li>
                        <a href="index.html">Selling</a>
                    </li>
                    <li>
                        <a href="index.html">Features</a>
                    </li>
                    <li>
                        <a href="toutrial.html">Tutorials </a>
                    </li>
                    
                    <li>
                        <a href="index.html">partners </a>
                    </li>
                    <li>
                        <a href="FAQ.html">FAQ </a>
                    </li>
                    <li>
                        <a href="index.html">Contact Us </a>
                    </li>
                </ul>
                <div class="menu-right">
                    <ul class="lan-menu">
                        <li class="dropdown">
                            <a href="Ar/SellingHome.html"><img src="home_assets/images/eg.png" alt="" />AR </a>
                        </li>
                    </ul>
                    <div class="menu-custom-area hidden-xs">
                        <a class="btn btn-border btn-circle btn-xs" href="#">Login</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="menu-custom-area loginBTN_XS visible-xs">
                <a class="btn btn-border btn-circle btn-xs" href="#">Login</a>
            </div>
        </div>
    </nav>
   
    <main>

    <div class="PagTitle">
        <div class="container">
            <h1>Selling from Home</h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Selling</a></li>
            </ol>
        </div>
    </div>
        <div class="FormSelling">
            <div class="container">
                <div class="FormSellingForm">
                    <form>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-0 row">
                                            <label class="LableText col-lg-3 col-md-3 col-sm-12">Enter your shop Name * 
                                                <span class="" 
                                                        data-container="body" 
                                                        data-toggle="popover" 
                                                        data-trigger="hover" 
                                                        data-placement="top" 
                                                        data-content="This will be your shop URL if you don’t have registered domain address">
                                                        <i class="fas fa-question"></i>
                                                   
                                                </span>
                                            </label>
                                            <div class="fomgroupDisplayFlex col-md-5 col-md-5 col-sm-12">
                                                <div class="fomgroupDisplayCOntent">
                                                    <div class="BoxAnaonlineName">
                                                        <input type="text" placeholder="Shop Name" class="form-control minwidth200px" required> <span style="margin: 0 5px;">.Anaonline.io</span>
                                                    </div>
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5 class="font-size-14 mb-4">Do you have Domain Name *</h5>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-check mb-1">
                                                        <input class="form-check-input" type="radio" name="formRadios"
                                                            id="haveDomain">
                                                        <label class="form-check-label" for="haveDomain">
                                                            Yes, I have a domain name
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 toggle-box" style="display: none" id="haveDomain_Box">
                                                    <div class="form-group">
                                                        <label class="LableText">Write your domain *</label>
                                                        <div class="fomgroupDisplayFlex">
                                                            <div class="fomgroupDisplayCOntent">
                                                                <input type="text" placeholder="Write your domain" class="form-control minwidth250px" required>
                                                                <span class="text-success"><i class="fas fa-check"></i></span>
                                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-check mb-1">
                                                        <input class="form-check-input" type="radio" name="formRadios"
                                                            id="RegistrDomain">
                                                        <label class="form-check-label" for="RegistrDomain">
                                                            No, Register a new domain
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 toggle-box" style="display: none" id="RegistrDomain_Box">
                                                    <div class="form-group">
                                                        <label class="LableText">Search your domain *</label>
                                                        <div class="fomgroupDisplayFlex">
                                                            <div class="fomgroupDisplayCOntent">
                                                                <input type="text" placeholder="Search your domain" class="form-control minwidth250px" required>
                                                                <span class="text-success"><i class="fas fa-check"></i></span>
                                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                                                <div class="BTNSEARCH">
                                                                    <button type="button">Search</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-check mb-1">
                                                        <input class="form-check-input" type="radio" name="formRadios"
                                                            id="NoThanks">
                                                        <label class="form-check-label" for="NoThanks">
                                                            No, Thanks I will continue with shopname.anaonline.io
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="Bakagessss">
                                                <div class="card mt-3 hidden-xs">
                            <div class="card-body">
                                <div class="tab-box" >
                    <ul class="tab-nav align-center">
                        <li class="active"><a href="#">Monthly plan</a></li>
                        <li><a href="#">Yearly plan</a></li>
                    </ul>
                    <div class="panel active" >
                        <div class="row" >
                             <div class="col-lg-4 anima">
                                <div class="cnt-box cnt-pricing-table">
                                    <div class="Requmended" style="opacity: 0">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Starter</h2>
                                        <div class="price">$<span>19</span></div>
                                        <p>Per Month</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                    id="CheckPlan1">
                                                <label class="form-check-label" for="CheckPlan1">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>100 Products limits</li>
                                        <li>AI Photo Editor Tool</li>
                                        <li>30 Days money back guarantee</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>
                                        
                                        
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 anima">
                                <div class="cnt-box RequmendedBox cnt-pricing-table">
                                    <div class="Requmended">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Professional</h2>
                                        <div class="price">$<span>49</span></div>
                                        <p>Per Month</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                    id="CheckPlan2">
                                                <label class="form-check-label" for="CheckPlan2">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>1000 Products limits</li>
                                        <li>AI Photo Editor Tool</li>
                                        <li>Social Media Auto Publisher Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>
                                        
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 anima">
                                <div class="cnt-box cnt-pricing-table">
                                    <div class="Requmended" style="opacity: 0">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Premium</h2>
                                        <div class="price">$<span>89</span></div>
                                        <p>Per Month</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios"
                                                    id="CheckPlan3">
                                                <label class="form-check-label" for="CheckPlan3">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>Unlimited Products</li>
                                        <li>AI Photo Editor</li>
                                        <li>Social Media Auto Publisher</li>
                                        <li>Email Marketing Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                    </ul>
                                    
                                </div>
                            </div>
                      
                        </div>
                    </div>
                    <div class="panel">
                        <div class="row">
                           <div class="col-lg-4 anima">
                                <div class="cnt-box cnt-pricing-table">
                                    <div class="Requmended" style="opacity: 0">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Starter</h2>
                                        <div class="price">$<span>19</span></div>
                                        <p>Per Year</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                    id="CheckPlan4">
                                                <label class="form-check-label" for="CheckPlan4">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>100 Products limits</li>
                                        <li>AI Photo Editor Tool</li>
                                        <li>30 Days money back guarantee</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>
                                        
                                        
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 anima">
                                <div class="cnt-box RequmendedBox cnt-pricing-table">
                                    <div class="Requmended">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Professional</h2>
                                        <div class="price">$<span>49</span></div>
                                        <p>Per Year</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                    id="CheckPlan5">
                                                <label class="form-check-label" for="CheckPlan5">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>1000 Products limits</li>
                                        <li>AI Photo Editor Tool</li>
                                        <li>Social Media Auto Publisher Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>
                                        
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 anima">
                                <div class="cnt-box cnt-pricing-table">
                                    <div class="Requmended" style="opacity: 0">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Premium</h2>
                                        <div class="price">$<span>89</span></div>
                                        <p>Per Year</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios"
                                                    id="CheckPlan6">
                                                <label class="form-check-label" for="CheckPlan6">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>Unlimited Products</li>
                                        <li>AI Photo Editor</li>
                                        <li>Social Media Auto Publisher</li>
                                        <li>Email Marketing Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                    </ul>
                                    
                                </div>
                            </div>
                      
                        </div>
                    </div>
                </div>
              
                            </div>
                        </div>
                        
                        <div class="card mt-3 visible-xs">
                            <div class="card-body">
                                <div class="tab-box" >
                    <ul class="tab-nav align-center">
                        <li class="active"><a href="#">Monthly plan</a></li>
                        <li><a href="#">Yearly plan</a></li>
                    </ul>
                    <div class="panel active" >
                        <div class="tab-box ChildTapRespons" >
                            <ul class="tab-nav align-center">
                                <li class="active"><a href="#">Starter</a></li>
                                <li><a href="#">Professional</a></li>
                                <li><a href="#">Premium</a></li>
                            </ul>
                            <div class="panel active" >
                                <div class="row" >
                                     <div class="col-lg-4 anima">
                                        <div class="cnt-box cnt-pricing-table">
                                            <div class="Requmended" style="opacity: 0">
                                                <p>Recommended</p>
                                            </div>
                                            <div class="top-area">
                                                <h2>Starter</h2>
                                                <div class="price">$<span>19</span></div>
                                                <p>Per Month</p>
                                            </div>
                                            <div class="bottom-area form-group mb-0">
                                                <div class="form-check">
                                                        <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                            id="CheckPlan_M_1">
                                                        <label class="form-check-label" for="CheckPlan_M_1">
                                                            Select Plane
                                                        </label>
                                                    </div>
                                            </div>
                                            <ul>
                                                <li>100 Products limits</li>
                                                <li>AI Photo Editor Tool</li>
                                                <li>30 Days money back guarantee</li>
                                                <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>


                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="row">

                                   <div class="col-lg-4 anima">
                                <div class="cnt-box RequmendedBox cnt-pricing-table">
                                    <div class="Requmended">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Professional</h2>
                                        <div class="price">$<span>49</span></div>
                                        <p>Per Month</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                    id="CheckPlan_M_2">
                                                <label class="form-check-label" for="CheckPlan_M_2">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>1000 Products limits</li>
                                        <li>AI Photo Editor Tool</li>
                                        <li>Social Media Auto Publisher Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>
                                        
                                    </ul>
                                    
                                </div>
                            </div>

                                </div>
                            </div>
                            <div class="panel" >
                                <div class="row" >
                                     <div class="col-lg-4 anima">
                                <div class="cnt-box cnt-pricing-table">
                                    <div class="Requmended" style="opacity: 0">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Premium</h2>
                                        <div class="price">$<span>89</span></div>
                                        <p>Per Month</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios_Mobile"
                                                    id="CheckPlan_M_3">
                                                <label class="form-check-label" for="CheckPlan_M_3">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>Unlimited Products</li>
                                        <li>AI Photo Editor</li>
                                        <li>Social Media Auto Publisher</li>
                                        <li>Email Marketing Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                    </ul>
                                    
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="panel">
                        <div class="tab-box ChildTapRespons" >
                            <ul class="tab-nav align-center">
                                <li class="active"><a href="#">Starter</a></li>
                                <li><a href="#">Professional</a></li>
                                <li><a href="#">Premium</a></li>
                            </ul>
                            <div class="panel active" >
                                <div class="row" >
                                     <div class="col-lg-4 anima">
                                <div class="cnt-box cnt-pricing-table">
                                    <div class="Requmended" style="opacity: 0">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Starter</h2>
                                        <div class="price">$<span>19</span></div>
                                        <p>Per Year</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                    id="CheckPlan_M_4">
                                                <label class="form-check-label" for="CheckPlan_M_4">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>100 Products limits</li>
                                        <li>AI Photo Editor Tool</li>
                                        <li>30 Days money back guarantee</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>
                                        
                                        
                                    </ul>
                                    
                                </div>
                            </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="row">

                                    <div class="col-lg-4 anima">
                                <div class="cnt-box RequmendedBox cnt-pricing-table">
                                    <div class="Requmended">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Professional</h2>
                                        <div class="price">$<span>49</span></div>
                                        <p>Per Year</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                    id="CheckPlan_M_5">
                                                <label class="form-check-label" for="CheckPlan_M_5">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>1000 Products limits</li>
                                        <li>AI Photo Editor Tool</li>
                                        <li>Social Media Auto Publisher Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>
                                        
                                    </ul>
                                    
                                </div>
                            </div>

                                </div>
                            </div>
                            <div class="panel" >
                                <div class="row" >
                                     <div class="col-lg-4 anima">
                                <div class="cnt-box cnt-pricing-table">
                                    <div class="Requmended" style="opacity: 0">
                                        <p>Recommended</p>
                                    </div>
                                    <div class="top-area">
                                        <h2>Premium</h2>
                                        <div class="price">$<span>89</span></div>
                                        <p>Per Year</p>
                                    </div>
                                    <div class="bottom-area form-group mb-0">
                                        <div class="form-check">
                                                <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios_Mobile"
                                                    id="CheckPlan_M_6">
                                                <label class="form-check-label" for="CheckPlan_M_6">
                                                    Select Plane
                                                </label>
                                            </div>
                                    </div>
                                    <ul>
                                        <li>Unlimited Products</li>
                                        <li>AI Photo Editor</li>
                                        <li>Social Media Auto Publisher</li>
                                        <li>Email Marketing Tool</li>
                                        <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                    </ul>
                                    
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>           
                    </div>
                </div>
              
                            </div>
                        </div>
                        
                        
                        </div>
                        
                        

                        

                        
                        
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4>Business Information: 
<!--                                    <span> يجب ادخال البيانات كما هو مذكور وموضح في بطاقة الرقم القومي الخاص بصاحب التجارة</span>-->
                                    <span class="" 
                                                        data-container="body" 
                                                        data-toggle="popover" 
                                                        data-trigger="click" 
                                                        data-placement="top" 
                                                        data-content="All data must be entered as shown/stated in your National ID Card">
                                                        <i class="fas fa-question"></i>
                                                </span></h4>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Brand/Business Name *
                                            </label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="Brand/Business Name " class="form-control " required>
<!--
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Authorized Person Full Name *
<!--                                                <span>يجب ادخال الاسم كاملا للمفوض عن إدارة التجارة كما هو مكتوب ببطاقة الرقم القومي</span>-->
                                                <span class="" 
                                                        data-container="body" 
                                                        data-toggle="popover" 
                                                        data-trigger="hover" 
                                                        data-placement="top" 
                                                        data-content="Full name of authorized owner of the business must be entered as shown/stated in National ID">
                                                        <i class="fas fa-question"></i>
                                                </span>
                                            </label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="Authorized Person Full Name" class="form-control" required>
<!--
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
-->
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Business Industry/Activity *
<!--                                                <span>سيتم تقديم مستندات رسمية إضافية اذا كنت احد الأنشطة التالية (سياحة – طبي - صيدلية – جمع التبرعات – مواد التجميل)</span>-->
                                                <span class="" 
                                                        data-container="body" 
                                                        data-toggle="popover" 
                                                        data-trigger="hover" 
                                                        data-placement="top" 
                                                        data-content="For following activities extra documents will be required (Tourism-Doctors-Charity-Pharmacies-Cosmetics Services)">
                                                        <i class="fas fa-question"></i>
                                                </span>
                                            </label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="Business Industry/Activity" class="form-control" required>
<!--
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
-->
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12"></div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Business Website/Social Media URLs</label>
                                            <div class="fomgroupDisplayFlex mb-2">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="" class="form-control" required>
                                                    <button class="ADDMORE"><i class="fas fa-plus"></i> Add</button>
                                                </div>
                                            </div>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="" class="form-control" required>
                                                    <button class="DeleteMore"><i class="fas fa-trash-alt"></i> Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Phone Number</label>
                                            <div class="fomgroupDisplayFlex mb-2">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="" class="form-control" required>
                                                    <button class="ADDMORE"><i class="fas fa-plus"></i> Add</button>
                                                </div>
                                            </div>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="" class="form-control" required>
                                                    <button class="DeleteMore"><i class="fas fa-trash-alt"></i> Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="LableText">Business Owner Address *</label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="Company Address" class="form-control" required>
<!--
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">City</label>
                                            <div class="fomgroupDisplayFlex mb-2">
                                                <div class="fomgroupDisplayCOntent">
                                                   <input type="text" placeholder="City" class="form-control" required>
<!--
                                                     <select >
                                                         <option>Select City</option>
                                                        <option>الغربية</option>
                                                        <option>الإسكندرية</option>
                                                        <option>الإسماعيلية</option>
                                                        <option>كفر الشيخ</option>
                                                        <option>أسوان</option>
                                                        <option>أسيوط</option>
                                                        <option>الأقصر</option>
                                                        <option>الوادي الجديد</option>
                                                        <option>شمال سيناء</option>
                                                        <option>البحيرة</option>
                                                        <option>بني سويف</option>
                                                        <option>بورسعيد</option>
                                                        <option>البحر الأحمر</option>
                                                        <option>الجيزة</option>
                                                        <option>الدقهلية</option>
                                                        <option>جنوب سيناء</option>
                                                        <option>دمياط</option>
                                                        <option>سوهاج</option>
                                                        <option>السويس</option>
                                                        <option>الشرقية</option>
                                                        <option>الغربية</option>
                                                        <option>الفيوم</option>
                                                        <option>القاهرة</option>
                                                        <option>القليوبية</option>
                                                        <option>قنا</option>
                                                        <option>مطروح</option>
                                                        <option>المنوفية</option>
                                                        <option>المنيا</option>
                                                    </select>
-->
                                                   
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Country</label>
                                            <div class="fomgroupDisplayFlex mb-2">
                                                <div class="fomgroupDisplayCOntent">
                                                   
                                                     <select class="form-control">
                                                         <option>Select Country</option>
                                                        <option >Egypt</option>
                                                        <option disabled>Kewait Comming Soon</option>
                                                        <option disabled>Saudi Arabia Comming Soon</option>
                                                        <option disabled> United State Of Emarate Comming Soon</option>
                                                        <option disabled>Qater Comming Soon</option>
                                                        <option disabled>Oman Comming Soon</option>
                                                        <option disabled>Ordon Comming Soon</option>
                                                        <option disabled> Kinia Comming Soon</option>
                                                        <option disabled> Nigeria Comming Soon</option>
                                                     
                                                    </select>
                                                   
                                                </div>
                                            </div>
<!--
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="" class="form-control" required>
                                                    <button class="DeleteMore"><i class="fas fa-trash-alt"></i> Delete</button>
                                                </div>
                                            </div>
-->
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Email *</label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="Email" class="form-control" required>
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="LableText">Conform Email</label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="text" placeholder="Confirm Email" class="form-control" required>
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    
                         <div class="card mb-3">
                            <div class="card-body">
                                <h4>Business Papers:</h4>
                                <div class="row">
                                    
                                   
                                    <div class="col-lg-6">
                                        <div class="form-group FileUplaod">
                                            <label class="LableText">Authorized Person National ID *
<!--                                                <span>يجب ادخال الاسم كاملا للمفوض عن إدارة التجارة كما هو مكتوب ببطاقة الرقم القومي</span>-->
                                                <span class="" 
                                                        data-container="body" 
                                                        data-toggle="popover" 
                                                        data-trigger="hover" 
                                                        data-placement="top" 
                                                        data-content="Full name of authorized owner of the business must be entered as shown/stated in National ID">
                                                        <i class="fas fa-question"></i>
                                                </span>
                                            </label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent" >
                                                    <input type="file" placeholder="Last Name" class="form-control" required>
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group width_87">
                                            <label class="LableText mb-0">Document expiry date</label>
                                            <div class="fomgroupDisplayFlex mb-0">
                                                <div class="fomgroupDisplayCOntent">
                                                   <input id="start1" type="date" class="form-control" required>
                                                    <span class="IconCalnder"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group FileUplaod">
                                            <label class="LableText">Utility Bill (Electricity,Water,Gas,etc) Max(3month Old):
<!--                                                <span>مسح ضوئي لمستند او صورة عالية الجودة لفاتورة غاز او كهرباء او مياه حديثة بحد اقصى ٣ شهور وتكون بنفس العنوان المسجل ببطاقة الرقم القومي لصاحب التجارة</span>-->
                                                <span class="CustomQuesTionIcon" 
                                                        data-container="body" 
                                                        data-toggle="popover" 
                                                        data-trigger="hover" 
                                                        data-placement="top" 
                                                        data-content="Clear and high quality scan document/photo for New Utility bill (Electric, Water, Gas,etc) not older than 3 months with same address of the National ID Card.">
                                                        <i class="fas fa-question"></i>
                                                </span>
                                            </label>
                                            <div class="fomgroupDisplayFlex">
                                                <div class="fomgroupDisplayCOntent">
                                                    <input type="file" placeholder="" class="form-control" required>
                                                    <span class="text-success"><i class="fas fa-check"></i></span>
                                                    <span class="text-danger"><i class="fas fa-times"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group width_87">
                                            <label class="LableText mb-0">Date Of Utility Bill</label>
                                            <div class="fomgroupDisplayFlex mb-0">
                                                <div class="fomgroupDisplayCOntent">
                                                   <input id="MinDtate" type="date" class="form-control" required>
                                                    <span class="IconCalnder"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4>Banking Details 
<!--                                    <span>سيتم إيداع جميع مدفوعات متجرك الالكتروني عبر الإنترنت إلى هذا الحساب البنكي</span>-->
                                    <span class="" 
                                            data-container="body" 
                                            data-toggle="popover" 
                                            data-trigger="hover" 
                                            data-placement="top" 
                                            data-content="All of your shop online payments will be credited to this account">
                                            <i class="fas fa-question"></i>
                                    </span>
                                </h4>
                                </div>
                                
                                <div class="row">
                                    
                                    
                                    <div class="col-lg-12">
                                        <div class="row">
                                             <div class="col-lg-12">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="LableText">Bank Name *</label>
                                                            <input type="text" placeholder="Bank Name" class="form-control" required>
<!--
                                                            <span class="text-success">Valid Name</span>
                                                            <span class="text-danger">In Valid Name</span>
-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="LableText">Bank Branch Name *</label>
                                                            <input type="text" placeholder="Bank Branch Name" class="form-control" required>
<!--
                                                            <span class="text-success">Valid Branch Nam</span>
                                                            <span class="text-danger">In Valid Branch Nam</span>
-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="LableText">Bank Account Name *</label>
                                                            <input type="text" placeholder="Bank Account Name" class="form-control" required>
<!--
                                                            <span class="text-success">Valid Account Name</span>
                                                            <span class="text-danger">In Valid Account Name</span>
-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="LableText">Bank Account Number *</label>
                                                            <input type="text" placeholder="Bank Account Number" class="form-control" required>
<!--
                                                            <span class="text-success">Valid Account Number</span>
                                                            <span class="text-danger">In Valid Account Number</span>
-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="LableText">IBAN *</label>
                                                            <input type="text" placeholder="IBAN" class="form-control" required>
<!--
                                                            <span class="text-success">IBAN</span>
                                                            <span class="text-danger">IBAN</span>
-->
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4>Payment Details
<!--                                    <span>مصاريف ربط بوابة الدفع تدفع مرة واحدة فقط</span>-->
<!--
                                    <span class="" 
                                            data-container="body" 
                                            data-toggle="popover" 
                                            data-trigger="hover" 
                                            data-placement="top" 
                                            data-content="Fees of Payment Gateway integration fees paid only 1 time">
                                            <i class="fas fa-question"></i>
                                    </span>
-->
                                </h4>
                                </div>
                                
                                <div class="row">
                                    
                                    
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="LableText">Name on Card *</label>
                                                            <input type="text" placeholder="Name on Card" class="form-control" required>
<!--
                                                            <span class="text-success">Valid Name</span>
                                                            <span class="text-danger">In Valid Name</span>
-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="LableText">Card Number *</label>
                                                            <input type="text" placeholder="Card Number" class="form-control" required>
<!--
                                                            <span class="text-success">Valid Card Number</span>
                                                            <span class="text-danger">In Valid Card Number</span>
-->
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <div class="form-group">
                                                                    <label class="LableText">Expiry Date *</label>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <input type="text" placeholder="MM" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <input type="text" placeholder="YY" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label class="LableText">CVC *</label>
                                                                    <input type="text" placeholder="CVC" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4 col-md-4 col-xs-12">
                                                <div class="DiscountBox">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group DiscodeInput">
                                                                <label class="LableText">Discount Code</label>
                                                                <input type="text" placeholder="Discount Code" class="form-control" required>
                                                                <button type="button" class="ApplayDiscount">Apply</button>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <div class="RolresPaymentItem">
                                                                    <div class="rightSide">
                                                                        <p>Starter</p>
                                                                        <span class="Bahatan">Annually – 1 Year or Monthly – 1 Month</span>
                                                                    </div>
                                                                    <div class="leftSide">
                                                                        <span class="ValueItem">6666 EGP</span>
                                                                    </div>
                                                                </div>
                                                                <div class="RolresPaymentItem">
                                                                    <div class="rightSide">
                                                                        <p>Domain</p>
                                                                        <span class="Bahatan">1 Year </span>
                                                                    </div>
                                                                    <div class="leftSide">
                                                                        <span class="ValueItem">370 EGP</span>
                                                                    </div>
                                                                </div>
                                                                <div class="RolresPaymentItem">
                                                                    <div class="rightSide">
                                                                        <p>Payment Gate fees 
                                                                            <span class="Info" 
                                                                        data-container="body" 
                                                                        data-toggle="popover" 
                                                                        data-trigger="hover" 
                                                                        data-placement="top" 
                                                                        data-content="Fees of Payment Gateway integration fees paid only 1 time">
                                                                        <i class="fas fa-question"></i>
                                                                    </span> </p>
                                                                        <span class="Bahatan">Annually/ monthly </span>
                                                                    </div>
                                                                    <div class="leftSide">
                                                                        <span class="ValueItem">370 EGP</span>
                                                                    </div>
                                                                </div>
                                                                <div class="RolresPaymentItem">
                                                                    <div class="rightSide">
                                                                        <p>Taxes 14%:</p>
<!--                                                                        <span class="Bahatan">1 Year </span>-->
                                                                    </div>
                                                                    <div class="leftSide">
                                                                        <span class="ValueItem">985.04 EPG</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <h1><span>Total:</span><span>8021.04 EGP</span></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-check form-checkbox-outline form-check-info mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="customCheckcolor3" >
                                                    <label class="form-check-label" for="customCheckcolor3">
                                                        I agree to terms & 
                                                    </label>
                                                    <button type="button" class="PolicyPOPUP" data-bs-toggle="modal" data-bs-target="#exampleModal" >Condition & Policy</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="BTNSUBMIT">
                            <button type="submit" class="CheckOut">Check Out</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>


      
        <section id="partners" class="section-base partnersSction">
            <div class="container">
                <ul class="slider" data-options="type:carousel,arrows:false,nav:false,perView:5,perViewMd:3,perViewSm:2,perViewXs:1,gap:100,autoplay:3000">
                    <li>
                        <img src="home_assets/images/logos/logo-1.png" alt="" />
                    </li>
                    <li>
                        <img src="home_assets/images/logos/logo-2.png" alt="" />
                    </li>
                    <li>
                        <img src="home_assets/images/logos/logo-3.png" alt="" />
                    </li>
                    <li>
                        <img src="home_assets/images/logos/logo-6.png" alt="" />
                    </li>
                    <li>
                        <img src="home_assets/images/logos/logo-5.png" alt="" />
                    </li>
                    <li>
                        <img src="home_assets/images/logos/logo-4.png" alt="" />
                    </li>
                </ul>
            </div>
        </section>
        
        

        
        
        

   
        

    </main>
    <i class="scroll-top-btn scroll-top show"></i>
    <footer class="footer-parallax light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h4>Company and team</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="#">Company details and team</a>
                            </li>
                            <li>
                                <a href="#">News and blog</a>
                            </li>
                            <li>
                                <a href="#">Press area</a>
                            </li>
                            <li>
                                <a href="#">Affiliates and marketing</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Help and support</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="#">Help centre</a>
                            </li>
                            <li>
                                <a href="#">Feedbacks</a>
                            </li>
                            <li>
                                <a href="#">Request new features</a>
                            </li>
                            <li>
                                <a href="#">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Learn more</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="#">Apps stores</a>
                            </li>
                            <li>
                                <a href="#">Partners</a>
                            </li>
                            <li>
                                <a href="#">Privacy and terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Follow us</h4>
                    <div class="icon-links icon-social icon-links-grid social-colors">
                        <a class="facebook"><i class="icon-facebook"></i></a>
                        <a class="twitter"><i class="icon-twitter"></i></a>
                        <a class="linkedin"><i class="icon-linkedin"></i></a>
                        <a class="youtube"><i class="icon-youtube"></i></a>
                        <a class="instagram"><i class="icon-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar">
            <div class="container">
                <span>© An Online 2013 All Right Reseved. </span>
                <span><img src="home_assets/images/logo-light.svg" alt="" /></span>
            </div>
        </div>
    </footer>
    
    

    
    <div class="modal fade PopUpPolicyModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Condition & Policy</h5>
        <button type="button" class="btn-close BTNCLOSEMODAL" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="PolocyContent">
            <p>This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text the modal, we use an inline style set a minimum height, thereby extending the length of the overall modal and demonstrating the overflow scrolling. When content becomes longer than the height of the viewport, scrolling will move the modal as needed. This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text the modal, we use an inline style set a minimum height, thereby extending the length of the overall modal and demonstrating the overflow scrolling. When content becomes longer than the height of the viewport, scrolling will move the modal as needed. This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text the modal, we use an inline style set a minimum height, thereby extending the length of the overall modal and demonstrating the overflow scrolling. When content becomes longer than the height of the viewport, scrolling will move the modal as needed. This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text the modal, we use an inline style set a minimum height, thereby extending the length of the overall modal and demonstrating the overflow scrolling. When content becomes longer than the height of the viewport, scrolling will move the modal as needed. This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text the modal, we use an inline style set a minimum height, thereby extending the length of the overall modal and demonstrating the overflow scrolling. When content becomes longer than the height of the viewport, scrolling will move the modal as needed. This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text the modal, we use an inline style set a minimum height, thereby extending the length of the overall modal and demonstrating the overflow scrolling. When content becomes longer than the height of the viewport, scrolling will move the modal as needed.</p>
          </div>
      </div>

    </div>
  </div>
</div>
    
    
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
</body>
</html>