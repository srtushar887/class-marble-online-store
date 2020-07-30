<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\general_setting;
use App\Http\Controllers\Controller;
use App\order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminUserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id','desc')->get();
        return view('admin.user.userList',compact('users'));
    }

    public function users_update(Request $request)
    {

        if ($request->status == 2){
            $user = User::where('id',$request->user_id)->first();
            $user->name = $request->name;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->whatapp_ap = $request->whatapp_ap;
            $user->skype_id = $request->skype_id;
            if ($request->password != ""){
                $user->password = Hash::make($request->password);
            }
            $user->account_status = $request->status;
            $user->exp_date = Carbon::now()->addDay(1);
            $user->save();

            $form = "customer@laxmiexport.com";
            $gen = general_setting::first();
            $to = $user->email;
            $subject = "Account Approved";
            $message = "
Your Account Has Been Approved . Please login :
";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: Do not reply <>' . "\r\n";
            $headers .= "X-Sender: testsite < customer@laxmiexport.com >\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            $headers .= "X-Priority: 1\n"; // Urgent message!

            mail($to, $subject, $message);

            return back()->with('success','User Account Successfuly Activate');
        }else{
            $user = User::where('id',$request->user_id)->first();
            $user->name = $request->name;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->whatapp_ap = $request->whatapp_ap;
            $user->skype_id = $request->skype_id;
            if ($request->password != ""){
                $user->password = Hash::make($request->password);
            }
            $user->account_status = $request->status;
            $user->save();
            return back()->with('success','User Account Successfuly Disable');
        }


    }

    public function user_export()
    {
        return Excel::download(new UsersExport(),'Users.xls');
    }

    public function users_delete(Request $request)
    {
        $user = User::where('id',$request->user_delete_id)->first();
        $order = order::where('user_id',$user->id)->get();
        foreach ($order as $or)
        {
            $order = order::where('id',$or->id)->delete();
        }

        $user->delete();

        return back()->with('success','User Account Successfuly Deleted');


    }



}
