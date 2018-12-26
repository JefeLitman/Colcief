<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'role' => 'required|numeric|digits_between:1,1',
            'username' => 'required|numeric|digits_between:1,20',
            'password' => 'required|string',
        ];
    }
}
