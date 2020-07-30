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
                    <form class="needs-validation" action="{{route('admin.conatct.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Contact Us</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor" name="contact_us_content" id="validationCustom01"   >{!! $about->contact_us_content !!}</textarea>
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
