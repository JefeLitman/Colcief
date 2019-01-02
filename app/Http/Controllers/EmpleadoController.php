<?php

namespace App\Http\Controllers;

//requeridos
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// modelos
use App\Empleado;
use App\Curso;
use App\Notificacion;

// requests
use App\Http\Requests\EmpleadoStoreController;
use App\Http\Requests\EmpleadoUpdateController;
use App\Http\Requests\EmpleadoUpdateFoto;

// herramientas
use App\Http\Controllers\SupraController;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller{

    public function __construct (){
        $this->middleware('admin:administrador');
    }
    public function index(){
        $empleado = Empleado::all();
        return view('empleados.listaEmpleado', ['empleado' => $empleado]);
    }

    public function create(){
        $cursos=Curso::where("ano",date('Y'))->get(); //Agregado by Paola
        return view('empleados.crearEmpleado',['cursos'=>$cursos]);
    }

    public function store(EmpleadoStoreController $request){
        $empleado = (new Empleado)->fill(SupraController::minuscula($request->all()));
        $empleado -> password = Hash::make('clave');
        if($request->hasFile('foto')){
          $nombreArchivo = 'empleado'.$request->cedula;
          $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo,'foto');
        }
        $cedula = $empleado->cedula;
        if($empleado->save()){
            $mensaje = 'El empleado '.$empleado->nombre.' '.$empleado->apellido.' fue creado con exito';
            return redirect(route('empleados.show', $cedula))->with('true', $mensaje);
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
        $empleado = Empleado::where('empleado.cedula', $cedula)->leftjoin('curso','empleado.fk_curso', '=', 'curso.pk_curso')->get();
        if(!empty($empleado[0])){
            return view("empleados.verEmpleado",['empleado'=>$empleado[0]]);
        }
        /*@Autor Karen*/
        //Colocandole estilo al mensaje("Empleado no encontrado").
        return view('mensajes/Noempleado');
    }

    public function edit($cedula){
        $empleado = Empleado::findOrFail($cedula);
        $cursos = Curso::where("ano",date('Y')) -> get();//agregado by Paola
        return view("empleados.editarEmpleado", ['empleado' => $empleado,"cursos" => $cursos]);//Modificado by Paola
    }

    public function update(EmpleadoUpdateController $request, $cedula){
        $empleado = Empleado::findOrFail($cedula)->fill(SupraController::minuscula($request->all()));
        if($request->hasFile('foto')){
            $nombreArchivo = 'empleado'.$request->cedula;
            $empleado->foto = SupraController::subirArchivo($request, $nombreArchivo, 'foto');
        }
        if($empleado->save()){
            $mensaje = 'El empleado '.$empleado->nombre.' '.$empleado->apellido.' fue actualizado con exito';
            return redirect(route('empleados.show', $empleado -> cedula))->with('true', $mensaje);
        } else {
            return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
        }      
    }

    public function perfil(EmpleadoUpdateFoto $request,$cedula){
        $empleado = Empleado::findOrFail($cedula);
        $guard = session('role');
        if($request->hasFile('foto')){
            $nombre = 'empleado'.$empleado->cedula;
            $empleado->foto = SupraController::subirArchivo($request,$nombre,'foto'); 
        }
        if($empleado->save()){
            $var = Empleado::findOrFail($cedula);
            session(['user'=> $var->session(),'role' => $guard]);
            $mensaje = 'El empleado '.$empleado->nombre.' '.$empleado->apellido.' Actualizo su foto con exito';
            return redirect(url('/empleados/principal'))->with('true', $mensaje);
        } else {
            return back()->with('false', 'Algo no salio bien, intente nuevamente');
        }
        
    }

    public function tiempoExtra(Request $request, $id, $tiempo){
        if($request -> ajax()){
            $empleado = Empleado::findOrFail($id);
            $empleado -> update(['tiempo_extra' => $tiempo]);
            Notificacion::create([
                'fk_empleado' => $id,
                'titulo' => '¡Se le ha dado un tiempo extra!',
                'descripcion' => 'El administrador le asignó '.$tiempo.' dias de plazo para subir las notas faltantes.',
                'url' => '/materiaspc'
            ]);
            return response()->json([
                'mensaje' => 'exito'
            ]);
        }
        
    }

    public function destroy(Request $request, $cedula){
        if($request->ajax()){
            $empleado = Empleado::findOrFail($cedula);
            if($empleado->delete()){
                return response()->json([
                    'mensaje' => $empleado->nombre.' '.$empleado->apellido. ' Fue eliminado'
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'El empleado '.$empleado->nombre.' '.$empleado->apellido.' no pudo ser eliminado, intente nuevamente'
                ]);
            }
            

            
        }
    }
}
