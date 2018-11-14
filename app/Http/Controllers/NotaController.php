<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SupraController as SC;
use App\Http\Requests\NotaStoreController;
use App\Nota;
use App\Division;
use App\MateriaPC;
use App\Acudiente;

class NotaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NotasDelProfesor = Nota::select('pk_nota','fk_division','fk_materia_pc','nota.nombre','nota.descripcion','nota.porcentaje')->
        join('materia_pc','nota.fk_materia_pc','=','materia_pc.pk_materia_pc')->
        join('empleado','materia_pc.fk_empleado','=','empleado.cedula')->
        where('empleado.cedula','=',session('user')['cedula'])->get();
        $datos = [];
        foreach ($NotasDelProfesor->all() as $Nota) {
          array_push($datos,$this->arrayzar($Nota));
        }
        return view('notas.verNota',['datos' => $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Para que funcione correctamente, las autenticaciones deben servir y se
     * debe de estar logeado.
     *
     * @param $pk_materia
     * Por defecto es null, ergo, se puede acceder a la ruta para crear una nota
     * de cualquier materia o de una en concreto si se le manda el pk.
     */
    public function create($pk_materia=null)
    {
      if (!empty($pk_materia)) {
        $materiasPC = MateriaPC::select('pk_materia_pc','nombre')->where([
          ['pk_materia_pc','=',$pk_materia],
          ['fk_empleado','=',session('user')['cedula']]
          ])->get();
      }else{
        $materiasPC = MateriaPC::select('pk_materia_pc','nombre')->where(
          'fk_empleado','=',session('user')['cedula'])->get();
      }
      if ($materiasPC->count()>0) {
        $divisiones = Division::select('pk_division','nombre')->get();
        if ($divisiones->count()>0) {
          return view('notas.crearNota',['divisiones' => $divisiones, 'materias' => $materiasPC]);
        }
        return 'No hay divisiones existentes para asignar notas';
      }
      return 'La materia no existe o no tiene materias asignadas';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotaStoreController $request)
    {
        $Nota = (new Nota)->fill($request->all());
        $Nota->save();
        return redirect('/notas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pk_nota)
    {
      //No dejar entrar si la nota no pertenece a la del profesor
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
