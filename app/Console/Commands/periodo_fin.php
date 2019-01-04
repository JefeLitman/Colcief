<?php

namespace App\Console\Commands;

use App\Periodo;
use App\Notificacion;
use App\Empleado;
use App\Fecha;

use Illuminate\Console\Command;

class periodo_fin extends Command {

    protected $signature = 'periodo:fin';
    protected $description = 'Command description';

    public function __construct(){
        parent::__construct();
        setlocale(LC_ALL, 'es_CO.UTF-8');
    }

    private function notificacion($arrays, $titulo, $descripcion, $link){
        foreach($arrays as $empleado){
            $notificacion = new Notificacion;
            $notificacion -> fk_empleado = $empleado -> cedula;
            $notificacion -> titulo = $titulo;
            $notificacion -> descripcion = $descripcion;
            $notificacion -> link = $link;
            return $notificacion -> save();
        }
    }
    public function handle(){
        $periodos = Periodo::all() -> where('ano', date('Y')); //obtengo los periodos vigentes
        $admins = Empleado::where('role','0') -> get(); // administradores
        foreach($periodos as $periodo){
            if(explode('-', $periodo -> fecha_limite)[1] == date('m')){ //verifico que se el mes correspondiente
                if((explode('-', $periodo -> fecha_limite)[2]- date('d')) == 7){ //verifico que falten 7 dias para la expiracion del periodo
                    error_log($admins);
                    error_log($this -> notificacion(
                        $admins,
                        "El periodo esta por finalizar", 
                        "El periodo finaliza en una semana, recuerde que una vez finalizado el periodo no le sera posible realizar modificaciones en las fechas. El periodo finaliza el ".ucwords(strftime('%A', strtotime($periodo -> fecha_limite))).' '.explode('-', $periodo -> fecha_limite)[2],
                        "/periodos/".$periodo -> pk_periodo.'/editar'
                    ));
                    
                    $empleados = Empleado::select('empleado.cedula', 'nota.pk_nota') -> join('materia_pc', 'empleado.cedula', 'materia_pc.fk_empleado') -> join('nota', 'materia_pc.pk_materia_pc', 'nota.fk_materia_pc') -> join('nota_estudiante', 'nota.pk_nota', 'nota_estudiante.fk_nota') -> where('empleado.role','<>','0') -> where('empleado.tiempo_extra','0') -> where('nota_estudiante.nota','0') -> groupBy('empleado.cedula') -> groupBy('materia_pc.pk_materia_pc') -> get();
                    //obtengo los empleados que tienen notas en el valor de 0
                    $this -> notificacion(
                        $empleados,
                        "El periodo esta por finalizar",
                        "El periodo finaliza en una semana, ingrese las notas faltantes, la fecha limite es el ".ucwords(strftime('%A', strtotime($periodo -> fecha_limite))).' '.explode('-', $periodo -> fecha_limite)[2],
                        "/materiaspc"
                    );

                } elseif ((explode('-', $periodo -> fecha_limite)[2] - date('d')) == 0){ //Verifico que falte 1 dia para la expiracion del periodo
                    $this -> notificacion(
                        $admins,
                        "¡El periodo finaliza hoy!",
                        "El periodo finaliza hoy, tiene el transcurso del dia para modificar las fechas pertenecientes a este periodo, recuerde que una vez finalizado el periodo no le sera posible realizar modificaciones en las fechas. El periodo finaliza el ".ucwords(strftime('%A', strtotime($periodo -> fecha_limite))).' '.explode('-', $periodo -> fecha_limite)[2],
                        "/periodos/".$periodo -> pk_periodo.'/editar'
                    );
    
                    $empleados = Empleado::select('empleado.cedula', 'nota.fk_periodo', 'materia_pc.pk_materia_pc') -> join('materia_pc', 'empleado.cedula', 'materia_pc.fk_empleado') -> join('nota', 'materia_pc.pk_materia_pc', 'nota.fk_materia_pc') -> join('nota_estudiante', 'nota.pk_nota', 'nota_estudiante.fk_nota') -> where('empleado.role','!=','0') -> where('empleado.tiempo_extra','0') -> where('nota_estudiante.nota','0') -> groupBy('empleado.cedula') -> groupBy('materia_pc.pk_materia_pc') -> get();
                    //obtengo los empleados que tienen notas en el valor de 0 y las agrupo por materias_pc

                    foreach($empleados as $empleado){ // creo notificaciones para el empleado, se le avisa que falta una semana, se le redirecciona a "/planillas/{pk_materia_pc}/periodos/{pk_periodo}/editar" para dejar en claro que notas le hace falta por ingresar, estas notificaciones se crearan por cada materia q tenga al menos un estudiante con una nota de 0
                        $notificacion = new Notificacion;
                        $notificacion -> fk_empleado = $empleado -> cedula;
                        $notificacion -> titulo = "¡El periodo finaliza hoy!";
                        $notificacion -> descripcion = "Tiene notas sin ingresar, tiene el transcurso de dia para finalizar el registro de estas";
                        $notificacion -> link = "/planillas/".$empleado->pk_materia_pc."/periodos/".$empleado->fk_periodo."/editar";
                        $notificacion -> save();
                    }
                }
            }
        }
    }
}
