<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaStoreController extends FormRequest
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
            'fk_division' => 'required|numeric|digits_between:1,10|exists:division,pk_division',
            'fk_materia_pc' => 'required|numeric|digits_between:1,10|exists:materia_pc,pk_materia_pc',
            'nombre' => 'required|string|max:20',
            'descripcion' => 'required|string|max:255',
            'porcentaje' => 'required|numeric|min:1|max:100'
        ];
    }
}
