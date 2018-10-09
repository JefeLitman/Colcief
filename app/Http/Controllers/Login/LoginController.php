<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Empleado;
use App\Estudiante;

class LoginController extends Controller{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function __invoke(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        switch($request->role){
            case '0':
                $admin = Auth::guard("admin")->attempt(["cedula" => $request->username, "password" => $request->password]);
                if($admin){
                    return redirect("/divisiones");
                }
                break;
            case '1':
                $profesor = Auth::guard("profesor")->attempt(["cedula" => $request->username, "password" => $request->password]);
                if($profesor){
                    return redirect("/empleado");
                }
                break;
            case '2':
                $estudiante = Auth::guard("estudiante")->attempt(["pk_estudiante" => $request->username, "password" => $request->password]);
                if($estudiante){
                    return redirect("/estudiantes");
                }
                break;
        } 
    }

    public function logout(){
        Auth::logout();
        return redirect(route("login"));
    }
}
