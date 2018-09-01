<?php
/*
  SUPRACONTROLLER
  AUTOR: Douglas Ramírez
  VERSIÓN: 0.1
  DESCRIPCIÓN:
  Ésta clase tiene como objetivo agrupar todos los métodos necesarios
  en las demás clases, a modo de no repetir código y cumplir con el
  single responsibility principle.
 */

  namespace App\Http\Controllers;
  use Illuminate\Http\Request;

  class SupraController{
    /*
      SubirArchivo:
      El primer parámetro es el request, el segundo el rol (estudiante, empleado).
      Retorna un string con la ubicacion(ubicacion y nombre completo del archivo) actual del archivo subido.
    */
    public static function subirArchivo(Request $request, String $role){
      if($request->hasFile($nombreInput)){
        if($role = "estudiante"){
          $nombre = $request->pk_estudiante;
          $carpeta = $role;
        }else if($role = "empleado"){
          $nombre = $request->pk_empleado;
          $carpeta = $role;
        }
        $nombre .= '.'.$file->clientExtension();
        $file = $request->file('foto')->storeAs($carpeta, $nombre);        
        return $carpeta.$nombre;
      }
    }
  }
?>
