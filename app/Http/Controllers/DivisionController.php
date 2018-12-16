<?php

namespace App\Http\Controllers;
use DB;
use App\Division;
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
            return view('mensajes/divisiones');
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
            }
        }
    }

    public function edit(){
        $division = Division::all()->where('ano', $this->ano);
        // if($this->date <= $division[0]->limite){
        return view('divisiones.editarDivision', ['division' => $division]);
        // } else {
        //     return 'EL año escolar ya inicio';
        // }
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
                    $division[$i] -> porcentaje = $request->porcentaje[$i];
                    $division[$i] -> save();
                }
                for($i=$consulta;$i<$form;$i++){
                    $newDivision = new Division();
                    $newDivision -> nombre = $request->nombre[$i];
                    $newDivision -> descripcion = $request->descripcion[$i];
                    $newDivision -> porcentaje = $request->porcentaje[$i];
                    $newDivision -> ano = $this->ano;
                    $newDivision -> save();
                }
            }else{
                for($i=0;$i<$form;$i++){
                    $division[$i] -> nombre = $request->nombre[$i];
                    $division[$i] -> descripcion = $request->descripcion[$i];
                    $division[$i] -> porcentaje = $request->porcentaje[$i];
                    $division[$i] -> save();
                }
                for($i=$form;$i<$consulta;$i++){
                    // $division[$i] -> porcentaje = 0;
                    // $division[$i] -> save();
                    $division[$i] -> delete();
                }
            }
        }
        return redirect('/divisiones');
    }
}
