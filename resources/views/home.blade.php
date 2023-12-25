<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Smarkerz - Influencer Management</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="description"
        content="Smarkerz is a brain child of the strategist, marketers and tech-experts of SmartByte Media Pvt. Ltd.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/front/img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/front/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/front/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/front/img/favicon.ico') }}">
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/font-icons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/theme-vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/responsive.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,700;1,900&family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body data-mobile-nav-style="classic">
    <!-- start header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-boxed navbar-dark bg-white header-light fixed-top">
            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 mr-auto pl-lg-0">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('assets/front/img/logo.png') }}" class="default-logo" alt="smarkerz logo"
                            width="135" height="70">
                        <img src="{{ asset('assets/front/img/logo.png') }}" class="alt-logo" alt="smarkerz logo"
                            width="96" height="50">
                        <img src="{{ asset('assets/front/img/logo.png') }}" class="mobile-logo" alt="smarkerz logo"
                            width="60" height="30">
                    </a>
                </div>
                <div class="col-auto menu-order px-lg-0">
                    <button class="navbar-toggler float-right" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-itemu">
                                <a href="#why-us" class="nav-link inner-link ">Why choose Smarkerz?</a>
                            </li>
                            <li class="nav-item">
                                <a href="#brands" class="nav-link inner-link ">Our Brands</a>
                            </li>
                            <li class="nav-item">
                                <a href="#influn-ecosystem" class="nav-link inner-link ">Influencer Ecosystem</a>
                            </li>
                            <li class="nav-item">
                                <a href="#about-us" class="nav-link inner-link ">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link inner-link ">For Brands</a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact-us" class="nav-link inner-link sep-link">Contact Us</a>
                            </li>
                            <li class="nav-item dropdown simple-dropdown">
                                <a href="#" class="nav-link pink-color">Login</a>
                                <span class="icon-copy ti-angle-down dropdown-toggle" data-toggle="dropdown"
                                    aria-hidden="true"></span>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown"><a target="_blank" href="{{ route('brand.login') }}">Brand</a></li>
                                    <li class="dropdown"><a target="_blank" href="{{ route('influencer.login') }}">Influencer</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown simple-dropdown">
                                <a href="#" class="nav-link pink-color">Register</a>
                                <span class="icon-copy ti-angle-down dropdown-toggle" data-toggle="dropdown"
                                    aria-hidden="true"></span>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown"><a target="_blank" href="{{ route('brand.register') }}">Brand</a></li>
                                    <li class="dropdown"><a target="_blank" href="{{ route('influencer.register') }}">Influencer</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- end header -->
    <!-- start section -->
    <section class="padding-80px-tb pb-0 mob-pt-0">
        <div class="container-fluid position-relative">
            <div class="row">
                <div class="swiper-container white-move one-fifth-screen sm-h-250px  lg-h-720px md-h-450px"
                    data-slider-options='{ "slidesPerView": 1, "loop": true, "pagination": { "el": ".swiper-pagination", "clickable": true }, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 6000, "disableOnInteraction": false },  "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                    <div class="swiper-wrapper">
                        <!-- start slider item -->
                        <div class="swiper-slide cover-background swiper-slide1"
                            style="background-image:url('{{ asset('assets/front/img/banners/banner-1.png') }}');">
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide cover-background swiper-slide2"
                            style="background-image:url('{{ asset('assets/front/img/banners/banner-2.png') }}');">
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide cover-background swiper-slide3"
                            style="background-image:url('{{ asset('assets/front/img/banners/banner-3.png') }}');">
                        </div>
                        <!-- end slider item -->
                    </div>
                    <!-- start slider arrow -->
                    <div
                        class="swiper-button-next-nav swiper-button-next rounded-circle slider-navigation-style-07 dark">
                        <i class="ti-arrow-right text-extra-small"></i>
                    </div>
                    <div
                        class="swiper-button-previous-nav swiper-button-prev rounded-circle slider-navigation-style-07 dark">
                        <i class="ti-arrow-left text-extra-small"></i>
                    </div>
                    <!-- end slider arrow -->
                    <!-- start slider pagination -->
                    <!-- <div class="swiper-pagination swiper-light-pagination"></div> -->
                    <!-- end slider pagination -->
                </div>
            </div>
        </div>
    </section>
    <section class="padding-40px-tb banner-overlap sm-padding-20px-bottom">
        <div class="container">
            <div class="banner-box">
                <div class="row justify-content-center wow animate__fadeIn">
                    <div
                        class="col-12 col-xl-12 col-lg-12 col-sm-12  lg-margin-2-rem-bottom sm-margin-5px-bottom md-no-margin-bottom">
                        <h5
                            class="alt-font text-extra-dark-gray font-weight-500 text-uppercase mb-0 md-margin-30px-bottom   xs-w-90 mx-auto mx-sm-0">
                            Take The 1st Step!</h5>
                        <div class=" mx-auto mx-lg-0">
                            <p class="join-p">Join the influencer community of 5K+</p>
                        </div>
                    </div>
                </div>
                <form action="#" method="post" class="text-extra-dark-gray">
                    <div
                        class="row row-cols-1 row-cols-lg-3 row-cols-sm-3 justify-content-center padding-10-rem-lr sm-padding-10px-lr md-padding-2-rem-lr">
                        <!-- start feature box item -->
                        <div class="col md-margin-10px-bottom xs-margin-5px-bottom sm-margin-5px-bottom wow animate__fadeIn"
                            data-wow-delay="0.2s">
                            <input
                                class="input-border border-color-extra-dark-gray bg-transparent placeholder-dark small-input px-2 margin-15px-bottom md-margin-5px-bottom border-radius-4px required wow animate__fadeIn"
                                type="text" name="name" placeholder="Name" data-wow-delay="0.2s" />
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col md-margin-10px-bottom xs-margin-5px-bottom sm-margin-5px-bottom wow animate__fadeIn"
                            data-wow-delay="0.4s">
                            <input
                                class="input-border border-color-extra-dark-gray bg-transparent placeholder-dark small-input px-2 margin-15px-bottom md-margin-5px-bottom  border-radius-4px required wow animate__fadeIn"
                                type="tel" name="phone" placeholder="Mobile Number" data-wow-delay="0.4s" />
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col xs-margin-5px-bottom sm-margin-5px-bottom wow animate__fadeIn"
                            data-wow-delay="0.6s">
                            <input
                                class="input-border border-color-extra-dark-gray bg-transparent placeholder-dark small-input  px-2 margin-15px-bottom md-margin-5px-bottom  border-radius-4px required wow animate__fadeIn"
                                type="email" name="email" placeholder="Email ID" data-wow-delay="0.6s" />
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <!-- end feature box item-->
                    </div>
                    <div class="wow animate__fadeIn" data-wow-delay="0.8s">
                        <a href="register.html">
                            <button
                                class="btn btn-large btn-gradient-sky-blue-pink d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr btn-round-edge no-margin-bottom submit wow animate__fadeIn"
                                type="submit" name="submit" data-wow-delay="0.8s">Become a Smarkerz!</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section wow animate__fadeIn" id="why-us">
        <div class="container">
            <div class="row justify-content-center wow animate__fadeIn">
                <div class="col-12 col-xl-12 col-lg-12 last-paragraph-no-margin wow animate__fadeIn"
                    data-wow-duration="0.3">
                    <h5
                        class="alt-font text-extra-dark-gray font-weight-500 text-uppercase margin-10px-bottom md-margin-10px-bottom xs-w-100 mx-auto mx-sm-0 text-center xs-margin-10px-bottom">
                        Why Choose Smarkerz?</h5>
                    <div class=" mx-auto mx-lg-0">
                        <h6
                            class="text-extra-dark-gray fz20 padding-20px-bottom text-center padding-60px-lr sm-padding-10px-lr sm-padding-10px-bottom">
                            Smarkerz is a unique technological solution for both influencers and marketing
                            professionals.
                        </h6>
                    </div>
                    <div class="row row-cols-2 row-cols-lg-4 row-cols-sm-2">
                        <!-- start feature box item -->
                        <div class="col wow animate__fadeIn">
                            <div class="feature-box padding-1-half-rem-lr xs-no-padding md-margin-5px-bottom">
                                <div class="feature-box-icon">
                                    <img src="{{ asset('assets/front/img/1st.svg') }}" alt="smarkerz AI-driven"
                                        class="margin-15px-bottom md-margin-15px-bottom sm-margin-5px-bottom"
                                        width="100" height="100">
                                </div>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="font-weight-400 margin-10px-bottom d-block text-extra-dark-gray">Ever
                                        AI-driven
                                        smart influencer marketing platform</span>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col wow animate__fadeIn" data-wow-delay="0.2s">
                            <div class="feature-box padding-1-half-rem-lr xs-no-padding md-margin-5px-bottom">
                                <div class="feature-box-icon">
                                    <img src="{{ asset('assets/front/img/5K+.svg') }}"
                                        alt="smarkerz influencer community"
                                        class="margin-15px-bottom md-margin-15px-bottom sm-margin-5px-bottom"
                                        width="100" height="100">
                                </div>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span
                                        class="font-weight-400 margin-10px-bottom d-block text-extra-dark-gray">Strong
                                        influencer community and growing</span>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col wow animate__fadeIn" data-wow-delay="0.4s">
                            <div class="feature-box padding-1-half-rem-lr xs-no-padding md-margin-5px-bottom">
                                <div class="feature-box-icon">
                                    <img src="{{ asset('assets/front/img/one-platform.svg') }}" alt="smarkerz brands"
                                        class="margin-15px-bottom md-margin-15px-bottom sm-margin-5px-bottom"
                                        width="100" height="100">
                                </div>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="font-weight-400 margin-10px-bottom d-block text-extra-dark-gray">Where
                                        top
                                        brands can associate with right influencers</span>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                            <div class="feature-box padding-1-half-rem-lr xs-no-padding md-margin-5px-bottom">
                                <div class="feature-box-icon">
                                    <img src="{{ asset('assets/front/img/transparency.svg') }}"
                                        alt="smarkerz campaign performance"
                                        class="margin-15px-bottom md-margin-15px-bottom sm-margin-5px-bottom"
                                        width="100" height="100">
                                </div>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span
                                        class="font-weight-400 margin-10px-bottom d-block text-extra-dark-gray">Transparency
                                        for campaign performance & pay-outs</span>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <section class="half-section wow animate__fadeIn purple-bg" id="brands">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center margin-2-bottom">
                    <h5
                        class="alt-font text-white font-weight-500 text-uppercase margin-10px-bottom md-margin-10px-bottom xs-w-90 mx-auto mx-sm-0">
                        Our Clients</h5>
                    <h6 class="text-white fz20 padding-30px-bottom">We are a new kid on the block but
                        our brands are well known
                    </h6>
                    <div class="mx-lg-0">
                    </div>
                </div>
                <div class="col-12">
                    <div class="swiper-container text-center partner-slider padding-20px-bottom"
                        data-slider-options='{ "slidesPerView": 1, "loop": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 5 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 3 } } }'>
                        <div class="swiper-wrapper">
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo1.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo2.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo3.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo4.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo5.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo6.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo7.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo8.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo9.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo10.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo11.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo12.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo13.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo14.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo15.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo16.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo17.png') }}"></a></div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide"><a href="#" target="_blank"><img alt="smarkerz clients"
                                        src="{{ asset('assets/front/img/logo/logo18.png') }}"></a></div>
                            <!-- end slider item -->
                        </div>
                    </div>
                    <!-- start slider navigation -->
                    <div
                        class="swiper-button-next-nav swiper-button-next rounded-circle light slider-navigation-style-07 box-shadow-double-large">
                        <i class="ti-arrow-right text-extra-small"></i>
                    </div>
                    <div
                        class="swiper-button-previous-nav swiper-button-prev rounded-circle light slider-navigation-style-07 box-shadow-double-large">
                        <i class="ti-arrow-left text-extra-small"></i>
                    </div>
                    <!-- end slider navigation -->
                </div>
            </div>
        </div>
    </section>
    <!-- start section -->
    <section class="half-section" id="influn-ecosystem">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-2-bottom">
                    <h5
                        class="alt-font text-extra-dark-gray font-weight-500 text-uppercase margin-10px-bottom md-margin-10px-bottom xs-w-100 mx-auto mx-sm-0 text-center xs-margin-10px-bottom">
                        Explore Our Influencer Ecosystem</h5>
                    <h6
                        class="text-extra-dark-gray fz20 padding-20px-bottom text-center padding-170px-lr md-padding-10px-lr sm-padding-10px-lr sm-padding-10px-bottom">
                        Dear Influencers, we will not like to influence you!
                        However, if you want to be part of India’s first ever influencer led smart marketing platform
                        and get
                        the
                        following advantages, then join this amazing ride with us and we bet you won’t regret
                    </h6>
                    <div class="mx-lg-0">
                    </div>
                </div>
                <div class="row">
                    <div
                        class="col-lg-4 col-6 margin-30px-bottom sm-margin-5px-bottom wow animate__fadeIn xs-no-padding-right">
                        <!-- start feature box item -->
                        <div class="feature-box padding-1-rem-all">
                            <div class="feature-box-icon">
                                <img src="{{ asset('assets/front/img/exp-1.svg') }}"
                                    class="margin-25px-bottom md-margin-15px-bottom sm-margin-10px-bottom exp-images"
                                    alt="Influencer Ecosystem">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin padding-40px-lr sm-no-padding-lr">
                                <p>Top brands with top product to connect and work with</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                    <div class="col-lg-4 col-6 margin-30px-bottom sm-margin-5px-bottom wow animate__fadeIn xs-no-padding-left"
                        data-wow-delay="0.4s">
                        <!-- start feature box item -->
                        <div class="feature-box  padding-1-rem-all">
                            <div class="feature-box-icon">
                                <img src="{{ asset('assets/front/img/exp-2.svg') }}"
                                    class="margin-25px-bottom md-margin-15px-bottom sm-margin-10px-bottom exp-images"
                                    alt="Influencer Ecosystem">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <p>Multiple campaigns to
                                    choose from
                                </p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                    <div class="col-lg-4 col-6 margin-30px-bottom sm-margin-5px-bottom wow animate__fadeIn xs-no-padding-right"
                        data-wow-delay="0.2s">
                        <!-- start feature box item -->
                        <div class="feature-box  padding-1-rem-all">
                            <div class="feature-box-icon">
                                <img src="{{ asset('assets/front/img/exp-3.svg') }}"
                                    class="margin-25px-bottom md-margin-15px-bottom sm-margin-10px-bottom exp-images"
                                    alt="Influencer Ecosystem">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <p>Best ever earning
                                    opportunities
                                </p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                    <div class="col-lg-4 col-6 wow animate__fadeIn md-margin-30px-bottom sm-margin-5px-bottom xs-no-padding-left"
                        data-wow-delay="0.2s">
                        <!-- start feature box item -->
                        <div class="feature-box  padding-1-rem-all">
                            <div class="feature-box-icon">
                                <img src="{{ asset('assets/front/img/exp-4.svg') }}"
                                    class="margin-25px-bottom md-margin-15px-bottom sm-margin-10px-bottom exp-images"
                                    alt="Influencer Ecosystem">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <p>Complete tech-support and onboarding assistance</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                    <div class="col-lg-4 col-6 wow animate__fadeIn xs-no-padding-right" data-wow-delay="0.2s">
                        <!-- start feature box item -->
                        <div class="feature-box  padding-1-rem-all">
                            <div class="feature-box-icon">
                                <img src="{{ asset('assets/front/img/exp-5.svg') }}"
                                    class="margin-25px-bottom md-margin-15px-bottom sm-margin-10px-bottom exp-images"
                                    alt="Influencer Ecosystem">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <p>Full transparency – get campaign performance reports & data analytics</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                    <div class="col-lg-4 col-6 wow animate__fadeIn xs-no-padding-left" data-wow-delay="0.2s">
                        <!-- start feature box item -->
                        <div class="feature-box  padding-1-rem-all">
                            <div class="feature-box-icon">
                                <img src="{{ asset('assets/front/img/exp-6.svg') }}"
                                    class="margin-25px-bottom md-margin-15px-bottom sm-margin-10px-bottom exp-images"
                                    alt="Influencer Ecosystem">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <p>Timely and best in industry
                                    pay-outs guaranteed
                                </p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>
            </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section id="about-us" class="p-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-12 col-lg-12 padding-4-half-rem-bottom padding-3-half-rem-lr   md-padding-2-rem-all sm-padding-1-rem-all xs-padding-1-rem-lr wow animate__fadeIn"
                    data-wow-delay="0.3s">
                    <h5 class="text-center alt-font text-extra-dark-gray  font-weight-500  text-uppercase margin-2-rem-bottom lg-margin-4-half-rem-bottom letter-spacing-minus-1px w-90 xl-w-100 xs-margin-1-rem-bottom md-margin-2-half-rem-bottom  wow animate__fadeIn"
                        data-wow-delay="0.5s">Want To Know More About Us?</h5>
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-image wow animate__zoomIn">
                                <img src="{{ asset('assets/front/img/about.svg') }}" alt="about smarkerz">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <p class="wow animate__fadeIn" data-wow-delay="0.7s">Well! Smarkerz is a brain child
                                    of the
                                    strategist, marketers and tech-experts of SmartByte Media Pvt. Ltd. The founders
                                    were a part
                                    of one the most prominent names in BFSI industry.</p>
                                <p class="wow animate__fadeIn" data-wow-delay="0.9s">
                                    As an industry specialist themselves they found the biggest channels for brands in
                                    today’s
                                    date will exhaust until the audience select is wider.</p>
                                <p class="wow animate__fadeIn" data-wow-delay="1.1s">Alterative marketing with focus
                                    to reach
                                    right audience has been a challenge for many. By reaching to right influencers for
                                    their
                                    brand and product; marketers can have the desired result with much more precision.
                                </p>
                                <p class="wow animate__fadeIn" data-wow-delay="1.3s">On the other hand, the
                                    influencers who are
                                    promoting some of
                                    the great brands are facing a challenge of trusted partnership, brand credibility,
                                    right
                                    rates, timelines, their performance reports and timely pay-outs.</p>
                                <p class="wow animate__fadeIn" data-wow-delay="1.5s">
                                    The platform is not only an influencer on-boarding or marketing solution, it is a
                                    community
                                    of peers both influencers with various content and interest and on the other hand of
                                    marketers who are looking for alternative marketing channel and freedom of the same
                                    old paid
                                    marketing solutions; like Google, Yahoo & Facebook as their primary digital
                                    awareness and
                                    performance channel. Its AI driven approach and strong algorithm and logic building
                                    makes it
                                    a smooth operator for the new-age marketers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section pink-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center margin-20px-bottom">
                    <h5
                        class="alt-font text-white font-weight-500 text-uppercase margin-20px-bottom md-margin-10px-bottom xs-w-90 mx-auto mx-sm-0 xs-margin-1-rem-bottom">
                        Meet Some Of Our Smarkerz</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="video-section wow animate__fadeIn" data-wow-delay="0.2s">
                        <a href="https://www.youtube.com/" target="_blank">
                            <iframe src="https://www.youtube.com/embed/JUOg5SZdXdA" class="youclass" width="100%"
                                height="345" allow="autoplay" loading="lazy"></iframe></a>
                        <div class="video-info">
                            <h6>Influencer - Anil Singh</h6>
                            <p><img src="{{ asset('assets/front/img/youtube.png') }}" class="margin-10px-right"
                                    alt="smarkerz youtube" width="32" height="32"> @AnilRajpurohit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="video-section wow animate__fadeIn" data-wow-delay="0.4s">
                        <a href="https://www.youtube.com/ " target="_blank">
                            <iframe src="https://www.youtube.com/embed/5xnSZuVTy08" class="youclass" width="100%"
                                height="345" allow="autoplay" loading="lazy"></iframe>
                        </a>
                        <div class="video-info">
                            <h6>Influencer - Manish Singh</h6>
                            <p><img src="{{ asset('assets/front/img/youtube.png') }}" class="margin-10px-right"
                                    alt="smarkerz youtube" width="32" height="32"> @LearningMarketsWithManish
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="xs-padding-15px-lr half-section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-12 col-lg-12">
                    <h5 class="text-center alt-font text-extra-dark-gray  font-weight-500  text-uppercase margin-2-rem-bottom lg-margin-4-half-rem-bottom letter-spacing-minus-1px w-90 xl-w-100 xs-margin-1-rem-bottom md-margin-2-half-rem-bottom  wow animate__fadeIn"
                        data-wow-delay="0.5s">Want To Connect With Us!</h5>
                </div>
                <div class="col-12  overflow-hidden box-shadow-extra-large wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="row">
                        <div class="col-12 col-md-5 md-padding-1-rem-lr padding-3-rem-lr padding-8-rem-tb cover-background sm-h-auto sm-padding-1-rem-all xs-padding-10px-top"
                            style="background:#FFD3EB">
                            <div class="form-content text-center">
                                <h6
                                    class="alt-font text-extra-dark-gray font-weight-500 margin-10px-bottom md-margin-25px-bottom sm-no-margin-bottom">
                                    If you're an influencer </h6>
                                <a href="#"
                                    class="margin-40px-bottom  sm-margin-30px-bottom post-read  font-weight-600 text-medium text-uppercase text-gradient-light-brownish-orange-black border-bottom border-gradient-light-brownish-orange-black d-inline-block">Click
                                    Here</a>
                                <div class="col-md-12 text-center margin-50px-bottom sm-margin-40px-bottom">
                                    <p class="sep-text">AND</p>
                                    <hr class="dashed-color">
                                </div>
                                <h6
                                    class="alt-font text-extra-dark-gray font-weight-500 margin-10px-bottom md-margin-25px-bottom sm-margin-10px-bottom">
                                    Start your onboarding journey with us </h6>
                                <!-- <h6 class="text-extra-dark-gray text-extra-large">Start your onboarding journey with us.</h6> -->
                                <button
                                    class="btn btn-large btn-dark-gray lg-margin-15px-bottom md-margin-auto-lr btn-round-edge w-100 no-margin-bottom submit"
                                    type="submit" name="submit">Become a Smart Marketer with Smarkerz!</button>
                            </div>
                        </div>
                        <div
                            class="col-12 col-md-7 padding-6-rem-lr padding-3-rem-tb sm-padding-1-rem-all md-padding-2-rem-lr">
                            <h6
                                class="alt-font text-extra-dark-gray font-weight-500 margin-10px-bottom md-margin-25px-bottom no-margin-bottom">
                                If you are a Brand </h6>
                            <p>In need of such solution you can reach out to us at</p>
                            <form action="email-templates/contact-form.php" method="post"
                                class=" text-extra-dark-gray">
                                <input
                                    class="border-radius-4px border-color-extra-dark-gray bg-transparent placeholder-dark medium-input  margin-15px-bottom border-radius-0px required"
                                    type="text" name="name" placeholder="Full Name" />
                                <input
                                    class="border-radius-4px border-color-extra-dark-gray bg-transparent placeholder-dark medium-input  margin-15px-bottom border-radius-0px required"
                                    type="email" name="email" placeholder="Email Address" />
                                <input
                                    class="border-radius-4px border-color-extra-dark-gray bg-transparent placeholder-dark medium-input margin-15px-bottom border-radius-0px"
                                    type="tel" name="phone" placeholder="Contact Number" />
                                <input
                                    class="border-radius-4px border-color-extra-dark-gray bg-transparent placeholder-dark medium-input margin-15px-bottom border-radius-0px"
                                    type="tel" name="phone" placeholder="Organization" />
                                <textarea
                                    class="border-radius-4px border-color-extra-dark-gray bg-transparent placeholder-dark medium-input  margin-20px-bottom xs-margin-10px-bottom border-radius-0px"
                                    name="comment" rows="2" placeholder="Share Your Query"></textarea>
                                <input type="hidden" name="redirect" value="">
                                <button
                                    class="btn btn-large btn-gradient-sky-blue-pink d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr btn-round-edge  no-margin-bottom submit submit-btn"
                                    type="submit">Submit</button>
                                <div class="form-results d-none"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section  wow animate__fadeIn padding-20px-top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets/front/img/faq.svg') }}" class="img-fluid faq-image"
                        alt="smarkerz faqs">
                </div>
            </div>
            <div class="row padding-3-half-rem-lr sm-padding-1-rem-all">
                <div class="col-12 col-lg-12 col-md-12 xs-no-padding">
                    <div class="panel-group accordion-event accordion-style-03" id="accordion3"
                        data-active-icon="ti-angle-down" data-inactive-icon="ti-angle-right">
                        <!-- start accordion item -->
                        <div class="panel bg-white box-shadow-small border-radius-5px wow animate__fadeIn"
                            data-wow-delay="0.2s">
                            <div class="panel-heading active-accordion">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#accordion3" href="#accordion-style-03-01" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class="text-extra-dark-gray d-inline-block font-weight-500">Who is an
                                            influencer?</span>
                                        <i
                                            class="indicator icon-copy ti-angle-down text-extra-dark-gray icon-extra-small"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-03-01" class="panel-collapse collapse show"
                                data-parent="#accordion3">
                                <div class="panel-body">An influencer is someone who has: the means and power to affect
                                    the
                                    purchasing decisions of the people following them in a distinct niche, with whom he
                                    or she
                                    actively; because of his or her authority, knowledge, position, or relationship with
                                    his or
                                    her audience.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-white box-shadow-small border-radius-5px wow animate__fadeIn"
                            data-wow-delay="0.4s">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#accordion3" href="#accordion-style-03-02" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class="text-extra-dark-gray d-inline-block font-weight-500"> Who is a
                                            social
                                            Influencer?</span>
                                        <i
                                            class="indicator icon-copy ti-angle-right text-extra-dark-gray icon-extra-small"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-03-02" class="panel-collapse collapse"
                                data-parent="#accordion3">
                                <div class="panel-body">The social influencers are the influencers in social media who
                                    have
                                    built a reputation for their knowledge and expertise on a specific topic. They make
                                    regular
                                    posts about that topic on their preferred social media channels like YouTube,
                                    Facebook,
                                    Instagram, Telegram and others. Furthermore, they generate large followings of
                                    enthusiasts,
                                    engaging them through this content and create impact on those who pay close
                                    attention to
                                    their views.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-white box-shadow-small border-radius-5px wow animate__fadeIn"
                            data-wow-delay="0.6s">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#accordion3" href="#accordion-style-03-03" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class=" text-extra-dark-gray d-inline-block font-weight-500">How much an
                                            influencer
                                            can an earn?</span>
                                        <i
                                            class="indicator icon-copy ti-angle-right text-extra-dark-gray icon-extra-small"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-03-03" class="panel-collapse collapse"
                                data-parent="#accordion3">
                                <div class="panel-body">At Smarkerz we believe that an influencer has an earning
                                    potential of
                                    unlimited lifetime earning as per the campaigns they select with us. As per money
                                    control
                                    (India’s largest finance portal) on an average, an influencer earns approximately
                                    INR 2 Lac
                                    per month. However, there are noteworthy differences in income among accounts,
                                    especially
                                    depending on the number of followers. Micro-influencers (between 1,000 and 10,000
                                    followers)
                                    make an average approximately INR 1 Lac per month.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-white box-shadow-small border-radius-5px wow animate__fadeIn"
                            data-wow-delay="0.6s">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#accordion3" href="#accordion-style-03-04" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class=" text-extra-dark-gray d-inline-block font-weight-500">Which social
                                            media
                                            channels are considered with Smarkerz?</span>
                                        <i
                                            class="indicator icon-copy ti-angle-right text-extra-dark-gray icon-extra-small"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-03-04" class="panel-collapse collapse"
                                data-parent="#accordion3">
                                <div class="panel-body">At Smarkerz we consider all prominent and trackable social
                                    media used by
                                    users across digital world like Facebook, Instagram, YouTube, Telegram, Amazon,
                                    WhatsApp,
                                    Roponso, Moj, Josh, and many more. Even if you have your own website, app or
                                    blogging or
                                    vlogging we will consider you if we find your platform trackable.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-white box-shadow-small border-radius-5px wow animate__fadeIn"
                            data-wow-delay="0.6s">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#accordion3" href="#accordion-style-03-05" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class=" text-extra-dark-gray d-inline-block font-weight-500">How to
                                            register with
                                            Smarkerz?</span>
                                        <i
                                            class="indicator icon-copy ti-angle-right text-extra-dark-gray icon-extra-small"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-03-05" class="panel-collapse collapse"
                                data-parent="#accordion3">
                                <div class="panel-body">All you need to do is <a href="#"
                                        class="post-read  font-weight-600 text-extra-small text-uppercase text-gradient-light-brownish-orange-black border-bottom border-gradient-light-brownish-orange-black d-inline-block">CLICK
                                        HERE</a> and register yourself digitally filling in the required details. We
                                    will need
                                    your name, your mobile number and email to begin with. You will receive an OTP on
                                    your mobile
                                    number. You can enter the same to start your registration process. Once done our
                                    Smarkerz
                                    expert will connect and verify your account within the 24 hours of registration.
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-white box-shadow-small border-radius-5px wow animate__fadeIn"
                            data-wow-delay="0.6s">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#accordion3" href="#accordion-style-03-06" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class=" text-extra-dark-gray d-inline-block font-weight-500"> What are
                                            the criteria
                                            for on-boarding?</span>
                                        <i
                                            class="indicator icon-copy ti-angle-right text-extra-dark-gray icon-extra-small"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-03-06" class="panel-collapse collapse"
                                data-parent="#accordion3">
                                <div class="panel-body">All we need is verified mobile number to contact you, your
                                    valid email
                                    address, your social media handle details with number of followers to verify you as
                                    a social
                                    influencer.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-white box-shadow-small border-radius-5px wow animate__fadeIn"
                            data-wow-delay="0.6s">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#accordion3" href="#accordion-style-03-07" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class=" text-extra-dark-gray d-inline-block font-weight-500">How much
                                            time it takes
                                            to verify my account?</span>
                                        <i
                                            class="indicator icon-copy ti-angle-right text-extra-dark-gray icon-extra-small"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-03-07" class="panel-collapse collapse"
                                data-parent="#accordion3">
                                <div class="panel-body">Our Smarkerz experts connect with you within 24 hours post
                                    reviewing
                                    your details shared. They will verify the contact and your account will be activated
                                    to
                                    proceed.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="padding-50px-tb sm-padding-15px-tb footer-section"
        style="background-image: url('{{ asset('assets/front/img/footer-cta.jpg') }}');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 col-sm-10 text-center text-lg-left md-margin-3-rem-top md-margin-1-rem-bottom wow animate__fadeIn sm-margin-1-half-rem-tb"
                    data-wow-delay="0.1s">
                    <h5 class="alt-font font-weight-600 text-white mb-0 footer-cta">Let's talk about how we can
                        transform
                        your business!</h5>
                </div>
                <div class="col-12  padding-4-rem-left col-lg-3 col-md-6 lg-padding-15px-left md-margin-2-rem-bottom text-center text-lg-left wow animate__fadeIn"
                    data-wow-delay="0.3s">
                    <span class="alt-font text-white text-extra-medium d-block margin-5px-bottom">Get in touch with our
                        team</span>
                    <h6 class="alt-font font-weight-500 mb-0"><a href="mailto:support@smarkerz.com"
                            class="text-white text-decoration-line-bottom-thick text-greenish-gray-hover text-large font-lato">support@smarkerz.com</a>
                    </h6>
                </div>
                <div class="col-12 col-lg-3 col-md-6 padding-3-rem-left lg-padding-15px-left md-margin-1-rem-bottom text-center text-lg-left wow animate__fadeIn"
                    data-wow-delay="0.6s">
                    <span class="alt-font text-white text-extra-medium d-block margin-10px-bottom">Follow Us On</span>
                    <div class="social-icon-style-12">
                        <ul class="medium-icon light">
                            <li><a class="facebook" href="https://www.facebook.com/the_smarkerz-103542075501481/"
                                    target="_blank"><span class="icon-copy ti-facebook"></span></a></li>
                            <li><a class="dribbble" href="https://www.instagram.com/smarkerzofficial/"
                                    target="_blank"><span class="icon-copy ti-instagram"></span></a></li>
                            <li><a class="twitter" href="https://twitter.com/Smarkerz1" target="_blank"><span
                                        class="icon-copy ti-twitter-alt"></span></a></li>
                            <li><a class="instagram youtube"
                                    href="https://www.youtube.com/channel/UCLqAXR5v8wMDvQxPHOpaYjA" target="_blank">
                                    <img src="{{ asset('assets/front/img/youtube-white.png') }}"
                                        alt="smarkerz youtube" class="youtube"></a>
                            </li>
                            <li><a class="instagram" href="http://www.instagram.com" target="_blank"><span
                                        class="icon-copy ti-linkedin"></span></a></li>
                            <!--<li><a class="instagram" href="https://www.linkedin.com/company/smarkerz/" target="_blank">
                           <img src="{{ asset('assets/front/img/telegram.png') }}" alt="smarkerz Telegram" class="telegram"></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start footer -->
    <footer class="footer-marketing-agency footer-light padding-10px-tb border-top border-color-medium-gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-xl-5 col-md-5 order-md-1 order-2 order-xl-1 sm-margin-5px-bottom">
                    <ul
                        class=" footer-horizontal-link d-flex justify-content-between justify-content-md-start text-center text-uppercase text-small">
                        <li><a href="#">Privacy Policy </a></li>
                        <li><a href="#">Terms & Conditions </a></li>
                    </ul>
                </div>
                <div
                    class="col-12 col-xl-2 col-md-2 order-1 order-xl-2 order-md-2 text-center lg-margin-30px-bottom xs-margin-10px-bottom">
                    <a href="index.html" class="footer-logo"><img src="{{ asset('assets/front/img/logo.png') }}"
                            data-at2x="{{ asset('assets/front/img/logo.png') }}" alt="smarkerz logo"></a>
                </div>
                <div
                    class="col-12 col-xl-5 col-md-5 order-3 order-md-3 text-center text-md-right last-paragraph-no-margin">
                    <p class="text-small text-uppercase">Copyright2022 &copy;SmartByte Media Pvt. Ltd. </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><span class="icon-copy ti-arrow-up"></span></a>
    <!-- end scroll to top -->
    <!-- javascript -->
    <script type="text/javascript" src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/theme-vendors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/main.js') }}"></script>
</body>

</html>
