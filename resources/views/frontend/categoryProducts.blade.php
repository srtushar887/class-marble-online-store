@extends('layouts.frontend')
@section('front')
    <section>
        <div class="inner-banner" style="background: url('{{asset('assets/frontend/images/inner-banner.jpg')}}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="inner-banner-text">
                    <h2>Product Listing</h2>
                </div>
                <div class="my-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Listing</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="products-list">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group w-auto float-left mr-3">
                        <label class="form-control-label">Sort</label>
                        <select id="user_time_zone" name="product_type" class="form-control" size="0" data-parsley-id="59">
                            <option disabled="">-- PRODUCT IN PAGE --</option>
                            <option value="1" selected="">16 Products/Page</option>
                            <option value="2">12 Products/Page</option>
                            <option value="2">9 Products/Page</option>
                            <option value="2">6 Products/Page</option>
                        </select>
                    </div>
                    <div class="form-group w-auto float-left">
                        <label class="form-control-label">Sort</label>
                        <select id="user_time_zone" name="product_type" class="form-control" size="0" data-parsley-id="59">
                            <option disabled="">-- PRODUCT TYPE --</option>
                            <option value="1" selected="">Default sorting</option>
                            <option value="2">Sort by popularity</option>
                            <option value="2">Sort by newness</option>
                            <option value="2">Sort by price: low to high</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 my-3">
                    <!-- <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn btn-info" id="list">
                                List View
                            </button>
                            <button class="btn btn-danger" id="grid">
                                Grid View
                            </button>
                        </div>
                    </div> -->
                    <div class="well well-sm float-right">
                        <div class="btn-group">
                            <a href="#" id="list" class="btn btn-default btn-sm"><i class="fas fa-list"></i> List</a>
                            <a href="#" id="grid" class="btn btn-default btn-sm"><i class="fas fa-th"></i> Grid</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="products" class="row view-group product">
                @foreach($products as $product)
                    <div class="item col-sm-6 col-md-6 col-lg-4">
                        <div class="thumbnail card border-0 shadow-sm">
                            <a href="{{route('product.details',$product->id)}}" class="img-event">
                                <img class="group list-group-image img-fluid" src="{{asset($product->image)}}" style="width: 100%" alt="" />
                            </a>
                            <div class="caption card-body">
                                <a href="{{route('product.details',$product->id)}}" class="group card-title inner list-group-item-heading">
                                    {{$product->product_name}}</a>
                                <p class="group inner list-group-item-text">
                                    <?php

                                    $body = substr(strip_tags($product->long_desc),0,250);
                                    $body .= strlen(strip_tags($product->long_desc))>250?".........":"";
                                    ?>
                                    {!! $body !!}</p>
                                <div class="row mt-3">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                        {{--                                        ${{$product->product_price}}</p>--}}
                                    </div>
                                    <div class="col-xs-12 col-md-6 text-right">
                                        <a class="btn btn-main btn-sm" href="{{route('add.cart.single',$product->id)}}"><i class="fab fa-opencart"></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="col-md-12 remove-row">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success" data-id="{{ $product->id }}" id="loadmore">Load More</button>
                    <input type="hidden" name="cat_id" class="cat_id" value="{{$cat_id}}">
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
    </script>

    <script>

        $(document).on('click','#loadmore',function(){
            var id = $(this).data('id');
            var catid = $('.cat_id').val();
            $("#loadmore").html("Loading....");
            $.ajax({
                url : '{{ route('load_more.category') }}',
                method : "POST",
                data : {id:id,catid:catid, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (data)
                {

                    // console.log(data)

                    if(data != '')
                    {
                        $('.remove-row').remove();
                        $('.product').append(data);
                    }
                    else
                    {
                        $('#loadmore').html("No Data");
                    }
                }
            });
        });
    </script>

@stop
