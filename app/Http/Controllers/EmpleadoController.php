<?php

namespace App\Http\Controllers;

use App\Empleado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpleadoStoreController;
use App\Http\Requests\EmpleadoUpdateController;
use App\Http\Controllers\NormalizarController as Nc; //Normalizacion de datos
use App\Http\Controllers\SupraController;

class EmpleadoController extends Controller{
    public function index(){}

    public function create(){
        return view('empleados.crearEmpleado');
    }

    public function store(EmpleadoStoreController $request){
        $empleado = (new Empleado)->fill(Nc::minuscula($request->all()));
        $estudiante->password = Hash::make('clave');
        if($request->hasFile('foto')){
          $nombreArchivo = 'empleado'.$request->pk_empleado;
          $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo,'foto');
        }
        $empleado->save();
    }

    public function show($pk_empleado){   
        /*@Autor Paola C.*/
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>empleados>verEmpleado.blade.php y allá se reciben todos los datos del respectivo empleado en una variable tipo Object $empleado. 
        $empleado = Empleado::where('pk_empleado', $pk_empleado)->get();
        if(empty($empleado[0])){
            return "Empleado no encontrado."; //Esto debe ser cambiado por una view mjr
        }else{
            return view("empleados.verEmpleado",['empleado'=>$empleado[0]]);
        }        
        
    }

    public function edit($pk_empleado){
        $empleado = Empleado::findOrFail($pk_empleado);
        return view("empleados.editarEmpleado", compact('empleado'));
    }

    public function update(EmpleadoUpdateController $request, $pk_empleado){
        $empleado = Empleado::findOrFail($pk_empleado)->fill(Nc::minuscula($request->all()));
        if($request->hasFile('foto')){
            $nombreArchivo = 'empleado'.$request->pk_empleado;
            $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo, 'foto');
        }
        $empleado->save();
        return redirect(route('empleados.show', $empleado->pk_empleado));
    }
}