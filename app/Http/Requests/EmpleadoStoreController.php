<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoStoreController extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'cedula' => 'required|numeric|unique:empleado',
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'correo' => 'required|email|max:50',
            'direccion' => 'required|string|max:20',
            'titulo' => 'required|string|max:20',
            'role' => 'required|string|max:1',
            'director' => 'string|max:20',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg'
        ];
    }

    // public function message(){
    //     return [
    //         'role' => 'El role no corresponde a los establecidos, intente nuevamente'
    //     ];
    // }
}
