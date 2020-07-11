@extends('layouts.frontend')
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


    <section class="about_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb_30">
                    <div class="about_img relative">
                        <div class="effect">
                            <img src="{{asset('assets/frontend/')}}/images/banner-13.jpg" alt="Locksmith"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center mb_30">
                    <div class="about_text">
                        <h4 class="sub_heading relative">About Us</h4>
                        <p><strong>Laxmi International Export</strong> was founded in 1992 and since then we are exporting hundreds of containers of furniture and chandeliers every year on exclusive basis to Europe, U.K, USA, South Africa and Australia. Our manufacturing operations and showrooms are based in Jaipur (Rajasthan). The wood is sourced directly from the forest department, which is chemically seasoned at our seasoning plants. The wood Sheesham, Acacia and mango. The company started selling furniture sixteen years back and has recently diversified in the field of chandeliers, gift articles and home furnishing accessories. With our flexible approach to concept and design, our in-house designers design products to embrace both contemporary and traditional style.</p>
                        <div class="divider"></div>
                        <p>We cater to international quality, standards and lifestyles. We are leading manufacturer and Exporter of Indian Handicrafts, Wooden Furniture and Wrought Iron Ware.</p>
                        <p>We have the latest in-house facility for making of quality hand crafted wooden and iron furniture. The work place employees over 95 skilled craftsmen, who amongst other things also bring with the famed and age old tradition of craftsmanship.</p>
                        <!-- <ul class="list_item">
                            <li><span class="fa fa-check-circle"></span>Pakage Lock</li>
                            <li><span class="fa fa-check-circle"></span>Car Lock</li>
                            <li><span class="fa fa-check-circle"></span>Digital & Electronic Lock </li>
                            <li><span class="fa fa-check-circle"></span>Electronics Lock</li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center mb_30">
                    <div class="about_text">
                        <p>We have the latest in-house facility for making of quality hand crafted wooden and iron furniture. The work place employees over 95 skilled craftsmen, who amongst other things also bring with the famed and age old tradition of craftsmanship.</p>
                        <p>We have in-house facility for wood seasoning and chemical treatment to make the wood moisture free. The chemicals used are eco-friendly.</p>

                        <h5 class="mt-4 mb-2 font-weight-bold">Our product-mix includes</h5>
                        <p>Coffee tables of all sizes, Dinning tables of all sizes, Wooden Cabinets, Almirah, Drawers Cabinet, Boxes, T.V.Cabinets, Hifi CD Cabinets, Kitchen Cabinets Range, Complete Bed Room Set, and many more items.</p>
                        <p>We specialize primarily in development of exclusive samples as per the need of the buyer in addition of having an enormous range of our creation, which depicts the art of India, blended with a mixture of present-era. To ensure world-class quality, every product is thoroughly checked at various stages of production from casting to packing. We have specialists who have the calibre to innovate the finest in the world, to give it a touch to make your choice a special one. Containers are stuffed at both inland port and at the factory site under the supervision of experts.</p>
                        <p>At Laxmi International Exports the customer satisfaction continues to grow as we continue to be creative and our professional attitude has not only equipped us to achieve total customer satisfaction but has also enabled us to ensure repeat orders from our clients.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="pt-5 pb-3">
        <div class="container">
            <div class="faq" id="accordion">
                <div class="card">
                    <div class="card-header" id="faqHeading-1">
                        <div class="mb-0">
                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                <span class="badge">1</span>Why Choose us
                            </h5>
                        </div>
                    </div>
                    <div id="faqCollapse-1" class="collapse show" aria-labelledby="faqHeading-1" data-parent="#accordion">
                        <div class="card-body">
                            <p>our company philosophy is built around 2 simple ideals; quality and responsiveness. Our service commitment has resulted in repeat business, referrals and long term relationships with hundreds of clients across the world. </p>
                            <p>You get value for money when you buy from us.</p>
                            <p>You get a professional supplier who knows how precious your time is.</p>
                            <p>We assure you for the exclusivity of your designs in your country.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="faqHeading-2">
                        <div class="mb-0">
                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                <span class="badge">2</span> What we can offer you...
                            </h5>
                        </div>
                    </div>
                    <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                        <div class="card-body">
                            <p>Quality manufacturing using quality materials and peace of mind by assuring what you see is what you get.</p>
                            <p>A design team who can work with you and constantly develop new products in line with your customer base/market.</p>
                            <p>Exclusive furniture, accessories and chandeliers designs from our own collections to suit all markets.</p>
                            <p>On demand management reports giving you production and supply chain information so you can track the status of your order.</p>
                            <p>Bespoke packaging solutions for all your(customer)needs if required.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="clearfix"></div>
@stop
