@extends('layouts.frontend')
@section('front')
    <section>
        <div class="inner-banner" style="background: url({{asset('assets/frontend/images/inner-banner.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>Login / Register</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login / Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Wraapper -->
    <div class="login-register-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a  href="{{route('login')}}">
                                <h4> login </h4>
                            </a>
                            <a class="active" href="{{route('custom.register')}}">
                                <h4> register </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{route('custom.register')}}" method="post">
                                            @csrf
                                            <input type="text" name="user_name" placeholder="Username">
                                            <input type="text" name="name" placeholder="Name">
                                            <input type="text" name="email" placeholder="Email">
                                            <input type="text" name="phone" placeholder="Phone">
                                            <input type="text" name="company_name" placeholder="Company Name">
                                            <input type="text" name="skype_id" placeholder="Skype ID(optional)">
                                            <input type="text" name="whatapp_ap" placeholder="Whats app Number(optional)">
                                            <input type="password" name="password" placeholder="Password">
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" id="remember">
                                                    <label for="remember">Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="submit">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
