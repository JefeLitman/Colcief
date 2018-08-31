<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteStoreController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pk_estudiante' => 'required|numeric|unique:estudiante',
            'fk_acudiente' => 'required|numeric|exists:acudiente,pk_acudiente',
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'clave' => 'required|string|max:40',
            'fecha_nacimiento' => 'required|date',
            'grado' => 'required|numeric|max:11|min:1',
            'discapacidad' => 'boolean',
            'estado' => 'boolean',
            'foto' => 'image|required|mimes:jpeg,bmp,png,jpg'
        ];
    }
}
