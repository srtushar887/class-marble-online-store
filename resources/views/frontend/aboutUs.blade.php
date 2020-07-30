@extends('layouts.frontend')
@section('css')
    <style>
        .asbout-us-part {
            width: 100%;
            height: auto;
            float: left;
        }
        .asbout-us-part p {
            font-size: 15px;
            margin-bottom: 15px;
        }
        .asbout-us-part .about-bg p {
            font-size: 12px;
            text-align: justify;
        }
        .asbout-us-part .about-bg {
            background: #dae5ed; color: #000;
        }
        .asbout-us-part .about-bg ul{list-style-type: disc;}
        .asbout-us-part .about-bg ul li{font-size: 12px;}
        .asbout-us-part h2 {
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #fb9e5c;
        }
        .asbout-us-part h5 {
            font-size: 20px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #fb9e5c;
        }
    </style>
@stop
@section('front')
    <section>
        <div class="inner-banner" style="background: url({{asset('assets/frontend/images/inner-banner.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>About Us</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="asbout-us-part">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>{!! $about->about_first_title !!}</h2>
                    <p>{!! $about->about_first_left !!}</p>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="about-bg p-4">
                        <p>{!!  $about->about_first_right !!}</p>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="about-bg">
                        <img src="{{asset($about->about_us_image)}}">
                        <p class="p-4">
                            {!!  $about->about_after_image !!}
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <p>{!!  $about->about_beside_image !!}</p>
                </div>
            </div>
        </div>
    </section>



    <div class="clearfix"></div>
@stop
