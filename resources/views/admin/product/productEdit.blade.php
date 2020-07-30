@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Update Product</h4>

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
                    <form class="needs-validation" action="{{route('admin.product.update')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Name</label>
                                <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="validationCustom01"  required="">
                                <input type="hidden" name="product_edit_id" value="{{$product->id}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">select any</option>
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}" {{$product->category_id == $cat->id ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Tag</label>
                                <select class="form-control" name="tag_id">
                                    <option value="0">select any</option>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" {{$product->tag_id == $tag->id ? 'selected' : ''}}>{{$tag->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Is Featured</label>
                                <select class="form-control" name="is_featured">
                                    <option value="0">select any</option>
                                    <option value="1" {{$product->is_featured == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="2" {{$product->is_featured == 2 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Item Code</label>
                                <input type="text" name="item_code" value="{{$product->item_code}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Size</label>
                                <input type="text" name="size" value="{{$product->size}}" class="form-control" id="validationCustom01"  required="">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Material</label>
                                <input type="text" name="material" value="{{$product->material}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Finish</label>
                                <input type="text" name="finish" value="{{$product->finish}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">CBM</label>
                                <input type="text" name="cbm" value="{{$product->cbm}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Assembly</label>
                                <select class="form-control" name="assembly">
                                    <option value="1" {{$product->assembly == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="2" {{$product->assembly == 1 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Main Image</label>
                                <br>
                                @if (!empty($product->image))

                                    <img src="{{asset($product->image)}}" style="height: 100px;width: 100px;" >
                                @else
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;" >
                                @endif
                                <input type="file" class="form-control" name="image" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Image One</label>
                                <br>
                                @if (!empty($product->image_one))

                                    <img src="{{asset($product->image_one)}}" style="height: 100px;width: 100px;" >
                                @else
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;" >
                                @endif
                                <input type="file" class="form-control" name="image_one" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Image Two</label>
                                <br>
                                @if (!empty($product->image_two))

                                    <img src="{{asset($product->image_two)}}" style="height: 100px;width: 100px;" >
                                @else
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;" >
                                @endif
                                <input type="file" class="form-control" name="image_two" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Image Three</label>
                                <br>
                                @if (!empty($product->image_three))

                                    <img src="{{asset($product->image_three)}}" style="height: 100px;width: 100px;" >
                                @else
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;" >
                                @endif
                                <input type="file" class="form-control" name="image_three" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Image Four</label>
                                <br>
                                @if (!empty($product->image_four))

                                    <img src="{{asset($product->image_four)}}" style="height: 100px;width: 100px;" >
                                @else
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;" >
                                @endif
                                <input type="file" class="form-control" name="image_four" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Image Five</label>
                                <br>
                                @if (!empty($product->image_five))

                                    <img src="{{asset($product->image_five)}}" style="height: 100px;width: 100px;" >
                                @else
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;" >
                                @endif
                                <input type="file" class="form-control" name="image_five" id="validationCustom01"   required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Delivery & Returns</label>
                                <textarea type="text" class="form-control" name="delivery_and_return" id="validationCustom01"   required="">{!! $product->delivery_and_return !!}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Long Description</label>
                                <textarea type="text" class="form-control" name="long_desc" id="validationCustom01"   required="">{!! $product->long_desc !!}</textarea>
                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
