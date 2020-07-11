<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    public function register(Request $request)
    {

        $this->validate($request,[
            'user_name' => ['required', 'string', 'max:255','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'skype_id' => ['required', 'string'],
            'whatapp_ap' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'user_name.required' => 'Please Enter Your Username',
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email',
            'phone.required' => 'Please Enter Phone Number',
            'company_name.required' => 'Please Enter Company Name',
            'skype_id.required' => 'Please Enter Skype ID',
            'whatapp_ap.required' => 'Please Enter Whatsapp Number',
        ]);


        $new_acc = new User();
        $new_acc->user_name = $request->user_name;
        $new_acc->name = $request->name;
        $new_acc->email = $request->email;
        $new_acc->phone = $request->phone;
        $new_acc->company_name = $request->company_name;
        $new_acc->skype_id = $request->skype_id;
        $new_acc->whatapp_ap = $request->whatapp_ap;
        $new_acc->password = Hash::make($request->password);
        $new_acc->account_status = 1;
        $new_acc->exp_date = Carbon::now()->addSecond(1);
        $new_acc->save();

        return redirect(route('front'))->with('success','Account Successfully Created. Admin will review and approved your account');

    }
}
