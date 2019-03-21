<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoUpdateFoto extends FormRequest {

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'foto' => 'image|mimes:jpeg,bmp,png,jpg'
        ];
    }
}
