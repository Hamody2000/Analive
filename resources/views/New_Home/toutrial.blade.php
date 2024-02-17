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
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

    <link rel="stylesheet" href="{{ asset('home_assets/Libs/VideoPopUp/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('home_assets/icons/iconsmind/line-icons.min.css') }}">
    <!-- flipster -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_assets/Libs/JqueryFlibster/jquery.flipster.css') }}">
        <link href="{{ asset('home_assets/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('home_assets/css/bootstrap-select.min.css') }}" rel="stylesheet">
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
                    <img class="logo-default" src="{{ asset('home_assets/images/logo-light.svg') }}" alt="logo" />
                    <img class="logo-retina" src="{{ asset('home_assets/images/logo-light.svg') }}" alt="logo" />
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
                        <a href="{{ route('faq') }}">FAQ </a>
                    </li>
                    <li>
                        <a href="index.html">Contact Us </a>
                    </li>
                </ul>
                <div class="menu-right">
                    <ul class="lan-menu">
                        <li class="dropdown">
                            <a href="Ar/toutrial.html"><img src="{{ asset('home_assets/images/eg.png') }}" alt="" />AR </a>
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
            <h1>Toutrial</h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Toutrial</a></li>
            </ol>
        </div>
    </div>

        
        
        <div class="ToutrialPage">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ToutrialPageFilter">
                            <div align="center">
                                <button class=" filter-button active" data-filter="all">All</button>
                                <button class=" filter-button" data-filter="Step_1">Step 1</button>
                                <button class=" filter-button" data-filter="Step_2">Step 2</button>
                                <button class=" filter-button" data-filter="Step_3">Step 3</button>
                                <button class=" filter-button" data-filter="Step_4">Step 4</button>
                                <button class=" filter-button" data-filter="Step_5">Step 5</button>
                                <button class=" filter-button" data-filter="Step_6">Step 6</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ToutrialPageItemsss">
                            <div class="row filter-list">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filter Step_1">
                                    <div class="Toutrial_Item">
                                        <div class="Uperbox">
                                            <div class="images">
                                                <img src="{{ asset('home_assets/images/music/image-1.jpg') }}">
                                            </div>
                                            <div class="LinkVido">
                                                <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="DowenBos">
                                            <h2>Toutrial Name</h2>
                                            <p>Touturial Data</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filter Step_2">
                                    <div class="Toutrial_Item">
                                        <div class="Uperbox">
                                            <div class="images">
                                                <img src="{{ asset('home_assets/images/music/image-2.jpg') }}">
                                            </div>
                                            <div class="LinkVido">
                                                <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="DowenBos">
                                            <h2>Toutrial Name</h2>
                                            <p>Touturial Data</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filter Step_3">
                                    <div class="Toutrial_Item">
                                        <div class="Uperbox">
                                            <div class="images">
                                                <img src="{{ asset('home_assets/images/music/image-3.jpg') }}">
                                            </div>
                                            <div class="LinkVido">
                                                <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="DowenBos">
                                            <h2>Toutrial Name</h2>
                                            <p>Touturial Data</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filter Step_4">
                                    <div class="Toutrial_Item">
                                        <div class="Uperbox">
                                            <div class="images">
                                                <img src="{{ asset('home_assets/images/music/image-4.jpg') }}">
                                            </div>
                                            <div class="LinkVido">
                                                <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="DowenBos">
                                            <h2>Toutrial Name</h2>
                                            <p>Touturial Data</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filter Step_5">
                                    <div class="Toutrial_Item">
                                        <div class="Uperbox">
                                            <div class="images">
                                                <img src="{{ asset('home_assets/images/music/image-5.jpg') }}">
                                            </div>
                                            <div class="LinkVido">
                                                <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="DowenBos">
                                            <h2>Toutrial Name</h2>
                                            <p>Touturial Data</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filter Step_6">
                                    <div class="Toutrial_Item">
                                        <div class="Uperbox">
                                            <div class="images">
                                                <img src="{{ asset('home_assets/images/music/image-1.jpg') }}">
                                            </div>
                                            <div class="LinkVido">
                                                <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="DowenBos">
                                            <h2>Toutrial Name</h2>
                                            <p>Touturial Data</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    

                        
            
<!--
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
            
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
-->
                    </div>
                </div>

        </div>
        
            
        
        
        
        
        
        
        
        
        
        
        
      
        <section id="partners" class="section-base partnersSction">
            <div class="container">
                <ul class="slider" data-options="type:carousel,arrows:false,nav:false,perView:5,perViewMd:3,perViewSm:2,perViewXs:1,gap:100,autoplay:3000">
                    <li>
                        <img src="{{ asset('home_assets/images/logos/logo-1.png') }}" alt="" />
                    </li>
                    <li>
                        <img src="{{ asset('home_assets/images/logos/logo-2.png') }}" alt="" />
                    </li>
                    <li>
                        <img src="{{ asset('home_assets/images/logos/logo-3.png') }}" alt="" />
                    </li>
                    <li>
                        <img src="{{ asset('home_assets/images/logos/logo-6.png') }}" alt="" />
                    </li>
                    <li>
                        <img src="{{ asset('home_assets/images/logos/logo-5.png') }}" alt="" />
                    </li>
                    <li>
                        <img src="{{ asset('home_assets/images/logos/logo-4.png') }}" alt="" />
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
                <span><img src="{{ asset('home_assets/images/logo-light.svg') }}" alt="" /></span>
            </div>
        </div>
    </footer>
    
    

    
    <script src="{{ asset('home_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('home_assets/js/bootstrap.min.js') }}"></script>

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

    <script src="{{ asset('home_assets/js/FilterTaps.js') }}"></script>
    <script src="{{ asset('home_assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('home_assets/js/wow.min.js') }}"></script>
    <script>new WOW().init();</script>

    <script src="{{ asset('home_assets/js/mixitup.js') }}"></script>
    <script src="{{ asset('home_assets/js/wow.js') }}"></script>
    <script src="{{ asset('home_assets/js/script.js') }}"></script>




</body>
</html>