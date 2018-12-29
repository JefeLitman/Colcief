<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Periodo;
use App\Http\Controllers\SupraController as SC;
class PeriodoUpdateController extends FormRequest{

  public function authorize(){
    return true;
  }

  public function rules(){
    // $pk_futura = $this->input('nro_periodo');
    // $pk_original = $this->route('periodo');
    // if (!SC::comprobarRepeticion($pk_futura,$pk_original,'pk_periodo',Periodo::class)){
    //   return [
    //     'nro_periodo' => 'unique:periodo',
    //   ];
    // }
    return [
      'fecha_inicio' => 'required|date',
      'fecha_limite' => 'required|date|after:fecha_inicio',
    ];
  }
  //  public function messages(){
  //    return [
  //      'ano.min' => 'El año no puede ser inferior al año 2017',
  //      'ano.max' => 'El año no puede ser mayor al año 2100',
  //      'ano.required' => 'Es obligatorio especificar el año',
  //      'ano.numeric' => 'El año es un número...'
  //    ];
  //  }
}
