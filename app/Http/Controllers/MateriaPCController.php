<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MateriaPC;
use App\Empleado;
use App\Materia;
use App\Curso;

use App\Http\Requests\MateriaPCStoreController;
use App\Http\Requests\MateriaPCUpdateController;

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
        $url="";    

        #dd($user);
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
                $url='materiaspc.listaMateriasPC_admin';
                break;
            case "director":
                // Cuando es director...  que pase a profesor(Por eso omito el break).
            case "profesor":
                // cuando es profesor
                $result=[];
                
                $materiaspc = null;
                // Busco las tuplas de materia_pc creadas el actual año, y ademas solo las que pertenescan al profesor logeado
                $materiaspc=MateriaPC::select('materia_pc.pk_materia_pc','materia_pc.nombre','curso.nombre as curso')->where([['materia_pc.created_at','like','%'.date('Y').'%'],['materia_pc.fk_empleado','=',$user["cedula"]]]);

                // Con esos valores realizo un join con empleado y curso
                $materiaspc=$materiaspc->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get();

                // Aqui extraigo las materias que tienen alguna tupla en materia_pc creadas en el actual año, y que el dicta para que no se repita la materias las agrupo.
                $materias=MateriaPC::select('nombre')->where([['materia_pc.created_at','like','%'.date('Y').'%'],['materia_pc.fk_empleado','=',$user["cedula"]]])->groupBy('nombre')->get();
                
                // El array asosiativo $result, se declara y se declaran sus item como un array para poder 
                // ingresarles array's posteriormente. Es decir cada item del array asosiativo $result contendrá matrices.
                // Ejemplo de lo que sería $result={"Etica":[[1,"8-2"],[2,"8-2"]],"Software":[[3,"8-2"]]}
                foreach($materias as $j){
                    $result[$j->nombre]=[];
                }
                foreach ($materiaspc as $i){
                    foreach($materias as $j){
                        if($j->nombre==$i->nombre){
                            array_push($result[$j->nombre],[$i->pk_materia_pc,$i->curso]);
                        }
                    }
                }
                $url='materiaspc.listaMateriasPC_profesor';
                break;
            case "estudiante":
                // Cuando es estudiantes
                //Para los estudiantes esta la llamada materia_boletin.
                //La tabla solo puede ser modificada por los empleados. 
                //Y puede ser vista desde los estudiantes, a traves de materia_boletin.
                return "Los estudiantes no tienen acceso a esta sección (MateriaPCController@Index)."; 
                break;    
            default:
                // Cuando no encaja en ningun role
                return "Su role no es valido";
        }
        if(count($result)==0){
            return "Este usuario no tiene Materias_PC a su cargo o no hay instancias en Materia_PC"; 
            //Sujeto a cambios.
        }else{ 
            return view($url,["result"=>$result]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('role')=="administrador"){
            $materias=Materia::select("pk_materia","nombre","logros_custom")->get();
            $cursos=Curso::select("pk_curso","nombre")->get();
            $profesores=Empleado::select("cedula","nombre","apellido")->where("estado","=",true)->where(function ($query) {$query->where('role', '=', '1')->orWhere('role', '=', '2');})->get();
            return view("materiaspc.crearMateriaPC",["materias"=>$materias,"cursos"=>$cursos,"profesores"=>$profesores]);
        }else{
            return "Solo los administradores pueden crear este tipo de instancias.";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaPCStoreController $request)
    {
        $materiapc = (new MateriaPC)->fill($request->all());

        // Buscando la respectiva materia
        $materia = Materia::select("nombre","logros_custom")->where("pk_materia","=",$materiapc->fk_materia)->get();
        
        // Asignando los valores que por defecto deben ser iguales que en la tabla materia.
        $materiapc->nombre = $materia[0]['nombre'];
        $materiapc->logros_custom = $materia[0]['logros_custom'];
        try{
            $materiapc->save();
            return "Ha sido guardado con exito";
        }catch(Exception $e){
            return "Ha ocurido un error con el servidor, vuelva a intentarlo.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiapc = MateriaPC::select("materia_pc.pk_materia_pc","materia_pc.nombre as materia","materia_pc.fk_curso","curso.nombre as curso","materia_pc.fk_materia","materia_pc.logros_custom","materia_pc.salon","materia_pc.fk_empleado","empleado.nombre","empleado.apellido")->where('materia_pc.pk_materia_pc','=',$id)->join('empleado','empleado.cedula','=','materia_pc.fk_empleado')->join('curso','curso.pk_curso','=','materia_pc.fk_curso')->get();
        if(empty($materiapc[0])){
            return "No se ha encontrado la materia.";
        }else{
            return view("materiaspc.verMateriaPC",["materiapc"=>$materiapc[0]]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $materiapc = MateriaPC::findOrFail($id);
        
        return $materiapc;
        //return view('materias.editarMateria', compact('materia'));
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
