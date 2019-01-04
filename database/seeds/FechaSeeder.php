<?php

use Illuminate\Database\Seeder;
use App\Fecha;

class FechaSeeder extends Seeder{
    public function run(){
        $fecha = new Fecha;
        $fecha -> inicio_escolar = date('Y').'-01-27';
        $fecha -> fin_escolar = date('Y').'-10-25';
        $fecha -> ano = date('Y');
        $fecha -> save();
    }
}
