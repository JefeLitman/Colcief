<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Http\Controllers\SupraController;
use App\Http\Requests\ArchivoStoreController;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin:administrador,coordinador,profesor,director')->only(['index', 'show']);
        $this->middleware('admin:administrador,coordinador')->except(['index', 'show']);
    }

    public function index()
    {
        $tipos = ['pdf' => 'pdf', 'docx' => 'word', 'odt' => 'word', 'doc' => 'word', 'xlsx' => 'excel', 'ptt' => 'powerpoint', 'pttx' => 'powerpoint', 'txt' => 'txt', 'bmp' => 'img', 'png' => 'img', 'jpg' => 'img', 'jpeg' => 'img'];
        // array para mostrar las imagenes
        return view('archivos.listaArchivo', ['archivos' => Archivo::select('archivo.*', 'empleado.nombre', 'empleado.apellido')->join('empleado', 'empleado.cedula', 'archivo.fk_empleado')->get(), 'tipos' => $tipos]);
    }

    public function create()
    {
        return view('archivos.crearArchivo');
    }

    public function store(ArchivoStoreController $request)
    {
        $archivo = (new Archivo)->fill(SupraController::minuscula($request->all()));
        if ($request->hasFile('archivo')) {
            $nombre = mb_strtolower($archivo->pk_archivo . '#' . str_replace(' ', '-', $request->titulo));
            $archivo->link = SupraController::subirArchivo($request, $nombre, 'archivo', 'archivos');
            $archivo->tipo = $request->archivo->clientExtension();
            if ($archivo->save()) {
                $mensaje = 'El archivo ' . mb_strtolower($archivo->titulo) . ' fue guardado con éxito';
                return redirect(route('archivos.index'))->with('true', $mensaje);
            } else {
                return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
            }
        } else {
            return back()->withInput()->with('false', 'Algo no salio bien, intente nuevamente');
        }

    }

    public function show($pk_archivo)
    {
        $archivo = Archivo::findOrFail($pk_archivo);
        return response()->download(public_path() . $archivo->link, ucwords(explode('#', str_replace('-', ' ', $archivo->link))[1]));
    }

    public function destroy(Request $request, $pk_archivo)
    {
        if ($request->ajax()) {
            $archivo = Archivo::findOrFail($pk_archivo);
            if ($archivo->delete()) {
                unlink(public_path() . $archivo->link);
                return response()->json([
                    'mensaje' => 'El archivo ' . $archivo->titulo . ' Fue eliminado',
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'El archivo ' . $archivo->titulo . ' no pudo ser eliminado, intente nuevamente',
                ]);
            }
        }
    }
}
