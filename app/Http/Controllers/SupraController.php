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
    // public static function subirArchivo(Request $request, String $role){
    //   if($role = "estudiante"){
    //     $nombre = $role.$request->pk_estudiante;
    //   }else if($role = "empleado"){
    //     $nombre = $role.$request->pk_empleado;
    //   }
    //   $nombre .= '.'.$request->file('foto')->clientExtension();
    //   $file = $request->file('foto')->storeAs('public', $nombre);
    //   return $nombre;
    // }
    /*
      SUBIR ARCHIVO:
      Método que sirve para subir cualquier tipo de archivo, es necesario pasarle como parametro
      el request, el nombre del archivo (ya formateado, ej: empleado[PK_Empleado]), y el nombre
      del input del formulario (ej: foto, pdf, ...)
    */
    public static function subirArchivo(Request $request,String $nombre,String $input){
      $nombre .= '.'.$request->file($input)->clientExtension();
      $file = $request->file($input)->storeAs('public', $nombre);
      return $nombre;
    }
  }
?>
