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
}
