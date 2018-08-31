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

class SupraController
{
  /*
    SubirArchivo:
    El primer parámetro es el request, el segundo el nombre del input que
    contiene el archivo, por ejemplo, si en el formulario que envía el post
    el input que contiene una imagen se llama "img1", entonces, se pasa como
    string dicho nombre.
    Retorna un nombre semi-unico dado por la combinación de la fecha exacta actual
    y el hash md5 del nombre original del archivo subido.
  */
  public static function SubirArchivo(Request $request, String $nombreInput){
    if($request->hasFile($nombreInput)){
      $file = $request->file($nombreInput);
      $nombre = time().md5($file->getClientOriginalName()).'.'.$file->clientExtension();
      $file->move(public_path().'/imagenes/',$nombre);
      return $nombre;
    }
  }

  
}



 ?>
