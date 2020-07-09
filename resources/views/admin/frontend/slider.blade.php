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
                    <form class="needs-validation" action="{{route('admin.home.header.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Title</label>
                                <input type="text" name="title" value="{{$home->title}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Youtube Image 1</label>
                                <br>
                                <img src="{{asset($home->y_image_1)}}" style="height: 100px;width: 100px;">
                                <input type="file" class="form-control" name="y_image_1" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Youtube Image 2</label>
                                <br>
                                <img src="{{asset($home->y_image_2)}}" style="height: 100px;width: 100px;">
                                <input type="file" class="form-control" name="y_image_2" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Sub-Title</label>
                                <input type="text" name="sub_title" value="{{$home->sub_title}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Video 1 Link</label>
                                <input type="text" name="video_one_link" value="{{$home->video_one_link}}" class="form-control" id="validationCustom01"  required="">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Video 2 Link</label>
                                <input type="text" name="video_two_link" value="{{$home->video_two_link}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Backgroud Image</label>
                                <br>
                                <img src="{{asset($home->back_image)}}" style="height: 100px;width: 100px;">
                                <input type="file" class="form-control" name="back_image" id="validationCustom01"   required="">
                            </div>



                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
