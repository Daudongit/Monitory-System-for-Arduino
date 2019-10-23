<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('guest')->except('logout');
    }


    public function usernameField(){
        return strpos(request('email'), '@') === false?
            'username':'email';
    }

    protected function redirectTo(){
        $username = auth()->user()->username;
        return $username == 'status'?'/status':
            ($username == 'map'?'/map':'/home');  
    }

    protected function credentials(Request $request)
    {           
        $username = $this->usernameField();

        $credentials = [
            $username => $request->email,
            'password'=> $request->password
        ];

        return $credentials;
    }
}
