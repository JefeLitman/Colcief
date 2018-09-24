<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DivisionStoreController;

class DivisionController extends Controller{

    public function __construct(){
        $this->ano = date('Y');
    }

    public function index(){
        $division = Division::all();
        return view('divisiones.listaDivision', ['division' => $division]);
    }

    public function create(){
        return view('divisiones.crearDivision');
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

    public function show($pk_division){
        $division = Division::findOrFail($pk_division)->where('ano', $this->ano);
        return view('divisiones.verDivision', ['division' => $division]);
    }

    public function edit($pk_division){
        // $division = Division::all()->where('ano', $this->ano);
        // // dd($division);
        // return view('divisiones.editarDivision', ['division' => $division]);
    }

    public function update(Request $request, $pk_division){
        // $division = Division::findOrFail($pk_division)->fill($request->all());
        // $division->save();
        // return redirect(route('divisiones.verDivision', $division->pk_division));
    }
}
