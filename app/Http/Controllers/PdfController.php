<?php

namespace App\Http\Controllers;

use iio\libmergepdf\Merger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Boletin;
use App\Estudiante;
use App\Curso;
use PDF;
use App\Http\Controllers\BoletinController;

class PdfController extends Controller
{
    public function invoiceCurso($pk_curso){

        $curso = Curso::select("prefijo","sufijo","ano")->where("pk_curso",$pk_curso)->get();
        if(empty($curso[0])){
            return "<center style='margin-top:46vh;'> <b>El curso no existe</b> </center>";
        }
        $curso = $curso[0];
        $file = "boletines/curso-".$curso->prefijo."-".$curso->sufijo."_codigo".$pk_curso.".pdf";

        if( (!file_exists( $file )) and date('Y')==$curso->ano ){
            $boletines = Boletin::select("fk_estudiante","ano")->where("fk_curso",$pk_curso)->get();
            if(count($boletines)==0){
                return "<center style='margin-top:46vh;'> <b>No hay estudiantes en este curso.</b> </center>";
            }

            $pdfs = array();
            foreach ($boletines as $b) {
                $pdf = $this->invoice($b->ano,$b->fk_estudiante,true);
                array_push($pdfs,$pdf);
            }
            $merger = new Merger;
            $merger->addIterator($pdfs);
            $finalPdf = $merger->merge();
            file_put_contents($file, $finalPdf);
        }
        
        return response()->file($file);
    }

    public function invoiceActual($fk_estudiante){
        return $this->invoice(date('Y'),$fk_estudiante);
    }
    public function invoice($ano,$fk_estudiante,$flag=false){
        $path = "boletines/";
        if(!is_dir($path)){
            mkdir($path);
        }

        $file = $path."estudiante-".$fk_estudiante."_".$ano.".pdf";
        $existe = file_exists( $file );
        $actualizar = false;
        $fecha  = "";

        if($existe){
            $fecha = date ("Y-m-d G:i:s", filemtime($file));
        }
        
        if( (!$existe) or date('Y')==$ano ){
            $data = (new BoletinController)->showAnoEstudiante($ano,$fk_estudiante,true);
            
            if ($data['msj']!=1) {
                $pPasado=-1;
                foreach($data['infoPeriodos'] as $p){
                    if(strtotime(date('Y'))>strtotime($p->recuperacion_limite)){
                        $pPasado=$p->pk_periodo;
                    }
                    if(strtotime(date('Y'))<strtotime($p->recuperacion_limite) && strtotime(date('Y'))>=strtotime($p->fecha_inicio) ){
                        $pActual=$p;
                    }
                }
                // dd($pActual);

                if($pPasado==-1){
                    //Para mostrar las notas se requiere que haya pasado al menos un periodo
                    //Es decir periodo uno aun no culminado
                    $data['msj']=4;
                }
                $data['pPasado']=$pPasado;
                if( ( $existe and (strtotime($fecha) <= strtotime($pActual->recuperacion_limite)) ) or (!$existe) ){
                    $pdf = PDF::loadView("pdf.invoice", $data);
                    file_put_contents($file, $pdf->output());
                }
            }else{
                die("<b>El estudiante no existe<b>");
            }
        }
        if($flag){
            return  $file;
        }
        return response()->file($file);
    }
}