<?php

namespace App\Console\Commands;

use App\Division;
use App\Materia;
use Illuminate\Console\Command;

class fin_escolar extends Command {

    protected $signature = 'escolar:fin';

    protected $description = 'Este servicio realiza todas las acciones necesarias para la finalizacion del año escolar';

    public function __construct(){
        parent::__construct();
        $this->ano = date('Y');
        $this->date = date('Y-m-d');
    }

    public function handle(){
        $divisiones = Division::all()->where('ano', $this->ano);
        foreach($divisiones as $division){
            $d = new Division();
            $d -> nombre = $division -> nombre;
            $d -> descripcion = $division -> descripcion;
            $d -> porcentaje = $division -> porcentaje;
            $d -> ano = $division -> ano + 1;
            $d -> save();
        }
        $materias = Materia::where('created_at','like','%'.$this->ano.'%')->get();
        foreach($materias as $materia){
            $m = new Materia();
            $m -> nombre = $materia -> nombre;
            $m -> contenido = $materia -> contenido;
            $m -> logros_custom = $materia -> logros_custom;
            $m -> save();
        }
    }
}
