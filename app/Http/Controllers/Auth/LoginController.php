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

        switch (request()->input('role')) {
            case 'student':
                if(Auth::guard('student')->attempt($credentials, request(['remember']))){
                    return redirect()->route('init');
                }else{
                    return back()
                        ->withErrors(['email' => trans('auth.failed')])
                        ->withInput(request(['email']))
                        ->withInput(request(['role']));
                }
                break;

            case 'employee':
                if(Auth::guard('employee')->attempt($credentials)){
                    return redirect()->route('init');
                }else{
                    return back()
                        ->withErrors(['email' => trans('auth.failed')])
                        ->withInput(request(['email']))
                        ->withInput(request(['role']));
                }
                break;
            
            case 'admin':
                if(Auth::guard('employee')->attempt($credentials)){
                    return redirect()->route('init');
                }else{
                    return back()
                        ->withErrors(['email' => trans('auth.failed')])
                        ->withInput(request(['email']))
                        ->withInput(request(['role']));
                }
                break;

            default:
                return back()
                        ->withErrors(['email' => 'Error, intente mas tarde' ])
                        ->withInput(request(['email']))
                        ->withInput(request(['role']));
                break;
        }
        
    }

    public function login(){
        return view('auth.login');
    }
}
