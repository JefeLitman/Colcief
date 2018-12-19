<?php

namespace App\Http\Controllers;

use App\Fecha;
use Illuminate\Http\Request;

class FechaController extends Controller {

    public function __construct(){
        $this->middleware('admin:administrador');
        $this->ano = date('Y');
    }

    public function index(){
        $fecha = Fecha::all()->where('ano', $this->ano);
        return response()->json([
            'fecha' => $fecha
        ]);
    }

    public function create(){
        
    }

    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function show(Fecha $fecha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function edit(Fecha $fecha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fecha $fecha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fecha $fecha)
    {
        //
    }
}
