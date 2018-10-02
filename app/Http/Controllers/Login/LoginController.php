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

    public function authenticate(){

    }

    public function username(){
        return 'codigo';
    }

    public function guard(){
        return Auth::guard('teacher');
    }
}
