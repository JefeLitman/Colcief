<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MateriaPC;
use App\Empleado;
use App\Materia;


/*
@Autora -> Paola Caicedo
 */


class MateriaPCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=session('user');
        $role=session('role');
        switch($role){
            case "administrador": 
                // Cuando es admin

                // Contenedor del resultado 
                $result=[];

                // Busco las tuplas de materia_pc creadas el actual año
                $materiaspc=MateriaPC::select('materia_pc.pk_materia_pc','empleado.nombre as nombreP','empleado.apellido','materia_pc.nombre','curso.nombre as curso')->where('materia_pc.created_at','like','%'.date('Y').'%');

                // Con esos valores realizo un join con empleado y curso
                $materiaspc=$materiaspc->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get();

                // Aqui extraigo las materias que tienen alguna tupla en materia_pc creadas en el actual año, y para que no se repita la materias las agrupo.
                $materias=MateriaPC::select('nombre')->where('created_at','like','%'.date('Y').'%')->groupBy('nombre')->get();
                
                // El array asosiativo $result, se declara y se declaran sus item como un array para poder 
                // ingresarles array's posteriormente. Es decir cada item del array asosiativo $result contendrá matrices.
                // Ejemplo de lo que sería $result={"Etica":[[1,"edward","caballero","8-2"],[2,"edward","caballero","8-2"]],"Software":[[3,"paola","caicedo","8-2"]]}
                foreach($materias as $j){
                    $result[$j->nombre]=[];
                }
                foreach ($materiaspc as $i){
                    foreach($materias as $j){
                        if($j->nombre==$i->nombre){
                            array_push($result[$j->nombre],[$i->pk_materia_pc,$i->nombreP,$i->apellido,$i->curso]);
                        }
                    }
                }
                return view('materiaspc.listaMateriasPC_admin',["result"=>$result]);
                break;
            case "director":
                // Cuando es director...  que pase a profesor(Por eso omito el break).
            case "profesor":
                // cuando es profesor
                break;
            case "estudiante":
                // cuando es estudiantes
                break;    
            default:
                // Cuando no encaja en ningun role
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
