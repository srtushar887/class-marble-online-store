<?php

namespace App\Http\Controllers\Admin;

use App\general_setting;
use App\Http\Controllers\Controller;
use App\order;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $total_pro = product::count();
        $total_order = order::count();
        return view('admin.index',compact('total_pro','total_order'));
    }


    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.page.generalSettings',compact('gen'));
    }

    public function general_settings_save(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('logo');
            $directory = 'assets/admin/images/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('icon');
            $directory = 'assets/admin/images/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->icon = $imgUrl;
        }

        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone = $request->site_phone;
        $gen->site_address = $request->site_address;
        $gen->footer_content = $request->footer_content;
        $gen->save();

        return back()->with('success','General Settings Successfully Updated');


    }


}
