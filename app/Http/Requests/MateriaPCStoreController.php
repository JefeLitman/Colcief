<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaPCStoreController extends FormRequest
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
            'fk_materia' => 'required|numeric',
            'fk_empleado' => 'required|numeric',
            'fk_curso' => 'required|numeric',
            'salon' => 'required|string|max:5'
        ];
    }

}
