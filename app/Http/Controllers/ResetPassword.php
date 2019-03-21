<?php

namespace App\Http\Controllers;
use App\Estudiante;
use App\Empleado;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ResetPassword extends Controller {

    use SendsPasswordResetEmails;

    public function __construct(){
        $this->middleware('guest');
    }

    public function form(){
        return view('pantallas.recuperacion');
    }

    public function recuperacion(Request $request){
        switch($request->role){
            case '4':
                $auth = Estudiante::find($request->email);
                if (!empty($auth)) {
                    return redirect('/') -> with('true', 'Su nueva contraseña es '.$auth -> resetPassword()); 
                } else {
                    return redirect('/') -> with('warning', 'No existe un estudiantes con este codigo, intente nuevamente.');
                }
                break;
            default:
                return redirect('/') -> with('false', 'El tipo de usuario selecionado no existe, intente nuevamente.');
        }
    }
}
