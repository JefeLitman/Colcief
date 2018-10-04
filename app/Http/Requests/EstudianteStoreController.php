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
            'grado' => 'required|numeric|max:11|min:1',
            'discapacidad' => 'boolean',
            'estado' => 'boolean',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg',
            'nombre_acu_1' => 'required|string|max:20',
            'direccion_acu_1' => 'required|string|max:30',
            'telefono_acu_1' => 'required|numeric|digits_between:7,10',
            'nombre_acu_2' => 'string|max:20',
            'direccion_acu_2' => 'string|max:30',
            'telefono_acu_2' => 'numeric|digits_between:7,10'
        ];
    }
}
