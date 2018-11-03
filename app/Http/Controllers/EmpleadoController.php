<?php

namespace App\Http\Controllers;

use App\Empleado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpleadoStoreController;
use App\Http\Requests\EmpleadoUpdateController;
use App\Http\Controllers\SupraController;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller{

    // public function __construct (){
    //     $this->middleware('admin:administrador');
    // }
    //Comentado temporalmente porque la auth está remal hecha
    public function index(){
        $empleado = Empleado::all();
        return view('empleados.listaEmpleado', ['empleado' => $empleado]);
    }

    public function create(){
        return view('empleados.crearEmpleado');
    }

    public function store(EmpleadoStoreController $request){
        $empleado = (new Empleado)->fill(SupraController::minuscula($request->all()));
        $empleado->password = Hash::make('clave');
        if($request->hasFile('foto')){
          $nombreArchivo = 'empleado'.$request->cedula;
          $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo,'foto');
        }
        $cedula = $empleado->cedula;
        if($empleado->save()){
            return redirect(route('empleados.show', $cedula))->with('true', 'El registro fue guardado con exito');
        }else{
            return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
        }

    }

    public function show($cedula){
        /*@Autor Douglas R*/
        //Anteriormente Paola era la autora. Modifiqué todo el código para optimizarlo y cubrir un hueco de seguridad
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>empleados>verEmpleado.blade.php y allá se reciben todos los datos del respectivo empleado en una variable tipo Object $empleado.
        if (!(session('role')=='administrador')) {
          $cedula = ''.session('user')['cedula'];
        }
        $empleado = Empleado::where('cedula', $cedula)->get();
        if(!empty($empleado[0])){
            return view("empleados.verEmpleado",['empleado'=>$empleado[0]]);
        }
        return 'Empleado no encontrado';
    }

    public function edit($cedula){
        $empleado = Empleado::findOrFail($cedula);
        return view("empleados.editarEmpleado", compact('empleado'));
    }

    public function update(EmpleadoUpdateController $request, $cedula){
        $empleado = Empleado::findOrFail($cedula)->fill(SupraController::minuscula($request->all()));
        if($request->hasFile('foto')){
            $nombreArchivo = 'empleado'.$request->cedula;
            $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo, 'foto');
        }
        $empleado->save();
        return redirect(route('empleados.show', $empleado->cedula));
    }

    public function perfil(Request $request,$cedula){
        // dd('hola');
        $empleado = Empleado::findOrFail($cedula);
        $guard=session('role');
        if($request->hasFile('foto')){
            $nombre = 'empleado'.$empleado->cedula;
            $empleado->foto = SupraController::subirArchivo($request,$nombre,'foto'); //cambie el metodo mientras pienso como solucionarlo xD, este metodo llama al metodo de subir archivo, lo unico es retorna la direccion completa, esto para poder mostrar las imagenes en el servidor (Solucion Temporal)
        }
        $empleado->save();
        $var = Empleado::findOrFail($cedula);
        session(['user'=> $var->session(),'role' => $guard]);
        // dd(Auth::guard($guard)->user()->session());
        return redirect(url('/empleados/principal'));
    }


    public function destroy(Request $request, $cedula){
        if($request->ajax()){
            $empleado = Empleado::findOrFail($cedula);
            $empleado->delete();

            return response()->json([
                'mensaje' => $empleado->nombre.' '.$empleado->apellido. ' Fue eliminado'
            ]);
        }
    }
}
