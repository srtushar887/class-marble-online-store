@extends('layouts.frontend')
@section('front')
    <section>
        <div class="inner-banner" style="background: url({{asset('assets/frontend/images/inner-banner.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>Contact Us</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Begin Contact Main Page Area -->
    <section class="contact-main-page">
        <div class="google-map_area">
            <div class="container-fluid">
                <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=27.1725&amp;q=Thanamod%20Chomu%20Jaipur+(DesignAim)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.gps.ie/">Find my location</a></iframe></div><br />
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contact Us</h3>
                        <p class="contact-page-message">Claritas est etiam processus dynamicus, qui sequitur
                            mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum
                            claram anteposuerit litterarum formas human.</p>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Address</h4>
                            <p>{!! $gn->site_address !!}</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Phone</h4>
                            <p>Mobile: {{$gn->site_phone}}</p>
                            <p>Hotline: 1009 678 456</p>
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                            <p>{{$gn->site_email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Tell Us Your Message</h3>
                        <div class="contact-form">
                            <form id="contact-form" action="{{route('contact.main.send')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Your Name <span class="required">*</span></label>
                                    <input type="text" name="con_name" id="con_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Email <span class="required">*</span></label>
                                    <input type="email" name="con_email" id="con_email" required>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="con_subject" id="con_subject">
                                </div>
                                <div class="form-group form-group-2">
                                    <label>Your Message</label>
                                    <textarea name="con_message" id="con_message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" value="submit" id="submit" class="new_btn" name="submit">send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </<section>
        <!-- Contact Main Page Area End Here -->


        <div class="clearfix"></div>

@stop
