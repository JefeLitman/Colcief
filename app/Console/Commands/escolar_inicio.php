<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Fecha;
use App\Empleado;
use App\Notificacion;

class escolar_inicio extends Command {

    protected $signature = 'escolar:inicio';
    protected $description = 'Este comando se encarga de informar al administrador el tiempo con el que cuenta para modificar cierto parametros necesarios para iniciar el año escolar';

    public function __construct(){
        parent::__construct();
        setlocale(LC_ALL, 'es_CO.UTF-8');
        $this -> ano = date('Y'); // año actual
        $this -> mes = date("Y-m-d", strtotime(date('Y-m-d')."+ 1 month")); // hoy + 1 mes
        $this -> semana = date("Y-m-d", strtotime(date('Y-m-d')."+ 1 week")); // hoy + 1 semana
        $this -> hoy = date("Y-m-d", strtotime(date('Y-m-d')."+ 1 day")); // hoy
    }

    public function handle(){
        $empleados = Empleado::where('role','0') -> get();
        $fecha_mes = Fecha::where('ano', $this->ano) -> where('inicio_escolar', $this -> mes) -> get();
        $fecha_semana = Fecha::where('ano', $this->ano) -> where('inicio_escolar', $this -> semana) -> get();
        $fecha_hoy = Fecha::where('ano', $this->ano) -> where('inicio_escolar', $this -> hoy) -> get();
        foreach ($fecha_mes as $fecha) {
            foreach($empleados as $empleado){
                $notificacion = new Notificacion; // creo notificaciones para el administrador, se le avisa que falta 25 dias para iniciar el año escolar, se le redirecciona a /fechas/editar
                $notificacion -> fk_empleado = $empleado -> cedula;
                $notificacion -> titulo = "El año escolar inicia en un mañana";
                $notificacion -> descripcion = "Si desea mas tiempo para modificar parametros escolares, por favor dirijase a modificar las fechas escolares, una vez transcurrida la fecha de inicio, no le sera posible modificar ciertos datos, esta fecha corresponde a la fecha de inicio escolar del año pasado, accione esta notificación y verifique que esta fecha es la correspondiente a este año escolar. Fecha de inicio escolar: ".ucwords(strftime('%A', strtotime($fecha -> inicio_escolar))).' '.explode('-', $fecha -> inicio_escolar)[2].' de '.ucwords(strftime('%B', strtotime($fecha -> inicio_escolar)));
                $notificacion -> link = "/fechas/editar";
                $notificacion -> save();
            }
        }
        foreach ($fecha_semana as $fecha) {
            foreach($empleados as $empleado){
                $notificacion = new Notificacion; // creo notificaciones para el administrador, se le avisa que falta 7 dias para iniciar el año escolar, se le redirecciona a /fechas/editar
                $notificacion -> fk_empleado = $empleado -> cedula;
                $notificacion -> titulo = "Falta una semana para iniciar el año escolar";
                $notificacion -> descripcion = "Si desea mas tiempo para modificar parametros escolares, por favor dirijase a modificar las fechas escolares, una vez transcurrida la fecha de inicio, no le sera posible modificar ciertos datos, esta fecha corresponde a la fecha de inicio escolar del año pasado, accione esta notificación y verifique que esta fecha es la correspondiente a este año escolar. Fecha de inicio escolar: ".ucwords(strftime('%A', strtotime($fecha -> inicio_escolar))).' '.explode('-', $fecha -> inicio_escolar)[2].' de '.ucwords(strftime('%B', strtotime($fecha -> inicio_escolar)));
                $notificacion -> link = "/fechas/editar";
                $notificacion -> save();
            }
        }
        foreach ($fecha_hoy as $fecha) {
            foreach($empleados as $empleado){ 
                $notificacion = new Notificacion; // creo notificaciones para el administrador, se le avisa que falta 1 dias para iniciar el año escolar, se le redirecciona a /fechas/editar
                $notificacion -> fk_empleado = $empleado -> cedula;
                $notificacion -> titulo = "¡¡El año escolar inicia mañana!!";
                $notificacion -> descripcion = "Si aun tiene asuntos pendientes con el sistemas, por favor modifique la fecha de inicio escolar establecida, esta fecha corresponde a la fecha de inicio escolar del año pasado, accione esta notificación y verifique que esta fecha es la correspondiente a este año escolar. Fecha de inicio escolar: ".ucwords(strftime('%A', strtotime($fecha -> inicio_escolar))).' '.explode('-', $fecha -> inicio_escolar)[2].' de '.ucwords(strftime('%B', strtotime($fecha -> inicio_escolar)));
                $notificacion -> link = "/fechas/editar";
                $notificacion -> save();
            }
        }
    }
}
