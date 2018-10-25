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
            'nombre' => 'required|string|max:20',
            'contenido' => 'required|string|max:255',
            'logros_custom' => 'string|max:255'
        ];
    }
}
