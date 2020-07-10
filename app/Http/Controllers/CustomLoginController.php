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
