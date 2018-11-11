<?php

namespace App\Http\Controllers;

use App\Horario;

use Illuminate\Http\Request;
use App\Http\Controllers\SupraController as SC;
use App\MateriaPC;
use App\Empleado;
use App\Curso;

class HorarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'por definir vista :p';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pk_materiaPC=null)
    {        
        if (!empty($pk_materiaPC)) {
            //Info para mostrar en la vista
            $materiaPC = MateriaPC::find($pk_materiaPC);
            $empleado = Empleado::find($materiaPC->fk_empleado);
            $curso = Curso::find($materiaPC->fk_curso);
            return view('horarios.crearHorario', compact('materiaPC', 'empleado', 'curso'));
        }
        return 'debe especificar la materia';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($i=0;$i<count($request->dia);$i++){
            $horario = new Horario();
            $horario -> fk_materia_pc = $request->fk_materia_pc[$i];
            $horario -> dia = $request->dia[$i];
            $horario -> hora_inicio = $request->hora_inicio[$i];
            $horario -> hora_fin = $request->hora_fin[$i];
            $horario->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pk_nota)
    {
        $unidad = Nota::find($pk_nota);
        if (!empty($unidad)) {
          $datos = [$this->arrayzar($unidad)];
          return view('notas.verNota',['datos' => $datos]);
        }
        return 'Nota no encontrada';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Este métodop devuelve dos colecciones, una que corresponde a la division y otro a la materia
    private function inspeccionarNota($Nota)
    {
        $datosDivision = Division::select('nombre','descripcion')->where('pk_division','=',$Nota['fk_division'])->get();
        $datosMateriaPC = MateriaPC::select('fk_materia','nombre')->where('pk_materia_pc','=',$Nota['fk_materia_pc'])->get();
        return [
          'division' => $datosDivision,
          'materia' => $datosMateriaPC
        ];
    }

    //Este método devuelve un array que contiene el objeto Nota, Divison y Materia
    //donde Division y Materia están capados a los [nombre,descripcion] y [fk_materia, nombre]
    private function arrayzar($Nota)
    {
      $foraneas = $this->inspeccionarNota($Nota);
      $coleccion = [$Nota,$foraneas['division']->all()[0],$foraneas['materia']->all()[0]];
      return $coleccion;
    }
}
