<?php

namespace App\Console\Commands;

use App\Division;
use App\Estudiante;
use App\Fecha;
use App\Materia;
use App\Periodo;
use Illuminate\Console\Command;

class ano_inicio extends Command
{

    protected $signature = 'ano:inicio';
    protected $description = 'Este servicio realiza todas las acciones necesarias para la finalizacion del año escolar';

    public function __construct()
    {
        parent::__construct();
        $this->pasado = date('Y') - 1;
    }

    public function handle()
    {

        // se asigna las mismas fechas que el año pasado
        $fechas = Fecha::where('ano', $this->pasado)->get();
        foreach ($fechas as $fecha) {
            $f = new Fecha();
            $f->inicio_escolar = ($this->pasado + 1) . substr($fecha->inicio_escolar, -6);
            $f->fin_escolar = ($this->pasado + 1) . substr($fecha->fin_escolar, -6);
            $f->ano = $this->pasado + 1;
            $f->save();
        }

        // se crean los mismos periodos que el año pasado
        $periodos = Periodo::where('ano', $this->pasado)->get();
        foreach ($periodos as $periodo) {
            $p = new Periodo();
            $p->fecha_inicio = ($this->pasado + 1) . substr($periodo->fecha_inicio, -6);
            $p->fecha_limite = ($this->pasado + 1) . substr($periodo->fecha_limite, -6);
            $p->ano = $this->pasado + 1;
            $p->nro_periodo = $periodo->nro_periodo;
            $p->save();
            $p->crearEstructuraDatos();
        }

        // se crean las mismas divisiones que el año pasado
        $divisiones = Division::where('ano', $this->pasado)->get();
        foreach ($divisiones as $division) {
            $d = new Division();
            $d->nombre = $division->nombre;
            $d->descripcion = $division->descripcion;
            $d->porcentaje = $division->porcentaje;
            $d->ano = $this->pasado + 1;
            $d->save();
            $d->crearNotasDivision();
        }

        // se crean las mismas materias que el año pasado
        $materias = Materia::where('created_at', 'like', '%' . $this->pasado . '%')->get();
        foreach ($materias as $materia) {
            $m = new Materia();
            $m->nombre = $materia->nombre;
            $m->contenido = $materia->contenido;
            $m->logros_custom = $materia->logros_custom;
            $m->save();
        }

        //se le asigna a todos los estudiantes el curso en null
        $estudiantes = Estudiante::all();
        foreach ($estudiantes as $estudiante) {
            $estudiante->fk_curso = null;
            $estudiante->save();
        }
    }
}
