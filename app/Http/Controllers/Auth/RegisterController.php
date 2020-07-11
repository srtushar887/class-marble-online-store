<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_name' => $data['user_name'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            'skype_id' => $data['skype_id'],
            'whatapp_ap' => $data['whatapp_ap'],
            'password' => Hash::make($data['password']),
            'exp_date' => Carbon::now()->addHour(1),
            'account_status' => 1,
        ]);
    }
}
