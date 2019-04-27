<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\MateriaPC;
use App\Estudiante;
use App\MateriaBoletin;
use App\Periodo;
use App\Estudiante as Est;

class ConcentradorController extends Controller
{
    public function mostrarEstudiantes($pk_materia_pc)
    {
        $profesor = Empleado::find(session('user')['cedula']);
        $materiaPC = MateriaPC::findOrFail($pk_materia_pc); //Si la materia no existe manda 404
        //Solo entra al if si no es admin y además no le pertenece la materia
        if(!($profesor->cedula==$materiaPC->fk_empleado || $profesor->role=='0')){
          return back();
        }
        $periodos=Periodo::where('ano',date('Y'))->get();
        $estudiantes=MateriaBoletin::where('materia_boletin.fk_materia_pc',$pk_materia_pc)->
        join('boletin','boletin.pk_boletin','materia_boletin.fk_boletin')->
        join('estudiante','estudiante.pk_estudiante','boletin.fk_estudiante')->
        groupBy('estudiante.apellido')->get();
        //INICIO DE LO CHUNGO: NOTAS
        $notasEstudiantes = [];
        foreach ($estudiantes as $estudiante) {
          $notasEstudiantes[$estudiante->pk_estudiante]=[$estudiante->notasPeriodo()->get()];
        }
        //dd($notasEstudiantes);
        return view ('concentrador.listadoEstudiantes',[
          'materia' => $materiaPC,
          'periodos' => $periodos,
          'estudiantes' => $estudiantes,
          'notas' => $notasEstudiantes,
          ]);
    }

    public function mostrarEstudiante(MateriaPC $materia_pc, $pk_estudiante)
    {
        if(!Est::findOrFail($pk_estudiante)->switch_concentrador){
          return back();
        }
        $estudiante=MateriaBoletin::where('materia_boletin.fk_materia_pc',$materia_pc->pk_materia_pc)->
        where('estudiante.pk_estudiante',$pk_estudiante)->
        join('boletin','boletin.pk_boletin','materia_boletin.fk_boletin')->
        join('estudiante','estudiante.pk_estudiante','boletin.fk_estudiante')->
        groupBy('estudiante.apellido')->get()->first();
        $periodos=Periodo::where('ano',date('Y'))->get();
        //dd($estudiante->notasPeriodo()->get());
        return view('concentrador.verEstudiante',[
          'estudiante' => $estudiante,
          'notas' => $estudiante->notasPeriodo()->get(),
          'periodos' => $periodos,
          'materia' => $materia_pc
        ]);
    }
}
