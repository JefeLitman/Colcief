<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller{

    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware('guest')->except('logout'); 
    }

    public function __invoke(){
        return view('auth.login');
    }

    public function authenticate(Request $request){

        switch($request){
            case '1':
                break;
        }
        $credentials = $request->only('codigo', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }

    public function username(){
        return 'codigo';
    }

    public function guard(){
        return Auth::guard('teacher');
    }
}
