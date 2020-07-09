@extends('layouts.frontend')
@section('front')

    <!-- Revolution slider start -->

    <section class="main-slider-part" style="background: url('{{asset($all_static->back_image)}}');">
        <div class="banner-innerpage">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="mb-3">{{$all_static->title}}</h1>
                        <p class="mb-3">{{$all_static->sub_title}}</p>
                        <a class="btn btn-main mb-4" href="{{route('contact')}}">Get in touch</a>
                    </div>

                    <div class="col-md-5 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="mb-3">Videos</h1>
                            </div>
                            <div class="col-6 col-sm-6 mb-3">
                                <div class="card w-100 mx-auto">
                                    <button class="btn p-0 js-play" type="button" data-toggle="modal" data-target="#modalVideo1" data-src="c7nRTF2SowQ" data-title="Официальный анонс-трейлер Battlefield 1"><img class="card-img-top" src="{{asset($all_static->y_image_1)}}" alt="Официальный анонс-трейлер Battlefield 1"/></button>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="card w-100 mx-auto">
                                    <button class="btn p-0 js-play" type="button" data-toggle="modal" data-target="#modalVideo2" data-src="omWEZI0cT1g" data-title="DOOM - Fight Like Hell Cinematic Trailer"><img class="card-img-top" src="{{asset($all_static->y_image_2)}}" alt="DOOM - Fight Like Hell Cinematic Trailer"/></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modalVideo1">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title js-title-insert"></h5>
                    <button class="close js-pause" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body px-0 py-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="420" height="345" src="{!! $all_static->video_one_link !!}">
                        </iframe>
{{--                        <div class="embed-responsive-item" id="youTubeIframe"></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modalVideo2">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title js-title-insert"></h5>
                    <button class="close js-pause" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body px-0 py-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="420" height="345" id="youTubeIframe" frameborder="0" allowfullscreen src="{{$all_static->video_two_link}}">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add youtube api-->
    <script src="https://www.youtube.com/iframe_api"></script>
    <!-- Revolution slider end -->


    <!-- About Start -->
    <section class="banner-area py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="gym_heading pb-5 text-center">
                        <h2>Explore Categories</h2>
                        <img src="{{asset('assets/frontend/')}}/images/heading_border.png" alt="">
                        <p>Check out our latest collections</p>
                    </div>
                </div>

                <?php
                $cat_1 = \App\category::inRandomOrder()->limit(1)->get();
                ?>
                @foreach($cat_1 as $cat1)

                    <div class="col-lg-7 col-md-12 col-sm-12 pb-4">
                    <div class="banner-wrap">
                            <img src="{{asset($cat1->cat_image)}}" alt="banner">
                        <div class="banner-content">
                            <h2>{{$cat1->category_name}}</h2>
                            <a href="{{route('category.prodyuct',$cat1->id)}}">Shop Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <?php
                $cat_2 = \App\category::inRandomOrder()->limit(1)->get();
                ?>
                @foreach($cat_2 as $cat2)
                <div class="col-lg-5 col-md-6 col-sm-6 pb-4">
                    <div class="banner-wrap">
                        <a href="{{route('category.prodyuct',$cat2->id)}}">
                            <img src="{{asset($cat1->cat_image)}}" alt="banner">
                        </a>
                        <div class="banner-content">
                            <h2>{{$cat2->category_name}}</h2>
                            <a href="{{route('category.prodyuct',$cat2->id)}}">Shop Now</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <?php
                $cat_3 = \App\category::inRandomOrder()->limit(1)->get();
                ?>
                @foreach($cat_3 as $cat3)

                <div class="col-lg-5 col-md-6 col-sm-6 pb-4">
                    <div class="banner-wrap">
                        <a href="{{route('category.prodyuct',$cat3->id)}}">
                            <img src="{{asset($cat3->cat_image)}}" alt="banner">
                        </a>
                        <div class="banner-content">
                            <h2>{{$cat3->category_name}}</h2>
                            <a href="{{route('category.prodyuct',$cat3->id)}}">Shop Now</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <?php
                $cat_4 = \App\category::inRandomOrder()->limit(1)->get();
                ?>
                @foreach($cat_4 as $cat4)

                <div class="col-lg-7 col-md-12 col-sm-12 pb-4">
                    <div class="banner-wrap">
                        <img src="{{asset($cat4->cat_image)}}" alt="banner">
                        <div class="banner-content">
                            <h2>{{$cat4->category_name}}</h2>
                            <a href="{{route('category.prodyuct',$cat4->id)}}">Shop Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================  Products widget ======================== -->

    <section class="products">

        <div class="container">

            <!-- === header title === -->
            <div class="row">
                <div class="offset-md-2 col-md-8 text-center">
                    <div class="gym_heading pb-5">
                        <h2>Featured Collection</h2>
                        <img src="{{asset('assets/frontend/')}}/images/heading_border.png" alt="">
                        <p>Check out our latest collections</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- === product-item === -->
                @foreach($fetaurent_pro as $pro)
                <div class="col-md-4 col-sm-6">
                    <article>
                        <div class="info">
                            <!-- <span class="add-favorite added">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="fa fa-heart"></i></a>
                            </span> -->
                            <span>
                                    <a href="" class="mfp-open" data-title="Quick wiew"><i class="far fa-eye"></i></a>
                                </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="fab fa-opencart"></i>
                        </div>
                        <div class="figure-grid">
                            <div class="image">
                                <a href="{{route('product.details',$pro->id)}}" class="mfp-open">
                                    <img src="{{asset($pro->image)}}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="{{route('product.details',$pro->id)}}">{{$pro->product_name}}</a></h2>
                                <sub>$ 1499,-</sub>
                                <sup>$ 1099,-</sup>
                                <span class="description clearfix">{!! $pro->long_desc !!}</span>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach

            </div> <!--/row-->
            <!-- === button more === -->

            <div class="wrapper-more">
                <a href="{{route('all.products')}}" class="btn btn-main">Discover More</a>
            </div>
        </div> <!--/container-->
    </section>

    <!-- Call To Action Section -->
    <!--  <section class="callToAction_wrapper" style="background: url(images/slider1.jpg);">
         <div class="container">
             <div class="row">
                 <div class="col-lg-8 col-md-12 col-sm-12 col-12 offset-lg-2 text-center">
                     <div class="callToAction_text">
                         <a href="https://www.youtube.com/embed/8lQzkwqhKTk" rel="external" class="video_btn video_popup" title="title">
                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" viewBox="0 0 22.5 30">
                                 <path d="M22.197,14.417 L1.137,0.133 C0.913,-0.017 0.626,-0.035 0.389,0.089 C0.147,0.213 -0.002,0.454 -0.002,0.723 L-0.002,29.293 C-0.002,29.557 0.147,29.802 0.389,29.924 C0.491,29.980 0.609,30.004 0.726,30.004 C0.871,30.004 1.012,29.963 1.137,29.879 L22.197,15.594 C22.396,15.461 22.513,15.242 22.513,15.008 C22.513,14.771 22.396,14.551 22.197,14.417 L22.197,14.417 Z" class="cls-1"/>
                             </svg>
                         </a>
                         <h1>We Will Help Companies To <span> Become More Successful.</span></h1>
                     </div>
                 </div>
             </div>
         </div>
     </section> -->
    <!-- Call To Action Section -->

    <!-- Partner Start -->
    <section class="partner_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="partners_slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($partners as $partner)
                            <div class="swiper-slide">
                                <div class="partners_container text-center">
                                    <a href="javascript:void(0);"><img src="{{asset($partner->image)}}" alt="partner"/></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section Start -->
    <section class="newsletter_wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 mb_30">
                    <div class="newsletter_heading">
                        <h1>Subscribe to Newsletter</h1>
                        <p>Consectetur adipiscing elit sed do eiusmod tempor incididunt uet labore eeaset dolore magna aliqua quis ipsum.</p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12 mb_30">
                    <div class="newsletter_form">
                        <form>
                            <div class="subscribe_holder">
                                <input type="text" placeholder="Enter Your Email Here">
                                <a href="javascript:void(0);" class="my_btn text_white">Submit Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Blog Section Start -->
    <!-- <section class="dr_blog_wrapper">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center pb-5">
                <div class="dr_heading">
                    <h4>Recent Events</h4>
                    <img src="images/heading_border.png" alt="" />
                    <p>Consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="dr_blog_thumb">
                        <a href=";" class="dr_blog_img">
                            <img src="images/blog-1.jpg" alt="" />
                        </a>
                        <div class="blog_text">
                            <ul class="dr_blog_info">
                                <li><a href="">July 29, 2020</a></li>
                                <li><a href="">David Parker</a></li>
                                <li><a href="">5k Comments</a></li>
                            </ul>
                            <a href=""><h4 class="dr_blog_title">For Weight Loss, Less Exercise It’s May Be better More</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing seed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis ipsum suspendisse.</p>
                            <a class="dr_readMoreBtn" href="">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="dr_blog_thumb">
                        <a href="" class="dr_blog_img">
                            <img src="images/blog-2.jpg" alt="" />
                        </a>
                        <div class="blog_text">
                            <ul class="dr_blog_info">
                                <li><a href="">July 29, 2020</a></li>
                                <li><a href="">David Parker</a></li>
                                <li><a href="">5k Comments</a></li>
                            </ul>
                            <a href=";"><h4 class="dr_blog_title">For Weight Loss, Less Exercise It’s May Be better More</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing seed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis ipsum suspendisse.</p>
                            <a class="dr_readMoreBtn" href="">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="dr_blog_thumb">
                        <a href="" class="dr_blog_img">
                            <img src="images/blog-3.jpg" alt="" />
                        </a>
                        <div class="blog_text">
                            <ul class="dr_blog_info">
                                <li><a href="">July 29, 2020</a></li>
                                <li><a href="">David Parker</a></li>
                                <li><a href="">5k Comments</a></li>
                            </ul>
                            <a href=";"><h4 class="dr_blog_title">For Weight Loss, Less Exercise It’s May Be better More</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing seed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis ipsum suspendisse.</p>
                            <a class="dr_readMoreBtn" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

@stop
