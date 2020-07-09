@extends('layouts.frontend')
@section('front')
    <section>
        <div class="inner-banner" style="background: url({{asset('assets/frontend/images/inner-banner.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>Product Detail</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.html">Product Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="product-detail-disc">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images-2 slider-lg-image-2">
                                <div class="lg-image">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{asset($product->image)}}">
                                            <img src="{{asset($product->image)}}" alt="">
                                        </a>
                                        <a href="{{asset($product->image)}}"  class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="lg-image">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{asset($product->image_one)}}">
                                            <img src="{{asset($product->image_one)}}" alt="">
                                        </a>
                                        <a href="{{asset($product->image_one)}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="lg-image">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{asset($product->image_two)}}">
                                            <img src="{{asset($product->image_two)}}" alt="">
                                        </a>
                                        <a href="{{asset($product->image_two)}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="lg-image">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{asset($product->image_three)}}">
                                            <img src="{{asset($product->image_three)}}" alt="">
                                        </a>
                                        <a href="{{asset($product->image_three)}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="lg-image">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{asset($product->image_four)}}">
                                            <img src="{{asset($product->image_four)}}" alt="">
                                        </a>
                                        <a href="{{asset($product->image_four)}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details-thumbs-2 slider-thumbs-2">
                                <div class="sm-image"><img src="{{asset($product->image)}}" alt="product image thumb"></div>
                                <div class="sm-image"><img src="{{asset($product->image_one)}}" alt="product image thumb"></div>
                                <div class="sm-image"><img src="{{asset($product->image_two)}}" alt="product image thumb"></div>
                                <div class="sm-image"><img src="{{asset($product->image_three)}}" alt="product image thumb"></div>
                                <div class="sm-image"><img src="{{asset($product->image_four)}}" alt="product image thumb"></div>
                            </div>
                        </div>
                        <!--Product Details Left -->
                    </div>
                    <div class="col-lg-6">
                        <div class="product-disc-part part-2">
                            <div class="product-disc-2-detail">
                                <h3>{{$product->product_name}}</h3>
                                <div class="product-price border-top-0 pt-3">
{{--                                    <span>$29.99 USD</span>--}}
                                </div>
                                <div class="product-info-stock-sku">
                                    <div class="stock available">
                                        <span class="ampreorder-observed">Pre Order<br></span>
                                    </div>
                                    <div class="availability only" title="Only 7 Remaining">
                                        Only 7 Remaining
                                    </div>
                                    <div class="product attribute sku">
                                        <strong class="type">Product Code</strong>
                                        <div class="value" itemprop="sku">AT1668</div>
                                    </div>
                                </div>



                                <div class="box-tocart">
                                    <div class="fieldset">
                                        <form action="{{route('add.cart.multiple')}}" method="post">
                                            @csrf
                                        <div class="field qty">
                                            <label class="label" for="qty"><span>Quantity:</span></label>
                                            <span class="input-number-decrement">–</span><input class="input-number" type="text" name="qty" value="1" min="0" max="10"><span class="input-number-increment">+</span>
                                        </div>
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="delivery-message"><p>ORDER NOW AND RECEIVE BY FRIDAY 28TH AUGUST</p></div>
                                        <div class="actions">
                                            <button type="submit" title="Add to Basket" class="action primary tocart" id="product-addtocart-button">
                                                <span>Add to Basket</span>
                                            </button>

                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="faq shadow-none" id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="faqHeading-1">
                                            <div class="mb-0">
                                                <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                                    <span class="badge">1</span>Product Description
                                                </h5>
                                            </div>
                                        </div>
                                        <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>{!! $product->long_desc !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="faqHeading-2">
                                            <div class="mb-0">
                                                <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                                    <span class="badge">2</span> Size & Specification
                                                </h5>
                                            </div>
                                        </div>
                                        <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>{{$product->size}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="faqHeading-3">
                                            <div class="mb-0">
                                                <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                                    <span class="badge">3</span>Delivery & Returns
                                                </h5>
                                            </div>
                                        </div>
                                        <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here.</p>
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
    </section>

    <!-- Product Section Start -->
    <section class="featured_product_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-8 col-12 offset-lg-3 offset-md-3 offset-sm-2 text-center">
                    <div class="gym_heading pb-5">
                        <h2>Featured Collection</h2>
                        <img src="images/heading_border.png" alt="">
                        <p>Check out our latest collections</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 padder0">
                    <div class="featured_product_slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($fetaurent_pro as $fpro)
                            <div class="swiper-slide">
                                <div class="featured_product_section">
                                    <div class="featured_product_img">
                                        <img src="{{asset($fpro->image)}}" alt=""/>
                                        <a class="featured_btn btn_1" href="javascript:void(0);">Buy Now</a>
                                    </div>
                                    <a href="{{route('product.details',$fpro->id)}}"><h4 class="featured_product_title">{{$fpro->product_name}}</h4></a>
                                    <div class="featured_product_info">
                                        <div class="featured_product_rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-half-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
{{--                                        <div class="featured_product_price">$512</div>--}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Slider Arrows -->
                    <div class="featured_product_button">
                        <div class="PrevProduct">
                            <svg version="1.1" class="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" xml:space="preserve">
									<g>
                                        <g>
                                            <path d="M501.333,234.667H68.417l109.792-109.792c2-2,3.125-4.708,3.125-7.542V96c0-4.313-2.594-8.208-6.583-9.854
												c-1.323-0.552-2.708-0.813-4.083-0.813c-2.771,0-5.5,1.083-7.542,3.125l-160,160c-4.167,4.167-4.167,10.917,0,15.083l160,160
												c3.063,3.042,7.615,3.969,11.625,2.313c3.99-1.646,6.583-5.542,6.583-9.854v-21.333c0-2.833-1.125-5.542-3.125-7.542
												L68.417,277.333h432.917c5.896,0,10.667-4.771,10.667-10.667v-21.333C512,239.438,507.229,234.667,501.333,234.667z"/>
                                        </g>
                                    </g>
								</svg>
                        </div>
                        <div class="NextProduct">
                            <svg version="1.1" class="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" xml:space="preserve">
									<g>
                                        <g>
                                            <path d="M508.875,248.458l-160-160c-3.063-3.042-7.615-3.969-11.625-2.313c-3.99,1.646-6.583,5.542-6.583,9.854v21.333
												c0,2.833,1.125,5.542,3.125,7.542l109.792,109.792H10.667C4.771,234.667,0,239.437,0,245.333v21.333
												c0,5.896,4.771,10.667,10.667,10.667h432.917L333.792,387.125c-2,2-3.125,4.708-3.125,7.542V416c0,4.313,2.594,8.208,6.583,9.854
												c1.323,0.552,2.708,0.813,4.083,0.813c2.771,0,5.5-1.083,7.542-3.125l160-160C513.042,259.375,513.042,252.625,508.875,248.458z"
                                            />
                                        </g>
                                    </g>
								</svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partner Start -->


    <div class="clearfix"></div>

@stop
@section('js')

    <script>$(document).ready(function() {$('.fancybox').fancybox();});</script>
    <script>function productZoom(){
            $(".product-zoom").elevateZoom({
                gallery: 'ProductThumbs',
                galleryActiveClass: "active",
                zoomType: "inner",
                cursor: "crosshair"
            });$(".product-zoom").on("click", function(e) {
                var ez = $('.product-zoom').data('elevateZoom');
                $(".product-zoom").removeData('zoomImage');
                $.fancybox(ez.getGalleryList());
                return false;
            });

        };
        function productZoomDisable(){
            if( $(window).width() < 767 ) {
                $('.zoomContainer').remove();
                $(".product-zoom").removeData('elevateZoom');
                $(".product-zoom").removeData('zoomImage');
            } else {
                productZoom();
            }
        };

        productZoomDisable();

        $(window).resize(function() {
            productZoomDisable();
        });
    </script>
    <script>
        $('.product-thumbnail').owlCarousel({
            loop: true,
            center: true,
            nav: true,dots:false,
            margin:10,
            autoplay: false,
            autoplayTimeout: 5000,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            item: 3,
            responsive: {
                0: {
                    items: 3
                },
                480: {
                    items: 3
                },
                992: {
                    items: 3,
                },
                1170: {
                    items: 4,
                },
                1200: {
                    items: 5
                }
            }
        });
    </script>

    <script>
        (function() {

            window.inputNumber = function(el) {

                var min = el.attr('min') || false;
                var max = el.attr('max') || false;

                var els = {};

                els.dec = el.prev();
                els.inc = el.next();

                el.each(function() {
                    init($(this));
                });

                function init(el) {

                    els.dec.on('click', decrement);
                    els.inc.on('click', increment);

                    function decrement() {
                        var value = el[0].value;
                        value--;
                        if(!min || value >= min) {
                            el[0].value = value;
                        }
                    }

                    function increment() {
                        var value = el[0].value;
                        value++;
                        if(!max || value <= max) {
                            el[0].value = value++;
                        }
                    }
                }
            }
        })();

        inputNumber($('.input-number'));
    </script>

    <script>

        (function ($) {
            "use Strict";

            /* Product Details 2 Images Slider */
            $('.product-details-images-2').each(function(){
                var $this = $(this);
                var $thumb = $this.siblings('.product-details-thumbs-2');
                $this.slick({
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    dots: false,
                    infinite: true,
                    centerMode: false,
                    centerPadding: 0,
                    asNavFor: $thumb,
                });
            });
            $('.product-details-thumbs-2').each(function(){
                var $this = $(this);
                var $details = $this.siblings('.product-details-images-2');
                $this.slick({
                    arrows: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    vertical:true,
                    verticalSwiping:true,
                    dots: false,
                    infinite: true,
                    focusOnSelect: true,
                    centerMode: false,
                    centerPadding: 0,
                    prevArrow: '<span class="slick-prev"><i class="fa fa-angle-up"></i></span>',
                    nextArrow: '<span class="slick-next"><i class="fa fa-angle-down"></i></span>',
                    asNavFor: $details,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 4,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 4,
                            }
                        },
                        {
                            breakpoint: 479,
                            settings: {
                                slidesToShow: 2,
                            }
                        }
                    ]
                });
            });
            /* --------------------------------------------------------
                Venobox Active
            * -------------------------------------------------------*/
            $('.venobox').venobox({
                border: '10px',
                titleattr: 'data-title',
                numeratio: true,
                infinigall: true
            });
            /*----------------------------------
                EasyZoom Active
            ------------------------------------*/
            var $easyzoom = $('.easyzoom').easyZoom();

        })(jQuery);
    </script>
@stop
