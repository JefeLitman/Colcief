<?php

namespace App\Http\Controllers;

use App\Estudiante;

/*@Autor Paola*/
use App\Acudiente; //Pepe no me lo vuelva a borrar
use App\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstudianteStoreController;
use App\Http\Controllers\CursoController;
use App\Http\Requests\EstudianteUpdateController;
use App\Http\Controllers\SupraController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class EstudianteController extends Controller{

    //Funciones publicas de primeros y al final las privadas

    // public function __construct (){
    //     $this->middleware('admin:estudiante')->only('perfil');
    //     $this->middleware('admin:director,profesor,administrador')->only(['index', 'show']);
    //     $this->middleware('admin:administrador')->except(['perfil', 'index', 'show']);
    // }

    public function index(){
        $curso = Curso::all()->groupBy('prefijo');
        $grado = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
        return view('cursos.cursos', ['curso' => $curso, 'grado' => $grado]);
    }

    public function estudianteGrado($pk_curso){
        $curso = json_decode((new CursoController)->conteoEstudiantes($pk_curso));
        $c = Curso::find($pk_curso);
        return view('estudiantes.estudiantesGrado',['curso' => $curso,'grado' => $c]);
    }

    public function create(){
        $cursos=Curso::where('ano',date('Y'))->get();
        return view('estudiantes.crearEstudiante',['cursos'=>$cursos]);
    }

    public function store(EstudianteStoreController $request){
        $acudiente = (new Acudiente)->fill(
            SupraController::minuscula(
                $request->all(),
                "nombre",
                "apellido",
                "grado",
                "fecha_nacimiento",
                "discapacidad",
                "foto",
                "fk_curso" //datos q no quiere guardar
            )
        );
        $acudiente->save(); // se guarda el acudiente
        $estudiante = (new Estudiante)->fill(
            SupraController::minuscula($request->all(),
                "nombre_acu_1",
                "direccion_acu_1",
                "telefono_acu_1",
                "nombre_acu_2",
                "direccion_acu_2",
                "telefono_acu_2",
                "fk_curso" //datos q no quiere guardar
            )
        );
        $estudiante->fk_curso=$request->fk_curso;
        if ($request->fk_curso=='') {
            $estudiante->fk_curso=null;
        }
        $estudiante->fk_acudiente = $acudiente->pk_acudiente;
        $estudiante->password = Hash::make('clave');

        if($request->hasFile('foto')){ // se guarda la imagen
          $nombre = 'estudiante'.$estudiante->pk_estudiante;
          $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto','perfil');
        }
        if($estudiante->save()){
            $estudiante->cambioCurso();
            $mensaje = 'El estudiante '.$estudiante->nombre.' '.$estudiante->apellido.' fue creado con exito';
            return redirect(route('estudiantes.show', $estudiante->pk_estudiante))->with('true', $mensaje);
        } else {
            return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
        }
         // se guarda el estudiante
        
    }

    public function show($pk_estudiante){
        /*@Autor Douglas R.*/
        //Código optimizado y mejorado para tapar un hueco de seguridad
        if (!(session('role')=='administrador')) {
          $pk_estudiante=''.session('user')['pk_estudiante'];
        }
        $estudiante = Estudiante::where('pk_estudiante', $pk_estudiante)->get();
        if (!empty($estudiante[0])) {
            $acudiente= Acudiente::where('pk_acudiente', $estudiante[0]->fk_acudiente)->get();
            $curso = Curso::find($estudiante[0]->fk_curso);
            if(!empty($acudiente[0])){
                return view("estudiantes.verEstudiante",[
                    'estudiante' => $estudiante[0],
                    'acudiente' => $acudiente[0],
                    'curso' => $curso
                ]);
            }
            $mensaje = 'El estudiante '.$estudiante[0]->nombre.' '.$estudiante[0]->apellido.' tiene datos corruptos, recargue e intente nuevamente';
            return back() -> with('false', $mensaje);
        }
        $mensaje = 'No se encuentra registros de este estudiante';
        return back() -> with('false', $mensaje);
    }

    public function edit($pk_estudiante){
        $estudiante = Estudiante::find($pk_estudiante);
        if(!empty($estudiante)){
            $acudiente = Acudiente::find($estudiante->fk_acudiente);
            if(!empty($acudiente)){
                $cursos=[];
                if($estudiante->grado!=null and $estudiante->grado!="11"){
                    $cursos=Curso::where([['ano',date('Y')],['prefijo',$estudiante->grado+1]])->get();
                }
                if($estudiante->grado==null){
                    $cursos=Curso::where('ano',date('Y'))->get();
                }
                return view('estudiantes.editarEstudiante', [
                    'estudiante' => $estudiante,
                    'acudiente'=> $acudiente,
                    'cursos'=>$cursos
                ]);
            }
            $mensaje = 'El estudiante '.$estudiante[0]->nombre.' '.$estudiante[0]->apellido.' tiene datos corruptos, recargue e intente nuevamente';
            return back() -> with('false', $mensaje);
        }
        $mensaje = 'No se encuentra registros de este estudiante';
        return back() -> with('false', $mensaje);
        
    }

    public function update(EstudianteUpdateController $request, $pk_estudiante){
        $estudiante = Estudiante::findOrFail($pk_estudiante)->fill(
            SupraController::minuscula($request->all(),
                "nombre_acu_1",
                "direccion_acu_1",
                "telefono_acu_1",
                "nombre_acu_2",
                "direccion_acu_2",
                "telefono_acu_2",
                "fk_curso" //datos q no quiere guardar
            )
        );
        $estudiante->fk_curso=$request->fk_curso;
        if ($request->fk_curso=='') {
            $estudiante->fk_curso=null;
            // dd("hello");
        }
        $acudiente = Acudiente::findOrFail($estudiante->fk_acudiente)->fill(
            SupraController::minuscula($request->all(),
                "nombre",
                "apellido",
                "fk_curso",
                "fecha_nacimiento",
                "discapacidad",
                "foto" //datos q no quiere guardar
            )
        );
        if($request->hasFile('foto')){
            $nombre = 'estudiante'.$estudiante->pk_estudiante;
            $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto','perfil');
        }
        $estudiante->password= Hash::make('clave');
        
        $acudiente->save();
        
        if ($estudiante->save()){
            $estudiante->cambioCurso();
            $mensaje = 'El estudiante '.$estudiante->nombre.' '.$estudiante->apellido.' fue actualizado con exito';
            return redirect(route('estudiantes.show', $estudiante->pk_estudiante))->with('true', $mensaje);
        } else {
            return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
        }
    }

    public function perfil(Request $request, $pk_estudiante){
        // dd('hola');
        $estudiante = Estudiante::find(session('user')['pk_estudiante']);
        $guard=session('role');
        if($request->hasFile('foto')){
            $nombre = 'estudiante'.$estudiante->pk_estudiante;
            $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto','perfil');
        }
        $estudiante->save();
        $var = Estudiante::findOrFail(session('user')['pk_estudiante']);
        session(['user'=> $var->session(),'role' => $guard]);
        // dd(Auth::guard($guard)->user()->session());
        return redirect(url('/estudiantes/principal'));
    }

    public function destroy(Request $request, $pk_estudiante){
        if($request->ajax()){
            $estudiante = Estudiante::findOrFail($pk_estudiante);
            if($estudiante->delete()){
                if($request->direccion == null){
                    return response()->json([
                        'mensaje' => $estudiante->nombre.' '.$estudiante->apellido. ' Fue eliminado'
                    ]);
                } else {
                    return response()->json([
                        'mensaje' => $estudiante->nombre.' '.$estudiante->apellido. ' Fue eliminado',
                        'url' => config('app.url').$request->direccion
                    ]);
                }
            } else {
                return response()->json([
                    'mensaje' => $estudiante->nombre.' '.$estudiante->apellido. ' no pudo ser eliminado, intente nuevamente'
                ]);
            }
        }
    }

    public function estudiantes(){
        return view ('estudiantes.listaEstudiante', ['estudiante' => Estudiante::all()]);
    }

    private function filtro(Request $request){
        if($request->ajax()){
            return response()->json([
                'data' => Estudiante::where('grado', $request -> grado) -> get(),
            ]);
            
        }
    }
}
