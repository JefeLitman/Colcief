<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;

/*@Autor Paola C.
Clase materia general, esta clase tendra la descripcion general de las materias. Tambian tendra los logros generales.
*/

class MateriaController extends Controller
{
    public function index()
    {
        $materias=Materia::select('pk_materia','nombre','contenido')->get();
        //$materias=Materia::all();
        return view("materias.listaMaterias",compact("materias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = Materia::where('pk_materia',$id)->get()[0];
        return view("materias.verMateria",compact('materia'));
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
}
