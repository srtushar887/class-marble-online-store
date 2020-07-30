@extends('layouts.frontend')
@section('front')
    <section>
        <div class="inner-banner" style="background: url('{{asset('assets/frontend/images/inner-banner.jpg')}}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>FAQ</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="faq-section">
        <div class="container">
            <div class="row">
                <!-- ***** FAQ Start ***** -->
                <div class="col-md-12">
                    <div class="faq-title text-left pb-3">
                        <h2>Below are frequently asked questions, you may find the answer for yourself</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    </div>

                    <div class="faq" id="accordion">

                        @foreach($faq as $fq)
                        <div class="card">
                            <div class="card-header" id="faqHeading-{{$fq->id}}">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-{{$fq->id}}" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                        <span class="badge">1</span>{{$fq->question}}
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-{{$fq->id}}" class="collapse" aria-labelledby="faqHeading-{{$fq->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    <p>{!! $fq->answer !!}</p>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="clearfix"></div>
@stop
