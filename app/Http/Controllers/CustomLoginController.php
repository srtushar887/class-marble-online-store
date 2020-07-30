<?php

namespace App\Http\Controllers;

use App\general_setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    public function register(Request $request)
    {

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email',
            'phone.required' => 'Please Enter Phone Number',
            'company_name.required' => 'Please Enter Company Name',
        ]);


        $new_acc = new User();
        $new_acc->name = $request->name;
        $new_acc->email = $request->email;
        $new_acc->phone = $request->phone;
        $new_acc->company_name = $request->company_name;
        $new_acc->skype_id = $request->skype_id;
        $new_acc->whatapp_ap = $request->whatapp_ap;
        $new_acc->password = Hash::make($request->password);
        $new_acc->account_status = 1;
        $new_acc->exp_date = Carbon::now()->addDay(1);
        $new_acc->save();


        $form = $new_acc->email;
        $gen = general_setting::first();
        $to = "customer@laxmiexport.com";
        $subject = "New User Registration";
        $message = "
New user have registered. User details under bellow :

Name : {$new_acc->name}.
email : {$new_acc->email}.
";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: Do not reply <>' . "\r\n";
        $headers .= "X-Sender: testsite < customer@laxmiexport.com >\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!

        mail($to, $subject, $message);



        return redirect(route('front'))->with('success','Account Successfully Created. Admin will review and approved your account');

    }
}
