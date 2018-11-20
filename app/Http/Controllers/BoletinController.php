<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Boletin;
use App\Division;
use App\empleado;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show($id) //El id es el id del estudiante
    {   
        $msj='';
        $divisiones=Division::select('pk_division','nombre','porcentaje')->where('ano',date('Y'));
        if(empty($divisiones[0])){
            $msj='No hayn divisiones creadas.';
        }else{
            $divs=[];
            foreach ($divisiones as $d) {
                $divs[$d->pk_division]=[$d->nombre,$d->porcentaje];
            }
        }
        
        $notas_boletin=Boletin::select()->where([['fk_estudiante',$id],['ano',date('Y')]])->leftjoin('materia_boletin','boletin.pk_boletin','=','materia_boletin.fk_boletin')->get();
        dd($notas_boletin);
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
