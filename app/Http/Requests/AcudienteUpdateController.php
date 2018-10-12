<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\SupraController as SC;
use App\Acudiente;
class AcudienteUpdateController extends FormRequest
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
      $pk_futura = $this->input('pk_acudiente');
      $pk_original = $this->route('acudiente');
      if (!SC::comprobarRepeticion($pk_futura,$pk_original,'pk_acudiente',Acudiente::class)) {
        return [
          'pk_acudiente' => 'unique:acudiente'
        ];
      }
      return [
          'pk_acudiente' => 'required|numeric|digits_between:5,10',
          'nombre_acu_1' => 'required|string|max:20',
          'direccion_acu_1' => 'required|string|max:30',
          'telefono_acu_1' => 'required|numeric|digits_between:7,10',
          'nombre_acu_2' => 'string|max:20',
          'direccion_acu_2' => 'string|max:30',
          'telefono_acu_2' => 'numeric|digits_between:7,10'
      ];
    }
}
