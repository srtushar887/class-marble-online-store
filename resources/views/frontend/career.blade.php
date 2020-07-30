@extends('layouts.frontend')
@section('css')
<style>

    /**** Career Page *****/
    .currentjob {
        width: 100%;
        float: left;
        padding-bottom: 10px;
        margin-bottom: 10px;
        box-shadow: 0 4px 12px 0 rgba(131, 146, 165, 0.15), 2px 2px 5px 0 rgba(60, 70, 83, 0.04) !important;
        padding: 15px;
    }
    .currentjob .heading {
        width: 100%;
        float: left;
        padding-bottom: 5px;
        color: #000;
        font-size: 20px;
        font-weight: normal;
        font-family:monospace;
        text-transform: uppercase;
    }
    .currentjob .headingsub {
        width: 100%;
        float: left;
        padding-bottom: 5px;
        color: #fb9e5c;
        font-size: 16px;
    }
    .currentjob .headingsub span{ color: #000; }
    .headingpart {
        color: #fb9e5c;
        font-size: 17px;
    }
    .widt50 {
        width: 50%;
        float: left; text-align: left;
    }
    .widt100 {
        width: 100%;
        float: left;
        text-align: left;
        padding: 0px 10px;
    }
    .widt50 button {
    / background: #000; /
    padding: 1px 12px;
        border: 2px solid #18aae7;
    }
    .widt50 button a {
        color: #1499d2;
    }
    .widt50 h3 a {
        color: #1499d2;
    }
    .widt30 {
        float: left;
        width: 80px;
    }
    .widt70{ float:left; width: 70%; }
    .widt50 button:hover{ background-color: #18aae7; border:2px solid transparent; color:#fff;}
    .widt50 button:hover a{ color: #fff; }
    .widt70 div {
        width: auto;
        border: 1px solid #1499d2;
        color: #1499d2;
        float: left;
        padding: 0px 7px;
        margin: 0px 3px 3px 0px;
        font-size: 11px;
        line-height: 19px;
    }
    .widt30 h6 {
        line-height: 20px;
        font-size: 12px;
    }
    .right-sectn1 {
        box-shadow: 0 0 35px #dfdfdf;
    / padding: 25px; /
    margin-bottom: 10px;
        float: left;
        width: 100%;
    }
    .right-sectn1 h2 {
        color: #262000;
        padding-top: 10px;
        background: #fb9e5c;
        padding-top: 30px;
        padding-bottom: 30px;
        text-align: center;
        font-size: 28px;
        margin-bottom: 0;
    }
    .bg-white {
        background-color: #fff;
    }
    .input-group.remove-bdr {
        position: relative;
        width: 100%;
    }
    .remove-bdr .input-group-addon {
        border: 0;
        background: transparent;
        color: #fb9e5c;
        position: absolute;
        z-index: 999;
        top: 3px;
    }
    .input-group.remove-bdr input {
        border-bottom: 1px solid #ccc;
        padding-left: 40px;
        border-radius: 0;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
    .remove-bdr input {
        border: 0px;
        border-bottom-color: currentcolor;
        border-bottom-style: none;
        border-bottom-width: 0px;
        box-shadow: none;
    }
    .p25 {
        padding: 25px;
    }
    .input-group.remove-bdr select {
        border: 0;
        border-bottom-color: currentcolor;
        border-bottom-style: none;
        border-bottom-width: 0px;
        box-shadow: none;
    }
    .input-group.remove-bdr select {
        border-bottom: 1px solid #ccc !important;
        padding-left: 40px;
        border-radius: 0;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    .reque-a-quote-btn:hover {
        background: #000;
    }
    .reque-a-quote-btn {
        background-color: #fb9e5c;
        color: #fff;
        display: inline-block;
        font-size: 24px;
        margin-bottom: 0px;
        margin-top: 16px;
        padding: 25px 10px;
        text-transform: uppercase;
        width: 100%;
        border: 0px;
        transition-delay: 0s;
        transition-duration: 0.5s;
        transition-property: all;
        transition-timing-function: ease;
    }
</style>
@stop


@section('front')
    <section>
        <div class="inner-banner" style="background: url({{asset('assets/frontend/images/inner-banner.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>Career</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Career</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="mt40">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class=" bg-careers1">
                        @foreach($jobs as $job)
                        <div class="currentjob">

                            <div class="heading">{{$job->job_title}}</div>
                            <div class="headingsub">
                                Experience: <span class="gray">{{$job->job_exp}} YEARS </span><br>
                                Position Number: <span class="gray">{{$job->posistion_number}}</span>
                            </div>
                            <div class="skills-required">
                                <div class="headingpart">Skill: {{$job->job_skill}}</div>
                                <p>{!! $job->job_des !!}
                                </p>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {{$jobs->links()}}
                </div>
                <div class="col-sm-6 sm-padding">
                    <div class="right-sectn1">
                        <h2>REQUEST A QUOTE</h2>
                        <form class="bg-white p25" method="post" action="{{route('applyjob')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" placeholder="Enter your Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="budget" class="cols-sm-2 control-label">Gender</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fa fa-male" aria-hidden="true"></i></span>
                                        <select class="form-control" name="gender">
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="cols-sm-2 control-label">Contact No.</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="contact" placeholder="Enter your Phone No.">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="budget" class="cols-sm-2 control-label">Select Job</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fas fa-user-tie"></i></span>
                                        <select class="form-control" name="job_id">
                                            <option value="0">Choose One</option>
                                            @foreach($jobs as $jb)
                                            <option value="{{$jb->job_title}}">{{$jb->job_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="budget" class="cols-sm-2 control-label">Experience</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fas fa-award"></i></span>
                                        <select class="form-control" name="exp">
                                            <option value="">0</option>
                                            <option value="1">1 Years</option>
                                            <option value="2">2 Years</option>
                                            <option value="3">3 Years</option>
                                            <option value="4">4 Years</option>
                                            <option value="5">5 Years</option>
                                            <option value="6">6 Years</option>
                                            <option value="7">7 Years</option>
                                            <option value="8">8 Years</option>
                                            <option value="9">9 Years</option>
                                            <option value="10">10 Years</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="budget" class="cols-sm-2 control-label">Current CTC</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fas fa-rupee-sign"></i></span>
                                        <select class="form-control" name="c_salary">
                                            <option>Choose Your CTC</option>
                                            <option value="1">1 Lac TO Lac 50</option>
                                            <option value="2">1 Lac TO Lac 50</option>
                                            <option value="3">1 Lac TO Lac 50</option>
                                            <option value="4">1 Lac TO Lac 50</option>
                                            <option value="5">1 Lac TO Lac 50</option>
                                            <option value="6">1 Lac TO Lac 50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Skype" class="cols-sm-2 control-label">Upload Resume</label>
                                <div class="cols-sm-10">
                                    <div class="input-group remove-bdr">
                                        <span class="input-group-addon"><i class="fa fa-file fa-lg" aria-hidden="true"></i></span>
                                        <input type="file" name="cv" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <button type="submit" name="freeConsultation" class="reque-a-quote-btn">Apply</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
@stop
