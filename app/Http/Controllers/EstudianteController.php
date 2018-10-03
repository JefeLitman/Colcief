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
//librerias de autenticacion
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;



class EstudianteController extends Controller{

    use Notifiable;
    //Funciones publicas de primeros y al final las privadas

    public function index(){
      return 'Aquí va una vista';
    }

    public function create(){
        return view('estudiantes.crearEstudiante');
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
        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->get();
        if(empty($estudiante[0])){
            return "No se ha encontrado el estudiante.";
        }else{
            $acudiente= Acudiente::where('pk_acudiente', $estudiante[0]->fk_acudiente)->get();
            if(empty($acudiente[0])){
                return "No se ha encontrado al respectivo acudiente.";
            }else{
               return view("estudiantes.verEstudiante",['estudiante'=>$estudiante[0],'acudiente' =>$acudiente[0]]); 
            }
        }
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
        $estudiante->discapacidad = $request->discapacidad;
        $estudiante->estado = $request->estado;
        $estudiante->save();
        return redirect(route('estudiantes.show', $estudiante->pk_estudiante));
    }
}
