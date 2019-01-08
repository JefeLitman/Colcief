<?php

namespace App\Http\Controllers;

use App\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller {

    public function __construct(){
        $this->middleware('admin:administrador,director,profesor');
    }
    
    public function __invoke(Request $request){
        if($request->ajax()){
            $notificaciones = $this -> misNotificaciones() -> where('estado', true) -> limit(4) -> get();
            foreach ($notificaciones as $notificacion) {
                if(strlen($notificacion -> descripcion) >= 154) $notificacion -> descripcion = substr($notificacion -> descripcion, 0, 150).' ...';
            }
            return response()->json([
                'data' => $notificaciones,
                'cant' => count($this -> misNotificaciones() -> where('estado', true) -> get()),
            ]);
        }
    }

    public function misNotificaciones(){
        return Notificacion::where('fk_empleado',session('user')['cedula']) -> orderBy('pk_notificacion', 'desc');
    }

    public function index(){
        $activas = $this -> misNotificaciones() -> where('estado', true) -> get();
        $inactivas = $this -> misNotificaciones() -> where('estado', false) -> get();
        return view("noticaciones.listaNotificacion", ['activas' => $activas, 'inactivas' => $inactivas]);
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
