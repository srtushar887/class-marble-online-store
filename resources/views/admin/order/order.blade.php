@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">User Order</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0" id="cate">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Order Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->order_id}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>
                                        @if ($order->order_status == 0)
                                            New Order
                                        @elseif($order->order_status == 1)
                                            Approved
                                        @elseif($order->order_status == 2)
                                            Rejected
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.view.order',$order->id)}}">
                                            <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                        </a>
                                        <a href="{{route('admin.order.print',$order->id)}}">
                                            <button class="btn btn-success btn-sm"><i class="fas fa-print"></i> </button>
                                        </a>
                                    </td>
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
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#cate').DataTable();
        })
    </script>
@stop
