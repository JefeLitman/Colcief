<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteStoreController extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'grado' => 'required|numeric|digits_between:0,11',
            'discapacidad' => 'boolean',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg',
            'nombre_acu_1' => 'required|string|max:50',
            'direccion_acu_1' => 'required|string|max:255',
            'telefono_acu_1' => 'required|numeric|digits_between:7,10',
            'nombre_acu_2' => 'string|max:50',
            'direccion_acu_2' => 'string|max:255',
            'telefono_acu_2' => 'numeric|digits_between:7,10'
        ];
    }
}
