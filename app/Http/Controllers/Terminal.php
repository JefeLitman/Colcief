<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Terminal extends Controller{
    public function link(){
        $salida = shell_exec('cd ColCief && php artisan storage:link');
        return "<pre>".$salida."</pre>";
    }

    public function migrateAndSeeders(){
        $salida = shell_exec('cd ColCief && php artisan migrate --seed');
        return "<pre>".$salida."</pre>";
    }

    public function migrate(){
        $salida = shell_exec('cd ColCief && php artisan migrate');
        return "<pre>".$salida."</pre>";
    }

    public function seed(){
        $salida = shell_exec('cd ColCief && php artisan db:seed');
        return "<pre>".$salida."</pre>";
    }
}
