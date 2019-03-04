<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Http\Controllers\BoletinController;

class PdfController extends Controller
{
    public function invoiceActual($fk_estudiante){
        return $this->invoice(date('Y'),$fk_estudiante);
    }
    public function invoice($ano,$fk_estudiante){

        $data = (new BoletinController)->showAnoEstudiante($ano,$fk_estudiante,true);
        // $data =["holi"=>"holi"];
        // $data = ['title' => 'Welcome to HDTuto.com'];
        // dd($data);
        if ($data['msj']!=1) {
            # code...
            $pPasado=-1;
            foreach($data['infoPeriodos'] as $p){
                if(strtotime(date('Y'))>strtotime($p->recuperacion_limite)){
                    $pPasado=$p->pk_periodo;
                }
            }
            if($pPasado==-1){
                //Para mostrar las notas se requiere que haya pasado al menos un periodo
                //Es decir periodo uno aun no culminado
                $data['msj']=4;
            }
            $data['pPasado']=$pPasado;
            $data['msj']=3; //Linea Temporal... Borrar
            $data['pPasado']=1; //Linea Temporal... Borrar
        }
        

        // dd($data['pPasado']);
        $pdf = PDF::loadView('pdf.invoice', $data);
        
        return $pdf->stream('invoice');

    }
}