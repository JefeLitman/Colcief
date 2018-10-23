<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Terminal extends Controller{
    public function link(){
        $salida = shell_exec('cd ColCief && php "/opt/lampp/htdocs/ColCief/artisan" serve --host=localhost --port=80');
        return "<pre>".$salida."</pre>";
    }
}
