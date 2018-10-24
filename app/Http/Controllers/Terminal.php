<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Terminal extends Controller{
    public function link(){
        $salida = shell_exec('cd ColCief && php artisan serve --host=localhost --port=80');
        return "<pre>".$salida."</pre>";
    }
}
