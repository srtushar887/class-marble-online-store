<?php

namespace App\Http\Controllers;

use App\order;
use App\order_details;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $time = Carbon::now();
        if ($time > $user->exp_date){
//            Auth::guard('web')->logout();
//            $user->account_status = 1;
//            $user->save();
//            return redirect(route('login'))->with('delete_message','Sorry! Your Account Was Disable');
        }

        return view('user.index');
    }
}
