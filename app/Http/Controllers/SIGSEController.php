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
    public function __construct()
    {
        $this->middleware('admin:director,profesor,administrador');
    }
    /**
     * @author Douglas R.
     * Simplemente envía al index del SIGSE la información necesaria para que
     * el profesor pueda generar un informe.
     */
    public function index()
    {
      return view('SIGSE.indexSIGSE',['MateriasPC' => $this->getMateriasPC()]);
    }

    /**
     * @author Douglas R.
     * Recibe a través de POST el PK de alguna de las materiasPC del profesor
     * que inició sesión.
     */
    public function show(Request $request)
    {
      $informe = $this->getNotaMateriaEstudiantes($request->MateriasPC);
      $infoMateria = MateriaPC::find($request->MateriasPC);
      return view('SIGSE.informeSIGSE',['informe' => $informe, 'infoMateria' => $infoMateria]);
    }

    /**
     * @author Douglas R.
     * Este método envía todas las materiasPC que le correspondan al profesor
     * que inició sesión.
     */
    private function getMateriasPC()
    {
        switch (session('role')) {
          case 'director':
          case 'profesor':
            $MateriasPC = MateriaPC::select('pk_materia_pc','nombre','fk_curso','fk_empleado')->
            where('fk_empleado','=',session('user')['cedula'])->get();
            break;
          case 'administrador':
            $MateriasPC = MateriaPC::all();
            break;
        }

        $resultado = [];
        foreach ($MateriasPC as $MateriaPC) {
          $resultado = SC::array_push_wKey($MateriaPC->pk_materia_pc,$resultado,[$MateriaPC->nombre,$MateriaPC->getCursoCompleto()]);
        }
        //Resultado es una matriz Nx2 donde N_i es el pk_materia_pc, la primera columna es el nombre
        //de la materia y la segunda columna el curso al que pertenece.
        return $resultado;
    }

    /**
    * @author Douglas R.
     * Este método obtiene todas las notas de los estudiantes de una materia concreta,
     * los categoriza y envía el informe junto con el total.
     * @param $pk_materia_pc
     * @return [informe, total de estudiantes]
     */
    private function getNotaMateriaEstudiantes($pk_materia_pc)
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
      return [$categorias,count($NotasFinalesDeEstudiantes)];
    }

}
