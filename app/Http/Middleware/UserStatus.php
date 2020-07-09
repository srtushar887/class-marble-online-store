<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserStatus
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
            if (Auth::user()->account_status == 2){
                return $next($request);
            }else{
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('dis_msg','Sorry! Your Account Has Been Disabled');
            }
        }



    }
}
