<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $loginPath = 'auth/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['first_name'],
            'lastname' => $data['last_name'],
            'office_address' => $data['office_address'],
            'home_address' => $data['home_address'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'emp_id' => $data['emp_id'],
            'dob' => $data['dob'],
            'doj' => $data['doj'],
            'photo' => $data['profile_photo'],
            'signature' => $data['profile_signature'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('auth/login');
    }

}
