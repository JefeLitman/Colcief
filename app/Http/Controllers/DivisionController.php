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
    }

    public function index(){
        // $table = 'estudiante';
        // $datos = ["pk_estudiante", "nombre", "apellido"];
        
        // $obj = DB::table($table)->select($datos)->get();
        //     $result = array();
        //     foreach($obj as $index => $value){
        //         $f = '';
        //         foreach($datos as $i){
        //             $f .= $obj[$index]->$i.' ';
        //         }
        //         $result[$index] = $f;
        //     }
        // dd($result);
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
                $division->save();
            }           
        }    
    }

    public function edit($pk_division){
        $division = Division::all()->where('ano', $this->ano);
        return view('divisiones.editarDivision', ['division' => $division]);
    }

    public function update(Request $request, $pk_division){
        // $division = Division::findOrFail($pk_division)->fill($request->all());
        // $division->save();
        // return redirect(route('divisiones.verDivision', $division->pk_division));
    }
}
