<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminCategoryController extends Controller
{
    public function category()
    {
        $cats = category::orderBy('id','desc')->get();
        return view('admin.category.category',compact('cats'));
    }

    public function category_save(Request $request)
    {
        $new_cat = new category();
        if($request->hasFile('cat_image')){
//            @unlink($home->back_image);
            $image = $request->file('category');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('cat_image');
            $directory = 'assets/admin/images/category/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_cat->cat_image = $imgUrl;
        }
        $new_cat->category_name = $request->category_name;
        $new_cat->is_featured = $request->is_featured;
        $new_cat->save();
        return back()->with('success','Category Successfully Created');
    }

    public function category_update(Request $request)
    {
        $cat_up = category::where('id',$request->category_edit_id)->first();
        if($request->hasFile('cat_image')){
            @unlink($cat_up->cat_image);
            $image = $request->file('cat_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('cat_image');
            $directory = 'assets/admin/images/category/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $cat_up->cat_image = $imgUrl;
        }
        $cat_up->category_name = $request->category_name;
        $cat_up->is_featured = $request->is_featured;
        $cat_up->save();
        return back()->with('success','Category Successfully Updated');
    }

    public function category_delete(Request $request)
    {
        $del_cat = category::where('id',$request->category_delete_id)->first();
        $del_cat->delete();
        return back()->with('success','Category Successfully Deleted');
    }



}
