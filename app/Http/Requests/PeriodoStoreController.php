<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodoStoreController extends FormRequest
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
            'nro_periodo' => 'required|numeric|max:4|unique:periodo',
            'fecha_inicio' => 'required',
            'fecha_fin' = >'required',
            'ano' => 'numeric|required'
        ];
    }
}
