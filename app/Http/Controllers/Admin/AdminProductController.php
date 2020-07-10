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

        if($request->hasFile('image_one')){
            $image = $request->file('image_one');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_one');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_pro->image_one = $imgUrl;
        }

        if($request->hasFile('image_two')){
            $image = $request->file('image_two');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_two');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_pro->image_two = $imgUrl;
        }

        if($request->hasFile('image_three')){
            $image = $request->file('image_three');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_three');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_pro->image_three = $imgUrl;
        }

        if($request->hasFile('image_four')){
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_four');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_pro->image_four = $imgUrl;
        }

        if($request->hasFile('image_five')){
            $image = $request->file('image_five');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_five');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_pro->image_five = $imgUrl;
        }

        $new_pro->product_name = $request->product_name;
        $new_pro->category_id = $request->category_id;
        $new_pro->tag_id = $request->tag_id;
        $new_pro->is_featured = $request->is_featured;
        $new_pro->item_code = $request->item_code;
        $new_pro->size = $request->size;
        $new_pro->material = $request->material;
        $new_pro->finish = $request->finish;
        $new_pro->cbm = $request->cbm;
        $new_pro->assembly = $request->assembly;
        $new_pro->delivery_and_return = $request->delivery_and_return;
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


        if($request->hasFile('image_one')){
            @unlink($product->image_one);
            $image = $request->file('image_one');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_one');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->image_one = $imgUrl;
        }

        if($request->hasFile('image_two')){
            @unlink($product->image_two);
            $image = $request->file('image_two');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_two');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->image_two = $imgUrl;
        }

        if($request->hasFile('image_three')){
            @unlink($product->image_three);
            $image = $request->file('image_three');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_three');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->image_three = $imgUrl;
        }

        if($request->hasFile('image_four')){
            @unlink($product->image_four);
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_four');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->image_four = $imgUrl;
        }

        if($request->hasFile('image_five')){
            @unlink($product->image_five);
            $image = $request->file('image_five');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image_five');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->image_five = $imgUrl;
        }


        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->tag_id = $request->tag_id;
        $product->is_featured = $request->is_featured;
        $product->item_code = $request->item_code;
        $product->size = $request->size;
        $product->material = $request->material;
        $product->finish = $request->finish;
        $product->cbm = $request->cbm;
        $product->assembly = $request->assembly;
        $product->delivery_and_return = $request->delivery_and_return;
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
