<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SupraController as SC;
use App\Curso;
use App\MateriaPC;
use App\Periodo;
use App\Estudiante;
use App\MateriaBoletin;
use App\boletin;
use App\Recuperacion;

class SIGSEController extends Controller
{
    public function index()
    {
      //Aquí debería ir la presentación de SIGSE
      //Debería pedir los filtros
      //Posiblemente un select que contenga la lista de cursos y otro con los generos
    }

    public function show($datos_onchange)
    {
      /**
       * Acá se organizan los datos filtrados y se envía una estructura de datos a una vista
       */
    }

    /**
     * Esto actúa como middleware antes de mostrar mediante el método show
     */
    private function filtros(Request $request)
    {
      $consultaBase = MateriaBoletin::all();
    }

    /**
     * Este método obtiene todos los estudiantes pertenecientes al curso de una materia
     */
    private function getEstudiantesMateriaPC($pk_materia_pc)
    {

    }

    /**
     * Esto debe de obtener el boletin más reciente de los estudiantes, para poder
     * filtrar las materias_boletin que tienen la nota final.
     * Como parámetro recibo el estudiante
     */
    private function getNotaPeriodoEstudiante(Estudiante $estudiante)
    {
      /**
       * Verifica si el estudiante hizo una recuperación de la materia durante el periodo
       */
      function checkRecuperacion()
      {

      }
      /**
       * Este método se ejecuta solo si el estudiante presentó una recuperación
       */
      function getNotaRecuperacion()
      {

      }
    }

}
