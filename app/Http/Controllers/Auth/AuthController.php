<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

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
    protected $auth;
    protected $login;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->auth = $auth;
        $this->login ='unlogin';
    }

    public function index()
    {
        //$status = "unlogin";
        if ($this->auth->check()){
            $status = "logined";
            //return redirect()->back();
            // return view('layouts.login',['loginStauts'=>$status]);
        }
        else{
            $status = "unlogin";
        }
        return view('layouts.login',['loginStauts'=>$status]);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    public function store(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))){
            $this->login = 'logined';
            return redirect()->back()->with(['loginStauts'=>$this->login]);
            //return view('layouts.index',['loginStauts'=>$this->login]);
        }
        else{
            $this->login = 'fail';
            return view('layouts.login',['loginStauts'=>$this->login]);
        }
        
    }
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
