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
          'nro_periodo' => 'required|numeric|max:4|min:1|unique:periodo',
          'fecha_inicio' => 'required|date',
          'fecha_limite' => 'required|date|after:fecha_inicio',
          'ano' => 'numeric|required|min:2017|max:2100'
        ];
    }
    public function messages(){
      return [
        'ano.min' => 'El año no puede ser inferior al año 2017',
        'ano.max' => 'El año no puede ser mayor al año 2100',
        'ano.required' => 'Es obligatorio especificar el año',
        'ano.numeric' => 'El año es un número...'
      ];
    }
}
