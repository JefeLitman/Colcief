<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function autentication(){
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('init');
        }else{
            return back()
                ->withErrors(['email' => trans('auth.failed')])
                ->withInput(request(['email']));
        }
    }

    public function login(){
        return view('auth.login');
    }
}
