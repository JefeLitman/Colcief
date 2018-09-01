<?php

namespace App\Http\Controllers;

use App\Estudiante;

/*@Autor Paola*/
use App\Acudiente; //Pepe no me lo vuelva a borrar
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
        $estudiante = (new Estudiante)->fill($request->all());
        $estudiante->foto = SupraController::subirArchivo($request,'estudiante');
        $estudiante->save();
    }

    public function show($pk_estudiante){
        /*@Autor Paola*/
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>estudiantes>verEstudiante.blade.php y allá se reciben todos los datos del respectivo estudiante y acudiente en las variables tipo Object $estudiante, $acudiente.

<<<<<<< HEAD
        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->get()[0];
        $acudiente= Acudiente::where('pk_acudiente', $estudiante->fk_acudiente)->get()[0];
        
=======
        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->first()->get()[0];
        $acudiente= Acudiente::where('pk_acudiente', $estudiante->fk_acudiente)->first()->get()[0];

>>>>>>> ac3953c7799e01a5af637fb60208718d8fff8ab2
        //return $estudiante;
        return view("estudiantes.verEstudiante",['estudiante'=>$estudiante,'acudiente' =>$acudiente] );
    }

    public function edit($pk_estudiante){
        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->get()[0];
        return view('prueba.updateEstudiantes', ['estudiante' => $estudiante]);
    }

    public function update(Request $request, $pk_estudiante){
        return "holi";
        // dd($estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->get()[0]);
        // $estudiante->foto = SupraController::subirArchivo($request,'estudiante');
        // dd($estudiante->update($request->all()));
    }
}
