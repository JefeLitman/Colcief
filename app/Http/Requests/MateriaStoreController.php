<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaStoreController extends FormRequest
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
            'nombre' => 'required|string|max:20',
            'contenido' => 'required|string|max:255',
            'logros_custom' => 'string|max:255'
        ];
    }

}