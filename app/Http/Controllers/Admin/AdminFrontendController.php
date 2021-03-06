<?php

namespace App\Http\Controllers\Admin;

use App\all_static_data;
use App\faq;
use App\home_partner;
use App\Http\Controllers\Controller;
use App\newslatter;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminFrontendController extends Controller
{
    public function home_slider()
    {
        $home =all_static_data::first();
        return view('admin.frontend.slider',compact('home'));
    }

    public function home_slider_save(Request $request)
    {
        $home = all_static_data::first();

        if($request->hasFile('back_image')){
            @unlink($home->back_image);
            $image = $request->file('back_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('back_image');
            $directory = 'assets/admin/images/static/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $home->back_image = $imgUrl;
        }

        if($request->hasFile('y_image_1')){
            @unlink($home->y_image_1);
            $image = $request->file('y_image_1');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('y_image_1');
            $directory = 'assets/admin/images/static/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $home->y_image_1 = $imgUrl;
        }

        if($request->hasFile('y_image_2')){
            @unlink($home->y_image_2);
            $image = $request->file('y_image_2');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('y_image_2');
            $directory = 'assets/admin/images/static/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $home->y_image_2 = $imgUrl;
        }

        $home->title = $request->title;
        $home->sub_title = $request->sub_title;
        $home->video_one_link = $request->video_one_link;
        $home->video_two_link = $request->video_two_link;
        $home->save();
        return back()->with('success','Home Header Successfully Updated');



    }


    public function home_partner()
    {
        $partners =home_partner::all();
        return view('admin.frontend.partner',compact('partners'));
    }

    public function home_partner_create(Request $request)
    {
        $partner = new home_partner();
        if($request->hasFile('image')){
//            @unlink($home->back_image);
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/static/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $partner->image = $imgUrl;
        }

        $partner->save();

        return back()->with('success','Home Partner Successfully Created');


    }


    public function home_partner_update(Request $request)
    {
        $partner_edit = home_partner::where('id',$request->partner_edit_id)->first();
        if($request->hasFile('image')){
            @unlink($partner_edit->image);
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/static/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $partner_edit->image = $imgUrl;
        }

        $partner_edit->save();

        return back()->with('success','Home Partner Successfully Updated');
    }

    public function home_partner_delete(Request $request)
    {
        $partner_delete = home_partner::where('id',$request->partner_delete_id)->first();
        @unlink($partner_delete->image);
        $partner_delete->delete();
        return back()->with('success','Home Partner Successfully Deleted');
    }

    public function newslatter_emails()
    {
        $emails = newslatter::orderBy('id','desc')->get();
        return view('admin.frontend.newsLatterEmail',compact('emails'));
    }


    public function about_us()
    {
        $about = all_static_data::first();
        return view('admin.frontend.aboutUs',compact('about'));
    }

    public function about_us_save(Request $request)
    {
        $about = all_static_data::first();
        if($request->hasFile('about_us_image')){
            @unlink($about->about_us_image);
            $image = $request->file('about_us_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('about_us_image');
            $directory = 'assets/admin/images/static/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $about->about_us_image = $imgUrl;
        }

        $about->about_first_title = $request->about_first_title;
        $about->about_first_left = $request->about_first_left;
        $about->about_first_right = $request->about_first_right;
        $about->about_after_image = $request->about_after_image;
        $about->about_beside_image = $request->about_beside_image;
        $about->save();
        return back()->with('success','About Us Updated');

    }

    public function contact_us()
    {
        $about = all_static_data::first();
        return view('admin.frontend.contactUs',compact('about'));
    }


    public function contact_us_save(Request $request)
    {
        $about = all_static_data::first();
        $about->contact_us_content = $request->contact_us_content;
        $about->save();
        return back()->with('success','About Us Updated');
    }

    public function faq()
    {
        $all_faq = faq::orderBy('id','desc')->paginate(15);
        return view('admin.frontend.faq',compact('all_faq'));
    }

    public function faq_craete(Request $request)
    {
        $new_faq = new faq();
        $new_faq->question = $request->question;
        $new_faq->answer = $request->answer;
        $new_faq->save();

        return back()->with('success','Faq Created');

    }


    public function faq_update(Request $request)
    {
        $faq = faq::where('id',$request->edit_faq)->first();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return back()->with('success','Faq Updated');
    }

    public function faq_delete(Request $request)
    {
        $faq = faq::where('id',$request->delete_faq)->first();
        $faq->delete();
        return back()->with('success','Faq Deleted');
    }












}
