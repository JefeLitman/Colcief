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

    public function __construct (){
        $this->middleware('admin:estudiante')->only('perfil');
        $this->middleware('admin:director,profesor,administrador')->only(['index', 'show']);
        $this->middleware('admin:administrador')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index(){
        $curso = Curso::all()->groupBy('prefijo');
        $grado = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
        return view('cursos.cursos', ['curso' => $curso, 'grado' => $grado]);
    }

    public function estudianteGrado($prefijo,$sufijo){
        $curso = new CursoController;
        $curso = $curso->conteoEstudiantes($prefijo,$sufijo);
        $curso = json_decode($curso);
        $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
        return view('estudiantes.estudiantesGrado',['curso'=>$curso,'grado'=>$g[$prefijo]." - ".$sufijo]);
    }

    public function filtro(Request $request){
        $estudiante = new Estudiante;
        $estudiante = $estudiante->curso();
        // foreach($request->all() as $consulta){
        //     $estudiante = $estudiante->where('pk_curso',$consulta);
        // }
        // $estudiante = Estudiante::find('1')->curso()->where('pk_curso','1')->
        print_r($estudiante);
    }

    public function create(){
        return view('estudiantes.crearEstudiante');
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
                "foto" //datos q no quiere guardar
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
                "telefono_acu_2" //datos q no quiere guardar
            )
        );
        $estudiante->fk_acudiente = $acudiente->pk_acudiente;
        $estudiante->password = Hash::make('clave');

        if($request->hasFile('foto')){ // se guarda la imagen
          $nombre = 'estudiante'.$estudiante->pk_estudiante;
          $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto');
        }
        $estudiante->save();
         // se guarda el estudiante
        return redirect(route('estudiantes.show', $estudiante->pk_estudiante));
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
          if(!empty($acudiente[0])){
            return view("estudiantes.verEstudiante",[
                       'estudiante'=>$estudiante[0],
                       'acudiente' =>$acudiente[0]
            ]);
          }
          return 'Error en el estudiante: No tiene acudientes';
        }
        return 'Estudiante no encontrado';
    }

    public function edit($pk_estudiante){
        $estudiante = Estudiante::findOrFail($pk_estudiante);
        $acudiente = Acudiente::findOrFail($estudiante->fk_acudiente);
        return view('estudiantes.editarEstudiante', [
            'estudiante' => $estudiante,
            'acudiente'=> $acudiente
        ]);
    }

    public function update(EstudianteUpdateController $request, $pk_estudiante){
        $estudiante = Estudiante::findOrFail($pk_estudiante)->fill(
            SupraController::minuscula($request->all(),
                "nombre_acu_1",
                "direccion_acu_1",
                "telefono_acu_1",
                "nombre_acu_2",
                "direccion_acu_2",
                "telefono_acu_2" //datos q no quiere guardar
            )
        );
        $acudiente = Acudiente::findOrFail($estudiante->fk_acudiente)->fill(
            SupraController::minuscula($request->all(),
                "nombre",
                "apellido",
                "grado",
                "fecha_nacimiento",
                "discapacidad",
                "foto" //datos q no quiere guardar
            )
        );
        if($request->hasFile('foto')){
            $nombre = 'estudiante'.$estudiante->pk_estudiante;
            $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto'); //cambie el metodo mientras pienso como solucionarlo xD, este metodo llama al metodo de subir archivo, lo unico es retorna la direccion completa, esto para poder mostrar las imagenes en el servidor (Solucion Temporal)
        }
        $estudiante->password= Hash::make('clave');
        $acudiente->save();
        $estudiante->save();
        return redirect(route('estudiantes.show', $estudiante->pk_estudiante));
    }

    public function perfil(Request $request, $pk_estudiante){
        // dd('hola');
        $estudiante = Estudiante::findOrFail($pk_estudiante);
        $guard=session('role');
        if($request->hasFile('foto')){
            $nombre = 'estudiante'.$estudiante->pk_estudiante;
            $estudiante->foto = SupraController::subirArchivo($request,$nombre,'foto');
        }
        $estudiante->save();
        $var = Estudiante::findOrFail($pk_estudiante);
        session(['user'=> $var->session(),'role' => $guard]);
        // dd(Auth::guard($guard)->user()->session());
        return redirect(url('/estudiantes/principal'));
    }

    public function destroy(Request $request, $pk_estudiante){
        if($request->ajax()){
            $estudiante = Estudiante::findOrFail($pk_estudiante);
            $estudiante->delete();

            return response()->json([
                'mensaje' => $estudiante->nombre.' '.$estudiante->apellido. ' Fue eliminado'
            ]);
        }
    }

    public function periodo($periodo){
        return redirect(route('estudiantes.periodo', $periodo));
        // return view("estudiantes.periodo",[
        //     'periodo'=>$p
        //  ]);
    }
}
