<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;
use App\Estudiante;
use App\Boletin;
use App\NotaPeriodo;

class SIGCAController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:administrador,coordinador');
    }

    public function index($pk_curso = null)
    {
        return view('SIGCA.SIGCA',[
          'cursos' => $this->obtenerCursos(),
          'planilla' => 'Por favor, seleccione un curso.'
        ]);
    }

    public function show($pk_curso)
    {
        $curso = Curso::find($pk_curso);
        $planilla = 'El curso seleccionado no existe.';
        if (!empty($curso)) {
          $planilla = $this->generarDatos($curso);
        }
        //dd($planilla);
        return view('SIGCA.SIGCA',[
          'cursos' => $this->obtenerCursos(),
          'planilla' => $planilla,
          'cursoActual' => $curso
        ]);
    }

    public function finalizar($fk_boletin,$estado)
    {
        $boletin = Boletin::find($fk_boletin);
        if (empty($boletin)) {
          return '¿Qué estás intentando?';
        }
        switch ($estado) {
          case 'a':
            $boletin->estado = 'a';
            break;
          case 'p':
            $boletin->estado = 'p';
            break;
          case 'i':
            $boletin->estado = 'i';
            break;
        }
        $boletin->save();
        return back();
    }

    private function obtenerCursos()
    {
        $cursos = Curso::all();
        return $cursos;
    }

    private function generarDatos(Curso $curso)
    {
        $estudiantesDelCurso = $curso->estudiantes;
        $inasistenciasDeCadaEstudiante = [];
        //Hay N Inasistencias como N estudiantes
        foreach ($estudiantesDelCurso as $estudiante) {
          array_push($inasistenciasDeCadaEstudiante,$this->obtenerInasistencias($estudiante));
        }
        return [
          'estudiantes' => $estudiantesDelCurso,
          'inasistencias' => $inasistenciasDeCadaEstudiante
        ];
    }

    private function obtenerInasistencias(Estudiante $estudiante)
    {
        $boletinEstudiante = $estudiante->boletines()->latest()->first();
        $materiasVistas = $boletinEstudiante->materia_boletines;
        $sumaInasistencias = 0;
        foreach ($materiasVistas as $materia) {
          $sumaInasistencias += $materia->notasPeriodo()->sum('inasistencias');
        }
        return $sumaInasistencias;
    }
}
