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
                $dias = $this->verHorario($horarios);
                return view('horarios.horarios', ['horarios' => $dias]);
                break;
            // case 'director':
            //     $cedula = session('user')['cedula'];
            //     $horarios = Horario::select('horario.*','materia_pc.nombre')->where('materia_pc.fk_empleado',$cedula)->join('materia_pc', 'materia_pc.pk_materia_pc','=','horario.fk_materia_pc')->orderBy('hora_inicio')->get();
            //     $dias = $this->verHorario($horarios);
            //     return view('horarios.horarios', ['horarios' => $dias]);
            //     break;
        }
    }

    public function verHorario($horarios){
        $dias = ['lunes'=>[],'martes'=>[],'miercoles'=>[],'jueves'=>[],'viernes'=>[]];
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
        return $dias;
    }

    public function materias($pk_materia){
        $materia_pc = MateriaPC::select('*','materia_pc.nombre as materia_nombre')->where('fk_materia',$pk_materia)->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get();
        $horarios = [];
        foreach($materia_pc as $m){
            array_push($horarios,Horario::where('fk_materia_pc',$m->pk_materia_pc)->get());
        }
        return view('horarios.listaMateriaPCs', ['materiaPCs' => $materia_pc, 'pk_materia' => $pk_materia, 'horarios' => $horarios]);
    }

    public function create($pk_materiaPC=null) {
        // Verifico que en la URL venga la $pk_materiaPC para saber a que materiaPC le creare los horarios
        if (!empty($pk_materiaPC)) {
            // Envio una colección de MateriaPC con la información del profesor y curso 
            // en el cual se desarrolla para imprimir en la vista
            $materiaPC = MateriaPC::select('*','materia_pc.nombre as nombre_materia', 'materia_pc.fk_curso as f_curso')
                ->where('pk_materia_pc', $pk_materiaPC)
                ->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')
                ->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get()[0];
            return view('horarios.crearHorario', compact('materiaPC'));
        }
        return 'debe especificar la materia';
    }

    public function store(Request $request) {

        // Obtener los horarios de todas las MateriasPC para un curso
        $horariosCurso = MateriaPC::where('fk_curso', $request->curso)
            ->join('horario', 'materia_pc.pk_materia_pc', 'horario.fk_materia_pc')->get();

        // Consulta de todas las materiasPC para el empleado
        $materiasEmpleado = MateriaPC::where('fk_empleado', $request->empleado)
            ->join('horario', 'materia_pc.pk_materia_pc', 'horario.fk_materia_pc')->get();

        // Variable crear inicializada en true que cambiara su valor a false si hay algún problema
        // de intereferencia horaria o de doble asignacion a un profesor
        $crear = true;

        // Array <<errores>> inicializado vacio que se irá llenando con los horarios ya creados que
        // interfieren con los que se quiere crear
        $errores = [];

        // Recorrer los requests
        for ($i=0;$i<count($request->dia);$i++){            
            // Recorrer los horarios de todas las MateriasPC para un mismo curso para mirar que sus horarios no se crucen
            foreach ($horariosCurso as $horarioCurso) {

                // Utilizar la funcion strtotime() que convierte los tiempos 
                // a una fecha UNIX (el numero de segundos desde 1970 00:00:00 UTC)
                // para comparar luego estos valores con el fin de evitar errores en la comparación
                $bdInicio = strtotime($horarioCurso->hora_inicio);
                $bdFin = strtotime($horarioCurso->hora_fin);
                $reqInicio = strtotime($request->hora_inicio[$i]);
                $reqFin = strtotime($request->hora_fin[$i]);

                // Revisar los siguientes cuatro casos en los que no debería dejarse crear un horario por interferencia: 
                // 1. Alguno de los horarios de la BD contiene la hora_inicio del request ($bdInicio < $reqInicio < bdFin)
                // 2. Alguno de los horarios de la BD contiene la hora_fin del request ($bdInicio < $reqFin < bdFin)
                // 3. Las horas de inicio y fin del request contienen algun horario de la BD ($reqInicio < $bdInicio < $bdFin < $reqFin)
                // 4. La hora de inicio del request es igual a la de la BD y la hora fin del request es igual a la de la BD ($reqInicio = $bdInicio y $bdFin = $reqFin)
                // Se podría pensar en un quinto caso que sería que los horarios de la BD contengan a los del request pero con la verificacion
                // de cualquiera de los dos primeros casos se verificaria este quinto caso.
                if ((($reqInicio < $bdFin) && ($reqInicio > $bdInicio)) || (($reqFin < $bdFin) && ($reqFin > $bdInicio)) || (($reqInicio < $bdInicio) && ($reqFin > $bdFin)) || (($reqInicio == $bdInicio) && ($reqFin == $bdFin))){
                    // Asegurarse que si algun horario interfiere con otro, sea el mismo día
                    if ($request->dia[$i] == $horarioCurso->dia) {
                        // Error para las interferencias
                        $error = "Interferencia horaria para el ".$request->dia[$i]." en la franja de ".
                        $request->hora_inicio[$i]."-".$request->hora_fin[$i]." con la materia ".
                        $horarioCurso->nombre." de ".substr($horarioCurso->hora_inicio, 0, 5).
                        "-".substr($horarioCurso->hora_fin, 0, 5);
                        // Añadir el error al array de errores
                        array_push($errores, $error);
                        // Se encontro un error entonces cambiamos el valor de la variable crear
                        $crear = false;
                    }
                }
            }
            // Recorrer todas las materiasPC de un empleado en busca de interferencias en los horarios de los profesores
            foreach ($materiasEmpleado as $materiaEmpleado) {

                // Utilizar la funcion strtotime() que convierte los tiempos 
                // a una fecha UNIX (el numero de segundos desde 1970 00:00:00 UTC)
                // para comparar luego estos valores con el fin de evitar errores en la comparación
                $profeInicio = strtotime($materiaEmpleado->hora_inicio);
                $profeFin = strtotime($materiaEmpleado->hora_fin);
                $reqInicio = strtotime($request->hora_inicio[$i]);
                $reqFin = strtotime($request->hora_fin[$i]);

                // Se repiten los casos para interferencia horaria pero esta vez teniendo en cuenta los horarios de los profesores y no del curso
                if ((($reqInicio < $profeFin) && ($reqInicio > $profeInicio)) || (($reqFin < $profeFin) && ($reqFin > $profeInicio)) || (($reqInicio < $profeInicio) && ($reqFin > $profeFin)) || (($reqInicio == $profeInicio) && ($reqFin == $profeFin))) {
                    // Asegurarse que si algun horario interfiere con otro, sea el mismo día
                    if ($request->dia[$i] == $materiaEmpleado->dia) {
                        // Error para las interferencias
                        $error = "El profesor ya tiene un horario asignado el día ".
                        $materiaEmpleado->dia." de ".substr($materiaEmpleado->hora_inicio, 0, 5).
                        "-".substr($materiaEmpleado->hora_fin, 0, 5)." por lo cual no es posible crear un horario de ".
                        $request->hora_inicio[$i]."-".$request->hora_fin[$i];
                        // Añadir el error al array de errores
                        array_push($errores, $error);
                        // Se encontro un error entonces cambiamos el valor de la variable crear
                        $crear = false;
                    }
                }
            }
        } 
        
        // Si crear es verdadero significa que no encontramos ninguna hora que se cruza entonces,
        // creamos todos los requests, de lo contrario no creamos ninguno
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
            // Retornar array de errores
            return back()->withInput()->with('error', $errores);
        }
    }

    public function edit($pk_horario)
    {
        $horario = Horario::find($pk_horario);
        return 'Formulario para editar ' .$horario->pk_horario. ' - ' .$horario->dia;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
