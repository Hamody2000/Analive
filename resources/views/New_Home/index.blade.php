<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>An Online</title>
    <meta name="description" content="">

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
    <script src="https://kit.fontawesome.com/7ecf8dac4e.js" crossorigin="anonymous}}"></script>

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
                        <a href="#Home">Home</a>
                    </li>
                    <li>
                        <a href="#AboutUs">About</a>
                    </li>
                    <li>
                        <a href="#Selling">Selling</a>
                    </li>
                    <li>
                        <a href="#Features">Features</a>
                    </li>
                    <li>
                        <a href="{{ route('tutorials') }}">Tutorials </a>
                    </li>
                    <li>
                        <a href="#partners">partners </a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}">FAQ </a>
                    </li>
                    <li>
                        <a href="#ContactUs">Contact Us </a>
                    </li>
                </ul>

                <div class="menu-right">
                    <ul class="lan-menu">
                        <li class="dropdown">
                            <a href="Ar/index.html"><img src="{{ asset('home_assets/images/eg.png') }}" alt="" />AR </a>
                        </li>
                    </ul>
                    <div class="menu-custom-area">
                        <a class="btn btn-border btn-circle btn-xs" href="#">Login</a>
                    </div>
                </div>

                <div class="clear"></div>
            </div>

        </div>
    </nav>
    
    <main>
        <section id="Home" class="section-image  light section-bottom-layer BannerSection" style="background-image:url( {{ asset('home_assets/images/bg.svg') }} )">
            <div class="container">
                <!--                <hr class="space" />-->
                <div class="row">
                    <div class="col-lg-6" data-anima="fade-in" data-time="1000">
                        <div class="HomeBanner">
                            <div class="forflx">
                                <hr class="space" />
                                <hr class="space" />
                                <h1>
                                    Welcome To Ana Online
                                </h1>
                                <p>
                                    The world's first AI-powered eCommerce solution, operated through a mobile app dashboard.
                                </p>
                                <p>Whether you're in fashion, electronics, or any other eCommerce industry, you can set up your shop in just 5 minutes. </p>
                                
        
                                <a href="#" class="btn btn-sm btn-circle shadow-1 full-width-sm">Login To Shop</a>
                                
                               <a href="#Selling" class="btn btn-sm btn-circle shadow-1 full-width-sm page-scroll">Register New Shop</a>
        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="width-min-835" src="{{ asset('home_assets/images/iso-1.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <section id="AboutUs" class="section-base  section-full-width-left section-bottom-layer AboutUsSection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('home_assets/images/iso-2.png') }}" alt="" />
                    </div>
                    <div class="col-lg-6" data-anima="fade-right" data-time="1000">
                        <hr class="space" />
                        <h2>About An Online</h2>
                        <p>
                                    The world's first AI-powered eCommerce solution, operated through a mobile app dashboard.
                                </p>
                                <p>Whether you're in fashion, electronics, or any other eCommerce industry, you can set up your shop in just 5 minutes. </p>
                                <p>With Ana Online, starting an online store has never been easier - our solution enables businesses of all industries to start selling in just 5 minutes, anywhere and anytime</p>
                        <a href="#" class="btn btn-circle btn-sm" style="width: max-content">Explore More</a>
                        <hr class="space hidden-md" />
                    </div>
                </div>
            </div>
        </section>

        <section id="Features" class="section-base FeaturesSection visible-xs">
            <h2 class="SectionTitle mb-5">Our Features</h2>
            <div class="container">
                <ul class="slider" data-options="type:carousel,arrows:false,nav:true,perView:1,perViewMd:1,perViewSm:1,perViewXs:1,gap:100,autoplay:6000">
                    <li>
                        <div class="forflx" style="display: flex; height: 100%;align-items: center">
                                <ul class="icon-list icon-circle icon-list-11">
                                    <li><span><i class="fas fa-check"></i></span> Setup your shop in 5 minutes</li>
                                    <li><span><i class="fas fa-check"></i></span> First eCommerce Store operated through Mobile App Dashboard</li>
                                    <li> <span><i class="fas fa-check"></i></span> Theme Management (Just Select your brand Color Pallet)</li>
                                    <li><span><i class="fas fa-check"></i></span> Use Ai Photo Editor to Capture, Edit, Design and upload your product Photos</li>
                                    <li><span><i class="fas fa-check"></i></span> Automatic Integrated Payment Gateway</li>
                                    <li><span><i class="fas fa-check"></i></span> Affordable prices and Compet</li>
                                </ul>
                            </div>
                    </li>
                    <li>
                        <div class="forflx" style="display: flex; height: 100%;align-items: center">
                                <ul class="icon-list icon-circle icon-list-11">
                                    <li><span><i class="fas fa-check"></i></span> Setup your shop in 5 minutes</li>
                                    <li><span><i class="fas fa-check"></i></span> First eCommerce Store operated through Mobile App Dashboard</li>
                                    <li> <span><i class="fas fa-check"></i></span> Theme Management (Just Select your brand Color Pallet)</li>
                                    <li><span><i class="fas fa-check"></i></span> Use Ai Photo Editor to Capture, Edit, Design and upload your product Photos</li>
                                    <li><span><i class="fas fa-check"></i></span> Automatic Integrated Payment Gateway</li>
                                    <li><span><i class="fas fa-check"></i></span> Affordable prices and Compet</li>
                                </ul>
                            </div>
                    </li>
                    
                </ul>
                <!--
                <div class="row slider d-none">
                    <div class="owl-caurosel CauroselFeaturesss">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="forflx" style="display: flex; height: 100%;align-items: center">
                                <ul class="icon-list icon-circle icon-list-11">
                                    <li><span><i class="fas fa-check"></i></span> Setup your shop in 5 minutes</li>
                                    <li><span><i class="fas fa-check"></i></span> First eCommerce Store operated through Mobile App Dashboard</li>
                                    <li> <span><i class="fas fa-check"></i></span> Theme Management (Just Select your brand Color Pallet)</li>
                                    <li><span><i class="fas fa-check"></i></span> Use Ai Photo Editor to Capture, Edit, Design and upload your product Photos</li>
                                    <li><span><i class="fas fa-check"></i></span> Automatic Integrated Payment Gateway</li>
                                    <li><span><i class="fas fa-check"></i></span> Affordable prices and Compet</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    
                </div>
                -->

            </div>
        </section>
        
        <section id="Selling" class="section-base SellingSection">
            <div class="container">
                <h2 class="SectionTitl">Selling Form Store Or Home</h2>
                <div class="row" style="justify-content: center">
                    <div class="col-lg-4">
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-globe"></i>
                                <div class="caption">
                                    <h2>Selling from Store</h2>
                                    <p>
                                        I Have Official Company Papers
                                    </p>
                                    <a href="{{ route('selling_store') }}" class="btn-text">Start Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-bar-chart4"></i>
                                <div class="caption">
                                    <h2>Selling from Home</h2>
                                    <p>
                                        I Don’t Have Official Company Papers
                                    </p>
                                    <a href="{{ route('selling_home') }}" class="btn-text">Start Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--
                    <div class="col-lg-6">
                        <div class="selleingbox">
                            <div class="forflex">
                                <hr class="space-sm visible-md" />
                                <h2>For Selling</h2>
                                <p>
                                    Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amete.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco  sea takimata sanctus eslaboriso.
                                </p>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </section>
       
        <section id="Tutorials" class="section-base section-color TutorialsSection">
            <div class="container">
                <h2 class="align-center">Our Toutrial</h2>
                <p class="align-center width-650">
                    Lorem ipsum dolor sit amet no sea takimata sanctus est Lorem ipsum dolor sit amete
                    sare nostrud exercitation ullamco sea takiquis nostrud exercitatio.
                </p>

                <div class="GroupItemsToutrials" id="carouselfilber">
                    <!--                <ul id="carouselfilber" class="slider slider-zoom-center slider-phones" data-options="type:carousel,perView:3,perViewSm:2,perViewSm:2,focusAt:center,gap:30,nav:true,controls:out,autoplay:30000">-->
                    <ul  class="slider-phones">
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-1.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-2.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-3.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-4.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-1.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-2.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-3.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-4.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-3.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="toturialItem">
                                <div class="Image">
                                    <img src="{{ asset('home_assets/images/music/image-4.jpg') }}">
                                    <div class="iconpaly">
                                        <a href="https://www.youtube.com/watch?v=taVPgnwhZbM&list=RDtaVPgnwhZbM&start_radio=1" class="lightbox " data-type="iframe" tabindex="0"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="ToutDatat">
                                    <h2>Toutrial Name</h2>
                                    <p>Touturial Data</p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section>
 
        <section class="section-base section-color  section-bottom-layer CounterSection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <hr class="space" />
                        <h2>Our numbers do not lie<br />become part of the revolution now.</h2>
                        <p>
                            Lorem ipsum dolor sit ameta no sea takimata sanctus est Lorem ipsum dolor sit amete.
                            Ut enim ad minim veniam, quis nostruo.
                        </p>
                        <table class="table table-grid table-border no-padding-y align-left table-auto">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="counter counter-horizontal counter-icon">
                                            <div>
                                                <h3>Active Shops</h3>
                                                <div class="value text-lg">
                                                    <span data-to="150" data-speed="3000">150</span>
                                                    <span>K</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
 
                    </div>
                    <div class="col-lg-6">
                        <img class="width-min-835" src="{{ asset('home_assets/images/iso-3.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>
      
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
        
        <section id="ContactUs" class="section-base  ContactSectio" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ConatctBox">
                            <form action="#" class="form-box form-ajax" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Name</p>
                                        <input id="name" name="name" placeholder="" type="text" class="input-text" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Email</p>
                                        <input id="email" name="email" placeholder="" type="email" class="input-text" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Phone</p>
                                        <input id="Phone" name="Phone" placeholder="" type="text" class="input-text" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Subject</p>
                                        <input id="Subject" name="Subject" placeholder="" type="text" class="input-text" required>
                                    </div>
                                </div>
                                <p>Messagge</p>
                                <textarea id="messagge" name="messagge" class="input-textarea" placeholder="" required></textarea>

                                <button class="btn btn-sm btn-circle btn-border" type="submit">Send messagge</button>

                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <hr class="space visible-md" />
                        <h2>Contacts.</h2>
                        <p>
                            Lorem ipsum dolor sit ametete consecte turerno adipiscing elitsed do eiusmod tempo incididunt utlabore et dolore aliqua.
                        </p>
                        <ul class="text-list text-list-bold">
                            <li><b>Address</b><p>139 Baker St, E1 7PT, London</p></li>
                            <li><b>Web</b><p>domain.com</p></li>
                            <li><b>Email</b><p>info@domain.com</p></li>
                            <li><b>Phone</b><p>(02) 123 456 789999</p></li>
                            <li><b>Skype</b><p>example.name</p></li>
                        </ul>
                        <hr class="space space-40" />
                        <div class="icon-links icon-social   social-colors">
                            <a class="facebook"><i class="icon-facebook"></i></a>
                            <a class="twitter"><i class="icon-twitter"></i></a>
                            <a class="instagram"><i class="icon-instagram"></i></a>
                            <a class="pinterest"><i class="icon-pinterest"></i></a>
                        </div>
                    </div>
                </div>
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
    <script src="{{ asset('home_assets/js/pageScroll.js') }}"></script>
    <script src="{{ asset('home_assets/Libs/JqueryFlibster/jquery.flipster.min.js') }}"></script>

    <script>
        var carousel = $("#carouselfilber").flipster({
        style: 'carousel',
        spacing: -0.3,
        nav: false,
        buttons: true,
        loop: true,
        autoplay: 3000,
        });
        
    </script>
</body>
</html>