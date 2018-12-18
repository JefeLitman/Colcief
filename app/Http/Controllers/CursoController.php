<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Periodo;

use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function __construct() {
        $this->middleware('admin:administrador,director');
    }

    public function index() {
        $agruparCursos = Curso::all()->groupBy('prefijo');
        $cursos = [
            'Prescolar' => $agruparCursos['0'],
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
            'Undecimo' => $agruparCursos['11']
        ];
        // dd($cursos);
        return view('cursos.listaCurso', compact('cursos'));
    }

    public function create() {
        return view('cursos.crearCurso', compact('cursos'));
    }

    public function store(Request $request) {
        $curso = (new Curso)->fill($request->all());
        $curso->save();
    }

    public function show($pk_curso) {
        $curso = Curso::findOrFail($pk_curso);
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

    public function conteoEstudiantes($pk_curso) {
        $estudiantes = Curso::where('pk_curso','=',$pk_curso)->get();
        if (!empty($estudiantes[0])) {
            $estudiantes = $estudiantes[0]->estudiantes;
            $listado = [];
            foreach ($estudiantes as $estudiante) {
                array_push($listado,[
                    'pk_estudiante' => $estudiante->pk_estudiante,
                    'fk_acudiente' => $estudiante->fk_acudiente,
                    'fk_curso' => $estudiante->fk_curso,
                    'nombre' => $estudiante->nombre,
                    'apellido' => $estudiante->apellido,
                    'grado' => $estudiante->grado,
                    'discapacidad' => $estudiante->discapacidad
                ]);
            }
            return json_encode($listado);
        }
        return 0;
    }

    public function destroy($pk_curso){
        $curso = Curso::findOrFail($pk_curso);
        $curso->delete();
        return redirect()->back();
    }

    public function conteoCursosPorGrado($grado) {
        $cursos = Curso::where('prefijo','=',$grado)->get()->toArray();
        return json_encode($cursos);
    }

    public function sigSufijo(Request $request){
        if($request->get('query')){
            $query = $request->get('query');
            $ultimoCurso = Curso::where('prefijo', $query)->orderBy('sufijo', 'desc')->first();
            $siguienteSufijo = intval($ultimoCurso->sufijo) + 1;
            $sufijoString = '0'.strval($siguienteSufijo);
            echo $sufijoString;
        }
    }

    public function cursoPlanillas($pk_curso){  //By Paola
        $grado=Curso::where('pk_curso',$pk_curso)->get();
        $periodos=Periodo::where('ano',date('Y'))->get();
        if (!empty($grado[0])) {
            $materias=$grado[0]->materiaspc;
            return view("cursos.planillasCurso",["grado"=>$grado[0],"materias"=>$materias,"periodos"=>$periodos]);
        }
        return "Error: El curso solicitado no existe";
    }

    public function prueba() {
      return view('cursos.prueba');
    }
}
