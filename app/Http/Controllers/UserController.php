<?php

namespace App\Http\Controllers;

use App\general_setting;
use App\Mail\DemoEmail;
use App\order;
use App\order_details;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function profile_save(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($user->profile_image);
            $image = $request->file('profile_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('profile_image');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $user->profile_image = $imgUrl;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return back()->with('success','Proile Updated');


    }


    public function checkout()
    {

        return view('user.checkout');
    }


    public function checkout_save(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->address_one = $request->address_one;
        $user->address_two = $request->address_two;
        $user->country = $request->country;
        $user->town = $request->town;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->save();


        $order = new order();
        $order->user_id = Auth::user()->id;
        $order->order_id = Auth::user()->id.rand(000000,999999);
        $order->order_total = $request->total_price;
        $order->order_status = 0;
        $order->save();


        $cards = Cart::content();
        foreach ($cards as $card){
            $order_product = new order_details();
            $order_product->order_id = $order->id;
            $order_product->product_id = $card->id;
            $order_product->product_price = $card->price;
            $order_product->qty = $card->qty;
            $order_product->save();

        }
        Cart::destroy();
        return back()->with('success','order Placed Successfully');



    }



}
