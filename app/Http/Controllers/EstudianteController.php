<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Acudiente;
use Illuminate\Http\Request;

class EstudianteController extends Controller{

    //Funciones publicas de primeros y al final las privadas

    public function index(){
        
    }

    public function create(){
        
    }

    public function store(Request $request){
        if($this->validar($request)){
            return Estudiante::create([
                'pk_estudiante' => $request['pk_estudiante'],
                'fk_acudiente' => $request['fk_acudiente'],
                'nombre' => $request['nombre'],
                'apellido' => $request['apellido'],
                'clave' => Hash::make(str_random(20)),
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'grado' => $request['grado'],
                'discapacidad' => $request['discapacidad'],
                'estado' => 'boolean',
                'foto' => 'require|url',
            ]);
        }
    }

    public function show($pk_estudiante){
        
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>estudiantes>verEstudiante.blade.php y allá se reciben todos los datos del respectivo estudiante y acudiente en las variables tipo Object $estudiante, $acudiente.

        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->first()->get()[0];
        $acudiente= Acudiente::where('pk_acudiente', $estudiante->fk_acudiente)->first()->get()[0];
        
        //return $estudiante;
        return view("estudiantes.verEstudiante",['estudiante'=>$estudiante,'acudiente' =>$acudiente] );
    }

    public function edit(Estudiante $estudiante){
        
    }

    public function update(Request $request, Estudiante $estudiante){
        if($this->validar($request)){
            $estudiante->update([
                'pk_estudiante' => $request['pk_estudiante'],
                'fk_acudiente' => $request['fk_acudiente'],
                'nombre' => $request['nombre'],
                'apellido' => $request['apellido'],
                'clave' => Hash::make(str_random(20)),
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'grado' => $request['grado'],
                'discapacidad' => $request['discapacidad'],
                'estado' => 'boolean',
                'foto' => 'require|url',
            ]);
        }    
    }


     private function validar(Request $request){
        $request->validate([
            'pk_estudiante' => 'required|numeric|unique:estudiante',
            'fk_acudiente' => 'required|numeric',
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'clave' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'grado' => 'required|numeric',
            'discapacidad' => 'boolean',
            'estado' => 'boolean',
            'foto' => 'require|url',    
        ]);
    }

    // public function destroy(Estudiante $estudiante){
        
    // }
}
