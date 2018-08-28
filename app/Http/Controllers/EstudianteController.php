<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller{

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

    public function show(Estudiante $estudiante){
        
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
