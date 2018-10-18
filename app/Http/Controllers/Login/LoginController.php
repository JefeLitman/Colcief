<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function __invoke(){
        return view('pantallas.login');
    }

    public function authenticate(Request $request){
        switch($request->role){
            case '0':
                return $this->auth('administrador', ["cedula" => $request->username, "password" => $request->password, 'role' => $request->role], '/empleados');
                break;
            case '1':
                return $this->auth('profesor', ["cedula" => $request->username, "password" => $request->password, 'role' => $request->role], '/empleado');
                break;
            case '2':
                $this->auth('profesor', ["cedula" => $request->username, "password" => $request->password, 'role' => $request->role], '/empleado');
                break;
            case '3':
                return $this->auth('estudiante', ["pk_estudiante" => $request->username, "password" => $request->password], '/estudiantes');
                break;
            default:
                return redirect(route("login"));
        } 
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect(route("login"));
    }

    /* Este metodo verifica el login, ademas de esto, crea una variable de session con los datos 
       del usuario autenticado */
    private function auth($guard, $credenciales, $ruta){
        $auth = Auth::guard($guard)->attempt($credenciales);
        if($auth){
            session(['user'=> Auth::guard($guard)->user()->session(),'role' => $guard]);
            return redirect($ruta);
        }
    }
}
