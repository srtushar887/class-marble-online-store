<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            $user->account_status = $request->status;
            $user->exp_date = Carbon::now()->addHour(1);
            $user->save();
            return back()->with('success','User Account Successfuly Activate');
        }else{
            $user = User::where('id',$request->user_id)->first();
            $user->account_status = $request->status;
            $user->save();
            return back()->with('success','User Account Successfuly Disable');
        }


    }

    public function user_export()
    {
        return Excel::download(new UsersExport(),'Users.xls');
    }


}
