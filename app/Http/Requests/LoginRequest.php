<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'role' => 'required|numeric|max:1',
            'username' => 'required|numeric|max:20',
            'password' => 'required|string',
        ];
    }
}
