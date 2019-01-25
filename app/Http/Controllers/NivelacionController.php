<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nivelacion;
use App\Recuperacion;
use App\Boletin;
use App\Periodo;
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
        $user=session('user');
        switch($role){
            case "administrador":
                
                break;
            case "director":
            case "profesor":
                
                break;
            case "estudiante":
                $periodos=Periodo::where('ano',date('Y'))->get();
                $recuperacion=[];
                foreach ($periodos as $p) {
                    $recuperacion[$p->pk_periodo]=Recuperacion::select(
                        'recuperacion.pk_recuperacion',
                        'materia_pc.nombre as materia',
                        'recuperacion.nota',
                        'empleado.nombre',
                        'empleado.apellido'
                    )
                    ->join('nota_periodo','nota_periodo.pk_nota_periodo','=','recuperacion.fk_nota_periodo')
                    ->join('periodo','periodo.pk_periodo','=','nota_periodo.fk_periodo')
                    ->join('materia_boletin','materia_boletin.pk_materia_boletin','=','nota_periodo.fk_materia_boletin')
                    ->join('materia_pc','materia_pc.pk_materia_pc','=','materia_boletin.fk_materia_pc')
                    ->join('empleado','empleado.cedula','=','materia_pc.fk_empleado')
                    ->join('boletin','boletin.pk_boletin','=','materia_boletin.fk_boletin')
                    ->where([['boletin.fk_estudiante',$user['pk_estudiante']],['periodo.pk_periodo',$p->pk_periodo]])->get();
                }
                $nivelacion=Nivelacion::select(
                    'nivelacion.pk_nivelacion',
                    'nivelacion.nota',
                    'materia_pc.nombre as materia',
                    'empleado.nombre',
                    'empleado.apellido',
                    'curso.prefijo',
                    'curso.sufijo'
                )
                ->join('materia_boletin','materia_boletin.pk_materia_boletin','=','nivelacion.fk_materia_boletin')
                ->join('materia_pc','materia_pc.pk_materia_pc','=','materia_boletin.fk_materia_pc')
                ->join('boletin','boletin.pk_boletin','=','materia_boletin.fk_boletin')
                ->join('curso','curso.pk_curso','=','boletin.fk_curso')
                ->join('empleado','empleado.cedula','=','nivelacion.fk_empleado')
                ->where('boletin.fk_estudiante',$user['pk_estudiante'])
                ->get();
                return view('nivelaciones.listaNivelaciones_estudiante',["periodos"=>$periodos,"recuperacion"=>$recuperacion,"nivelacion"=>$nivelacion]);
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
        $nivelacion=Nivelacion::select(
            'nivelacion.*',
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
        ->join('materia_boletin','materia_boletin.pk_materia_boletin','=','nivelacion.fk_materia_boletin')
        ->join('materia_pc','materia_pc.pk_materia_pc','=','materia_boletin.fk_materia_pc')
        ->join('empleado','empleado.cedula','=','nivelacion.fk_empleado')
        ->join('boletin','boletin.pk_boletin','=','materia_boletin.fk_boletin')
        ->join('estudiante','estudiante.pk_estudiante','=','boletin.fk_estudiante')
        ->join('curso','curso.pk_curso','=','boletin.fk_curso')
        ->where('nivelacion.pk_nivelacion',$id);

        $role=session('role');
        $user=session('user');
        switch ($role) {
            case "administrador":
                $nivelacion=$nivelacion->get();
                break;
            case "director":
            case "profesor":
                $nivelacion=$nivelacion->where('empleado.cedula',$user['cedula'])->get();
                break;
            case "estudiante":
                $nivelacion=$nivelacion->where('estudiante.pk_estudiante',$user['pk_estudiante'])->get();
                break;
            default:
        }
        if (!empty($nivelacion[0])) {
            return view("nivelaciones.verNivelacion",['nivelacion'=>$nivelacion[0]]);
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
