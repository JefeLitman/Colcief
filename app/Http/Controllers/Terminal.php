<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Terminal extends Controller{

    public function version(){
        $salida = shell_exec('cd ColCief && composer --version');
        return "<pre>".$salida."</pre>";
    } 

    public function pdf(){
        $salida = shell_exec('cd ColCief && composer require barryvdh/laravel-dompdf');
        return "<pre>".$salida."</pre>";
    }
    public function update(){
        $salida = shell_exec('cd ColCief && composer update');
        return "<pre>".$salida."</pre>";
    }
    
    public function cache(){
        $salida = shell_exec('cd ColCief && php artisan cache:clear');
        return "<pre>".$salida."</pre>";
    }

    public function link(){
        $salida = shell_exec('cd ColCief && php artisan storage:link');
        return "<pre>".$salida."</pre>";
    }

    public function migrateAndSeeders(){
        $salida = shell_exec('cd ColCief && php artisan migrate --seed');
        return "<pre>".$salida."</pre>";
    }

    public function migrate(){
        $salida = shell_exec('cd ColCief && php migrate');
        return "<pre>".$salida."</pre>";
    }

    public function migrateReset(){
        $salida = shell_exec('cd ColCief && php artisan migrate:reset');
        return "<pre>".$salida."</pre>";
    }

    public function migrateRefresh(){
        $salida = shell_exec('cd ColCief && php artisan migrate:refresh');
        return "<pre>".$salida."</pre>";
    }

    public function seed(){
        $salida = shell_exec('cd ColCief && php artisan db:seed');
        return "<pre>".$salida."</pre>";
    }

    public function migrateResetSeeder(){
        $salida = shell_exec('cd ColCief && php artisan migrate:reset && php artisan migrate --seed');
        return "<pre>".$salida."</pre>";
    }

    public function autoload(){
        $salida = shell_exec('cd ColCief && composer dump-autoload');
        return "<pre>".$salida."</pre>";
    }

    public function pull(){
        $salida = shell_exec('cd /home/colcief/public_html/ColCief && /bin/git pull');
        return "<pre>".$salida."</pre>";
    }
}
