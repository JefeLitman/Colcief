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
     *
     */
    public function getMateriasPC()
    {
      $MateriasPC = MateriaPC::select('pk_materia_pc','nombre','fk_curso','fk_empleado')->
      where('fk_empleado','=',session('user')['cedula'])->get();
      $resultado = [];
      foreach ($MateriasPC as $MateriaPC) {
        $resultado = SC::array_push_wKey($MateriaPC->pk_materia_pc,$resultado,[$MateriaPC->nombre,$MateriaPC->getCursoCompleto()]);
      }
      //Resultado es una matriz Nx2 donde N_i es el pk_materia_pc, la primera columna es el nombre
      //de la materia y la segunda columna el curso al que pertenece.
      dd($resultado);
    }

    /**
     *
     */
    public function getNotaMateriaEstudiantes($pk_materia_pc)
    {
      function categorizar($categorias,$genero,$categoria)
      {
        if ($genero=='m') {
          $categorias[$categoria][0]++;
        }elseif ($genero=='f') {
          $categorias[$categoria][1]++;
        } //No hace nada si el género es indeterminado
        return $categorias;
      }
      $NotasFinalesDeEstudiantes = MateriaBoletin::select('pk_materia_boletin','nota_materia','genero')->
      where('materia_boletin.fk_materia_pc',$pk_materia_pc)->
      join('boletin','boletin.pk_boletin','materia_boletin.fk_boletin')->
      join('estudiante','estudiante.pk_estudiante','boletin.fk_estudiante')->
      get()->toArray();
      dd($NotasFinalesDeEstudiantes);
      $categorias = [
        'bajo' => [0,0],
        'basico' => [0,0],
        'alto' => [0,0],
        'superior' => [0,0]
      ];
      foreach ($NotasFinalesDeEstudiantes as $tupla) {
        switch (true) {
          case $tupla['nota_materia']<=2.9:
            $categorias = categorizar($categorias,$tupla['genero'],'bajo');
            break;

          case $tupla['nota_materia']<=3.9:
            $categorias = categorizar($categorias,$tupla['genero'],'basico');
            break;

          case $tupla['nota_materia']<=4.5:
            $categorias = categorizar($categorias,$tupla['genero'],'alto');
            break;

          default:
            $categorias = categorizar($categorias,$tupla['genero'],'superior');
            break;
        }
      }
      dd($categorias);
    }

}
