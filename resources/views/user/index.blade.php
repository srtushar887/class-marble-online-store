@extends('layouts.user')
@section('user')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase mt-0">Total Orders</h6>
                    <h3 class="mb-3" data-plugin="counterup">{{$total_order}}</h3>
                </div>
            </div>
        </div>





    </div>
    <!-- end row -->
@stop
