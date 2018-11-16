<?php

namespace App\Http\Controllers;

use App\Horario;
use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\SupraController as SC;
use App\MateriaPC;
use App\Empleado;
use App\Curso;

class HorarioController extends Controller {
    
    public function index(){
        switch(session('role')){
            case 'administrador':
                $materias = Materia::all();
                return view('horarios.listaHorarios', ['materias' => $materias]);
                break;
            case 'estudiante':
                $horarios = Horario::select('horario.*')->join('materia_pc', 'materia_pc.pk_materia_pc','=','horario.fk_materia_pc')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->join('estudiante','estudiante.fk_curso','=','curso.pk_curso')->orderBy('hora_inicio')->get();
                foreach($horarios as $j){
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
                foreach($horarios as $horario){
                    $temp = explode(':',$horario->hora_inicio);
                    $hora[intval($temp[0])] = 1;
                }
                dd($horarios);
                break;

        }
        
    }

    public function materias($pk_materia){
        $materia_pc = MateriaPC::select('*','materia_pc.nombre as materia_nombre')->where('fk_materia',$pk_materia)->join('empleado', 'materia_pc.fk_empleado','=','empleado.cedula')->join('curso', 'materia_pc.fk_curso','=','curso.pk_curso')->get();
        $horarios = [];
        foreach($materia_pc as $m){
            array_push($horarios,Horario::where('fk_materia_pc',$m->pk_materia_pc)->get());
        }
        return view('horarios.listaMateriaPCs', ['materiaPCs' => $materia_pc, 'pk_materia' => $pk_materia, 'horarios' => $horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pk_materiaPC=null)
    {        
        // Verifico que en la URL venga la $pk_materiaPC para saber a que materiaPC le creare los horarios
        if (!empty($pk_materiaPC)) {
            // 
            $materiaPC = MateriaPC::find($pk_materiaPC);
            $empleado = Empleado::find($materiaPC->fk_empleado);
            $curso = Curso::find($materiaPC->fk_curso);
            return view('horarios.crearHorario', compact('materiaPC', 'empleado', 'curso'));
        }
        return 'debe especificar la materia';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($i=0;$i<count($request->dia);$i++){
            $horario = new Horario();
            $horario -> fk_materia_pc = $request->fk_materia_pc[$i];
            $horario -> dia = $request->dia[$i];
            $horario -> hora_inicio = $request->hora_inicio[$i];
            $horario -> hora_fin = $request->hora_fin[$i];
            $horario->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($pk_nota)
    // {
    //     $unidad = Nota::find($pk_nota);
    //     if (!empty($unidad)) {
    //       $datos = [$this->arrayzar($unidad)];
    //       return view('notas.verNota',['datos' => $datos]);
    //     }
    //     return 'Nota no encontrada';
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pk_horario)
    {
        $horario = Horario::find($pk_horario);
        return 'Formulario para editar ' .$horario->pk_horario. ' - ' .$horario->dia;
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
