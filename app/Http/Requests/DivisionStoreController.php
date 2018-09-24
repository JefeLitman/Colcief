<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisionStoreController extends FormRequest
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
            'nombre.*' => 'required|string|max:20',
            'descripcion.*' => 'string|max:255',
            'porcentaje.*' => 'required|numeric',
        ];
    }

    // public function messages(){
    //     return [
    //         'required' => 'El :attribute es necesario en la division.',
    //         'max' => 'El campo excede su capacidad.',
    //         'string' => 'El campo es texto.',
    //         'numeric' => 'El campo es numerico.',
    //     ];
    // }
}
