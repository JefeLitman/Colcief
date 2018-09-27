<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller{

    use AuthenticatesUsers;
    //Aqui no debera redirigir a home sino a la pagina de cada usuario (estudiante,empleado={profesor o admin})
    protected $redirectTo = '/home';

    public function __construct(Request $request){
        $this->middleware('guest')->except('logout'); 
    }

    // protected function guard(){
    //     if($request->input('role') == "1"){
    //         return Auth::guard('estudiante');
    //     }else{
    //         return Auth::guard('profesor');
    //     }
    //}

    // public function username(){
    //     return 'username';
    // }
}
