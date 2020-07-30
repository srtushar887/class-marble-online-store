@extends('layouts.frontend')
@section('css')

@stop
@section('front')
    <section>
        <div class="inner-banner" style="background: url('{{asset('assets/frontend/images/inner-banner.jpg')}}');">
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


    <section class="contact-main-page">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Book Your Tour</h3>
                        <div class="contact-form">
                            <form action="{{route('virtualtoursave')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Your Name <span class="required">*</span></label>
                                            <input type="text" name="con_name" id="con_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" name="con_email" id="con_email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="number" name="con_number" id="con_number">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Time Frame</label>
                                            <select class="form-control custom-select" name="time">
                                                <option value="12PM - 1AM">12PM - 1AM IST</option>
                                                <option value="1AM - 2AM">1AM - 2AM IST</option>
                                                <option value="2AM - 3AM">2AM - 3AM IST</option>
                                                <option value="3AM - 4AM">3AM - 4AM IST</option>
                                                <option value="4AM - 5AM">4AM - 5AM  IST</option>
                                                <option value="5AM - 6AM">5AM - 6AM IST</option>
                                                <option value="6AM - 7AM">6AM - 7AM IST</option>
                                                <option value="7AM - 8AM">7AM - 8AM IST</option>
                                                <option value=">8AM - 9AM">8AM - 9AM IST</option>
                                                <option value="9AM - 10AM">9AM - 10AM IST</option>
                                                <option value="10AM - 11AM">10AM - 11AM IST</option>
                                                <option value="11AM - 12PM">11AM - 12PM IST</option>
                                                <option value="12PM - 1PM">12PM - 1PM IST</option>
                                                <option value="1PM - 2PM">1PM - 2PM IST</option>
                                                <option value="2PM - 3PM">2PM - 3PM IST</option>
                                                <option value="3PM - 4PM">3PM - 4PM IST</option>
                                                <option value="4PM - 5PM">4PM - 5PM IST</option>
                                                <option value="5PM - 6PM">5PM - 6PM IST</option>
                                                <option value="7PM - 8PM">7PM- 8PM IST</option>
                                                <option value="8PM - 9PM">8PM - 9PM IST</option>
                                                <option value="9PM - 10PM">9PM - 10PM IST</option>
                                                <option value="10PM - 11PM">10PM - 11PM IST</option>
                                                <option value="11PM - 12PM">11PM - 12PM IST</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Date</label>
                                            <input type="date" name="con_date" id="con_number">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-group-2">
                                            <label>Your Message</label>
                                            <textarea name="con_message" id="con_message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-right">
                                            <button type="submit" value="submit" id="submit" class="new_btn" name="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
@stop
