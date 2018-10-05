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
                $auth = Auth::guard("admin")->attempt(["cedula" => $request->username, "password" => $request->password]);
                if($auth){
                    return redirect("/divisiones");
                }
                break;
            case '1':
                $auth = Auth::guard("profesor")->attempt(["cedula" => $request->username, "password" => $request->password]);
                if($auth){
                    return redirect("/empleado");
                }
                break;
            case '2':
                $auth = Auth::guard("estudiante")->attempt(["pk_estudiante" => $request->username, "password" => $request->password]);
                if($auth){
                    return redirect("/estudiantes");
                }
                break;
        } 
    }
}
