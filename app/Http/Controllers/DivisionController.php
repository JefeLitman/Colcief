<?php

namespace App\Http\Controllers;
use DB;
use App\Division;
use App\Fecha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DivisionStoreController;

class DivisionController extends Controller {

    public function __construct(){
        $this->middleware('admin:administrador');
        $this->ano = date('Y');
        $this->date = date('Y-m-d');
    }

    public function index(){
        $division = Division::all();
        return view('divisiones.listaDivision', ['division' => $division]);
    }

    public function create(){
        if(Division::all()->where('ano', $this->ano)->count()>0){
            return view('mensajes.divisiones');
        }else{
            return view('divisiones.crearDivision');
        }
    }

    public function store(DivisionStoreController $request){
        $total = 0;
        for($i=0;$i<count($request->nombre);$i++){
            $total += $request->porcentaje[$i];
        }
        if($total == 100){
            for($i=0;$i<count($request->nombre);$i++){
                $division = new Division();
                $division -> nombre = $request->nombre[$i];
                $division -> descripcion = $request->descripcion[$i];
                $division -> porcentaje = $request->porcentaje[$i];
                $division -> ano = $this->ano;
                $division->save();
                $division->crearNotasDivision();
            }
        }
    }

    public function edit(){
        $fecha = Fecha::where('ano', $this->ano)->get()[0];
        $division = Division::all()->where('ano', $this->ano);
        if(explode('-', $this->date)[1] <= explode('-', $fecha -> inicio_escolar)[1]){
            if(explode('-', $this->date)[2] <= explode('-', $fecha -> inicio_escolar)[2]){
                return view('divisiones.editarDivision', ['division' => $division]);
            } else {
                return 'EL año escolar ya inicio';
            }
        } else {
            return 'EL año escolar ya inicio';
        }
    }

    public function update(Request $request){
        $division = Division::all()->where('ano', $this->ano);
        $total = 0;
        $form = count($request->nombre);
        $consulta = count($division);

        for($i=0;$i<$form;$i++){
            $total += $request->porcentaje[$i];
        }
        if($total == 100){
            if($consulta <= $form){
                for($i=0;$i<$consulta;$i++){
                    $division[$i] -> nombre = $request->nombre[$i];
                    $division[$i] -> descripcion = $request->descripcion[$i];
                    $bandera=false;
                    if ($division[$i] -> porcentaje != $request->porcentaje[$i]) {
                        $division[$i] -> porcentaje = $request->porcentaje[$i];
                        $bandera=true;
                    }
                    $division[$i] -> save();
                    if ($bandera) {
                        $division[$i]->actualizarNotasPeriodo();
                    }
                }
                for($i=$consulta;$i<$form;$i++){
                    $newDivision = new Division();
                    $newDivision -> nombre = $request->nombre[$i];
                    $newDivision -> descripcion = $request->descripcion[$i];
                    $newDivision -> porcentaje = $request->porcentaje[$i];
                    $newDivision -> ano = $this->ano;
                    $newDivision -> save();
                    $newDivision -> crearNotasDivision();
                }
            }else{
                for($i=0;$i<$form;$i++){
                    $division[$i] -> nombre = $request->nombre[$i];
                    $division[$i] -> descripcion = $request->descripcion[$i];
                    $bandera=false;
                    if ($division[$i] -> porcentaje != $request->porcentaje[$i]) {
                        $division[$i] -> porcentaje = $request->porcentaje[$i];
                        $bandera=true;
                    }
                    $division[$i] -> save();
                    if ($bandera) {
                        $division[$i]->actualizarNotasPeriodo();
                    }
                }
                for($i=$form;$i<$consulta;$i++){
                    // $division[$i] -> porcentaje = 0;
                    // $division[$i] -> save();
                    $division[$i] -> delete();
                    $division[$i]->actualizarNotasPeriodo();
                }
            }
            $mensaje = 'Los componentes fueros actualizados con exito, recuerde que esta modificación afectara todas las notas existentes ingresadas en el año actual';
            return redirect(route('divisiones.index'))->with('true', $mensaje);
        }else{
            return back() -> with('false', 'Recuerde que la suma de los porcentajes debe ser 100%. Intente nuevamente');
        }
    }
}
