<?php

namespace App\Http\Controllers;

use App\Estudiante;

/*@Autor Paola*/
use App\Acudiente; //Pepe no me lo vuelva a borrar
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstudianteStoreController;
use App\Http\Requests\EstudianteUpdateController;
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
        if($request->hasFile('foto')){
          $nombre = 'estudiante'.$request->pk_estudiante;
          $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto');
        }
        $estudiante->save();
    }

    public function show($pk_estudiante){
        /*@Autor Paola C.*/
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>estudiantes>verEstudiante.blade.php y allá se reciben todos los datos del respectivo estudiante y acudiente en las variables tipo Object $estudiante, $acudiente.
        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->get()[0];
        $acudiente= Acudiente::where('pk_acudiente', $estudiante->fk_acudiente)->get()[0];
        //return $estudiante;
        return view("estudiantes.verEstudiante",['estudiante'=>$estudiante,'acudiente' =>$acudiente] );
    }

    public function edit($pk_estudiante){
        $estudiante = Estudiante::findOrFail($pk_estudiante);
        return view('prueba.updateEstudiantes', ['estudiante' => $estudiante]);
    }

    public function update(EstudianteUpdateController $request, $pk_estudiante){
        $estudiante = Estudiante::findOrFail($pk_estudiante)->fill($request->all());
        if($request->hasFile('foto')){
          $nombre = 'estudiante'.$request->pk_estudiante;
          $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto');
        }
        $estudiante->save();

        return redirect('estudiantes/'.$estudiante->pk_estudiante);
    }
}
