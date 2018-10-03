<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller{

    public function __invoke(Request $request, String $table){

        if($request->ajax()){
            $obj = DB::table($table)->select($request->datos)->get();
            $result = array();
            foreach($obj as $index => $value){
                $f = '';
                foreach($request->datos as $i){
                    $f .= $obj[$index]->$i.' ';
                }
                $result[$f] = null;
            }
            return response()->json($result);
        }
    }
}
