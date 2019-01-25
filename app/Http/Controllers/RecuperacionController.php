<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recuperacion;

class RecuperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("/nivelaciones");
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
        $role=session('role');
        $user=session('user');
        switch ($role) {
            case "administrador":
                break;
            case "director":
            case "profesor":
                break;
            case "estudiante":
                $recuperacion=Recuperacion::select(
                    'recuperacion.*',
                    'periodo.nro_periodo',
                    'materia_pc.nombre as materia',
                    'empleado.cedula as pk_empleado',
                    'empleado.nombre',
                    'empleado.apellido',
                    'estudiante.pk_estudiante',
                    'estudiante.nombre as nombreE',
                    'estudiante.apellido as apellidoE',
                    'curso.prefijo',
                    'curso.sufijo',
                    'curso.ano'
                )
                ->join('nota_periodo','nota_periodo.pk_nota_periodo','=','recuperacion.fk_nota_periodo')
                ->join('periodo','periodo.pk_periodo','=','nota_periodo.fk_periodo')
                ->join('materia_boletin','materia_boletin.pk_materia_boletin','=','nota_periodo.fk_materia_boletin')
                ->join('materia_pc','materia_pc.pk_materia_pc','=','materia_boletin.fk_materia_pc')
                ->join('empleado','empleado.cedula','=','materia_pc.fk_empleado')
                ->join('boletin','boletin.pk_boletin','=','materia_boletin.fk_boletin')
                ->join('estudiante','estudiante.pk_estudiante','=','boletin.fk_estudiante')
                ->join('curso','curso.pk_curso','=','boletin.fk_curso')
                ->where([['estudiante.pk_estudiante',$user['pk_estudiante']],['recuperacion.pk_recuperacion',$id]])
                ->get();
                if (!empty($recuperacion[0])) {
                    return view("recuperaciones.verRecuperacion",['recuperacion'=>$recuperacion[0]]);
                }
                break;
            default:
        }
        return redirect("/nivelaciones");
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
