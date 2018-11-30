<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NotaPeriodo;
use App\Division;
use App\NotaEstudiante;

class NotaPeriodoController extends Controller
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


    /**Retorna las notas que cada division tuvo en ese periodo y en el actual año*/
    public static function notasDivs($id,$divs){
        $notasdivs=[];
        if (!empty($divs[0])) {
            foreach ($divs as $d) {
                $notasdivs[$d->pk_division]=0;
            }
            $notas=NotaEstudiante::select('nota_estudiante.nota','nota.fk_division','nota.porcentaje')->where('fk_nota_periodo','=',$id)->join('nota','nota_estudiante.fk_nota','=','nota.pk_nota')->get();
            foreach ($notas as $n) {
                $notasdivs[$n->fk_division]=$n->nota*($n->porcentaje/100);
            }
            return $notasdivs;
        }
        return [];
    }
}
