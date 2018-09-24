<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Http\Requests\PeriodoStoreController;
class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $unidad = Periodo::all();
      return view('periodos.verPeriodo',['periodo' => $unidad]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodos.crearPeriodo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodoStoreController $request)
    {
      $unidad = new Periodo(); //Creo el modelo de datos acudiente
      $unidad->pk_periodo = $request->input('nro_periodo');
      $unidad->fecha_inicio = $request->input('fecha_inicio');
      $unidad->fecha_limite = $request->input('fecha_limite');
      $unidad->ano = $request->input('ano');
      $unidad->nro_periodo = $request->input('nro_periodo');
      $unidad->save();
      return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $id = intval($id);
      if(!($id==0 or $id>4)){
        $query = Periodo::where('pk_periodo',$id)->get();
        if(!empty($query[0])){
          return view('periodos.verPeriodo', ['periodo' => $query]);
        }
      }
      return 'Número de periodo inválido o el periodo no existe';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
