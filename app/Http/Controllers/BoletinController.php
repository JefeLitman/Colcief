<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NotaPeriodoController;
use App\Curso;
use App\Boletin;
use App\NotaPeriodo;
use App\MateriaBoletin;

// @Autora Paola

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

    public function showEstudiante($fk_estudiante){
        $B=Boletin::select('pk_boletin')->where([["fk_estudiante",$fk_estudiante],["ano",date('Y')]])->get();
        $notas=[];
        if(empty($B[0])){
            $msj="No hay un boletin actual para este estudiante.";
        }else{
            $Materias=MateriaBoletin::select('materia_pc.pk_materia_pc','materia_pc.nombre','materia_boletin.pk_materia_boletin','materia_boletin.nota_materia')->where('materia_boletin.fk_boletin',$B[0]->pk_boletin)->join('materia_pc','materia_boletin.fk_materia_pc','=','materia_pc.pk_materia_pc')->orderBy('materia_pc.nombre','asc')->get();
            if(empty($Materias[0])){
                $msje="No hay materias asignadas a este estudiante.";
            }else{
                foreach ($Materias as $i) {
                    $notas[$i->pk_materia_boletin]=[];
                    $periodos=NotaPeriodo::where('nota_periodo.fk_materia_boletin',$i->pk_materia_boletin)->join('periodo','nota_periodo.fk_periodo','=','periodo.pk_periodo')->orderBy('periodo.nro_periodo','asc')->get();
                    foreach ($periodos as $j) {
                        // return [$j->nro_periodo=>[NotaPeriodoController::notasDivs($j->pk_nota_periodo)]];
                        array_push($notas[$i->pk_materia_boletin],[$j->nro_periodo=>[NotaPeriodoController::notasDivs($j->pk_nota_periodo)]]);
                    }
                    
                }
            }
        }
        return $notas;
        return view('boletines.showEstudianteBoletin',["B"=>$B,"msj"=>$msj]);
    }

    public function showCurso($fk_curso){

    }

}
