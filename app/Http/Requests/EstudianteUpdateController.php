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
            'discapacidad' => 'boolean',
            'estado' => 'boolean',
            'fk_curso' => 'nullable|numeric',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg',
            'nombre_acu_1' => 'required|string|max:50',
            'direccion_acu_1' => 'required|string|max:255',
            'telefono_acu_1' => 'required|numeric|digits_between:7,10',
            'nombre_acu_2' => 'nullable|string|max:50',
            'direccion_acu_2' => 'nullable|string|max:255',
            'telefono_acu_2' => 'nullable|numeric|digits_between:7,10'
        ];
    }

    // public function messages(){
    //     return [
    //         'required' => 'El :attribute del estudiante es requerido.',
    //         'exists' => 'El valor del :attribute no existe',
    //         'date' => 'El campo debe ser una fecha',
    //         'min' => 'El campo debe tener por lo menos.',
    //         'max' => 'El campo excede su capacidad.',
    //         'string' => 'El campo es texto.',
    //         'numeric' => 'El campo es numerico.',
    //         'foto.image' => 'El fichero debe ser una imagen.',
    //         'mimes' => 'El imgen debe ser alguno de los estos formatos: jpeg, bmp, png, jpg',
    //     ];
    // }
}
