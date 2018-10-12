<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acudiente;
use App\Http\Requests\AcudienteStoreController;
use App\Http\Requests\AcudienteUpdateController;

class AcudienteController extends Controller{

    public function index(){
      $unidad = new Acudiente();
        return view('acudientes.verAcu',['acudientes' => $unidad]);
    }

    public function create(){
        return view('acudientes.crearAcu');
    }

    public function store(AcudienteStoreController $request){
      //Los datos al haber pasado por AcudienteStoreController ya están validados
      $unidad = new Acudiente(); //Creo el modelo de datos acudiente
      $unidad->pk_acudiente = $request->input('pk_acudiente');
      $unidad->nombre_acu_1 = $request->input('nombre_acu_1');
      $unidad->direccion_acu_1 = $request->input('direccion_acu_1');
      $unidad->telefono_acu_1 = $request->input('telefono_acu_1');
      $unidad->nombre_acu_2 = $request->input('nombre_acu_2');
      $unidad->direccion_acu_2 = $request->input('direccion_acu_2');
      $unidad->telefono_acu_2 = $request->input('telefono_acu_2');
      $unidad->save();
      return redirect(route('acudientes.show',$unidad->pk_acudiente));
    }

    public function show($pk_acudiente){
        $valor = Acudiente::where('pk_acudiente', $pk_acudiente)->get();
        if (!empty($valor[0])){
          return view('acudientes.verAcu',['acudientes'=>$valor]);
        }else{
          return 'Acudiente no encontrado';
        }
    }

    public function edit($pk_acudiente){
        $acudiente = Acudiente::findOrFail($pk_acudiente);
        return view('acudientes.editarAcu',['acudiente' => $acudiente]);
    }

    public function update(AcudienteUpdateController $request, $pk_acudiente){
        $unidad = Acudiente::findOrFail($pk_acudiente)->fill($request->all());
        $unidad->save();
        //return view('acudientes.verAcudiente',['acudiente' => $acudiente]);
        return 'Cambios guardados';
    }

    public function destroy($id){
        //No se eliminan acudientes
    }
}
