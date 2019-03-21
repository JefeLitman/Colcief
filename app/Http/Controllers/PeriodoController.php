<?php

namespace App\Http\Controllers;

// request
use App\Empleado;
use App\Http\Requests\PeriodoUpdateController;

// modelos
use App\Notificacion;
use App\Periodo;

class PeriodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin:administrador,coordinador,director,profesor')->only(['index']);
        $this->middleware('admin:administrador')->except(['index']);
        setlocale(LC_ALL, 'es_CO.UTF-8');
    }

    public function index()
    {
        $periodos = Periodo::where('ano', date('Y'))->orderBy('nro_periodo')->get();
        return view('periodos.verPeriodo', ['periodos' => $periodos]);
    }

    // public function create(){
    //     return view('periodos.crearPeriodo');
    // }

    // public function store(PeriodoStoreController $request){
    //   $unidad = new Periodo(); //Creo el modelo de datos acudiente
    //   $unidad->pk_periodo = $request->input('nro_periodo');
    //   $unidad->fecha_inicio = $request->input('fecha_inicio');
    //   $unidad->fecha_limite = $request->input('fecha_limite');
    //   $unidad->ano = $request->input('ano');
    //   $unidad->nro_periodo = $request->input('nro_periodo');
    //   $unidad->save();
    //   return 'Datos guardados con éxito';
    // }

    // public function show($id){
    //   $id = intval($id);
    //   if(!($id==0 or $id>4)){
    //     $query = Periodo::where('pk_periodo',$id)->get();
    //     if(!empty($query[0])){
    //       return view('periodos.verPeriodo', ['periodo' => $query]);
    //     }
    //   }
    //   return 'Número de periodo inválido o el periodo no existe';
    // }

    public function edit($nro_periodo)
    {
        $periodo = Periodo::where('ano', date('Y'))->where('pk_periodo', $nro_periodo)->where('fecha_limite', '>=', date('Y-m-d'))->first();
        if (!empty($periodo)){
            return view('periodos.editarPeriodo', ['periodo' => $periodo]);
        } else {
            return back()->with('false', 'No es posible modificar periodos ya finalizados');
        }
    }

    public function update(PeriodoUpdateController $request, $pk_periodo)
    {
        $periodo = Periodo::where('ano', date('Y'))->where('pk_periodo', $pk_periodo)->where('fecha_limite', '>=', date('Y-m-d'))->first();
        foreach ($request->except(['_method', '_token']) as $key => $value) {
            if (strtotime($periodo->$key) > strtotime(date('Y-m-d'))) {
                $periodo->$key = $value;
            }
        }
        if (!empty($periodo) && $bandera) {
            if ($periodo->save()) {
                $empleados = Empleado::where('empleado.role', '<>', '0')->get();
                foreach ($empleados as $empleado) {
                    $notificacion = new Notificacion;
                    $notificacion->fk_empleado = $empleado->cedula;
                    $notificacion->titulo = "¡La fecha limite fue modificada!";
                    $notificacion->descripcion = "Tienes mas tiempo para subir las notas faltantes, la nueva fecha limite es el " . explode('-', $periodo->fecha_limite)[2] . ' de ' . ucwords(strftime('%B', strtotime($periodo->fecha_limite)));
                    $notificacion->link = "/materiaspc";
                    $notificacion->save();
                }
                $mensaje = 'El periodo #' . $periodo->nro_periodo . ' fue actualizado con exito';
                return redirect('/periodos')->with('true', $mensaje);
            } else {
                return back()->with('false', 'Algo no salio bien, intente nuevamente');
            }
        } else {
            return back()->with('false', 'No es posible modificar periodos ya finalizados');
        }
    }
}
