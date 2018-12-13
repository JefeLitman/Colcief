<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Nota;
use App\NotaEstudiante;
use App\NotaPeriodo;
use App\NotaDivision;
use App\MateriaBoletin;
use App\Division;
use App\Boletin;
use App\Periodo;
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
     * Funciones Publicas
     */

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
                $materiaspc=MateriaPC::select('materia_pc.pk_materia_pc','empleado.nombre as nombreP','empleado.apellido','materia_pc.nombre','curso.prefijo','curso.sufijo')->where('materia_pc.created_at','like','%'.date('Y').'%');

                // Con esos valores realizo un join con empleado y curso
                $materiaspc=$materiaspc->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get();

                // Aqui extraigo las materias que tienen alguna tupla en materia_pc creadas en el actual año, y para que no se repita la materias las agrupo.
                $materias=MateriaPC::select('nombre')->where('created_at','like','%'.date('Y').'%')->groupBy('nombre')->get();
                
                // El array asosiativo $result, se declara y se  declaran sus item como un array para poder 
                // ingresarles array's posteriormente. Es decir cada item del array asosiativo $result contendrá matrices.
                // Ejemplo de lo que sería $result={"Etica":[[1,"edward","caballero","8-2"],[2,"edward","caballero","8-2"]],"Software":[[3,"paola","caicedo","8-2"]]}
                foreach($materias as $j){
                    $result[$j->nombre]=[];
                }
                foreach ($materiaspc as $i){
                    foreach($materias as $j){
                        if($j->nombre==$i->nombre){
                            $prefijo=$i->prefijo;
                            if($prefijo=="0"){
                                $prefijo="Prescolar";
                            }
                            array_push($result[$j->nombre],[$i->pk_materia_pc,$i->nombreP,$i->apellido,$prefijo."-".$i->sufijo]);
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
                $materiaspc=MateriaPC::select('materia_pc.pk_materia_pc','materia_pc.nombre','curso.prefijo','curso.sufijo')->where([['materia_pc.created_at','like','%'.date('Y').'%'],['materia_pc.fk_empleado','=',$user["cedula"]]]);

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
                            $prefijo=$i->prefijo;
                            if($prefijo=="0"){
                                $prefijo="Prescolar";
                            }
                            array_push($result[$j->nombre],[$i->pk_materia_pc,$prefijo."-".$i->sufijo]);
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
            $cursos=Curso::select("pk_curso","prefijo","sufijo")->get();
            foreach ($cursos as $key=>$i) {
                $prefijo=($i->prefijo==0)?"Prescolar":$i->prefijo;
                $cursos[$key]->nombre=$prefijo."-".$i->sufijo;
            }
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
        $materiapc = MateriaPC::select("materia_pc.pk_materia_pc","materia_pc.nombre as materia","materia_pc.fk_curso","curso.prefijo","curso.sufijo","materia_pc.fk_materia","materia_pc.logros_custom","materia_pc.salon","materia_pc.fk_empleado","empleado.nombre","empleado.apellido")->where('materia_pc.pk_materia_pc','=',$id)->join('empleado','empleado.cedula','=','materia_pc.fk_empleado')->join('curso','curso.pk_curso','=','materia_pc.fk_curso')->get();
        
        if(empty($materiapc[0])){
            return "No se ha encontrado la materia.";
        }else{
            $prefijo=($materiapc[0]->prefijo==0)?"Prescolar":$materiapc[0]->prefijo;
            $materiapc[0]->curso=$prefijo."-".$materiapc[0]->sufijo;
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
        $user=session('user');
        $role=session('role');
        switch($role){
            case "administrador":
                //Caso administrador
                /**
                 * El administrador puede modificar todo a excepcion de la fecha de creacion, fechas de edicion (O no directamente), 
                 * y los logros custom tampoco los puede modificar. 
                 * Puede modificar todos miestras hayan creados el mismo año. Esto con el fin de proteger la integridad de los datos.
                 * Valores que puede modificar: Salon, Materia, Profesor, Curso, Salon
                 */
                $materias=Materia::select("pk_materia","nombre","logros_custom")->get();
                $cursos=Curso::select('pk_curso','prefijo',"sufijo")->get();
                foreach ($cursos as $key=>$i) {
                    $prefijo=($i->prefijo==0)?"Prescolar":$i->prefijo;
                    $cursos[$key]->nombre=$prefijo."-".$i->sufijo;
                }
                $profesores=Empleado::select("cedula","nombre","apellido")->where("estado","=",true)->where(function ($query) {$query->where('role', '=', '1')->orWhere('role', '=', '2');})->get();
                $materiapc = MateriaPC::select('pk_materia_pc','fk_materia','fk_empleado','fk_curso','salon','logros_custom')->where([['materia_pc.created_at','like','%'.date('Y').'%'],['pk_materia_pc','=',$id]])->get();
                if(empty($materiapc[0])){
                    return "Esta materia no existe o no se permite modificarla";
                }else{
                    return view('materiaspc.editarMateriaPC_admin',['materias'=>$materias,'cursos'=>$cursos,'profesores'=>$profesores,'materiapc'=>$materiapc[0]]);
                }
                
                break;
            case "director":
                //Caso director
                /**
                 * El director solo puede modificar las materias_pc que estan a su cargo y del presente año.
                 * Por lo que se comporta como profesor.(Por eso la omision del break)
                 */
            case "profesor":
                //Caso profesor
                /**
                 * El profesor unicamente puede modificar el logros_custom de las materias acargo de el, 
                 * el año presente.
                 */
                $materiapc = MateriaPC::select("materia_pc.fk_empleado","empleado.nombre","empleado.apellido",'materia_pc.pk_materia_pc','materia_pc.nombre as materia','materia_pc.fk_curso','materia_pc.salon','materia_pc.logros_custom',"curso.prefijo","curso.sufijo");
                $materiapc = $materiapc->where([ ['materia_pc.created_at','like','%'.date('Y').'%'] , ['materia_pc.pk_materia_pc','=',$id] , ['materia_pc.fk_empleado','=',$user['cedula']] ]);
                $materiapc = $materiapc->join('curso','materia_pc.fk_curso',"=","curso.pk_curso");
                $materiapc = $materiapc->join('empleado','materia_pc.fk_empleado',"=","empleado.cedula")->get();
                if(empty($materiapc[0])){
                    return "Esta materia no existe o no se permite modificarla";
                }else{
                    $prefijo=($materiapc[0]->prefijo==0)?"Prescolar":$materiapc[0]->prefijo;
                    $materiapc[0]->curso=$prefijo."-".$materiapc[0]->sufijo;
                    return view('materiaspc.editarMateriaPC_profesor',['materiapc'=>$materiapc[0]]);
                }
                break;

            default:
                //Aqui entras los estudiantes y los que no han logeado.
                return "Rol no valido.";
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaPCUpdateController $request, $id)
    {
        $user=session('user');
        $role=session('role');
        switch($role){
            case "administrador":
                //Caso administrador
                /**
                 * El administrador puede modificar todo a excepcion de la fecha de creacion, fechas de edicion (O no directamente), 
                 * y los logros custom tampoco los puede modificar. 
                 * Puede modificar todos miestras hayan creados el mismo año. Esto con el fin de proteger la integridad de los datos.
                 * Valores que puede modificar: Salon, Materia, Profesor, Curso, Salon
                 */
                $materiapc=MateriaPC::where("pk_materia_pc","=",$id)->get();
                if(empty($materiapc[0])){
                    return "Esta materia no existe.";
                }else{
                    $materiapc=$materiapc[0];
                    if( $request->salon != "" and $request->fk_curso!="" and $request->fk_empleado!="" and $request->fk_materia!="" ){
                        $materiapc->salon=$request->salon;
                        $materiapc->fk_curso=$request->fk_curso;
                        $materiapc->fk_empleado=$request->fk_empleado;
                        if($materiapc->fk_materia != $request->fk_materia){
                            $materiapc->fk_materia=$request->fk_materia;
                            $m=Materia::select("nombre")->where("pk_materia","=",$request->fk_materia)->get()[0];
                            $materiapc->nombre=$m->nombre;
                        }
                        $materiapc->save();
                        return redirect("/materiaspc/$id");
                    }else{
                        return "Alguno de los valores se envia como nulo.";
                    }
                }
                break;
            case "director":
                //Caso director
                /**
                 * El director solo puede modificar las materias_pc que estan a su cargo y del presente año.
                 * Por lo que se comporta como profesor.(Por eso la omision del break)
                 */
            case "profesor":
                //Caso profesor
                /**
                 * El profesor unicamente puede modificar el logros_custom de las materias acargo de el, 
                 * el año presente.
                 */
                $materiapc=MateriaPC::where([["pk_materia_pc","=",$id],["fk_empleado","=",$user["cedula"]]])->get();
                if(empty($materiapc[0])){
                    return "Esta materia no existe o no tienes permisos para modificarla.";
                }else{
                    $materiapc=$materiapc[0];
                    if($materiapc->logros_custom != $request->logros_custom){
                        $materiapc->logros_custom=$request->logros_custom;
                        $materiapc->save();
                        return redirect("/materiaspc/$id");
                    }else{
                        return "No hay ningun cambio para guardar.";
                    }
                }
                break;

            default:
                //Aqui entran los estudiantes y los que no han logeado.
                return "Rol no valido.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(session('role')=="administrador"){
            // Solo el administrador puede eliminar una MateriaPC
            $materiapc = MateriaPC::where("pk_materia_pc","=",$id)->get();
            if(empty($materiapc[0])){
                return response()->json([
                    'mensaje' => 'Esta materia no existe.'
                ]);
            }else{
                $materiapc[0]->delete();
                return response()->json([
                    'mensaje' => 'La materia fue eliminada.'
                ]);
            }
        }
        return response()->json([
            'mensaje' => 'No tienes los permmisos necesarios.'
        ]);
    }

    public function showPlanillasCurso($pk_curso,$pk_materia_pc){
        $curso=Curso::findOrFail($pk_curso);
        $materia_pc=MateriaPC::findOrFail($pk_materia_pc);
        if ($materia_pc->fk_curso == $curso->pk_curso) {
            $periodos=Periodo::where('ano',date('Y'))->get();
            $divisiones=Division::where('ano',date('Y'))->get();
            $ns=Nota::where('fk_materia_pc',$pk_materia_pc)->get();
            $notas=[];
            foreach ($periodos as $p) {
                $notas[$p->pk_periodo]=[];
                foreach ($divisiones as $d) {
                    $notas[$p->pk_periodo][$d->pk_division]=[];
                }
            }
            foreach ($ns as $n) {
                array_push($notas[$n->fk_periodo][$n->fk_division],$n);
            }
            $estudiantes=MateriaBoletin::where('materia_boletin.fk_materia_pc',$pk_materia_pc)->join('boletin','boletin.pk_boletin','materia_boletin.fk_boletin')->join('estudiante','estudiante.pk_estudiante','boletin.fk_estudiante')->get();
            $notaE=[];
            $notaDiv=[];
            $notaPer=[];
            foreach ($estudiantes as $e) {
                $notaE[$e->pk_estudiante]=[];
                $notaDiv[$e->pk_estudiante]=[];
                $notaPer[$e->pk_estudiante]=[];
                foreach ($periodos as $p) {
                    $notaE[$e->pk_estudiante][$p->pk_periodo]=[];
                    $notaDiv[$e->pk_estudiante][$p->pk_periodo]=[];
                    $notaPer[$e->pk_estudiante][$p->pk_periodo]=null;
                    $notap=NotaPeriodo::where([['fk_materia_boletin',$e->pk_materia_boletin],['fk_periodo',$p->pk_periodo]])->get();
                    if(!empty($notap[0])){
                        $notaPer[$e->pk_estudiante][$p->pk_periodo]=$notap[0];
                        foreach ($divisiones as $d) {
                            $notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]=[];
                            $notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]=null;
                            $notad=NotaDivision::where([['fk_nota_periodo',$notaPer[$e->pk_estudiante][$p->pk_periodo]->pk_nota_periodo],['fk_division',$d->pk_division]])->get();
                            if(!empty($notad[0])){
                                $notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]=$notad[0];
                                foreach ($notas[$p->pk_periodo][$d->pk_division] as  $n) {
                                    $notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]=null;
                                    $nts=NotaEstudiante::where([['fk_nota_division',$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->pk_nota_division],['fk_nota',$n->pk_nota]])->get();
                                    if(!empty($notad[0])){
                                        $notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]=$nts[0];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return view('cursos.showPlanillaCurso',['materiapc'=>$materia_pc,'curso'=>$curso,'periodos'=>$periodos,'divisiones'=>$divisiones,'notas'=>$notas,'notaE'=>$notaE,'notaDiv'=>$notaDiv,'notaPer'=>$notaPer,'estudiantes'=>$estudiantes]);
        }
        return "Error: Esa materia no corresponde a ese curso.";
    }
}
