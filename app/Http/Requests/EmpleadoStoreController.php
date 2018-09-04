<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoStoreController extends FormRequest
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
            'pk_empleado' => 'required|numeric|unique:empleado',
            'cedula' => 'required|numeric|unique:empleado',
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'correo' => 'required|string|max:20',
            'clave' => 'required|string|max:40',
            'direccion' => 'required|string|max:20',
            'titulo' => 'required|string|max:20',
            'rol' => 'required|string|max:1',
            'tiempo_extra' => 'required|numeric',
            'director' => 'required|string|max:20',
            'estado' => 'boolean',
            'foto' => 'image|mimes:jpeg,bmp,png,jpg'
        ];
    }
}
