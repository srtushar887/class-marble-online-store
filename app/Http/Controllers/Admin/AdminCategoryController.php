<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $new_cat->category_name = $request->category_name;
        $new_cat->save();
        return back()->with('success','Category Successfully Created');
    }

    public function category_update(Request $request)
    {
        $cat_up = category::where('id',$request->category_edit_id)->first();
        $cat_up->category_name = $request->category_name;
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
