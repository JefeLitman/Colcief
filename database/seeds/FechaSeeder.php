<?php

use Illuminate\Database\Seeder;
use App\Fecha;

class FechaSeeder extends Seeder{
    public function run(){
        $fecha = new Fecha;
        $fecha -> inicio_escolar = date('Y').'-01-01';
        $fecha -> fin_escolar = date('Y').'2019-11-15';
        $fecha -> ano = date('Y');
        $fecha -> save();
    }
}
