@extends('layouts.frontend')
@section('front')
    <section>
        <div class="inner-banner" style="background: url('{{asset('assets/frontend/images/inner-banner.jpg')}}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>Cart</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('all.products')}}">Product Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="shopping-cart">

        <div class="container">
            <div class="card p-4 shadow-sm">
                <div class="column-labels">
                    <label class="product-image">Image</label>
                    <label class="product-details">Product</label>
                    <label class="product-quantity">Quantity</label>
                    <label class="product-removal">Remove</label>
{{--                    <label class="product-line-price">Total</label>--}}
                </div>
                <?php

                $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                $carts_count = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                ?>
                @foreach($carts as $cart)
                <div class="product">
                    <div class="product-image">
                        <img src="{{asset($cart->options->image)}}">
                    </div>
                    <div class="product-details">
                        <h5 class="product-title">{{$cart->name}}</h5>
{{--                        <p class="product-description"> It has a lightweight, breathable mesh upper with forefoot cables for a locked-down fit.</p>--}}
                    </div>
                    <form action="{{route('cart.update.checkout')}}" method="get">
                        @csrf
                    <div class="product-quantity">
                        <input type="number" value="{{$cart->qty}}" name="qty" min="1">
                        <input type="hidden" value="{{$cart->rowId}}" name="row_id">
                    </div>
                    <div class="product-removal">
                            <button type="submit" class="remove-product">
                                Update
                            </button>

                        <a href="{{route('remove.item.cart',$cart->rowId)}}">
                            <button type="button" class="remove-product">
                                Remove
                            </button>
                        </a>

                    </div>
                    </form>
{{--                    <div class="product-line-price">{{$cart->subTotal()}}</div>--}}
                </div>
                @endforeach



                <div class="totals">
{{--                    <div class="totals-item">--}}
{{--                        <label>Subtotal</label>--}}
{{--                        <div class="totals-value" id="cart-subtotal">71.97</div>--}}
{{--                    </div>--}}
{{--                    <div class="totals-item">--}}
{{--                        <label>Tax (5%)</label>--}}
{{--                        <div class="totals-value" id="cart-tax">3.60</div>--}}
{{--                    </div>--}}
{{--                    <div class="totals-item">--}}
{{--                        <label>Shipping</label>--}}
{{--                        <div class="totals-value" id="cart-shipping">15.00</div>--}}
{{--                    </div>--}}
{{--                    <div class="totals-item totals-item-total">--}}
{{--                        <label>Grand Total</label>--}}
{{--                        <div class="totals-value" id="cart-total">90.57</div>--}}
{{--                    </div>--}}

                    <div class="add-in-car text-right">
                        <a href="{{route('checkout')}}">

                            <button type="button" class="btn new_btn">Checkout</button>
                        </a>
                    </div>
                </div>


            </div>
        </div>

    </section>


    <div class="clearfix"></div>

@stop
