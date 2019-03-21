<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'role' => 'required|numeric|digits_between:1,1|min:0|max:4',
            'username' => 'required|numeric|digits_between:1,20',
            'password' => 'required|string',
        ];
    }

    public function messages(){
        return [
            'role.required' => 'Debe seleccionar un usuario.',
            'username.required' => 'Debe ingresar su cédula o código.',
            'password.required' => 'Debe ingresar su contraseña',
            'max' => 'El campo excede su capacidad.',
            'string' => 'El campo es texto.',
            'numeric' => 'El campo es numerico.',
        ];
    }
}
