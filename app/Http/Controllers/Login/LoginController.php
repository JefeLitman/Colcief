<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('admin')->only('logout') ;
    }
    
    public function __invoke(){
        return view('pantallas.login');
    }

    public function authenticate(LoginRequest $request){
        switch($request->role){
            case '0':
                $guardia = 'administrador';
                break;
            case '1':
                $guardia = 'coordinador';
                break;
            case '2':
                $guardia = 'director';
                break;
            case '3':
                $guardia = 'profesor';
                break;
            case '4':
                return $this->auth('estudiante', ['pk_estudiante' => $request->username, 'password' => $request->password], '/estudiantes/principal');
                break;
            default:
                return redirect(route("/"));
        }
        return $this->auth($guardia, ['cedula' => $request->username, 'password' => $request->password, 'role' => $request->role], '/empleados/principal/'.$request->role);
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect(url("/"));
    }

    /* Este metodo verifica el login, ademas de esto, crea una variable de session con los datos
       del usuario autenticado */
    private function auth($guard, $credenciales, $ruta){
        $auth = Auth::guard($guard)->attempt($credenciales);
        if($auth){
            session(['user'=> Auth::guard($guard)->user()->session(),'role' => $guard]);
            return redirect($ruta);
        }else{
            return redirect('/')->withInput()->with('false', 'Las credenciales no son correctas');
        }
    }
}
