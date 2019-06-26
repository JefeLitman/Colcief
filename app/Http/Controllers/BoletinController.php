<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NotaPeriodoController;
use App\Estudiante;
use App\Empleado;
use App\Acudiente;
use App\Curso;
use App\Puesto;
use App\Periodo;
use App\Boletin;
use App\Division;
use App\Recuperacion;
use App\NotaPeriodo;
use App\MateriaBoletin;

// @Autora Paola

class BoletinController extends Controller {

    public function index(){
        // $role=session('role');
        // $user=session('user');
        // switch($role){
        //     case "administrador":

        //         break;
        //     default:
        //         return redirect('/');
        // }
    }

    public function showBoletines($id){ //El id es el id del estudiante, Muestra todos los boletines de ese estudiante
        $boletines=[] ;
        $estudiante=Estudiante::where('pk_estudiante',$id)->leftjoin('curso','curso.pk_curso','=','estudiante.fk_curso')->get();
        if (!empty($estudiante[0])) {
            $estudiante;
            $boletines=Boletin::select('boletin.*','curso.prefijo','curso.sufijo')->where('boletin.fk_estudiante',$id)->join('curso','curso.pk_curso','=','boletin.fk_curso')->get();
        }
        
        return view('boletines.showBoletines',['estudiante'=>$estudiante,'boletines'=>$boletines]);
    }

    public function showEstudiante($fk_estudiante){ //Muestra el boletin del año actual
        return $this->showAnoEstudiante(date('Y'),$fk_estudiante);
    }

    public function showAnoEstudiante($ano,$fk_estudiante, $pdf=false){
        $B=Boletin::select('boletin.*','curso.*','estudiante.discapacidad','estudiante.nombre','estudiante.apellido','estudiante.fecha_nacimiento','estudiante.pk_estudiante','estudiante.fk_acudiente')->where([["boletin.fk_estudiante",$fk_estudiante],["boletin.ano",$ano]])->join("estudiante","estudiante.pk_estudiante","=","boletin.fk_estudiante")->join('curso','boletin.fk_curso','=','curso.pk_curso')->get();
        
        $infoDivs=Division::select('pk_division','nombre','porcentaje')->where('ano',$ano)->orderBy('pk_division','asc')->get();
        $infoPeriodos=Periodo::where("ano",$ano)->orderBy('periodo.nro_periodo','asc')->get();
        // dd($infoPeriodos);
        $notaDivs=[];
        $msj="";    
        if(empty($B[0])){
            $msj=1; //No existe boletin u estudiante correspondiente.
            if($pdf){
                return ["msj"=>$msj];
            }
            return view('boletines.showEstudianteBoletin',["msj"=>$msj]);
        }else{
            if($pdf){
                $acudiente=Acudiente::select('nombre_acu_1')->where('pk_acudiente',$B[0]->fk_acudiente)->get();
                if(empty($acudiente[0])){
                    $acudiente="";
                }else{
                    $acudiente=ucwords($acudiente[0]->nombre_acu_1);
                }
                $empleado=Empleado::select('nombre','apellido')->where('fk_curso',$B[0]->pk_curso)->get();
                if(empty($empleado[0])){
                    $empleado="";
                }else{
                    $empleado=(ucwords($empleado[0]->nombre)." ".ucwords($empleado[0]->apellido));
                }
            }
            $recuperaciones=Recuperacion::where('materia_boletin.fk_boletin',$B[0]->pk_boletin)->join('nota_periodo','nota_periodo.pk_nota_periodo','=','recuperacion.fk_nota_periodo')->join('periodo','periodo.pk_periodo','=','nota_periodo.fk_periodo')->join('materia_boletin','materia_boletin.pk_materia_boletin','=','nota_periodo.fk_materia_boletin')->join('materia_pc','materia_pc.pk_materia_pc','=','materia_boletin.fk_materia_pc')->get();
            $materias=MateriaBoletin::select('materia_pc.logros_custom','materia_pc.pk_materia_pc','materia_pc.nombre','materia_boletin.pk_materia_boletin','materia_boletin.nota_materia')->where('materia_boletin.fk_boletin',$B[0]->pk_boletin)->join('materia_pc','materia_boletin.fk_materia_pc','=','materia_pc.pk_materia_pc')->orderBy('materia_pc.nombre','asc')->get();
            if(empty($materias[0])){
                $msj=2; //No hay materias asignadas a este estudiante.
                if($pdf){
                    // dd("holi");
                    return ["msj"=>$msj,"boletin"=>$B[0],"infoDivs"=>$infoDivs,"acudiente"=>$acudiente,"empleado"=>$empleado,"infoPeriodos"=>$infoPeriodos];
                }
                return view('boletines.showEstudianteBoletin',["msj"=>$msj,"boletin"=>$B[0],"infoDivs"=>$infoDivs]);
            }else{
                foreach ($infoPeriodos as $j) {
                    $inasistencias[$j->pk_periodo]=0;
                    $puest=Puesto::where([['fk_boletin',$B[0]->pk_boletin],['fk_periodo',$j->pk_periodo]])->get();
                    if (empty($puest[0])) {
                        $puesto[$j->pk_periodo]=null;
                    } else {
                        $puesto[$j->pk_periodo]=$puest[0];
                    }
                }
                foreach ($materias as $i) {
                    $notaDivs[$i->pk_materia_boletin]=[];
                    $notaPeriodos[$i->pk_materia_boletin]=[];
                    $periodos=NotaPeriodo::where('nota_periodo.fk_materia_boletin',$i->pk_materia_boletin)->join('periodo','nota_periodo.fk_periodo','=','periodo.pk_periodo')->orderBy('periodo.nro_periodo','asc')->get();
                    foreach ($periodos as $j) {
                        $inasistencias[$j->pk_periodo]=+$j->inasistencias;
                        $inasistenciaNotaPeriodos[$i->pk_materia_boletin][$j->pk_periodo]=$j->inasistencias;
                        $notaPeriodos[$i->pk_materia_boletin][$j->pk_periodo]=$j->nota_periodo;
                        $notaDivs[$i->pk_materia_boletin][$j->pk_periodo]=NotaPeriodoController::notasDivs($j->pk_nota_periodo,$infoDivs);
                    }
                }

                $msj=3;//Consulta exitosa
                if($pdf){
                    // dd(['inasistenciaNotaPeriodos'=>$inasistenciaNotaPeriodos,'recuperaciones'=>$recuperaciones,'puesto'=>$puesto,"inasistencias"=>$inasistencias,"msj"=>$msj,"boletin"=>$B[0],"materias"=>$materias,"infoPeriodos"=>$infoPeriodos,"notaPeriodos"=>$notaPeriodos,"infoDivs"=>$infoDivs,"notaDivs"=>$notaDivs,"acudiente"=>$acudiente ,"empleado"=>$empleado]);
                    return ['inasistenciaNotaPeriodos'=>$inasistenciaNotaPeriodos,'recuperaciones'=>$recuperaciones,'puesto'=>$puesto,"inasistencias"=>$inasistencias,"msj"=>$msj,"boletin"=>$B[0],"materias"=>$materias,"infoPeriodos"=>$infoPeriodos,"notaPeriodos"=>$notaPeriodos,"acudiente"=>$acudiente ,"empleado"=>$empleado];
                }
                // dd(['recuperaciones'=>$recuperaciones,'puesto'=>$puesto,"inasistencias"=>$inasistencias,"msj"=>$msj,"boletin"=>$B[0],"materias"=>$materias,"infoPeriodos"=>$infoPeriodos,"notaPeriodos"=>$notaPeriodos,"infoDivs"=>$infoDivs,"notaDivs"=>$notaDivs]);
                return view('boletines.showEstudianteBoletin',['recuperaciones'=>$recuperaciones,'puesto'=>$puesto,"inasistencias"=>$inasistencias,"msj"=>$msj,"boletin"=>$B[0],"materias"=>$materias,"infoPeriodos"=>$infoPeriodos,"notaPeriodos"=>$notaPeriodos,"infoDivs"=>$infoDivs,"notaDivs"=>$notaDivs]);
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
