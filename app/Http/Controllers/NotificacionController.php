<?php

namespace App\Http\Controllers;

use App\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller {

    public function __construct(){
        // $this->middleware('admin:administrador');
    }
    
    public function __invoke(Request $request){
        if($request->ajax()){
            $notificaciones = $this -> misNotificaciones() -> where('estado', true);
            foreach ($notificaciones as $notificacion) {
                $notificacion -> descripcion = substr($notificacion -> descripcion, 0, 150);
            }
            return response()->json([
                'data' => $notificaciones,
                'cant' => count($notificaciones)
            ]);
        }
    }

    public function misNotificaciones(){
        return Notificacion::all() -> where('fk_empleado',session('user')['cedula']);
    }

    public function index(){
        $notificaciones = $this -> misNotificaciones();
        return view("noticaciones.listaNotificacion", ['notificaciones'=>$notificaciones]);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(Notificacion $notificacion){
        //
    }

    public function edit(Notificacion $notificacion){
        //
    }

    public function update(Request $request, Notificacion $notificacion){
        //
    }

    public function destroy(Request $request, $pk_notificacion){
        if($request->ajax()){
            $notificacion = Notificacion::where('fk_empleado',session('user')['cedula']) -> where('estado', true) -> where('pk_notificacion', $pk_notificacion) -> get()[0];
            $notificacion -> estado = false;
            $notificacion -> save();
            return response()->json([
                'cant' => 0,
            ]);
        }
    }
}
