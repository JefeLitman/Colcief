<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\MateriaPC;
use App\Estudiante;
use App\MateriaBoletin;
use App\Periodo;
use App\Estudiante as Est;
use App\NotaPeriodo;

class ConcentradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:director,profesor,administrador');
    }

    //Muestra el listado de todos los estudiantes de un curso
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

    //Muestra las notas de los periodos de un solo estudiante
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

    /**
     * Esta función se encarga de recibir los datos del formulario verEstudiante
     * para cambiar las notas de los periodos pasados si se cumple la condición.
     * Se usan findOrFail para que retorne un error 404 en caso de que me estén
     * intentando hackear modificando los valores que se mandan en el encabezado.
     *
     * La seguridad en este método debe ser primordial, ya que afecta directamente a
     * TODAS las notas de una materia de un estudiante en TODOS los periodos que
     * cumplan la condición.
     * @author Douglas R
     */
    public function editarNota(Request $request)
    {
        $profesor = Empleado::find(session('user')['cedula']);
        $estudiante = Est::findOrFail($request->pk_estudiante);
        //Se activa si modifican el código del estudiante por otro
        //es vulnerable si el etudiante modificado también tiene el switch habilitado
        //pero eso no se puede evitar.
        if(!$estudiante->switch_concentrador){
          return 'Error: El estudiante no tiene permisos de sobreescritura.';
        }
        $materiaPC = MateriaPC::findOrFail($request->pk_materia_pc);
        //Solo entra al if si no es admin y además no le pertenece la materia
        //con esto se evita que si se modifica el código de la materiapc en el
        //formulario html, se ponga el código de otra materia.
        //Entraría si la otra materia también pertenece a una del profesor.
        if(!($profesor->cedula==$materiaPC->fk_empleado || $profesor->role=='0')){
          return 'Error: La materia no le pertenece.';
        }
        $notasPeriodos = $request->periodos;
        //Esta condición se activa si ningún periodo ha iniciado o si me están
        //intentando hackear cambiándole el nombre a la variable html.
        if(empty($notasPeriodos)){
          return redirect('/concentrador/'.$materiaPC->pk_materia_pc);
        }
        //INICIO DEL CAMBIO DE NOTAS PARA PERIODOS PASADOS
        //Se supone que ya debería llegar validado el número
        foreach ($notasPeriodos as $key => $nota) {
          $notaP = NotaPeriodo::findOrFail($key);
          $notaP->nota_periodo = floatval($nota);
          $notaP->save();
          $notaP->materiaBoletin->actualizarNota();
        }
        return redirect('/concentrador/'.$materiaPC->pk_materia_pc);
    }

    public function activarSwitch($pk_estudiante)
    {
        $estudiante = Est::findOrFail($pk_estudiante);
        $estudiante->switch_concentrador = !$estudiante->switch_concentrador;
        $estudiante->save();
        return back();
    }
}
