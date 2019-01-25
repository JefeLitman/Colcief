<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SupraController as SC;
use App\Http\Requests\NotaStoreController;
use App\Nota;
use App\Division;
use App\MateriaPC;
use App\Curso;
use App\Periodo;

class NotaController extends Controller
{

    public function __construct()
    {
      $this->middleware('admin:director,profesor,administrador,estudiante')->only('index');
      $this->middleware('admin:director,profesor,administrador')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pk_materia_pc,$pk_periodo)
    {
      $infoAdicional = MateriaPC::find($pk_materia_pc);
      switch (session('role')) {
        case 'estudiante':
          if (!(session('user')['fk_curso']==$infoAdicional['fk_curso'])) {
            return '¿Qué estás intentando?';
          }
          break;
        default:
          if (!$this->verificarProfesor($pk_materia_pc,session('user')['cedula'])) {
            return 'Este curso no le pertenece.';
          }
          break;
      }
      $NotasMateriaPC = Nota::where([
        ['fk_periodo','=',$pk_periodo],
        ['fk_materia_pc','=',$pk_materia_pc]
      ])->get();
      $Notas = [];
      foreach ($NotasMateriaPC as $Nota) {
        $nombreDiv = Division::find($Nota['fk_division'])['nombre'];
        $Notas = SC::array_push_wKey($nombreDiv,$Notas,$Nota);
      }
      return view('notas.indexNota',['divisiones' => $Notas, 'infoMateria' => $infoAdicional]);
    }


    public function index_global()
    {
        $MateriasDelProfesor = MateriaPC::where('fk_empleado','=',session('user')['cedula'])->get();
        $numeroPeriodos = Periodo::count();
        $datos = [];
        foreach ($MateriasDelProfesor as $materia) {
          $notasPorPeriodo = [];
          $curso = Curso::find($materia->fk_curso);
          $nombreCurso = $curso->prefijo.'-'.$curso->sufijo;
          $notas = $materia->Notas()->get()->toArray();
          $numeroNotas = count($notas);
          for ($i=0; $i <$numeroNotas ; $i++) {
            $notasPorPeriodo = SC::array_push_wKey($notas[$i]['fk_periodo'],$notasPorPeriodo,$notas[$i]);
          }
          $array = [
            'materia' => $materia->nombre,
            'salon' => $materia->salon,
            'periodos' => $notasPorPeriodo
          ];
          $datos = SC::array_push_wKey($nombreCurso,$datos,$array);
        }
        return view('notas.verTodasNotas',['datos' => $datos, 'numeroPeriodos'=> $numeroPeriodos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Para que funcione correctamente, las autenticaciones deben servir y se
     * debe de estar logeado.
     *
     * @param $pk_materia
     * Por defecto es null, ergo, se puede acceder a la ruta para crear una nota
     * de cualquier materia o de una en concreto si se le manda el pk.
     */
    public function create($pk_materia=null)
    {
      $materiasPC = $this->listarMateriasPC(session('user')['cedula'],$pk_materia);
      if (!empty($materiasPC)) {
        $divisiones = Division::select('pk_division','nombre')->get();
        $periodos = Periodo::select('pk_periodo','nro_periodo')->get();
        if ($divisiones->count()>0 and $periodos->count()>0) {
          return view('notas.crearNota',[
            'divisiones' => $divisiones,
            'materias' => $materiasPC,
            'periodos' => $periodos
           ]);
        }
        return 'No hay divisiones existentes para asignar notas';
      }
      return 'La materia no existe o no tiene materias asignadas';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotaStoreController $request)
    {
        if ($request['porcentaje']+$this->sumaPorcentajes($request)<=100) {
          $Nota = new Nota();
          $Nota->porcentaje=$request->porcentaje;
          $Nota->fk_division=$request->fk_division;
          $Nota->fk_materia_pc=$request->fk_materia_pc;
          $Nota->fk_periodo=$request->fk_periodo;
          $Nota->nombre=$request->nombre;
          $Nota->descripcion=$request->descripcion;
          $Nota->save();
          $Nota->crearNotasEstudiante();
          return redirect('/notas/materiaspc/'.$Nota->fk_materia_pc.'/periodos/'.$Nota->fk_periodo);
        }
        return 'La suma de los porcentajes de las demás notas supera el 100%';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pk_nota)
    {
        $unidad = Nota::find($pk_nota);
        if (!empty($unidad) and $this->verificarProfesor($unidad['fk_materia_pc'],session('user')['cedula'])) {
          $datos = [$this->arrayzar($unidad)];
          return view('notas.verNota',['datos' => $datos]);
        }
        return 'Nota no encontrada';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pk_nota)
    {
        $Nota = Nota::find($pk_nota);
        if ($this->verificarProfesor($Nota['fk_materia_pc'],session('user')['cedula'])) {
          if (!empty($Nota)) {
            $divisiones = Division::select('pk_division','nombre')->get();
            $materiasPC = $this->listarMateriasPC(session('user')['cedula']);
            return view('notas.editarNota',[
              'nota' => $Nota,
              'divisiones' => $divisiones,
              'materias' => $materiasPC
            ]);
          }
          return 'Nota no encontrada';
        }
        return 'No tiene permisos para hacer esto';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotaStoreController $request, $pk_nota)
    {
        $nota_modificada = Nota::find($pk_nota);
        if (!$this->verificarProfesor($nota_modificada['fk_materia_pc'],session('user')['cedula'])) {
          return 'No tiene derecho de modificar notas este profesor.';
        }
        if (!empty($nota_modificada)) {
          $total = $this->sumaPorcentajes($request);
          $posible = 0;
          if ($nota_modificada['fk_division']==$request['fk_division']) {
            if ($request['porcentaje']+$total-$nota_modificada['porcentaje']<=100) {
              $posible = 1;
            }
          }else {
            $PorcentajeDisponible = 100-$total;
            if ($request['porcentaje']<=$PorcentajeDisponible) {
              $posible = 1;
            }
          }
          if ($posible)
              {
                $bandera = 0;
                if (!($nota_modificada->porcentaje==$request->porcentaje)) {
                  $nota_modificada->porcentaje=$request->porcentaje;
                  $bandera++;
                }
                if (!($nota_modificada->fk_division==$request->fk_division)) {
                  $nota_modificada->fk_division=$request->fk_division;
                  $bandera++;
                }
                $nota_modificada->fk_materia_pc=$request->fk_materia_pc;
                $nota_modificada->nombre=$request->nombre;
                $nota_modificada->descripcion=$request->descripcion;
                $nota_modificada->save();
                while ($bandera!=0) {
                  switch ($bandera) {
                    case 2:
                      $nota_modificada->cambioPorcentaje();
                      break;
                    case 1:
                      $nota_modificada->cambioDivision();
                      break;
                    default:
                      $bandera=0; //Por si algo rarísimo llegara a pasar
                      break;
                  }
                  $bandera--;
                }
                return redirect('/notas/materiaspc/'.$nota_modificada->fk_materia_pc.'/periodos/'.$nota_modificada->fk_periodo); //Cuando se guarda
              }
              return 'La suma de los porcentajes de las demás notas supera el 100%';
        }
        return 'Error';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $pk_nota){
      $unidad = Nota::find($pk_nota);
      if ($this->verificarProfesor($unidad['fk_materia_pc'],session('user')['cedula'])) {
        if (!empty($unidad)) {
          $unidad->delete();
          $unidad->eliminacionNota();
          return back();
        }
        return 'Nota no encontrada';
      }
      return 'No tiene permisos para hacer esta acción';
    }

    /**
     * Este método devuelve la suma de los porcentajes de las notas correspondietes
     * a una materia, división y periodo.
     * Funciona tanto con Ajax como con una petición normal a la ruta.
     * @return $suma
     */
    public function sumaPorcentajes(Request $request)
    {
        $periodo = Nota::find($request->route('nota'))['fk_periodo'];
        $suma = MateriaPC::find($request['fk_materia_pc'])->Notas()
        ->where([['fk_division','=',$request['fk_division']],['fk_periodo','=',$periodo]])->sum('porcentaje');
        if ($request->ajax()) {
          return json_encode(['total' => $suma]);
        }
        return $suma;
    }

    /**
    * Verifica que al objeto nota solicitado le corresponda el profesor
    * indicado o que en su defecto, sea un usuario administrador
    * @param Nota el objeto nota
    * @param string $cedula_prof Es la cédula del usuario
    * @return boolean
    */
    private function verificarProfesor($pk_materia_pc,$cedula_prof)
    {
      if (!($cedula_prof===null)) {
        $materiaPC = MateriaPC::find($pk_materia_pc);
        if ($materiaPC['fk_empleado']==$cedula_prof) {
          return true;
        }
      }
        return false;
    }

    /**
     * Este método devuelve dos colecciones, una que corresponde a la division y otro a la materia
     * @param Nota el objeto Nota
     * @return Array
     */
    private function inspeccionarNota($Nota)
    {
      $datosDivision = Division::select('nombre','descripcion')->where('pk_division','=',$Nota['fk_division'])->first();
      $datosMateriaPC = MateriaPC::select('fk_materia','nombre','salon','fk_curso')->where('pk_materia_pc','=',$Nota['fk_materia_pc'])->first();
        return [
          'division' => $datosDivision,
          'materia' => $datosMateriaPC
        ];
    }

    /**
     * Este método devuelve un array que contiene el objeto Nota, Divison y Materia
     * donde Division y Materia están capados a los [nombre,descripcion] y [fk_materia, nombre]
     * @param Nota
     * @return Array
     */
    private function arrayzar($Nota)
    {
      $foraneas = $this->inspeccionarNota($Nota);
      $array = [$Nota,$foraneas['division'],$foraneas['materia']];
      return $array;
    }

    private function listarMateriasPC($cedula_prof, $pk_materia=null)
    {
      if (!empty($pk_materia)) {
        $materiasProfesor = MateriaPC::select('pk_materia_pc','fk_curso','nombre', 'salon')->where([
          ['pk_materia_pc','=',$pk_materia],
          ['fk_empleado','=',session('user')['cedula']]
          ])->get();
      }else{
        $materiasProfesor = MateriaPC::select('pk_materia_pc','fk_curso','nombre', 'salon')->where(
          'fk_empleado','=',session('user')['cedula'])->get();
      }
      $MateriasCursos = [];
      foreach ($materiasProfesor as $materia) {
        $curso = Curso::find($materia['fk_curso']);
        $nombreCurso = $curso['prefijo'].'-'.$curso['sufijo'];
        array_push($MateriasCursos,[$materia,$nombreCurso]);
      }
      //dd($MateriasCursos);
      return $MateriasCursos;
    }
}
