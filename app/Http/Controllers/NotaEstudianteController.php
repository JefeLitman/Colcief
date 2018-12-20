<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NotaEstudianteUpdateController;
use App\NotaEstudiante;

class NotaEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function update(NotaEstudianteUpdateController $request, $pk_nota_estudiante)
    {
        if($request->ajax()){
            $notaEstudiante=NotaEstudiante::where('pk_nota_estudiante',$pk_nota_estudiante)->get();
            if (!empty($notaEstudiante[0])) {
                $notaEstudiante=$notaEstudiante[0];
                $notaEstudiante->nota=$request->nota; 
                $notaEstudiante->save();
                return response()->json([
                    'mensaje' => 'Guardada con exito.'
                ]);
            }
            return response()->json([
                'mensaje' => 'Error: La nota no ha sido encontrada. Los datos no guardados aparecen en rojo'
            ]);
            
        }
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
