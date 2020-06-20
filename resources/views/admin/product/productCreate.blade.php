@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Product Management</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>



    <a href="{{route('admin.product')}}">

        <button class="btn btn-success btn-sm">Go Back</button>
    </a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" action="{{route('admin.product.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">select any</option>
                                    @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Tag</label>
                                <select class="form-control" name="tag_id">
                                    <option value="0">select any</option>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product price</label>
                                <input type="text" name="product_price" class="form-control" id="validationCustom01"  required="">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Image</label>
                                <input type="file" class="form-control" name="image" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Sort Description</label>
                                <textarea type="text" class="form-control" name="sort_des" id="validationCustom01"   required=""></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Long Description</label>
                                <textarea type="text" class="form-control" name="long_desc" id="validationCustom01"   required=""></textarea>
                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
