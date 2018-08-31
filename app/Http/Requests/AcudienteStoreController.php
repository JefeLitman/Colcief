<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcudienteStoreController extends FormRequest
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
            'pk_acudiente' => 'required|numeric|unique:acudiente',
            'nombre_acu_1' => 'required|string|max:20',
            'direccion_acu_1' => 'required|string|max:30',
            'telefono_acu_1' => 'required|numeric|max:10',
            'nombre_acu_2' => 'string|max:20',
            'direccion_acu_2' => 'string|max:30',
            'telefono_acu_2' => 'numeric|max:10'
        ];
    }
    public function messages(){
      return [
        'pk_acudiente.required' => 'campo 1',
        'nombre_acu_1.required' => 'campo2',
        'direccion_acu_1.required' => 'campo 3',
        'telefono_acu_1.required' => 'campo 4'
      ];
    }
}
