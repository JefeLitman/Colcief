<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Terminal extends Controller{
    public function link(){
        $salida = shell_exec('cd ColCief && php artisan storage:link');
        return "<pre>".$salida."</pre>";
    }
}
