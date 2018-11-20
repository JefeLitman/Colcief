<?php

namespace App\Http\Controllers;

use App\Curso;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.listaCurso', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.crearCurso');
    }

    public function store(Request $request)
    {
        $curso = (new Curso)->fill($request->all());
        $curso->save();
    }

    public function show($pk_curso)
    {
        $curso = Curso::findOrFail($pk_curso);
        return view("cursos.verCurso", compact('curso'));
    }

    public function edit($pk_curso)
    {
        $curso = Curso::findOrFail($pk_curso);
        return view("cursos.editarCurso", compact('curso'));
    }

    public function update(Request $request, $pk_curso)
    {
        $curso = Curso::findOrFail($pk_curso)->fill($request->all());
        $curso->save();
        return redirect(route('cursos.show', $curso->pk_curso));
    }

    public function conteoEstudiantes($prefijo,$sufijo)
    {
        $estudiantes = Curso::where('prefijo','=',$prefijo)
        ->where('sufijo','=',$sufijo)->first();
        if (!empty($estudiantes)) {
          $estudiantes = $estudiantes->estudiantes;
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

    public function conteoCursosPorGrado($grado)
    {
        $cursos = Curso::where('prefijo','=',$grado)->get()->toArray();
        return json_encode($cursos);
    }

    public function prueba()
    {
      return view('cursos.prueba');
    }
}
