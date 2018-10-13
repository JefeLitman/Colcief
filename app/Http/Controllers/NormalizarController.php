<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalizarController extends Controller{
    public static function minuscula($array, ...$excepts){
        array_push($excepts, "_token", "action");
        foreach($excepts as $except){
            unset($array[$except]);
        }
        foreach($array as $key => $value) { 
            $array[$key] = strtolower($value);
        }
        return $array;
    }

    public static function mostrar($array){ 
        foreach($array as $key => $value) { 
            $array[$key] = ucwords($value);
        }
        return $array;
    }
}
