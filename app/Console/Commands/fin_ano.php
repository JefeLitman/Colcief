<?php

namespace App\Console\Commands;

use App\Division;
use App\Materia;
use App\Periodo;
use App\Fecha;
use Illuminate\Console\Command;

class fin_ano extends Command {

    protected $signature = 'ano:fin';

    protected $description = 'Este servicio realiza todas las acciones necesarias para la finalizacion del año escolar';

    public function __construct(){
        parent::__construct();
        $this->pasado = date('Y') - 1;
    }

    public function handle(){
        $fechas = Fecha::all()->where('ano', $this->pasado);
        foreach($fechas as $fecha){
            $f = new Materia();
            $f -> inicio_escolar = $fecha -> inicio_escolar;
            $f -> fin_escolar = $fecha -> fin_escolar;
            $f -> ano = $this->pasado + 1;
            $f -> save();
        }
        $periodos = Periodo::all()->where('ano', $this->pasado);
        foreach($periodos as $periodo){
            $p = new Materia();
            $p -> fecha_inicio = $periodo -> fecha_inicio;
            $p -> fecha_limite = $periodo -> fecha_limite;
            $p -> ano = $this->pasado + 1;
            $p -> periodo = $periodo -> periodo;
            $p -> save();
        }
        $divisiones = Division::all()->where('ano', $this->pasado);
        foreach($divisiones as $division){
            $d = new Division();
            $d -> nombre = $division -> nombre;
            $d -> descripcion = $division -> descripcion;
            $d -> porcentaje = $division -> porcentaje;
            $d -> ano = $division -> $this->pasado + 1;
            $d -> save();
            $d -> crearNotasDivision();
        }
        $materias = Materia::where('created_at','like','%'.$this->pasado.'%')->get();
        foreach($materias as $materia){
            $m = new Materia();
            $m -> nombre = $materia -> nombre;
            $m -> contenido = $materia -> contenido;
            $m -> logros_custom = $materia -> logros_custom;
            $m -> save();
        }
    }
}
