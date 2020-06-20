<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Http\Controllers\Controller;
use App\product;
use App\tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminProductController extends Controller
{
    public function product()
    {
        $rpoducts = product::orderBy('id','desc')->get();
        return view('admin.product.product',compact('rpoducts'));
    }

    public function product_create(Request $request)
    {

        $cats = category::all();
        $tags = tag::all();
        return view('admin.product.productCreate',compact('cats','tags'));
    }

    public function product_save(Request $request)
    {
        $new_pro = new product();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_pro->image = $imgUrl;
        }

        $new_pro->product_name = $request->product_name;
        $new_pro->category_id = $request->category_id;
        $new_pro->tag_id = $request->tag_id;
        $new_pro->product_price = $request->product_price;
        $new_pro->sort_des = $request->sort_des;
        $new_pro->long_desc = $request->long_desc;
        $new_pro->save();

        return back()->with('success','Product Successfully Created');



    }


    public function product_edit($id)
    {
        $cats = category::all();
        $tags = tag::all();
        $product = product::where('id',$id)->first();
        return view('admin.product.productEdit',compact('cats','tags','product'));
    }


    public function product_update(Request $request)
    {
        $product = product::where('id',$request->product_edit_id)->first();
        if($request->hasFile('image')){
            @unlink($product->image);
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->image = $imgUrl;
        }

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->tag_id = $request->tag_id;
        $product->product_price = $request->product_price;
        $product->sort_des = $request->sort_des;
        $product->long_desc = $request->long_desc;
        $product->save();

        return back()->with('success','Product Successfully Updated');
    }


    public function product_delete(Request $request)
    {
        $delete_product = product::where('id',$request->product_delete_id)->first();
        @unlink($delete_product->image);
        $delete_product->delete();
        return back()->with('success','Product Successfully Deleted');
    }



}
