<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Empleado;
use App\Estudiante;

class LoginController extends Controller{

    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware('guest')->except('logout'); 
    }

    public function __invoke(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        switch($request->role){
            case '0':
                $auth = Empleado::where('pk_estudiante', $request->username)
                    ->where('clave',$request->password)
                    ->where('role', '0')
                    ->first();
                break;
            case '1':
                $auth = Empleado::where('pk_estudiante', $request->username)
                    ->where('clave',$request->password)
                    ->where('role', '1')
                    ->first();
                break;
            case '2':
                $auth = Estudiante::where('pk_estudiante', $request->username)
                    ->where('clave',$request->password)
                    ->first();
                if ($auth) {
                    dd(Auth::login($auth));        
                }
                break;
        } 
        // dd(Auth::check());
    }
}
