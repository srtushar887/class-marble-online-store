<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\order;
use App\order_details;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function user_order()
    {
        $orders = order::orderBy('id','desc')->get();
        return view('admin.order.order',compact('orders'));
    }


    public function view_order($id)
    {
        $order = order::where('id',$id)->first();
        return view('admin.order.orderView',compact('order'));
    }

    public function order_update(Request $request)
    {
        $order = order::where('id',$request->orderid)->first();
        $order->order_status = $request->status;
        $order->save();

        return back()->with('success','Order Updated');

    }

    public function order_print($id)
    {
        $order = order::where('id',$id)
            ->first();
        return view('admin.order.orderPrint',compact('order'));
    }

    public function delete_order(Request $request)
    {
        $order = order::where('id',$request->delete_order)->first();

        $order_details = order_details::where('order_id',$order->id)->get();

        foreach ($order_details as $order_d){
            order_details::where('id',$order_d->id)->delete();
        }

        $order->delete();

        return back()->with('success','Order Successfully Deleted');



    }




}
