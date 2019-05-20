<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteUpdateController extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|String|max:1',
            'discapacidad' => 'boolean',
            'estado' => 'boolean',
            'fk_curso' => 'nullable|numeric',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg',
            'nombre_acu_1' => 'nullable|string|max:50',
            'direccion_acu_1' => 'nullable|string|max:255',
            'telefono_acu_1' => 'nullable|numeric|digits_between:7,10',
            'nombre_acu_2' => 'nullable|string|max:50',
            'direccion_acu_2' => 'nullable|string|max:255',
            'telefono_acu_2' => 'nullable|numeric|digits_between:7,10'
        ];
    }
}
