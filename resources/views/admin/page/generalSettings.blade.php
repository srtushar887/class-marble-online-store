@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">General Settings</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" action="{{route('admin.generalsettings.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Site Name</label>
                                <input type="text" name="site_name" value="{{$gen->site_name}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Email 1</label>
                                <input type="text" name="site_email" value="{{$gen->site_email}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Email 2</label>
                                <input type="text" name="site_email_2" value="{{$gen->site_email_2}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Phone 1</label>
                                <input type="text" name="site_phone" value="{{$gen->site_phone}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Phone 2</label>
                                <input type="text" name="site_phone_2" value="{{$gen->site_phone_2}}" class="form-control" id="validationCustom01"  required="">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Site Address</label>
                                <textarea type="text" class="form-control" name="site_address" id="validationCustom01"   required="">{!! $gen->site_address !!}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Footer Content</label>
                                <textarea type="text" class="form-control" name="footer_content" id="validationCustom01"   required="">{!! $gen->footer_content !!}</textarea>
                            </div>




                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Logo</label>
                                <br>
                                <img src="{{asset($gen->logo)}}" style="height: 100px;width: 100px;">
                                <input type="file" class="form-control" name="logo" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Icon</label>
                                <br>
                                <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px;">
                                <input type="file" class="form-control" name="icon" id="validationCustom01"   required="">
                            </div>



                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
