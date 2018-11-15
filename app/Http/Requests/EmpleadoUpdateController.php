<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoUpdateController extends FormRequest
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
    public function rules(){
        return [
            'cedula' => 'required|numeric',
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'correo' => 'required|email|max:40',
            'direccion' => 'required|string|max:20',
            'titulo' => 'required|string|max:20',
            'role' => 'required|string|max:1',
            'director' => 'string|max:255',
            'estado' => 'boolean',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg'
        ];
    }
}
