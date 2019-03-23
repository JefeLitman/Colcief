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

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $user=session('user');
        $role=session('role');
        $url="";

        // Contenedor del resultado
        $result=[];

        #dd($user);
        switch($role){
            case "administrador":
                // Cuando es admin

                // Busco las tuplas de materia_pc creadas el actual año
                $materiaspc=MateriaPC::select('materia_pc.pk_materia_pc','empleado.nombre as nombreP','empleado.apellido','materia_pc.fk_materia','materia_pc.nombre','curso.prefijo','curso.sufijo')->where('materia_pc.created_at','like','%'.date('Y').'%');

                // Con esos valores realizo un join con empleado y curso
                $materiaspc=$materiaspc->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get();

                // Aqui extraigo las materias creadas en el actual año.
                $materias=Materia::where('created_at','like','%'.date('Y').'%')->get();
                // El array asosiativo $result, se declara y se  declaran sus item como un array para poder
                // ingresarles array's posteriormente. Es decir cada item del array asosiativo $result contendrá matrices.
                // Ejemplo de lo que sería $result={"fk_materia":[[1,"edward","caballero","8-2"],[2,"edward","caballero","8-2"]],"fk_materia":[[3,"paola","caicedo","8-2"]]}
                foreach($materias as $j){
                    $result[$j->pk_materia]=[];
                }
                foreach ($materiaspc as $i){
                    $prefijo=$i->prefijo;
                    if($prefijo=="0"){
                        $prefijo="Prescolar";
                    }
                    array_push($result[$i->fk_materia],[$i->pk_materia_pc,$i->nombreP,$i->apellido,$prefijo."-".$i->sufijo]);
                }
                return view('materiaspc.listaMateriasPC_admin',['result'=>$result,'materias'=>$materias]);
                break;
            case "director":
                // Cuando es director...  que pase a profesor(Por eso omito el break).
            case "profesor":
                $empleado=Empleado::select("tiempo_extra")->where("cedula",$user["cedula"])->get();
                // cuando es profesor
                $periodos=Periodo::where('ano',date('Y'))->get();
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
                $tiempo_extra=0;
                if(!empty($empleado[0])){
                    $tiempo_extra=$empleado[0]->tiempo_extra;
                }
                return view('materiaspc.listaMateriasPC_profesor',["result"=>$result,'periodos'=>$periodos,'tiempo_extra'=>$tiempo_extra]);
                break;
            case "estudiante":
                // Cuando es estudiantes
                $materias=MateriaPC::join('materia_boletin','materia_boletin.fk_materia_pc','=','materia_pc.pk_materia_pc')->join('boletin','boletin.pk_boletin','=','materia_boletin.fk_boletin');
                $materias=$materias->where('boletin.fk_estudiante',$user['pk_estudiante'])->get();
                $periodos=Periodo::where('ano',date('Y'))->get();
                return view('materiaspc.listaMateriasPC_estudiante',["materias"=>$materias,'periodos'=>$periodos]);
                break;
        }
        return view($url,["result"=>$result]);
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
            $cursos=Curso::select("pk_curso","prefijo","sufijo")->orderByRaw('CAST(prefijo AS unsigned), CAST(sufijo AS unsigned)')->get();
            foreach ($cursos as $key=>$i) {
                $prefijo=($i->prefijo==0)?"Prescolar":$i->prefijo;
                $cursos[$key]->nombre=$prefijo."-".$i->sufijo;
            }
            $profesores=Empleado::select("cedula","nombre","apellido")->where("estado","=",true)->where(function ($query) {$query->where('role', '=', '1')->orWhere('role', '=', '2');})->orderBy('apellido')->get();
            return view("materiaspc.crearMateriaPC",["materias"=>$materias,"cursos"=>$cursos,"profesores"=>$profesores]);
        }
        return redirect("/materiaspc");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaPCStoreController $request)
    {
        if(session('role')=="administrador"){

            // Buscando la respectiva materia
            $materia = Materia::select("nombre","logros_custom")->where("pk_materia","=",$request->fk_materia)->get();

            $request->nombre = $materia[0]['nombre'];
            $request->logros_custom = $materia[0]['logros_custom'];
            
            $materiapc = MateriaPC::create($request->all());

            // Asignando los valores que por defecto deben ser iguales que en la tabla materia.
            // $materiapc->nombre = $materia[0]['nombre'];
            // $materiapc->logros_custom = $materia[0]['logros_custom'];
            
            try{
                $materiapc->save();
                $materiapc->crearEstructuraNotas();
                // return "Ha sido guardado con exito";
                return redirect("/materiaspc/".$materia->pk_materia_pc);
            }catch(Exception $e){
                return "Ha ocurido un error con el servidor, vuelva a intentarlo.";
            }
        }
        return redirect("/materiaspc");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user=session('user');
        $role=session('role');
        if (!empty($role)) {
            $materiapc = MateriaPC::select("materia_pc.pk_materia_pc","materia_pc.nombre as materia","materia_pc.fk_curso","curso.prefijo","curso.sufijo","materia_pc.fk_materia","materia_pc.logros_custom","materia_pc.salon","materia_pc.fk_empleado","empleado.nombre","empleado.apellido")->where('materia_pc.pk_materia_pc','=',$id)->join('empleado','empleado.cedula','=','materia_pc.fk_empleado')->join('curso','curso.pk_curso','=','materia_pc.fk_curso')->get();

            if(empty($materiapc[0])){
                return redirect("/materiaspc");
            }else{
                $prefijo=($materiapc[0]->prefijo==0)?"Prescolar":$materiapc[0]->prefijo;
                $materiapc[0]->curso=$prefijo."-".$materiapc[0]->sufijo;
                return view("materiaspc.verMateriaPC",["materiapc"=>$materiapc[0]]);
            }
        }
        return redirect("/login");
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
                    // Esta materia no existe o no se permite modificarla
                    return view('materiaspc.alertas.noexistem');
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
                    // Esta materia no existe o no se permite modificarla
                    return view('materiaspc.alertas.noexistem');
                }else{
                    $prefijo=($materiapc[0]->prefijo==0)?"Prescolar":$materiapc[0]->prefijo;
                    $materiapc[0]->curso=$prefijo."-".$materiapc[0]->sufijo;
                    return view('materiaspc.editarMateriaPC_profesor',['materiapc'=>$materiapc[0]]);
                }
                break;
        }
        return redirect('/login');
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
                    // Esta materia no existe.
                    return view('materiaspc.alertas.noexiste');
                }else{
                    $materiapc=$materiapc[0];
                    if( $request->salon != "" and $request->fk_curso!="" and $request->fk_empleado!="" and $request->fk_materia!="" ){
                        $materiapc->salon=$request->salon;
                        $bandera=false;
                        if($materiapc->fk_curso!=$request->fk_curso){
                            $materiapc->fk_curso=$request->fk_curso;
                            $bandera=true;
                        }
                        $materiapc->fk_empleado=$request->fk_empleado;
                        if($materiapc->fk_materia != $request->fk_materia){
                            $materiapc->fk_materia=$request->fk_materia;
                            $m=Materia::select("nombre")->where("pk_materia","=",$request->fk_materia)->get()[0];
                            $materiapc->nombre=$m->nombre;
                        }
                        $materiapc->save();
                        if ($bandera) {
                            $materiapc->modificarCurso();
                        }
                        return redirect("/materiaspc/$id");
                    }else{
                        //Alguno de los valores se envia como nulo.
                        return view('materiaspc.alertas.valorenulo');
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
                   // Esta materia no existe o no se permite modificarla
                   return view('materiaspc.alertas.noexistem');
                }else{
                    $materiapc=$materiapc[0];
                    if($materiapc->logros_custom != $request->logros_custom){
                        $materiapc->logros_custom=$request->logros_custom;
                        $materiapc->save();
                    }
                    return redirect("/materiaspc/$id");
                }
                break;

            default:
                //Aqui entran los estudiantes y los que no han logeado.
                // Rol no valido
                return redirect('/materiaspc');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        if($request->ajax()){
            if(session('role')=="administrador"){
                // Solo el administrador puede eliminar una MateriaPC
                $materiapc = MateriaPC::where("pk_materia_pc","=",$id)->get();
                if(empty($materiapc[0])){
                    return response()->json([
                        'mensaje' => 'Este profesor no esta asignado a ninguna materia.'
                    ]);
                }
                $docente=Empleado::select('nombre','apellido')->where("cedula",$materiapc[0]->fk_empleado)->get()[0];
                $curso=Curso::select('prefijo','sufijo')->where("pk_curso",$materiapc[0]->fk_curso)->get()[0];
                $materia=$materiapc[0]->nombre;
                $curso=($curso->prefijo=='0')?'Preescolar-'.$curso->sufijo:$curso->prefijo.'-'.$curso->sufijo;
                $materiapc[0]->delete();
                return response()->json([
                    'mensaje' => ucwords($docente->nombre).' '.ucwords($docente->apellido).' ya no dicta '.$materia.' al curso '.$curso.'.'
                ]);
            }
            return response()->json([
                'mensaje' => 'No tienes los permisos necesarios.'
            ]);
        }
    }

    private function planillas($pk_materia_pc, $pk_periodo){
        $materia_pc=MateriaPC::select('materia_pc.*','materia_pc.nombre as materia','curso.*','empleado.*')->where('pk_materia_pc',$pk_materia_pc)->join('curso','curso.pk_curso','=','materia_pc.fk_curso')->join('empleado','empleado.cedula','=','materia_pc.fk_empleado')->get()[0];
        $p=Periodo::where([['ano',date('Y')],['pk_periodo',$pk_periodo]])->get();
        $periodos=Periodo::where('ano',date('Y'))->get();
        $divisiones=Division::where('ano',date('Y'))->get();
        $ns=Nota::where([['fk_materia_pc',$pk_materia_pc],['fk_periodo',$pk_periodo]])->get();
        $notas=[];
        if(!empty($p[0])){
            $p=$p[0];
            $notas[$p->pk_periodo]=[];
            foreach ($divisiones as $d) {
                $notas[$p->pk_periodo][$d->pk_division]=[];
            }
            // dd($notas);
            foreach ($ns as $n) {
                array_push($notas[$n->fk_periodo][$n->fk_division],$n);
            }
            if (session('role')=='estudiante') {
                //Si es un estudiante que solo muestre a el mismo 
                $estudiantes=MateriaBoletin::where([['materia_boletin.fk_materia_pc',$pk_materia_pc],['estudiante.pk_estudiante',session('user')['pk_estudiante']]])->join('boletin','boletin.pk_boletin','materia_boletin.fk_boletin')->join('estudiante','estudiante.pk_estudiante','boletin.fk_estudiante')->get();
            } else {
                //Muestra a todos los estudiantes
                $estudiantes=MateriaBoletin::where('materia_boletin.fk_materia_pc',$pk_materia_pc)->join('boletin','boletin.pk_boletin','materia_boletin.fk_boletin')->join('estudiante','estudiante.pk_estudiante','boletin.fk_estudiante')->groupBy('estudiante.apellido')->get();
            }
            $notaE=[];
            $notaDiv=[];
            $notaPer=[];
            foreach ($estudiantes as $e) {
                $notaE[$e->pk_estudiante]=[];
                $notaDiv[$e->pk_estudiante]=[];
                $notaPer[$e->pk_estudiante]=[];
                $notaE[$e->pk_estudiante][$p->pk_periodo]=[];
                $notaDiv[$e->pk_estudiante][$p->pk_periodo]=[];
                $notaPer[$e->pk_estudiante][$p->pk_periodo]=null;
                foreach ($periodos as $z) {
                    $notap=NotaPeriodo::leftjoin('recuperacion','recuperacion.fk_nota_periodo','=','nota_periodo.pk_nota_periodo')
                    ->where([['fk_materia_boletin',$e->pk_materia_boletin],['fk_periodo',$z->pk_periodo]])->get();
                    if(!empty($notap[0])){
                        $notaPer[$e->pk_estudiante][$z->pk_periodo]=$notap[0];
                    }
                }
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
        return ['materiapc'=>$materia_pc,'p'=>$p,'periodos'=>$periodos,'divisiones'=>$divisiones,'notas'=>$notas,'notaE'=>$notaE,'notaDiv'=>$notaDiv,'notaPer'=>$notaPer,'estudiantes'=>$estudiantes];
    }

    public function showPlanillas($pk_materia_pc,$pk_periodo){
        $role=session('role');
        switch ($role) { 
            case "administrador":
                return view('cursos.showPlanillaCurso',$this->planillas($pk_materia_pc,$pk_periodo));
                break;
            case "director":
            case "profesor":
                $result=$this->planillas($pk_materia_pc,$pk_periodo);
                if (session('user')['cedula']==$result['materiapc']->fk_empleado) {
                    return view('cursos.showPlanillaCurso',$result);
                }
                break;
            case "estudiante":
                $result=$this->planillas($pk_materia_pc,$pk_periodo);    
                if (count($result['estudiantes'])!=0) {
                    return view('cursos.showPlanillaCurso',$result);
                }
                break;
        }
        return redirect("/materiaspc");
    }

    public function editarPlanillas($pk_materia_pc,$pk_periodo){
        $role=session('role');
        if ($role=="profesor" or $role=="director") {
            
            $result=$this->planillas($pk_materia_pc,$pk_periodo);
            $fecha = date('Y-m-d', strtotime($result['p']->fecha_limite." + ".$result["materiapc"]->tiempo_extra." days"));
            if(strtotime(date('d-m-Y'))>=strtotime($result['p']->fecha_inicio) and strtotime(date('d-m-Y'))<=strtotime($fecha)){
                if (session('user')['cedula']==$result['materiapc']->fk_empleado) {
                    return view('cursos.editPlanillaCurso',$result);
                } 
            }
        }
        return redirect("/planillas/$pk_materia_pc/periodos/$pk_periodo");
        
    }

}
