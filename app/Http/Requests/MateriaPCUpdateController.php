<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaPCUpdateController extends FormRequest
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
        //   Aun no se ha ajustado para el controlador de MateriaPC
            'fk_materia' => 'required|numeric',
            'fk_empleado' => 'required|numeric',
            'fk_curso' => 'required|numeric',
            'salon' => 'required|string|max:5',
            'logros_custom' => 'required|string|max:255'
        ];
    }
}
