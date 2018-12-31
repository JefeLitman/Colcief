<?php

namespace App\Http\Controllers;

use App\Fecha;
use App\Periodo;
use Illuminate\Http\Request;

class FechaController extends Controller {

    public function __construct(){
        $this->middleware('admin:administrador');
        $this->ano = date('Y');
        $this->date = date('Y-m-d');
        setlocale(LC_ALL, 'es_CO.UTF-8');
    }

    public function index(){
        $fecha = Fecha::where('ano', $this -> ano) -> get()[0];
        $periodos = Periodo::where('ano', $this -> ano) -> orderBy('nro_periodo') -> get();
        $orden = [];
        $orden['Inicio del año escolar'] = $fecha -> inicio_escolar;
        $orden['Finalización del año escolar'] = $fecha -> fin_escolar;
        $orden['Hoy'] = $this -> date;
        $cont = 3;
        foreach ($periodos as $key => $periodo) {
            $orden['Inicio del periodo #'.$periodo -> nro_periodo] = $periodo -> fecha_inicio;
            $cont++;
            $orden['Finalización del periodo #'.$periodo -> nro_periodo] = $periodo -> fecha_limite;
            $cont++;
        }
        asort($orden);
        // dd($orden);
        /* $fechas = [];
        foreach ($periodos as $periodo) { 
            $fechas[$periodo -> fecha_inicio] = ['titulo' => 'Inicio del periodo '.$periodo -> nro_periodo];
            $fechas[$periodo -> fecha_limite] = ['titulo' => 'Finalización del periodo '.$periodo -> nro_periodo];
        }
        $fechas[$fecha -> inicio_escolar] = ['titulo' => 'Inicio del año escolar'];
        $fechas[$fecha -> fin_escolar] = ['titulo' => 'Finalización del año escolar'];
        $fechas[$this -> date] = ['titulo' => 'Dia actual'];
        ksort($fechas); */
        // dd($fechas);
        return view('fechas.verFecha', ['fechas' => $orden]);
    }

    public function show(Fecha $fecha){
        
    }

    public function edit(){
        $fecha = Fecha::where('ano', $this->ano)->get()[0];
        if(explode('-', $this->date)[1] <= explode('-', $fecha -> inicio_escolar)[1]){
            if(explode('-', $this->date)[2] <= explode('-', $fecha -> inicio_escolar)[2]){
                return view('fechas.editarFecha', ['fecha' => $fecha]);
            } else {
                return back() -> with('false', 'No es posible modificar estas fechas, el año escolar ya inicio');
            }
        } else {
            return back() -> with('false', 'No es posible modificar estas fechas, el año escolar ya inicio');
        }
    }

    public function update(FechaStoreController $request){
        $fecha = Fecha::where('ano', $this->ano)->get()[0];
        $fecha -> inicio_escolar = $request -> inicio_escolar;
        $fecha -> fin_escolar = $request -> fin_escolar;
        if ($fecha -> save()) {
            $mensaje = 'Las fechas escolares fueron actualizadas con exito, recuerde que la fecha de inicio escolar actual es '.$fecha -> fin_escolar;
            return redirect(route('fechas.index'))->with('true', $mensaje);
        } else {
            return back()->with('false', 'Algo no salio bien, intente nuevamente');
        }
    }
}
