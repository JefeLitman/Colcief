<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Empleado;
use App\Horario;
use App\Materia;
use App\MateriaPC;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    // Devuelve una vista que varia para cada rol. Hay 4 casos y son los siguientes:
    // 1. Administrador: Se le mostrara una lista de las materias para que pueda crearle un horario a cada MateriaPC
    // 2. Estudiante: Podrá ver el horario del curso que le corresponda
    // 3. Profesor: Podrá ver el horario constituido por todas las materiasPC que este dicta
    // 4. Director: Podrá ver el horario constituido por todas las materiasPC que este dicta y además el horario del curso
    // que esta a cargo.
    public function index()
    {
        switch (session('role')) {
            case 'administrador':
                $materias = Materia::all();
                return view('horarios.listaHorarios', ['materias' => $materias]);
                break;
            case 'estudiante':
                $pk_estudiante = session('user')['pk_estudiante'];
                return view('horarios.horarioEstudiante', ['estudiante' => $this->getHorarioEstudiante($pk_estudiante)]);
                break;
            case 'director':
                $fk_curso = session('user')['fk_curso'];
                $cur = Curso::find($fk_curso);
                $c = $cur->prefijo . '-' . $cur->sufijo;
                return view('horarios.horarioDirector', ['c' => $c]);
                break;
            case 'profesor':
                $cedula = session('user')['cedula'];
                return view('horarios.horarioProfesor', ['empleado' => $this->getHorarioEmpleado($cedula)]);
                break;
        }

    }
    //Retorna una vista con el horario de un curso correspondiente al director
    public function verHorarioDirectorCurso()
    {
        $fk_curso = session('user')['fk_curso'];
        $cur = Curso::find($fk_curso);
        return view('horarios.horarioProfesor', ['empleado' => $this->getHorarioCurso($fk_curso), 'curso' => $cur]);
    }
    //Retorna una vista para el director donde tiene la opccion de ver su horario o el horario de su curso
    public function verHorarioDirector()
    {
        $cedula = session('user')['cedula'];
        return view('horarios.horarioProfesor', ['empleado' => $this->getHorarioEmpleado($cedula)]);
    }
    //Realiza la consulta correspondiente a un estudiante
    private function getHorarioEstudiante($pk_estudiante)
    {
        $estudiante = Horario::select('horario.*', 'materia_pc.nombre')->where('estudiante.pk_estudiante', $pk_estudiante)->join('materia_pc', 'materia_pc.pk_materia_pc', '=', 'horario.fk_materia_pc')->join('curso', 'materia_pc.fk_curso', '=', 'curso.pk_curso')->join('estudiante', 'estudiante.fk_curso', '=', 'curso.pk_curso')->orderBy('hora_inicio')->get();
        return $this->organizacion($estudiante);
    }
    //realiza la consulta de un horario correspondiente a un curso
    private function getHorarioCurso($fk_curso)
    {
        $curso = Horario::select('horario.*', 'materia_pc.nombre')->where('empleado.fk_curso', $fk_curso)->join('materia_pc', 'materia_pc.pk_materia_pc', '=', 'horario.fk_materia_pc')->join('empleado', 'materia_pc.fk_empleado', '=', 'empleado.cedula')->orderBy('hora_inicio')->get();
        return $this->organizacion($curso);
    }
    //realiza la consulta correspondiete a un empleado
    private function getHorarioEmpleado($cedula)
    {
        $empleado = Horario::select('horario.*', 'materia_pc.nombre')->where('materia_pc.fk_empleado', $cedula)->join('materia_pc', 'materia_pc.pk_materia_pc', '=', 'horario.fk_materia_pc')->orderBy('hora_inicio')->get();
        return $this->organizacion($empleado);
    }
    //Organiza los horarios en un array asocitivo
    public function organizacion($horarios)
    {
        $dias = ['lunes' => [], 'martes' => [], 'miercoles' => [], 'jueves' => [], 'viernes' => []];
        foreach ($horarios as $horario) {
            switch ($horario->dia) {
                case 'lunes':
                    array_push($dias['lunes'], $horario);
                    break;
                case 'martes':
                    array_push($dias['martes'], $horario);
                    break;
                case 'miercoles':
                    array_push($dias['miercoles'], $horario);
                    break;
                case 'jueves':
                    array_push($dias['jueves'], $horario);
                    break;
                case 'viernes':
                    array_push($dias['viernes'], $horario);
                    break;
            }
        }
        return $dias;
    }

    // Devuelve una vista con las materiasPC de una materia. A la vista se le pasa una colección con los datos
    // de la materiaPC, curso y empleado para que se puedan mostrar y además una colección de cada horario
    // si es que existen para que estos sean listados junto con la información de la materiaPC
    public function materias($pk_materia)
    {
        $materia_pc = MateriaPC::selectRaw('materia_pc.pk_materia_pc, materia_pc.nombre as materia_nombre')
            ->selectRaw('curso.prefijo, curso.sufijo, empleado.nombre, empleado.apellido')
            ->where('fk_materia', $pk_materia)->join('empleado', 'materia_pc.fk_empleado', '=', 'empleado.cedula')
            ->join('curso', 'materia_pc.fk_curso', '=', 'curso.pk_curso')
            ->orderByRaw('cast(curso.prefijo as unsigned) asc')->get();
        $horarios = [];
        foreach ($materia_pc as $m) {
            array_push($horarios, Horario::where('fk_materia_pc', $m->pk_materia_pc)->get());
        }
        return view('horarios.listaMateriaPCs', ['materiaPCs' => $materia_pc, 'pk_materia' => $pk_materia, 'horarios' => $horarios]);
    }

    // URL: se le pasa la pk_materia_pc de la materiaPC de la cual se desea crear horarios
    // Retorna una vista con un formulario para crear uno o hasta tres horarios
    // para una materiaPC. A la vista se le pasa una colección
    // con datos de materiaPC, curso y empleado para que se puedan mostrar.
    public function create($pk_materiaPC = null)
    {

        // Verifico que en la URL venga la $pk_materiaPC para saber a que materiaPC le creare los horarios
        if (!empty($pk_materiaPC)) {
            // Envio una colección de MateriaPC con la información del profesor y curso
            // en el cual se desarrolla para imprimir en la vista
            $materiaPC = MateriaPC::selectRaw('materia_pc.pk_materia_pc, materia_pc.fk_empleado, materia_pc.fk_curso as f_curso')
                ->selectRaw('materia_pc.nombre as nombre_materia, curso.prefijo, curso.sufijo, empleado.nombre, empleado.apellido')
                ->where('pk_materia_pc', $pk_materiaPC)
                ->join('empleado', 'materia_pc.fk_empleado', '=', 'empleado.cedula')
                ->join('curso', 'materia_pc.fk_curso', '=', 'curso.pk_curso')->get()[0];
            return view('horarios.crearHorario', compact('materiaPC'));
        }
        return 'debe especificar la materia';
    }

    public function store(Request $request)
    {
        // Obtener los horarios de todas las MateriasPC para un curso
        $horariosCurso = MateriaPC::where('fk_curso', $request->curso)
            ->join('horario', 'materia_pc.pk_materia_pc', 'horario.fk_materia_pc')->get();

        // Consulta de todas las materiasPC para el empleado
        $materiasEmpleado = MateriaPC::where('fk_empleado', $request->empleado)
            ->join('horario', 'materia_pc.pk_materia_pc', 'horario.fk_materia_pc')->get();

        $crear = true;

        // Array <<errores>> inicializado vacio que se irá llenando con los horarios ya creados que
        // interfieren con los que se quiere crear
        $errores = [];

        // Verificar que los request no tengan interferencia entre ellos
        for ($i = 0; $i < count($request->dia) - 1; $i++) {

            // Utilizar la funcion strtotime() que convierte los tiempos
            // a una fecha UNIX (el numero de segundos desde 1970 00:00:00 UTC)
            // para comparar luego estos valores con el fin de evitar errores en la comparación
            $anteriorInicio = strtotime($request->hora_inicio[$i]);
            $anteriorFin = strtotime($request->hora_fin[$i]);
            $siguienteInicio = strtotime($request->hora_inicio[$i + 1]);
            $siguienteFin = strtotime($request->hora_fin[$i + 1]);

            if ((($siguienteInicio < $anteriorFin) && ($siguienteInicio > $anteriorInicio)) || (($siguienteFin < $anteriorFin) && ($siguienteFin > $anteriorInicio)) || (($siguienteInicio < $anteriorInicio) && ($siguienteFin > $anteriorFin)) || (($siguienteInicio == $anteriorInicio) && ($siguienteFin == $anteriorFin))) {
                if ($request->dia[$i] == $request->dia[$i + 1]) {
                    // Error para las interferencias entre los request
                    $error = "Los horarios del día " . $request->dia[$i] . " en la franja de " .
                    $request->hora_inicio[$i] . "-" . $request->hora_fin[$i] . " y " .
                    $request->hora_inicio[$i + 1] . "-" . $request->hora_fin[$i + 1] .
                        " que está intentando crear se cruzan.";
                    // Añadir el error al array de errores
                    array_push($errores, $error);
                    // Se encontro un error entonces cambiamos el valor de la variable crear
                    $crear = false;
                }
            }
        }

        // Si los horarios que esta intentando crear el administrador se cruzan entonces no hacemos más verificaciones.
        // No creamos los horarios y devolvemos un mensaje de error, si estos horarios no se cruzan entonces entre ellos
        // nos aseguraremos de que no se crucen con los ya creados en la base de datos
        if ($crear) {
            // Recorrer los requests
            for ($i = 0; $i < count($request->dia); $i++) {

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
                    if ((($reqInicio < $bdFin) && ($reqInicio > $bdInicio)) || (($reqFin < $bdFin) && ($reqFin > $bdInicio)) || (($reqInicio < $bdInicio) && ($reqFin > $bdFin)) || (($reqInicio == $bdInicio) && ($reqFin == $bdFin))) {
                        // Asegurarse que si algun horario interfiere con otro, sea el mismo día
                        if ($request->dia[$i] == $horarioCurso->dia) {
                            // Error para las interferencias por materiasPC de un mismo curso
                            $error = "Interferencia horaria para el " . $request->dia[$i] . " en la franja de " .
                            $request->hora_inicio[$i] . "-" . $request->hora_fin[$i] . " con la materia " .
                            $horarioCurso->nombre . " de " . substr($horarioCurso->hora_inicio, 0, 5) .
                            "-" . substr($horarioCurso->hora_fin, 0, 5);
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
                            // Error para las interferencias en las materiasPC del empleado
                            $error = "El profesor ya tiene un horario asignado el día " .
                            $materiaEmpleado->dia . " de " . substr($materiaEmpleado->hora_inicio, 0, 5) .
                            "-" . substr($materiaEmpleado->hora_fin, 0, 5) . " por lo cual no es posible crear un horario de " .
                            $request->hora_inicio[$i] . "-" . $request->hora_fin[$i];
                            // Añadir el error al array de errores
                            array_push($errores, $error);
                            // Se encontro un error entonces cambiamos el valor de la variable crear
                            $crear = false;
                        }
                    }
                }
            }
        }

        // Si crear es verdadero significa que no encontramos ninguna hora que se cruza entonces,
        // creamos todos los requests, de lo contrario no creamos ninguno
        if ($crear) {
            for ($i = 0; $i < count($request->dia); $i++) {
                $horario = new Horario();
                $horario->fk_materia_pc = $request->fk_materia_pc[$i];
                $horario->dia = mb_strtolower($request->dia[$i]);
                $horario->hora_inicio = $request->hora_inicio[$i];
                $horario->hora_fin = $request->hora_fin[$i];
                $horario->save();
            }
        } else {
            return back()->withInput()->with(
                'false',
                'No se puede asignar un horario el dia ' . $request->all()['dia'][$posicion] .
                ' entre las ' . $request->all()['hora_inicio'][$posicion] .
                ' a las ' . $request->all()['hora_fin'][$posicion] .
                ' debido a una interferencia horaria con otra materia'
            );
        }
    }

    // URL: se le pasa pk_horario
    // Retorna una vista con un formulario para editar un horario. A la vista se le pasa una colección
    // con datos de materiaPC, curso y empleado de ese horario para que se puedan mostrar.
    public function edit($pk_horario)
    {
        $horario = Horario::selectRaw('horario.pk_horario, horario.dia, horario.hora_inicio, horario.hora_fin')
            ->selectRaw('materia_pc.pk_materia_pc, materia_pc.fk_empleado, materia_pc.fk_curso,materia_pc.nombre as nombre_materia')
            ->selectRaw('empleado.nombre, empleado.apellido')
            ->selectRaw('curso.prefijo, curso.sufijo')
            ->where('pk_horario', $pk_horario)
            ->join('materia_pc', 'horario.fk_materia_pc', '=', 'materia_pc.pk_materia_pc')
            ->join('empleado', 'materia_pc.fk_empleado', '=', 'empleado.cedula')
            ->join('curso', 'materia_pc.fk_curso', '=', 'curso.pk_curso')->first();

        return view('horarios.editarHorario', ['horario' => $horario]);
    }

    public function update(Request $request)
    {
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

        // Recorrer los horarios de todas las MateriasPC para un mismo curso para mirar que sus horarios no se crucen
        foreach ($horariosCurso as $horarioCurso) {
            // Utilizar la funcion strtotime() que convierte los tiempos
            // a una fecha UNIX (el numero de segundos desde 1970 00:00:00 UTC)
            // para comparar luego estos valores con el fin de evitar errores en la comparación
            $bdInicio = strtotime($horarioCurso->hora_inicio);
            $bdFin = strtotime($horarioCurso->hora_fin);
            $reqInicio = strtotime($request->hora_inicio);
            $reqFin = strtotime($request->hora_fin);
            // Revisar los siguientes cuatro casos en los que no debería dejarse crear un horario por interferencia:
            // 1. Alguno de los horarios de la BD contiene la hora_inicio del request ($bdInicio < $reqInicio < bdFin)
            // 2. Alguno de los horarios de la BD contiene la hora_fin del request ($bdInicio < $reqFin < bdFin)
            // 3. Las horas de inicio y fin del request contienen algun horario de la BD ($reqInicio < $bdInicio < $bdFin < $reqFin)
            // 4. La hora de inicio del request es igual a la de la BD y la hora fin del request es igual a la de la BD ($reqInicio = $bdInicio y $bdFin = $reqFin)
            // Se podría pensar en un quinto caso que sería que los horarios de la BD contengan a los del request pero con la verificacion
            // de cualquiera de los dos primeros casos se verificaria este quinto caso.
            if ((($reqInicio < $bdFin) && ($reqInicio > $bdInicio)) || (($reqFin < $bdFin) && ($reqFin > $bdInicio)) || (($reqInicio < $bdInicio) && ($reqFin > $bdFin)) || (($reqInicio == $bdInicio) && ($reqFin == $bdFin))) {
                // Asegurarse que si algun horario interfiere con otro, sea el mismo día
                if ($request->dia == $horarioCurso->dia) {
                    // Error para las interferencias
                    $error = "Interferencia horaria para el " . $request->dia . " en la franja de " .
                    substr($request->hora_inicio, 0, 5) . "-" . substr($request->hora_fin, 0, 5) . " con la materia " .
                    $horarioCurso->nombre . " de " . substr($horarioCurso->hora_inicio, 0, 5) .
                    "-" . substr($horarioCurso->hora_fin, 0, 5);
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
            $reqInicio = strtotime($request->hora_inicio);
            $reqFin = strtotime($request->hora_fin);
            // Se repiten los casos para interferencia horaria pero esta vez teniendo en cuenta los horarios de los profesores y no del curso
            if ((($reqInicio < $profeFin) && ($reqInicio > $profeInicio)) || (($reqFin < $profeFin) && ($reqFin > $profeInicio)) || (($reqInicio < $profeInicio) && ($reqFin > $profeFin)) || (($reqInicio == $profeInicio) && ($reqFin == $profeFin))) {
                // Asegurarse que si algun horario interfiere con otro, sea el mismo día
                if ($request->dia == $materiaEmpleado->dia) {
                    // Error para las interferencias
                    $error = "El profesor ya tiene un horario asignado el día " .
                    $materiaEmpleado->dia . " de " . substr($materiaEmpleado->hora_inicio, 0, 5) .
                    "-" . substr($materiaEmpleado->hora_fin, 0, 5) . " por lo cual no es posible crear un horario de " .
                    substr($request->hora_inicio, 0, 5) . "-" . substr($request->hora_fin, 0, 5);
                    // Añadir el error al array de errores
                    array_push($errores, $error);
                    // Se encontro un error entonces cambiamos el valor de la variable crear
                    $crear = false;
                }
            }
        }
        // Si crear es verdadero significa que no encontramos ninguna hora que se cruza entonces,
        // creamos todos los requests, de lo contrario no creamos ninguno
        if ($crear) {
            $horario = Horario::findOrFail($request->pk_horario);
            $horario->dia = mb_strtolower($request->dia);
            $horario->hora_inicio = $request->hora_inicio;
            $horario->hora_fin = $request->hora_fin;
            $horario->save();
        } else {
            // Retornar array de errores
            return back()->withInput()->with('error', $errores);
        }
    }

    // Elimina el horario con pk_horario igual al parametro que se le pasa de la base de datos
    // Y luego retorna la vista que lista los horarios de las materiasPC y su descripcion
    public function destroy(Request $request, $pk_horario)
    {
        if ($request->ajax()) {
            $horario = Horario::findOrFail($pk_horario);
            if ($horario->delete()) {
                return response()->json([
                    'mensaje' => 'El registro fue eliminado con exito',
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'Algo no salio bien, intente nuevamente',
                ]);
            }

        }
    }
}
