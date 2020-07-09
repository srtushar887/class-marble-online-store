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
                    {!! $product->long_desc !!}</p>
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
