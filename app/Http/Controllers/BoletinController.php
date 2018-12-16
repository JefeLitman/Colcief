<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NotaPeriodoController;
use App\Curso;
use App\Periodo;
use App\Boletin;
use App\Division;
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
            $infoDivs=[];
            foreach ($divisiones as $d) {
                $infoDivs[$d->pk_division]=[$d->nombre,$d->porcentaje];
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
        $B=Boletin::where([["boletin.fk_estudiante",$fk_estudiante],["boletin.ano",date('Y')]])->join("estudiante","estudiante.pk_estudiante","=","boletin.fk_estudiante")->join('curso','boletin.fk_curso','=','curso.pk_curso')->get();
        $infoDivs=Division::select('pk_division','nombre','porcentaje')->where('ano',date('Y'))->orderBy('pk_division','asc')->get();
        $infoPeriodos=Periodo::where("ano",date('Y'))->orderBy('periodo.nro_periodo','asc')->get();
        $notaDivs=[];
        $msj="";    
        if(empty($B[0])){
            $msj=1; //No existe boletin u estudiante correspondiente.
            return view('boletines.showEstudianteBoletin',["msj"=>$msj]);
        }else{
            $materias=MateriaBoletin::select('materia_pc.pk_materia_pc','materia_pc.nombre','materia_boletin.pk_materia_boletin','materia_boletin.nota_materia')->where('materia_boletin.fk_boletin',$B[0]->pk_boletin)->join('materia_pc','materia_boletin.fk_materia_pc','=','materia_pc.pk_materia_pc')->orderBy('materia_pc.nombre','asc')->get();
            if(empty($materias[0])){
                $msj=2; //No hay materias asignadas a este estudiante.
                return view('boletines.showEstudianteBoletin',["msj"=>$msj,"boletin"=>$B[0],"infoDivs"=>$infoDivs]);
            }else{
                foreach ($materias as $i) {
                    $notaDivs[$i->pk_materia_boletin]=[];
                    $notaPeriodos[$i->pk_materia_boletin]=[];
                    $periodos=NotaPeriodo::where('nota_periodo.fk_materia_boletin',$i->pk_materia_boletin)->join('periodo','nota_periodo.fk_periodo','=','periodo.pk_periodo')->orderBy('periodo.nro_periodo','asc')->get();
                    foreach ($periodos as $j) {
                        $notaPeriodos[$i->pk_materia_boletin][$j->pk_periodo]=$j->nota_periodo;
                        $notaDivs[$i->pk_materia_boletin][$j->pk_periodo]=NotaPeriodoController::notasDivs($j->pk_nota_periodo,$infoDivs);
                    }
                }
                $msj=3;//Consulta exitosa
                // return $notaDivs;
                return view('boletines.showEstudianteBoletin',["msj"=>$msj,"boletin"=>$B[0],"materias"=>$materias,"infoPeriodos"=>$infoPeriodos,"notaPeriodos"=>$notaPeriodos,"infoDivs"=>$infoDivs,"notaDivs"=>$notaDivs]);
            }
        }
    }

    public function actualizarEstado($pk_boletin){
        $B=Boletin::where($pk_boletin)->get();
        if(empty($B[0])){
            return "Boletin no encontrado";
        }else{
            $cont=0; //Contador Materias perdidas
            $M=MateriaBoletin::where('fk_boletin',$pk_boletin)->get();
            if(!empty($M[0])){
                foreach ($M as $i) {
                   if($i->nota_materia<3){
                        $cont=+1;
                   }
                }
                $B[0]->estado=($cont>=3)?'p':'a'; //Si perdio 3 o mas materias repite el año.
            }else{
                $B[0]->estado='i'; //Si no hay materias aun, el estado es indefinido.
            }
            $B[0]->save();
        }
    }

}
