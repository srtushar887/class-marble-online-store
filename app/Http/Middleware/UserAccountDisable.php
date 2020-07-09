<?php

namespace App\Http\Middleware;

use App\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserAccountDisable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){
            $time = Carbon::now();
            if ($time > Auth::user()->exp_date){
                $user = User::where('id',Auth::user()->id)->first();
                $user->account_status = 1;
                $user->save();
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('dis_msg','Sorry! Your Account Has Been Disabled');
            }else{
                return $next($request);
            }
        }
    }
}
