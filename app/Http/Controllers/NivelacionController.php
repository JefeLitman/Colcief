<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nivelacion;
use App\Recuperacion;
use App\Boletin;
class NivelacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=session('role');
        switch($role){
            case "administrador":
                
                break;
            case "director":
            case "profesor":
                
                break;
            case "estudiante":
                $periodos=Periodo::where('ano',date('Y'))->get();
                foreach ($periodos as $p) {
                    $recuperacion=Recuperacion::join('nota_periodo','nota_periodo.pk_nota_periodo','=','recuperacion.fk_nota_periodo')->join('materia_boletin.');
                }
                return view('nivelaciones.listaNivelaciones_estudiante');
                break;
            default:
                //Aqui entras los que no han logeado.
                // Rol no valido.
                return view('materiaspc.alertas.rolnovalido');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
