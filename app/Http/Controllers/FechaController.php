<?php

namespace App\Http\Controllers;

use App\Fecha;
use Illuminate\Http\Request;

class FechaController extends Controller {

    public function __construct(){
        $this->middleware('admin:administrador');
        $this->ano = date('Y');
    }

    public function index(){
        $fecha = Fecha::where('ano', $this->ano)->get()[0];
        return response()->json([
            'fecha' => $fecha
        ]);
    }

    public function show(Fecha $fecha){
        
    }

    public function edit(){
        return view('fechas.editarFecha', ['fecha' => Fecha::where('ano', $this->ano) -> get()[0]]);
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
