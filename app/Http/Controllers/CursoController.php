<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Periodo;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function __construct()
    {

        $this->middleware('admin:administrador,director')->except(['conteoEstudiantes']);
        $this->middleware('admin:coordinador,administrador')->only(['conteoEstudiantes']);
    }

    public function index()
    {
        $agruparCursos = Curso::all()->groupBy('prefijo');
        $cursos = [
            'Preescolar' => $agruparCursos['0'],
            'Primero' => $agruparCursos['1'],
            'Segundo' => $agruparCursos['2'],
            'Tercero' => $agruparCursos['3'],
            'Cuarto' => $agruparCursos['4'],
            'Quinto' => $agruparCursos['5'],
            'Sexto' => $agruparCursos['6'],
            'Septimo' => $agruparCursos['7'],
            'Octavo' => $agruparCursos['8'],
            'Noveno' => $agruparCursos['9'],
            'Decimo' => $agruparCursos['10'],
            'Undécimo' => $agruparCursos['11'],
        ];
        return view('cursos.listaCurso', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.crearCurso');
    }

    public function store(Request $request)
    {
        $curso = (new Curso)->fill($request->all());
        if ($curso->save()) {
            return redirect('/estudiantes')->with('true', 'El curso ' . $curso->prefijo . '-' . $curso->sufijo . ' fue creado con éxito');
        } else {
            return back()->with('false', 'Algo no salio bien, intente nuevamente');
        }
    }

    public function show($pk_curso)
    {
        $curso = Curso::find($pk_curso);
        return view("cursos.verCurso", compact('curso'));
    }

    // public function edit($pk_curso) {
    //     $curso = Curso::findOrFail($pk_curso);
    //     return view("cursos.editarCurso", compact('curso'));
    // }

    // public function update(Request $request, $pk_curso) {
    //     $curso = Curso::findOrFail($pk_curso)->fill($request->all());
    //     $curso->save();
    //     return redirect(route('cursos.show', $curso->pk_curso));
    // }

    public function conteoEstudiantes($pk_curso)
    {
        $estudiantes = Curso::where('pk_curso', '=', $pk_curso)->first();
        if (!empty($estudiantes)) {
            $estudiantes = $estudiantes->estudiantes;
            $listado = [];
            foreach ($estudiantes as $estudiante) {
                array_push($listado, [
                    'pk_estudiante' => $estudiante->pk_estudiante,
                    'fk_acudiente' => $estudiante->fk_acudiente,
                    'fk_curso' => $estudiante->fk_curso,
                    'nombre' => $estudiante->nombre,
                    'apellido' => $estudiante->apellido,
                    'grado' => $estudiante->grado,
                    'discapacidad' => $estudiante->discapacidad,
                    'switch_concentrador' => $estudiante->switch_concentrador,
                ]);
            }
            return json_encode($listado);
        }
        return 0;
    }

    public function destroy(Request $request, $pk_curso)
    {
        if ($request->ajax()) {
            $curso = Curso::findOrFail($pk_curso);
            if ($curso->delete()) {
                if ($request->direccion == null) {
                    return response()->json([
                        'mensaje' => 'El curso ' . $curso->prefijo . '-' . $curso->sufijo . ' Fue eliminado',
                    ]);
                } else {
                    return response()->json([
                        'mensaje' => 'El curso ' . $curso->prefijo . '-' . $curso->sufijo . ' Fue eliminado',
                        'url' => config('app.url') . $request->direccion,
                    ]);
                }
            } else {
                return response()->json([
                    'mensaje' => 'El curso ' . $curso->prefijo . '-' . $curso->sufijo . ' no pudo ser eliminado, intente nuevamente',
                ]);
            }
        }
    }

    public function conteoCursosPorGrado($grado)
    {
        $cursos = Curso::where('prefijo', '=', $grado)->get()->toArray();
        return json_encode($cursos);
    }

    public function sigSufijo(Request $request)
    {
        if ($request->get('query') || $request->get('query') == 0) {
            $query = $request->get('query');
            $aux = Curso::where('prefijo', $query)->where('ano', date('Y'))->orderBy('sufijo', 'desc')->first();
            $ultimoCurso = $aux ? $aux->sufijo : 0;
            $siguienteSufijo = intval($ultimoCurso) + 1;
            $sufijoString = '0' . strval($siguienteSufijo);
            error_log($sufijoString);
            return response()->json($sufijoString);
        }
    }

    public function cursoPlanillas($pk_curso)
    { //By Paola
        $grado = Curso::where('pk_curso', $pk_curso)->get();
        $periodos = Periodo::where('ano', date('Y'))->get();
        if (!empty($grado[0])) {
            $materias = $grado[0]->materiaspc;
            return view("cursos.planillasCurso", ["grado" => $grado[0], "materias" => $materias, "periodos" => $periodos]);
        } else {
            return back()->with('false', 'El curso solicitado no fue encontrado, intente nuevamente');
        }
    }
}
