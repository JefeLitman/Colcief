<?php

namespace App\Http\Controllers;

use App\Fecha;
use App\Periodo;
use Illuminate\Http\Request;
use App\Http\Requests\FechaStoreController;


class FechaController extends Controller {

    public function __construct(){
        $this->middleware('admin:administrador')->except(['index']);
        $this->middleware('admin:administrador,coordinador,director,profesor')->only(['index']);
        $this->ano = date('Y');
        $this->date = date('Y-m-d');
        setlocale(LC_ALL, 'es_CO.UTF-8');
    }

    public function index(){
        
        $fecha = Fecha::where('ano', $this -> ano) -> get()[0];
        $periodos = Periodo::where('ano', $this -> ano) -> orderBy('nro_periodo') -> get();
        $orden = []; // array con las fechas y los mensajes a mostrar ordenadas
        $fechas = []; // arrar con el mismo index correspondiente a la fecha con otros datos necesario en la vista
        $orden['Inicio del año escolar'] = $fecha -> inicio_escolar; 
        $fechas['Inicio del año escolar'] = ['null' => $fecha -> inicio_escolar, 'fechas.edit' => 'null'];
        $orden['Finalización del año escolar'] = $fecha -> fin_escolar;
        $fechas['Finalización del año escolar'] = ['null' => $fecha -> fin_escolar, 'fechas.edit' => 'null'];
        $orden['Hoy'] = $this -> date;
        $fechas['Hoy'] = ['null' => $this -> date];
        $cont = 3;
        foreach ($periodos as $periodo) {
            $orden['Periodo #'.$periodo -> nro_periodo] = $periodo -> fecha_inicio;
            $fechas['Periodo #'.$periodo -> nro_periodo] = $periodo->toArrayOnly("fecha_inicio","fecha_limite","recuperacion_inicio","recuperacion_limite", 'pk_periodo');
        }
        asort($orden); // ordenamos el array $orden por su contenido, de esta manera organizamos cronologicamente
        $label = [
            "fecha_inicio" => "Inicia periodo",
            "fecha_limite" => "Finaliza periodo",
            "recuperacion_inicio" => "Inicia recuperaciones",
            "recuperacion_limite" => "Finaliza recuperaciones",
            "null" => ''
        ];
        // dd($fechas);
        return view('fechas.verFecha', ['orden' => $orden, 'fechas' => $fechas, 'label' => $label]);
    }

    public function edit(){
        $fecha = Fecha::where('ano', $this->ano) -> where('inicio_escolar', '>', date('Y-m-d')) -> get();
        // dd($fecha);
        if(!empty($fecha[0])){
            return view('fechas.editarFecha', ['fecha' => $fecha[0]]);
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
