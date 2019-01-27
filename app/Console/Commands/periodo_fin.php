<?php

namespace App\Console\Commands;

use App\Periodo;
use App\Notificacion;
use App\Empleado;
use App\Fecha;

use Illuminate\Console\Command;

class periodo_fin extends Command {

    protected $signature = 'periodo:fin';
    protected $description = '';

    public function __construct(){
        parent::__construct();
        setlocale(LC_ALL, 'es_CO.UTF-8');
        $this -> semana = date("Y-m-d", strtotime(date('Y-m-d')."+ 1 week")); // hoy + 7 dias
        $this -> hoy = date('Y-m-d'); // hoy
    }

    private function notificacion($arrays, $titulo, $descripcion, $link){
        foreach($arrays as $empleado){
            return Notificacion::create([
                'fk_empleado' => $empleado -> cedula,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'link' => $link
            ]);
        }
    }
    public function handle(){
        // obtengo los administradores
        $admins = Empleado::where('role','0') -> get();

        //obtengo los directores y empleados que tienen notas con valor de 0
        $empleado_semana = Empleado::select('empleado.cedula', 'nota.pk_nota') -> join('materia_pc', 'empleado.cedula', 'materia_pc.fk_empleado') -> join('nota', 'materia_pc.pk_materia_pc', 'nota.fk_materia_pc') -> join('nota_estudiante', 'nota.pk_nota', 'nota_estudiante.fk_nota') -> where('empleado.role','<>','0') -> where('empleado.role','<>','3') -> where('empleado.tiempo_extra','0') -> where('nota_estudiante.nota','0') -> groupBy('empleado.cedula') -> groupBy('materia_pc.pk_materia_pc') -> get();

        //obtengo los directores y empleados que tienen notas con valor de 0 y las agrupo por materias_pc
        $empleado_hoy = Empleado::select('empleado.cedula', 'nota.fk_periodo', 'materia_pc.pk_materia_pc') -> join('materia_pc', 'empleado.cedula', 'materia_pc.fk_empleado') -> join('nota', 'materia_pc.pk_materia_pc', 'nota.fk_materia_pc') -> join('nota_estudiante', 'nota.pk_nota', 'nota_estudiante.fk_nota') -> where('empleado.role','<>','0') -> where('empleado.role','<>','3') -> where('empleado.tiempo_extra','0') -> where('nota_estudiante.nota','0') -> groupBy('empleado.cedula') -> groupBy('materia_pc.pk_materia_pc') -> get();
        
        //obtengo los periodos que le falten una semana para expirar
        $periodos_semana = Periodo::where('ano', date('Y')) -> where('fecha_limite', $this -> semana) -> get();
        error_log($periodos_semana);

        //obtengo los periodos que le falten un díapara expirar
        $periodos_hoy = Periodo::where('ano', date('Y')) -> where('fecha_limite', $this -> hoy) -> get();

        foreach ($periodos_semana as $periodo) {
            $this -> notificacion(
                $admins,
                "El periodo esta por finalizar", 
                "El periodo finaliza en una semana, recuerde que una vez finalizado el periodo no le sera posible realizar modificaciones en las fechas correspondientes a el periodo vigente. El periodo finaliza el ".ucwords(strftime('%A', strtotime($periodo -> fecha_limite))).' '.explode('-', $periodo -> fecha_limite)[2].' de '.ucwords(strftime('%B', strtotime($periodo -> fecha_limite))),
                "/periodos/".$periodo -> pk_periodo.'/editar'
            );
            $this -> notificacion(
                $empleado_semana,
                "El periodo esta por finalizar",
                "El periodo finaliza en una semana, ingrese las notas faltantes, la fecha limite es el ".ucwords(strftime('%A', strtotime($periodo -> fecha_limite))).' '.explode('-', $periodo -> fecha_limite)[2].' de '.ucwords(strftime('%B', strtotime($periodo -> fecha_limite))),
                "/materiaspc"
            );
        }

        foreach ($periodos_hoy as $periodo) {
            $this -> notificacion(
                $admins,
                "¡El periodo finaliza hoy!",
                "El periodo finaliza hoy, tiene el transcurso del díapara modificar las fechas pertenecientes a este periodo, recuerde que una vez finalizado el periodo no le sera posible realizar modificaciones en las fechas correspondientes a el periodo vigente.",
                "/periodos/".$periodo -> pk_periodo.'/editar'
            );
            foreach($empleado_hoy as $empleado){ // creo notificaciones para el empleado, se le avisa que falta una semana, se le redirecciona a "/planillas/{pk_materia_pc}/periodos/{pk_periodo}/editar" para dejar en claro que notas le hace falta por ingresar, estas notificaciones se crearan por cada materia q tenga al menos un estudiante con una nota de 0
                Notificacion::create([
                    'fk_empleado' => $empleado -> cedula,
                    'titulo' => "¡El periodo finaliza hoy!",
                    'descripcion' => "Tiene notas sin ingresar, tiene el transcurso de díapara finalizar el registro de estas",
                    'link' => "/planillas/".$empleado->pk_materia_pc."/periodos/".$empleado->fk_periodo."/editar"
                ]);
            }
        }
    }
}
