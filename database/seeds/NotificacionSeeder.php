<?php
// namespace database\seeds;

use Illuminate\Database\Seeder;

use App\Notificacion;
use App\Empleado;

class NotificacionSeeder extends Seeder {

    public function run(){
        $empleados = Empleado::all();
        foreach($empleados as $empleado){
            $notificacion = new Notificacion; // creo notificaciones para el empleado, se le avisa que falta una semana, se le redirecciona a "Mis materias"
            $notificacion -> fk_empleado = $empleado -> cedula;
            $notificacion -> titulo = "El periodo esta por finalizar";
            $notificacion -> descripcion = "El periodo finaliza en una semana, ingrese las notas faltantes, la fecha limite es el ".$empleado -> fecha_limite;
            $notificacion -> link = "/materiaspc";
            $notificacion -> save();
        }
    }
}
