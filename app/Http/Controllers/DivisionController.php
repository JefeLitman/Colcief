<?php

namespace App\Http\Controllers;
use DB;
use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DivisionStoreController;

class DivisionController extends Controller{

    public function __construct(){
        $this->ano = date('Y');
        $this->date = date('Y-m-d');
    }

    public function index(){
        $division = Division::all();
        return view('divisiones.listaDivision', ['division' => $division]);
    }

    public function create(){
        if(Division::all()->where('ano', $this->ano)->count()>0){
            return "Las divisiones ya han sido creadas, intente actulizandolas";
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
                $division -> limite = '2018-09-14';
                $division->save();
            }
        }
    }

    public function edit(){
        $division = Division::all()->where('ano', $this->ano);
        if($this->date <= $division[0]->limite){
            return view('divisiones.editarDivision', ['division' => $division]);
        } else {
            return 'EL año escolar ya inicio';
        }
    }

    public function update(Request $request, $pk_division){
        // $division = Division::findOrFail($pk_division)->fill($request->all());
        // $division->save();
        // return redirect(route('divisiones.verDivision', $division->pk_division));
    }
}
