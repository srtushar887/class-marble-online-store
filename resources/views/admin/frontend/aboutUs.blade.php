@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">About Us</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" action="{{route('admin.aboutus.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">About Us First Static Left Title</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor" name="about_first_title" id="validationCustom01"   >{!! $about->about_first_title !!}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">About Us First Static Left Content</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor4" name="about_first_left" id="validationCustom01"   >{!! $about->about_first_left !!}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">About Us First Static Right Content</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor3" name="about_first_right" id="validationCustom01"   >{!! $about->about_first_right !!}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">About Us Second Static Left Image</label>
                                <br>
                                <img src="{{asset($about->about_us_image)}}" style="height: 100px;width: 100px;">
                                <input type="file" class="form-control" name="about_us_image" id="validationCustom01"   >
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">About Us After Image Content</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor2" name="about_after_image" id="validationCustom01"   >{!! $about->about_after_image !!}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">About Us Beside Image Content</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor1" name="about_beside_image" id="validationCustom01"   >{!! $about->about_beside_image !!}</textarea>
                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@stop
@section('js')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
        CKEDITOR.replace( 'summary-ckeditor1' );
        CKEDITOR.replace( 'summary-ckeditor2' );
        CKEDITOR.replace( 'summary-ckeditor3' );
        CKEDITOR.replace( 'summary-ckeditor4' );
    </script>
@stop
