<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalizarController extends Controller{
    public static function minuscula($array, ...$excepts){
        array_push($array, "_token", "action");
        foreach($array as $key => $value) { 
            $array[$key] = strtolower($value);
        }
        foreach($excepts as $except){
            unset($array[$except]);
        }
        return $array;
    }
}
