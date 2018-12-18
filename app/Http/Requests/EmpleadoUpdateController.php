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
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'correo' => 'required|email|max:50',
            'direccion' => 'required|string|max:255',
            'titulo' => 'required|string|max:50',
            'role' => 'required|string|max:1',
            'fk_curso' => 'numeric',
            'estado' => 'boolean',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg'
        ];
    }
}
