<?php

namespace App\Http\Controllers;

use App\Estudiante;

/*@Autor Paola*/
use App\Acudiente; //Pepe no me lo vuelva a borrar
/**/

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstudianteStoreController;
use App\Http\Controllers\SupraController;
class EstudianteController extends Controller{

    //Funciones publicas de primeros y al final las privadas

    public function index(){
      return 'Aquí va una vista';
    }

    public function create(){
        return view('prueba.estudiante');
    }

    public function store(EstudianteStoreController $request){
      //Autor: Douglas R.
      //Los datos al haber pasado por EstudianteStoreController ya están validados
        $unidad = new Estudiante();
        $unidad->pk_estudiante = $request->input('pk_estudiante');
        $unidad->fk_acudiente = $request->input('fk_acudiente');
        $unidad->nombre = $request->input('nombre');
        $unidad->apellido = $request->input('apellido');
        $unidad->clave = $request->input('clave'); //Falta encriptar
        $unidad->fecha_nacimiento = $request->input('fecha_nacimiento');
        $unidad->grado = $request->input('grado');
        $unidad->discapacidad = $request->input('discapacidad');
        $unidad->estado = $request->input('estado');
        $unidad->foto = SupraController::subirArchivo($request,'estudiante');
        $unidad->save();
        return $request->validated(); //Removible

    }

    public function show($pk_estudiante){
        /*@Autor Paola*/
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>estudiantes>verEstudiante.blade.php y allá se reciben todos los datos del respectivo estudiante y acudiente en las variables tipo Object $estudiante, $acudiente.

        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->first()->get()[0];
        $acudiente= Acudiente::where('pk_acudiente', $estudiante->fk_acudiente)->first()->get()[0];

        //return $estudiante;
        return view("estudiantes.verEstudiante",['estudiante'=>$estudiante,'acudiente' =>$acudiente] );
    }

    public function edit(Estudiante $estudiante){

    }

    public function update(Request $request, $pk_estudiante){
        if($this->validar($request)){
            $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->first()->get()[0];
            $estudiante->update($request->all());
        }
    }
}
