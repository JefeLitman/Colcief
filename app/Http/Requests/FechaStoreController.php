<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FechaStoreController extends FormRequest {

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'inicio_escolar' => 'required|date',
            'fin_escolar' => 'required|date|after:inicio_escolar',
        ];
    }
}
