<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchivoStoreController extends FormRequest
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
            'titulo' => 'required|string|max:50',
            'descripcion' => 'required|string',
            'archivo' => 'mimes:docx,odt,doc,xlsx,ptt,pttx,pdf,txt,bmp,png,jpg,jpeg'
        ];
    }
}