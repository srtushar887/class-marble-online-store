@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Product Management</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" action="{{route('user.profile.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Profile Image</label>
                                <br>
                                @if (!empty(Auth::user()->profile_image))
                                    <img src="{{asset(Auth::user()->profile_image)}}" style="height: 100px;width: 100px;">
                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTgsaRe2zqH_BBicvUorUseeTaE4kxPL2FmOQ&usqp=CAU" style="height: 100px;width: 100px;">
                                @endif

                                <input type="text" name="profile_image" class="form-control" id="validationCustom01"  >
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="validationCustom01"  >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Email</label>
                                <input type="text" name="email" value="{{Auth::user()->email}}"  class="form-control" id="validationCustom01"  >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Phone</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="validationCustom01"  >
                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
