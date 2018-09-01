<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acudiente;
use App\Http\Requests\AcudienteStoreController;

class AcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Aquí va la vista';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acudientes.crearAcu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcudienteStoreController $request)
    {
      //Los datos al haber pasado por AcudienteStoreController ya están validados
      $unidad = new Acudiente(); //Creo el modelo de datos acudiente
      $unidad->pk_acudiente = $request->input('pk_acudiente');
      $unidad->nombre_acu_1 = $request->input('nombre_acu_1');
      $unidad->direccion_acu_1 = $request->input('direccion_acu_1');
      $unidad->telefono_acu_1 = $request->input('telefono_acu_1');
      $unidad->nombre_acu_2 = $request->input('nombre_acu_2');
      $unidad->direccion_acu_2 = $request->input('direccion_acu_2');
      $unidad->telefono_acu_2 = $request->input('telefono_acu_2');
      $unidad->save();
      return $request->validated(); /* Esto se puede quitar, es para que los de frontend sepan
      qué se está enviando a la BD en caso de que se haya validado y funcione esa info.
      */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valor = Acudiente::buscar($id);
        return $valor;
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
