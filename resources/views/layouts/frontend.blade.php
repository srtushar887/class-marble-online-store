<!DOCTYPE html>
<html lang="eng">
<!--<![endif]-->
<!-- Begin Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/all.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/settings.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.carousel.css">



    <link rel="stylesheet" href="http://medialinkers.net/demo/envato/saloon/publish/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="http://medialinkers.net/demo/envato/saloon/publish/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/css/jquery.fancybox.min.css" media="screen" />

    <link rel="stylesheet" href="http://kamleshyadav.com/html/multi-farious/html/assets/css/swiper.min.css">

    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/swiper.min.css">

    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/menu.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/style.css">
    <link rel="shortcut icon" type="image/ico" href="{{asset($gn->icon)}}" />
    <title>{{$gn->site_name}}</title>
    @yield('css')

</head>
<body>
<!-- Preloader Box -->
<div class="preloader_wrapper preloader_active preloader_open">
    <div class="preloader_holder">
        <div class="preloader d-flex justify-content-center align-items-center h-100">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- Search Box -->
<div class="searchBox">
    <div class="searchBoxContainer">
        <a href="javascript:void(0);" class="closeBtn">
            <svg viewBox="0 0 413.348 413.348" xmlns="http://www.w3.org/2000/svg"><path d="m413.348 24.354-24.354-24.354-182.32 182.32-182.32-182.32-24.354 24.354 182.32 182.32-182.32 182.32 24.354 24.354 182.32-182.32 182.32 182.32 24.354-24.354-182.32-182.32z"/></svg>
        </a>
        <div class="search_bar_inner">
            <input type="text" placeholder="Enter Your keywords"/>
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
<!-- Main Wraapper -->
<div class="main_wrapper">
    <section class="relative">
        <!-- Header Start -->
        <header class="gym_header_wrapper">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-5">
                        <div class="gym_logo">
                            <a href="{{route('front')}}">
                                <img src="{{asset($gn->logo)}}" alt="logo" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8 col-7">
                        <div class="gym_main_menu main_menu_parent">
                            <!-- Header Menus -->
                            <div class="gym_nav_items main_menu_wrapper text-right">
                                <ul>
                                    <li class="has_submenu {{ Request::is('/') ? 'active' : '' }}">
                                        <a href="{{route('front')}}">Home</a>
                                    </li>
                                    <li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="{{route('about.us')}}">About Us</a></li>
                                        <li class="{{ Request::is('home/all-products') ? 'active' : '' }}">
                                            <a href="{{route('all.products')}}">Products</a>
                                        </li>

                                    <li><a href="{{route('virtualtour')}}">Virtual Tour</a></li>


                                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                                    @guest
                                        @if (Request::is('login'))
                                            <li class="has_submenu active">
                                        @elseif(Request::is('register'))
                                            <li class="has_submenu active">
                                        @else
                                            <li class="has_submenu">
                                        @endif
                                        <a href="javascript:void(0);">Account</a>
                                        <ul class="sub_menu">
                                            <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{route('login')}}">Login</a></li>
                                            <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{route('register')}}">Register</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="has_submenu">
                                        <a href="javascript:void(0);">Account</a>
                                        <ul class="sub_menu">
                                            <li><a href="{{route('home')}}">Dashboard</a></li>
                                            <li><a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>

                                            </li>
                                        </ul>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                            <div class="gym_search_cart menu_btn_wrap">
                                <ul class="display_flex">
                                    <li><a href="javascript:void(0);" class="searchBtn"><i class="fas fa-search"></i></a></li>
                                    <?php

                                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                    $carts_count = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                                    ?>
                                    <li class="gym_cart_open relative">
                                        <a class="ml-2" href="javascript:void(0);">
                                            <i class="fab fa-opencart"></i>
                                            <span>Wishlist ({{$carts_count}})</span></a>
                                        <div class="gym_cart_box">



                                            @foreach($carts as $cart)
                                                <div class="gym_cart_flex">
                                                <div class="cart_one">
                                                    <a href="{{route('remove.item.cart',$cart->rowId)}}">x</a>
                                                    <h4>{{$cart->name}}</h4>
                                                    <p>{{$cart->qty}}</p>
                                                </div>
                                                <div class="cart_two">
                                                    <img src="{{asset($cart->options->image)}}" alt=""/>
                                                </div>
                                            </div>
                                                @endforeach

                                            <div class="gym_cart_btn2">
{{--                                                <p>subtotal:${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</p>--}}
                                                <ul>
                                                    <li><a href="{{route('view.cart')}}" class="gym_btn btn_1">view cart</a></li>
                                                    <li><a href="{{route('checkout')}}" class="gym_btn btn_1">checkout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu_btn">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Banner Wraapper -->
@yield('front')
        <footer>
            <div class="footer_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 mb_30">
                            <div class="widgets footer_menu">
                                <div class="footer_title">
                                    <h4 class="footer_heading">Company</h4>
                                    <img src="{{asset('assets/frontend/')}}/images/heading_border_half.png" alt="" />
                                </div>
                                <ul>
                                    <li><a href="{{route('terms.condition')}}">Terms And Condition</a></li>
                                    <li><a href="{{route('faq')}}">Faq</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 mb_30">
                            <div class="widgets footer_menu">
                                <div class="footer_title">
                                    <h4 class="footer_heading">Categories</h4>
                                    <img src="{{asset('assets/frontend/')}}/images/heading_border_half.png" alt="" />
                                </div>
                                <ul>
                                    <?php
                                        $cats_rn = \App\category::inRandomOrder()->take(6)->get()
                                    ?>
                                    @foreach($cats_rn as $catrn)
                                    <li><a href="{{route('category.product',$catrn->id)}}">{{$catrn->category_name}}</a></li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 mb_30">
                            <div class="widgets footer_menu">
                                <div class="footer_title">
                                    <h4 class="footer_heading">Helps Desk</h4>
                                    <img src="{{asset('assets/frontend/')}}/images/heading_border_half.png" alt="" />
                                </div>
                                <ul>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                    <li><a href="{{route('career')}}">Career</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 mb_30">
                            <div class="widgets footer_address">
                                <div class="footer_title">
                                    <h4 class="footer_heading">Contact Us</h4>
                                    <img src="{{asset('assets/frontend/')}}/images/heading_border_half.png" alt="" />
                                </div>
                                <ul>
                                    <li><span>Office Address :</span>
                                        <div class="footer_info">
                                            <a href="">{{$gn->site_address}}</a>
                                        </div>
                                    </li>
                                    <li><span>Contact Number :</span>
                                        <div class="footer_info">
                                            <a href="">+ {{$gn->site_phone}}</a>
                                            <a href="">+ {{$gn->site_phone_2}}</a>
                                        </div>
                                    </li>
                                    <li><span>Email Address  :</span>
                                        <div class="footer_info">
                                            <a href="">{{$gn->site_email}}</a>
                                            <a href="">{{$gn->site_email_2}}</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright_wrapper white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <p>Copyright © 2020 <a class="white" href="">{{$gn->site_name}}</a>. All Right Reserved.</p>
                </div>
            </div>
        </footer>





        <!-- GO To Top -->
        <a href="javascript:void(0);" id="scroll"><span class="fa fa-angle-double-up"></span></a>
        <!-- Script Start -->
        <script src="{{asset('assets/frontend/')}}/js/jquery.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/popper.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/nice-select.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/wow.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/swiper.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/owl.carousel.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/script.js"></script>
        <script src='{{asset('assets/frontend/')}}/js/jquery.magnific-popup.min.js'></script>



        <script src="{{asset('assets/frontend/')}}/js/jquery.elevatezoom.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/jquery.fancybox.min.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/plugins.js"></script>
        <script src="{{asset('assets/frontend/')}}/js/product-slider.js"></script>

        <script src="{{asset('assets/frontend/')}}/js/swiper.min.js"></script>


        <script src="{{asset('assets/frontend/')}}/js/custom.js"></script>

        @yield('js')


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @include('layouts.message')
        <script>

            var player;
            var lastButton = '';
            const youtube = 'youTubeIframe';
            const titleInsert = '.js-title-insert';
            const btnPlay = '.js-play';
            const btnPause = '.js-pause';
            const modalId = '#modalVideo';
            const videoQuality = 'hd720';

            function onYouTubePlayerAPIReady() {
                player = new YT.Player(youtube, {
                    controls: 2,
                    iv_load_policy: 3,
                    rel: 0,
                    events: {
                        onReady: onPlayerReady
                    }
                });
            }

            function onPlayerReady(event) {
                'use strict';
                $(btnPlay).on('click', function() {
                    var videoId = $(this).attr('data-src');

                    if (lastButton == videoId) {
                        $(titleInsert).text($(this).attr('data-title'));
                        player.playVideo(videoId, 0, videoQuality);
                    } else {
                        $(titleInsert).text($(this).attr('data-title'));
                        player.loadVideoById(videoId, 0, videoQuality);
                        lastButton = videoId;
                    }
                });

                $(btnPause).on('click', function() {
                    player.pauseVideo();
                });

                $(modalId).on('click', function() {
                    player.pauseVideo();
                });
            }
        </script>



        <!--Start of Tawk.to Script-->
{{--        <script type="text/javascript">--}}
{{--            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();--}}
{{--            (function(){--}}
{{--                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];--}}
{{--                s1.async=true;--}}
{{--                s1.src='https://embed.tawk.to/5f0999315b59f94722ba8778/default';--}}
{{--                s1.charset='UTF-8';--}}
{{--                s1.setAttribute('crossorigin','*');--}}
{{--                s0.parentNode.insertBefore(s1,s0);--}}
{{--            })();--}}
{{--        </script>--}}
        <!--End of Tawk.to Script-->



        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5f0999315b59f94722ba8778/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

</body>
</html>
