<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    public function tag()
    {
        $tags = tag::orderBy('id','desc')->get();
        return view('admin.tag.tag',compact('tags'));
    }

    public function tag_save(Request $request)
    {
        $new_tag = new tag();
        $new_tag->tag_name = $request->tag_name;
        $new_tag->save();
        return back()->with('success','Tag Successfully Created');

    }


    public function tag_update(Request $request)
    {
        $tag_up= tag::where('id',$request->tag_edit_id)->first();
        $tag_up->tag_name = $request->tag_name;
        $tag_up->save();
        return back()->with('success','Tag Successfully Updated');
    }

    public function tag_delete(Request $request)
    {
        $tag_del = tag::where('id',$request->tag_delete_id)->first();
        $tag_del->delete();
        return back()->with('success','Tag Successfully Deleted');
    }



}
