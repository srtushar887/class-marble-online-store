@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Order Details</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>



    <a href="{{route('admin.order')}}">

        <button class="btn btn-success btn-sm">Go Back</button>
    </a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" action="{{route('admin.order.update')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">
                            <?php
                                $user  = \App\User::where('id',$order->user_id)->first();
                            ?>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">User name</label>
                                <input type="text" name="product_price" value="{{$user->name}}" class="form-control" id="validationCustom01"  required="">
                                <input type="hidden" name="orderid" value="{{$order->id}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom01">User Email</label>
                                <input type="text" name="product_price" value="{{$user->email}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom01">User Phone</label>
                                <input type="text" name="product_price" value="{{$user->phone}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom01">Order Id</label>
                                <input type="text" name="product_price" value="{{$order->order_id}}" class="form-control" id="validationCustom01"  required="">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Order Status</label>
                                <select class="form-control" name="status">
                                    <option value="0" {{$order->order_status == 0 ? 'selected' : ''}}>New Order</option>
                                    <option value="1" {{$order->order_status == 1 ? 'selected' : ''}}>Approve Order</option>
                                    <option value="2" {{$order->order_status == 2 ? 'selected' : ''}}>Reject Order</option>
                                </select>
                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Item</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product price</th>
                                <th>Product Qty</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $order_details = \App\order_details::where('order_id',$order->id)->get();


                            ?>
                            @foreach($order_details as $cart)
                                <?php
                                    $product = \App\product::where('id',$cart->product_id)->first();
                                ?>
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{asset($product->image)}}" style="height: 50px;width: 50px;"></td>
                                    <td>${{$cart->product_price}}</td>
                                    <td>${{$cart->qty}}</td>
                                    <?php
                                    $am = $cart->product_price * $cart->qty;

                                    ?>
                                    <td>${{$am}}</td>
                                </tr>


                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->


        <!-- end col -->
    </div>


@stop
