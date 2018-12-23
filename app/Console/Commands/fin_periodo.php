<?php

namespace App\Console\Commands;

use App\Periodo;
use App\Notificacion;
use App\Empleado;

use Illuminate\Console\Command;

class fin_periodo extends Command {

    protected $signature = 'periodo:fin';
    protected $description = 'Command description';

    public function __construct(){
        parent::__construct();
    }

    public function handle(){
        $periodos = Periodo::all() -> where('ano', date('Y')); //obtengo los periodos vigentes
        
        foreach($periodos as $periodo){
            if($periodo -> fecha_limite -> month/* explode('-', $periodo -> fecha_limite)[1] */ == date('m')){ //verifico que se el mes correspondiente
                if(($periodo -> fecha_limite -> day/* explode(' ',explode('-', $periodos[0] -> fecha_limite)[2])[0] */ - date('d')) == 7){ //verifico que falten 7 dias para la expiracion del periodo
                    $empleados = Empleado::select('empleado.cedula', 'nota.pk_nota') -> join('materia_pc', 'empleado.cedula', 'materia_pc.fk_empleado') -> join('nota', 'materia_pc.pk_materia_pc', 'nota.fk_materia_pc') -> join('nota_estudiante', 'nota.pk_nota', 'nota_estudiante.fk_nota') -> where('empleado.role','!=','0') -> where('empleado.tiempo_extra','0') -> where('nota_estudiante.nota','0') -> groupBy('empleado.cedula') -> groupBy('materia_pc.pk_materia_pc') -> get();
                    //obtengo los empleados que tienen notas en el valor de 0
                    error_log($empleados);

                    foreach($empleados as $empleado){
                        $notificacion = new Notificacion; // creo notificaciones para el empleado, se le avisa que falta una semana, se le redirecciona a "Mis materias"
                        $notificacion -> fk_empleado = $empleado -> cedula;
                        $notificacion -> titulo = "El periodo esta por finalizar";
                        $notificacion -> descripcion = "El periodo finaliza en una semana, ingrese las notas faltantes, la fecha limite es el ".$periodo -> fecha_limite;
                        $notificacion -> link = "/materiaspc";
                        $notificacion -> save();
                    }
                } elseif (($periodo -> fecha_limite -> day - date('d')) == 1){ //Verifico que falte 1 dia para la expiracion del periodo
                    $empleados = Empleado::select('empleado.cedula', 'nota.fk_periodo', 'materia_pc.pk_materia_pc') -> join('materia_pc', 'empleado.cedula', 'materia_pc.fk_empleado') -> join('nota', 'materia_pc.pk_materia_pc', 'nota.fk_materia_pc') -> join('nota_estudiante', 'nota.pk_nota', 'nota_estudiante.fk_nota') -> where('empleado.role','!=','0') -> where('empleado.tiempo_extra','0') -> where('nota_estudiante.nota','0') -> groupBy('empleado.cedula') -> groupBy('materia_pc.pk_materia_pc') -> get();
                    //obtengo los empleados que tienen notas en el valor de 0 y las agrupo por materias_pc
                    error_log($empleados);

                    foreach($empleados as $empleado){ // creo notificaciones para el empleado, se le avisa que falta una semana, se le redirecciona a "/planillas/{pk_materia_pc}/periodos/{pk_periodo}/editar" para dejar en claro que notas le hace falta por ingresar, estas notificaciones se crearan por cada materia q tenga al menos un estudiante con una nota de 0
                        $notificacion = new Notificacion;
                        $notificacion -> fk_empleado = $empleado -> cedula;
                        $notificacion -> titulo = "¡El periodo finaliza hoy!";
                        $notificacion -> descripcion = "El periodo finaliza hoy, tienes el dia de hoy para subir las notas faltantes";
                        $notificacion -> link = "/planillas/".$empleado->pk_materia_pc."/periodos/".$empleado->fk_periodo."/editar";
                        $notificacion -> save();
                    }
                }
            }
        }
    }
}
