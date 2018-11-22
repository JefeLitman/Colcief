<?php

namespace App\Http\Controllers;

use App\Horario;
use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\SupraController as SC;
use App\MateriaPC;
use App\Empleado;
use App\Curso;

class HorarioController extends Controller {
    
    public function index(){
        switch(session('role')){
            case 'administrador':
                $materias = Materia::all();
                return view('horarios.listaHorarios', ['materias' => $materias]);
                break;
            case 'estudiante':
                $pk_estudiante = session('user')['pk_estudiante'];
                $horarios = Horario::select('horario.*','materia_pc.nombre')->where('estudiante.pk_estudiante',$pk_estudiante)->join('materia_pc', 'materia_pc.pk_materia_pc','=','horario.fk_materia_pc')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->join('estudiante','estudiante.fk_curso','=','curso.pk_curso')->orderBy('hora_inicio')->get();
                $dias = ['lunes'=>[],'martes'=>[],'miercoles'=>[],'jueves'=>[],'viernes'=>[]];
                $copia = $dias;
                foreach($horarios as $horario){
                    switch($horario->dia){
                        case 'lunes':
                            array_push($dias['lunes'],$horario);
                            break;
                        case 'martes':
                            array_push($dias['martes'],$horario);
                            break;
                        case 'miercoles':
                            array_push($dias['miercoles'],$horario);
                            break;
                        case 'jueves':
                            array_push($dias['jueves'],$horario);
                            break;
                        case 'viernes':
                            array_push($dias['viernes'],$horario);
                            break;
                    }
                }
                // dd($dias);
                // dd($dias);
                return view('horarios.index', ['horarios' => $dias, 'dias' => $copia]);
                break;

        }
        
    }

    public function materias($pk_materia){
        $materia_pc = MateriaPC::select('*','materia_pc.nombre as materia_nombre')->where('fk_materia',$pk_materia)->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get();
        $horarios = [];
        foreach($materia_pc as $m){
            array_push($horarios,Horario::where('fk_materia_pc',$m->pk_materia_pc)->get());
        }
        return view('horarios.listaMateriaPCs', ['materiaPCs' => $materia_pc, 'pk_materia' => $pk_materia, 'horarios' => $horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pk_materiaPC=null) {

        // Verifico que en la URL venga la $pk_materiaPC para saber a que materiaPC le creare los horarios
        if (!empty($pk_materiaPC)) {
            // Envio una colección de MateriaPC con la información del profesor y curso en el cual se desarrolla para imprimir en la vista
            $materiaPC = MateriaPC::select('*','materia_pc.nombre as nombre_materia', 'materia_pc.fk_curso as f_curso')
                ->where('pk_materia_pc', $pk_materiaPC)
                ->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')
                ->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get()[0];
            return view('horarios.crearHorario', compact('materiaPC'));
        }
        return 'debe especificar la materia';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Obtener los horarios de todas las MateriasPC para un curso
        $horariosCurso = MateriaPC::where('fk_curso', $request->curso)
            ->join('horario', 'materia_pc.pk_materia_pc', 'horario.fk_materia_pc')->get();
        
        // Consulta de todas las materiasPC para el empleado
        $materiasEmpleado = MateriaPC::where('fk_empleado', $request->empleado)
            ->join('horario', 'materia_pc.pk_materia_pc', 'horario.fk_materia_pc')->get();

        $crear = true;
        // Recorrer los requests
        for($i=0;$i<count($request->dia);$i++){            
            // Recorrer los horarios de todas las MateriasPC para un mismo curso para comparar que sus horarios no se crucen
            foreach ($horariosCurso as $horarioCurso) {
                // Si algunas de las horas del request esta contenida por algun horario de las materiasPC y estos ocurren en el mismo día entonces no dejamos crear
                if(((($request->hora_inicio[$i] < $horarioCurso->hora_fin) && ($request->hora_inicio[$i] > $horarioCurso->hora_inicio)) || (($request->hora_fin[$i] < $horarioCurso->hora_fin) && ($request->hora_fin[$i] > $horarioCurso->hora_inicio))) && ($request->dia[$i] == $horarioCurso->dia)){
                    $crear = false;
                    $posicion = $i;
                }
            }
        } 
        
        // Si crear es verdadero significa que no encontramos ninguna hora que se cruza entonces creamos todos los requests, de lo contrario no creamos ninguno
        if ($crear) {
            for ($i=0;$i<count($request->dia);$i++) { 
                $horario = new Horario();
                $horario -> fk_materia_pc = $request->fk_materia_pc[$i];
                $horario -> dia = $request->dia[$i];
                $horario -> hora_inicio = $request->hora_inicio[$i];
                $horario -> hora_fin = $request->hora_fin[$i];
                $horario->save();
            }
        } else {
            return back()->withInput()->with(
                'false', 
                'No se puede asignar un horario el dia '.$request->all()['dia'][$posicion].
                ' entre las '.$request->all()['hora_inicio'][$posicion].
                ' a las '.$request->all()['hora_fin'][$posicion].
                ' debido a una interferencia horaria con otra materia'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($pk_nota)
    // {
    //     $unidad = Nota::find($pk_nota);
    //     if (!empty($unidad)) {
    //       $datos = [$this->arrayzar($unidad)];
    //       return view('notas.verNota',['datos' => $datos]);
    //     }
    //     return 'Nota no encontrada';
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pk_horario)
    {
        $horario = Horario::find($pk_horario);
        return 'Formulario para editar ' .$horario->pk_horario. ' - ' .$horario->dia;
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
}
