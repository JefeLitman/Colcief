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
            'correo' => 'required|string|max:40',
            'direccion' => 'required|string|max:20',
            'titulo' => 'required|string|max:20',
            'role' => 'required|string|max:1',
            'tiempo_extra' => 'required|numeric',
            'director' => 'required|string|max:20',
            'estado' => 'boolean',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg'
        ];
    }

    public function messages(){
        return [
        ];
    }
}
