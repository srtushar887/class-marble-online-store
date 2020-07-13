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
                        <label class="form-control-label">ITEMS</label>
                        <select id="user_time_zonea" name="product_type" class="form-control categoriedchange" >
                            <option value="0">-- SELECT ANY --</option>
                            <?php
                                $cats = \App\category::all();
                            ?>
                            @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach

                        </select>
                        <input type="hidden" class="inptcatid" value="0">
                    </div>
                    <div class="form-group w-auto float-left">
                        <label class="form-control-label">COLLECTIONS</label>
                        <select id="user_time_zone" name="product_type" class="form-control tagselect" size="0" data-parsley-id="59">
                            <option value="0">-- SELECT ANY --</option>
                            <?php
                                $tags = \App\tag::all();
                            ?>
                            @foreach($tags as $ag)
                            <option value="{{$ag->id}}">{{$ag->tag_name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" class="inpttagid" value="0">
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

            <div class="col-md-12 remove-row ">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success normalloadmore" data-id="{{ $product->id }}" id="loadmore">Load More</button>
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



            $('.categoriedchange').change(function () {

                var cat_id = $(this).val();
                $('.inptcatid').val(cat_id);

                $.ajax({
                    url : '{{ route('get.product.by.category') }}',
                    method : "POST",
                    data : {cat_id:cat_id, _token:"{{csrf_token()}}"},
                    dataType : "text",
                    success : function (data)
                    {


                        if(data != '')
                        {
                            $('.remove-row').remove();
                            $('.product').empty().append(data);
                        }
                        else
                        {
                            // $('.product').empty();
                            $('#loadmore').html("No Data");
                        }
                    }
                });

            });


            $('.tagselect').change(function () {

                console.log('paisi')


                var tag_id = $(this).val();
                $('.inpttagid').val(tag_id);


                $.ajax({
                    url : '{{ route('get.product.by.tag') }}',
                    method : "POST",
                    data : {tag_id:tag_id, _token:"{{csrf_token()}}"},
                    dataType : "text",
                    success : function (data)
                    {
                        console.log(data)
                        if(data != '')
                        {
                            $('.remove-row').remove();
                            $('.product').empty().append(data);
                        }
                        else
                        {
                            // $('.product').empty();
                            $('#normalloadmoretag').html("No Data");
                        }
                    }
                });

            });





        });
        </script>

    <script>

        $(document).on('click','#loadmore',function(){

            var id = $(this).data('id');
            $.ajax({
                url : '{{ route('load_more') }}',
                method : "POST",
                data : {id:id, _token:"{{csrf_token()}}"},
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
                        // $('.product').empty();
                        $('#loadmore').html("No Data");
                    }
                }
            });
        });


        $(document).on('click','#normalloadmore',function(){

            var cat_id = $('.inptcatid').val();
            var id = $(this).data('id');

            $.ajax({
                url : '{{ route('category.search.loadmore.ajax') }}',
                method : "POST",
                data : {id:id,cat_id:cat_id, _token:"{{csrf_token()}}"},
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
                        // $('.product').empty();
                        $('#normalloadmore').html("No Data");
                    }
                }
            });
        });




        $(document).on('click','#normalloadmoretag',function(){

            var tag_id = $('.inpttagid').val();
            var id = $(this).data('id');

            $.ajax({
                url : '{{ route('tag.search.loadmore.ajax') }}',
                method : "POST",
                data : {id:id,tag_id:tag_id, _token:"{{csrf_token()}}"},
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
                        // $('.product').empty();
                        $('#normalloadmoretag').html("No Data");
                    }
                }
            });
        });

    </script>

@stop
