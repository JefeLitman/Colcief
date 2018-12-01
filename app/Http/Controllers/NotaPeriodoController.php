<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NotaPeriodo;
use App\Division;
use App\NotaEstudiante;
use App\NotaDivision;

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
     * @param  int  $pk_nota_periodo
     * @return \Illuminate\Http\Response
     */
    public function show($pk_nota_periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pk_nota_periodo
     * @return \Illuminate\Http\Response
     */
    public function edit($pk_nota_periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $pk_nota_periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pk_nota_periodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pk_nota_periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($pk_nota_periodo)
    {
        //
    }


    /**Retorna las notas que cada division tuvo en ese periodo*/
    public static function notasDivs($pk_nota_periodo,$divs){
        $notasdivs=[];
        if (!empty($divs[0])) {
            foreach ($divs as $d) {
                $nota_div=NotaDivision::where([["fk_nota_periodo",$pk_nota_periodo],["fk_division",$d->pk_division]])->get();
                if (empty($nota_div[0])) {
                    $notasdivs[$d->pk_division]=0;
                } else {
                    $notasdivs[$d->pk_division]=$nota_div[0]->nota_division;
                }
            }
            return $notasdivs;
        }
        return [];
    }

    public static function actualizarNota($pk_nota_periodo){
        $divs=Division::select('pk_division','nombre','porcentaje')->where('ano',date('Y'))->orderBy('pk_division','asc')->get();
        $notasDivs=notasDivs($pk_nota_periodo,$divs);


    }
}
