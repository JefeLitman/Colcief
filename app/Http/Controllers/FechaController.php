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
        $orden = []; // array con las fechas y los mensajes a mostrar ordenadas
        $fechas = []; // arrar con el mismo index correspondiente a la fecha con otros datos necesario en la vista
        $orden['Inicio del año escolar'] = $fecha -> inicio_escolar; 
        $fechas['Inicio del año escolar'] = ['tipo' => 'fechas.edit'];
        $orden['Finalización del año escolar'] = $fecha -> fin_escolar;
        $fechas['Finalización del año escolar'] = ['tipo' => 'fechas.edit'];
        $orden['Hoy'] = $this -> date;
        $fechas['Hoy'] = $this -> date;
        $cont = 3;
        foreach ($periodos as $key => $periodo) {
            $orden['Inicio del periodo #'.$periodo -> nro_periodo] = $periodo -> fecha_inicio;
            $fechas['Inicio del periodo #'.$periodo -> nro_periodo] = ['tipo' => 'periodos.edit', 'id' => $periodo -> pk_periodo];
            $cont++;
            $orden['Finalización del periodo #'.$periodo -> nro_periodo] = $periodo -> fecha_limite;
            $fechas['Finalización del periodo #'.$periodo -> nro_periodo] = ['tipo' => 'periodos.edit', 'id' => $periodo -> pk_periodo];
            $cont++;

            $orden['Inicio recuperación #'.$periodo -> nro_periodo] = $periodo -> recuperacion_inicio;
            $fechas['Inicio recuperación #'.$periodo -> nro_periodo] = ['tipo' => 'periodos.edit', 'id' => $periodo -> pk_periodo];
            $cont++;
            $orden['Finalización recuperación #'.$periodo -> nro_periodo] = $periodo -> recuperacion_limite;
            $fechas['Finalización recuperación #'.$periodo -> nro_periodo] = ['tipo' => 'periodos.edit', 'id' => $periodo -> pk_periodo];
            $cont++;
        }
        asort($orden); // ordenamos el array $orden por su contenido, de esta manera organizamos cronologicamente
        return view('fechas.verFecha', ['orden' => $orden, 'fecha' => $fechas]);
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
