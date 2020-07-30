@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Invoice</h4>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h4><b>{{$gn->site_name}}</b></h4>
                        </div>
                        <div class="float-right">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-6">
                            <h6 class="font-weight-bold">TO:</h6>

                            <address class="line-h-24">
                                <?php
                                    $user = \App\User::where('id',$order->user_id)->first();
                                ?>
                                <b>{{$user->name}}</b><br>
                                    <abbr title="Company">Company :</abbr> {!! $user->company !!}<br>
                                <abbr title="Phone">P:</abbr> {{$user->phone}}
                            </address>
                        </div><!-- end col -->
                        <div class="col-6">
                            <div class="mt-3 float-right">
                                <p class="mb-2"><strong>Order Date: </strong> {{$order->created_at}}</p>
{{--                                <p class="mb-2"><strong>Order Status: </strong> <span class="badge badge-soft-success">Paid</span></p>--}}
                                <p class="m-b-10"><strong>Order ID: </strong> #{{$order->order_id}}</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                    <tr><th>#</th>
                                        <th>Item</th>
                                        <th>Item Image</th>
                                        <th>Quantity</th>
                                    </tr></thead>
                                    <tbody>
                                    <?php
                                        $order_item = \App\order_details::where('order_id',$order->id)->get();
                                        $i=1;
                                    ?>
                                    @foreach($order_item as $orderitm)
                                        <?php
                                            $product = \App\product::where('id',$orderitm->product_id)->first();
                                        ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            Product Name : {{$product->product_name}} <br>
                                            CODE : {{$product->item_code}}
                                        </td>
                                        <td>
                                            <img src="{{asset($product->image)}}" style="height: 100px;width: 100px;">
                                        </td>
                                        <td>{{$orderitm->qty}}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>

                    <div class="d-print-none my-4">
                        <div class="text-right">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
