<?php

namespace App\Http\Controllers;

//requeridos
use App\Curso;
use App\Empleado;
use App\Periodo;
use DateTime;

// modelos
use App\Http\Controllers\Controller;
use App\Http\Controllers\SupraController;
use App\Http\Requests\EmpleadoStoreController;
use App\Http\Requests\EmpleadoUpdateController;

// requests
use App\Http\Requests\EmpleadoUpdateFoto;
use App\Http\Requests\EmpleadoUpdatePassword;
use App\MateriaPC;
use App\Notificacion;

// herramientas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin:administrador')->except(['perfil', 'cambiarClave', 'show']);
        $this->middleware('admin:administrador,coordinador,director,profesor')->only(['perfil', 'cambiarClave', 'show']);
    }

    public function index()
    {
        $empleado = Empleado::all();
        return view('empleados.listaEmpleado', ['empleado' => $empleado]);
    }

    public function create()
    {
        $cursos = Curso::where("ano", date('Y'))->get(); //Agregado by Paola
        return view('empleados.crearEmpleado', ['cursos' => $cursos]);
    }

    public function store(EmpleadoStoreController $request)
    {
        $empleado = (new Empleado)->fill(SupraController::minuscula($request->all()));
        $empleado->password = Hash::make('clave');
        if ($request->hasFile('foto')) {
            $nombreArchivo = 'empleado' . $request->cedula;
            $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo, 'foto', 'perfil');
        }
        $cedula = $empleado->cedula;
        if ($empleado->save()) {
            $mensaje = 'El empleado ' . $empleado->nombre . ' ' . $empleado->apellido . ' fue creado con éxito';
            return redirect(route('empleados.show', $cedula))->with('true', $mensaje);
        } else {
            return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
        }

    }

    public function show($cedula)
    {
        /*@Autor Douglas R*/
        //Anteriormente Paola era la autora. Modifiqué todo el código para optimizarlo y cubrir un hueco de seguridad
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>empleados>verEmpleado.blade.php y allá se reciben todos los datos del respectivo empleado en una variable tipo Object $empleado.
        if (!(session('role') == 'administrador') and $cedula != session('user')['cedula']) {
            return redirect('/empleados/' . session('user')['cedula']);
        }
        $periodo = Periodo::where('ano', date('Y'))->where('fecha_limite', '>=', date('Y-m-d'))->where('fecha_inicio', '<=', date('Y-m-d'))->first();
        $recuperacion_inicio = new DateTime($periodo->recuperacion_inicio);
        $fecha_limite = new DateTime($periodo->fecha_limite);
        $diff = $recuperacion_inicio->diff($fecha_limite);
        // dd($periodo->fecha_limite);  
        // dd($periodo->recuperacion_inicio);
        $empleado = Empleado::where('empleado.cedula', $cedula)->leftjoin('curso', 'empleado.fk_curso', '=', 'curso.pk_curso')->withTrashed()->first();
        $cursos = MateriaPC::where('materia_pc.fk_empleado', $cedula)->join('curso', 'materia_pc.fk_curso', 'curso.pk_curso')->get();
        $cargo = ['Administrador', 'Director', 'Profesor', 'Coordinador'];

        if (!empty($empleado)) {
            return view("empleados.verEmpleado", ['empleado' => $empleado, 'cursos' => $cursos, 'cargo' => $cargo, 'time' => $diff->days]);
        } else {
            $mensaje = 'No se encuentra registros de este empleado';
            return back()->with('false', $mensaje);
        }
    }

    public function edit($cedula)
    {
        $empleado = Empleado::find($cedula);
        if (!empty($empleado)) {
            $cursos = Curso::where("ano", date('Y'))->get(); //agregado by Paola
            return view("empleados.editarEmpleado", ['empleado' => $empleado, "cursos" => $cursos]); //Modificado by Paola
        } else {
            $mensaje = 'No se encuentra registros de este empleado';
            return back()->with('false', $mensaje);
        }

    }

    public function update(EmpleadoUpdateController $request, $cedula)
    {
        $empleado = Empleado::findOrFail($cedula)->fill(SupraController::minuscula($request->all()));
        if ($request->hasFile('foto')) {
            $nombreArchivo = 'empleado' . $request->cedula;
            $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo, 'foto', 'perfil');
        }
        if ($empleado->save()) {
            $mensaje = 'El empleado ' . $empleado->nombre . ' ' . $empleado->apellido . ' fue actualizado con éxito';
            return redirect(route('empleados.show', $empleado->cedula))->with('true', $mensaje);
        } else {
            return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
        }
    }

    public function perfil(EmpleadoUpdateFoto $request)
    {
        $empleado = Empleado::find(session('user')['cedula']);
        $guard = session('role');
        if ($request->hasFile('foto')) {
            $nombre = 'empleado' . $empleado->cedula;
            $empleado->foto = SupraController::subirArchivo($request, $nombre, 'foto', 'perfil');
        }
        if ($empleado->save()) {
            $var = Empleado::find(session('user')['cedula']);
            session(['user' => $var->session(), 'role' => $guard]);
            $mensaje = $empleado->nombre . ' ' . $empleado->apellido . ' actualizaste tu foto con éxito';
            return redirect(url('/empleados/' . session('user')['cedula']))->with('true', $mensaje);
        } else {
            return back()->with('false', 'Algo no salio bien, intente nuevamente');
        }
    }

    public function cambiarClave(EmpleadoUpdatePassword $request)
    {
        $empleado = Empleado::find(session('user')['cedula']);
        if (Hash::check($request->actual, $empleado->password)) {
            $empleado->password = Hash::make($request->password);
            if ($empleado->save()) {
                $mensaje = $empleado->nombre . ' ' . $empleado->apellido . ' actualizaste tu contraseña con éxito';
                return redirect(url('/empleados/' . session('user')['cedula']))->with('true', $mensaje);
            } else {
                return back()->with('false', 'Algo no salio bien, intente nuevamente');
            }
        } else {
            return back()->with('false', 'La contraseña no coincide con la contraseña actual, intente nuevamente');
        }
    }

    public function tiempoExtra(Request $request, $id, $tiempo)
    {
        if ($request->ajax()) {
            $empleado = Empleado::findOrFail($id);
            $empleado->update(['tiempo_extra' => $tiempo]);
            Notificacion::create([
                'fk_empleado' => $id,
                'titulo' => '¡Se le ha dado un tiempo extra!',
                'descripcion' => 'El administrador le asignó ' . $tiempo . ' dias de plazo para subir las notas faltantes.',
                'url' => '/materiaspc',
            ]);
            return response()->json([
                'data' => $tiempo,
            ]);
        }
    }

    public function destroy(Request $request, $cedula)
    {
        if ($request->ajax()) {
            $empleado = Empleado::findOrFail($cedula);
            if ($empleado->delete()) {
                if ($request->direccion == null) {
                    return response()->json([
                        'mensaje' => $empleado->nombre . ' ' . $empleado->apellido . ' Fue eliminado',
                    ]);
                } else {
                    return response()->json([
                        'mensaje' => $empleado->nombre . ' ' . $empleado->apellido . ' Fue eliminado',
                        'url' => config('app.url') . $request->direccion,
                    ]);
                }
            } else {
                return response()->json([
                    'mensaje' => 'El empleado ' . $empleado->nombre . ' ' . $empleado->apellido . ' no pudo ser eliminado, intente nuevamente',
                ]);
            }
        }
    }

    public function restaurar(Request $request, $cedula)
    {
        if ($request->ajax()) {
            $empleado = Empleado::where('cedula', $cedula)->onlyTrashed()->get();
            $empleado = $empleado[0];
            if ($empleado->restore()) {
                return response()->json([
                    'mensaje' => $empleado->nombre . ' ' . $empleado->apellido . ' Fue restaurado con éxito',
                    'url' => config('app.url') . $request->direccion,
                ]);

            } else {
                return response()->json([
                    'mensaje' => $empleado->nombre . ' ' . $empleado->apellido . ' no pudo ser restaurado, intente nuevamente',
                ]);
            }
        }
    }
}
