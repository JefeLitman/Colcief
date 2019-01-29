<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NivelacionUpdateController extends FormRequest
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
            'fk_empleado' => 'numeric',
            'fecha_presentacion' => 'date',
            'nota' => 'numeric|min:1|max:3',
            'observaciones' => 'string|max:255'
        ];
    }
}
