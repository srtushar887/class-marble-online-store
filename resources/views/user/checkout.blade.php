@extends('layouts.frontend')
@section('front')
    <section>
        <div class="inner-banner" style="background: url('{{asset('assets/frontend/images/inner-banner.jpg')}}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>Checkout</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('all.products')}}">Product Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                            <!-- Checkout Form s-->
                            <form action="{{route('user.checkout.save')}}" method="post" class="checkout-form">
                                @csrf
                                <div class="row row-40">

                                    <div class="col-lg-7">

                                        <!-- Billing Address -->
                                        <div id="billing-form">
                                            <h4 class="checkout-title">Billing Address</h4>

                                            <div class="row">

                                                <div class="col-md-6 col-md-12">
                                                    <label>Name*</label>
                                                    <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="First Name">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Email Address*</label>
                                                    <input type="email" name="email" value="{{Auth::user()->email}}" placeholder="Email Address">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Phone no*</label>
                                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="Phone number">
                                                </div>

                                                <div class="col-12">
                                                    <label>Company Name</label>
                                                    <input type="text" name="company" value="{{Auth::user()->company}}" placeholder="Company Name">
                                                </div>

                                                <div class="col-12">
                                                    <label>Address*</label>
                                                    <input type="text" name="address_one" value="{{Auth::user()->address_one}}" placeholder="Address line 1">
                                                    <input type="text" name="address_two" value="{{Auth::user()->address_two}}" placeholder="Address line 2">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Country*</label>
                                                    <select class="nice-select" name="country">
                                                        <option>Bangladesh</option>
                                                        <option>China</option>
                                                        <option>country</option>
                                                        <option>India</option>
                                                        <option>Japan</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Town/City*</label>
                                                    <input type="text" name="town" value="{{Auth::user()->town}}" placeholder="Town/City">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>State*</label>
                                                    <input type="text" name="state" value="{{Auth::user()->state}}" placeholder="State">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Zip Code*</label>
                                                    <input type="text" name="zip_code" value="{{Auth::user()->zip_code}}" placeholder="Zip Code">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <?php
                                                    $total_cart = \Gloudemans\Shoppingcart\Facades\Cart::subTotal();
                                                    ?>
                                                    <input class="form-control border-form-control" name="total_price" value="{{$total_cart}}" placeholder="Gurdeep" type="hidden">
                                                </div>
{{--                                                <div class="col-12">--}}
{{--                                                    <div class="check-box mb-2 mb-md-0">--}}
{{--                                                        <input type="checkbox" id="create_account">--}}
{{--                                                        <label for="create_account">Create an Acount?</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="check-box">--}}
{{--                                                        <input type="checkbox" id="shiping_address" data-shipping="">--}}
{{--                                                        <label for="shiping_address">Ship to Different Address</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                            </div>

                                        </div>

                                        <!-- Shipping Address -->
                                        <div id="shipping-form" style="display: none;">
                                            <h4 class="checkout-title">Shipping Address</h4>

                                            <div class="row">

                                                <div class="col-md-6 col-12">
                                                    <label>First Name*</label>
                                                    <input type="text" placeholder="First Name">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Last Name*</label>
                                                    <input type="text" placeholder="Last Name">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Email Address*</label>
                                                    <input type="email" placeholder="Email Address">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Phone no*</label>
                                                    <input type="text" placeholder="Phone number">
                                                </div>

                                                <div class="col-12">
                                                    <label>Company Name</label>
                                                    <input type="text" placeholder="Company Name">
                                                </div>

                                                <div class="col-12">
                                                    <label>Address*</label>
                                                    <input type="text" placeholder="Address line 1">
                                                    <input type="text" placeholder="Address line 2">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Country*</label>
                                                    <select class="nice-select">
                                                        <option>Bangladesh</option>
                                                        <option>China</option>
                                                        <option>country</option>
                                                        <option>India</option>
                                                        <option>Japan</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Town/City*</label>
                                                    <input type="text" placeholder="Town/City">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>State*</label>
                                                    <input type="text" placeholder="State">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Zip Code*</label>
                                                    <input type="text" placeholder="Zip Code">
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-5">
                                        <div class="row">

                                            <!-- Cart Total -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Cart Total</h4>

                                                <div class="checkout-cart-total">

                                                    <h4>Product <span>Total</span></h4>
                                                    <?php

                                                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                                    $carts_count = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                                                    ?>
                                                    <ul>
                                                        @if ($carts_count > 0)
                                                            @foreach($carts as $cart)
                                                                <li>{{$cart->name}} X {{$cart->qty}} </li>
                                                            @endforeach
                                                        @else
                                                            <p>No Product Available</p>
                                                        @endif

                                                    </ul>

{{--                                                    <p>Sub Total <span>$104.00</span></p>--}}
{{--                                                    <p>Shipping Fee <span>$00.00</span></p>--}}

{{--                                                    <h4>Grand Total <span>$104.00</span></h4>--}}

                                                </div>

                                            </div>

                                            <!-- Payment Method -->
                                            <div class="col-12">

                                                @if ($carts_count > 0)
                                                <button class="new_btn mb-4">Place order</button>
                                                @endif

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </section>


    <div class="clearfix"></div>

@stop
