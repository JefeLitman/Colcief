{{-- <!DOCTYPE html> --}}

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Boletín</title>

    <style> 
    #header { 
      position: fixed; 
      /* position: absolute; */
      left: 0px; 
      top: 10px; 
      right: 0px; 
      height: 150px; 
      }
      .margin-1>th{
        padding-top:10px;
        padding-bottom:10px;
      }
      body{
        border:1px solid black ;
        border-radius: 8px;
        padding-top: 190px;
      }
      .bottom{
        border-bottom:1px solid black ;
      }
      .borde {
        border:1px black solid !important;
        border-collapse: collapse;
      }
      .rojo{
        background-color: red !important;
      }

      .azul{
        background-color: blue;
      }

      .borde-y , .borde-y>td
      {
        /* border-collapse: collapse; */
        /* border-top: 1px rgb(70,70,70) solid; */
        border-bottom: 0.5px rgb(70,70,70,0.6) solid !important;
      }

      pre{
        width:200px;
        overflow:auto
      }

      th
      {
        background-color: #D8D8D8;
      }

      th,td
      {
        padding-top: 3px;
        padding-bottom: 3px;
        margin-bottom: 0px !important;
        margin-right: 0 !important;
        margin-left: 0 !important;
        margin-top: 0 !important;
      }


	</style>
  </head>
  <body>
      <div id="header" >
        <img width="100%" style="text-align: center;" src="storage/header.png">
        <div class="borde" style="padding-left:3px;margin-left: 5px;margin-right:5px;width:100%;">
          Estudiante: <b>
              @if ($msj==1)
                        EL ESTUDIANTE NO EXISTE
                    </b>
                  </div>
                </div>
              @else
            {{$boletin->nombre}} {{$boletin->apellido}}
          </b>
        </div>
      </div>
      
      <main>
        <div style="margin-left: 4px;margin-right:5px;width:100%;">
        <table class="borde" width="100%" border="2">
          <tbody  >
            <tr  >
              <td >
                Código: {{$boletin->pk_estudiante}}
              </td>
              <td>
                Acudiente: {{$acudiente}}
              </td>
            </tr>
            <tr >
              <td>
                Año Escolar: {{$boletin->ano}}
              </td>
              <td>
                Periodo: 
                @if ($pPasado == -1)
                    {{"-"}}
                @else
                  @php  
                      $ps=["PRIMERO","SEGUNDO","TERCERO","CUARTO"];
                  @endphp
                  @foreach ($infoPeriodos as $p)
                      @if ($p->pk_periodo == $pPasado)
                          {{$ps[($p->nro_periodo-1)]}}
                      @endif
                  @endforeach
                @endif
                
              </td>
            </tr>
            <tr >
              <td>
                Curso: {{($boletin->prefijo==0)?"Preescolar":$boletin->prefijo}} - {{$boletin->sufijo}}
              </td>
              <td>
                Director: {{($empleado=="")?"-":$empleado}}
              </td>
            </tr>
          </tbody>
        </table>
    </div>

    <div style="margin-left: 4px;margin-right:5px;width:100%;margin-top:10px;border-collapse: collapse;">
        <table class="" width="100%">
          <thead>
            <tr >
              <th align="center">
                Areas y/o Asignaturas
              </th>
              <th align="center">
                Desempeño
              </th>
              <th align="center">
                Inasistencia
              </th>
            </tr>
          </thead>
            <tbody>
              {{-- if aun no acaba el primer periodo --}}
              @if ($msj == 4)
                  <tr>
                    <td colspan="3" align="center" class="borde-y">
                      <br>
                        <b> El primer periodo aun no ha culminado </b>
                        <br><br>
                    </td>
                  </tr>
              @else
                  {{-- if no hay materias asignadas --}}
                  @if ( $msj == 2) 
                    <tr>
                      <td colspan="3" align="center" class="borde-y">
                        <br>
                          <b> No hay materias asignadas a este estudiante </b>
                          <br><br>
                      </td>
                    </tr>
                  @else
                    @foreach ($materias as $m)
                      <tr class="borde-y">
                        <td >
                          <br><b> {{mb_strtoupper($m->nombre)}} </b>
                        </td>
                        <td align="center">
                          <br>
                          @if ($notaPeriodos[$m->pk_materia_boletin][$pPasado] <= 2.9 )
                              BAJO({{$notaPeriodos[$m->pk_materia_boletin][$pPasado]}})
                          @else
                              @if ($notaPeriodos[$m->pk_materia_boletin][$pPasado] >= 3.0 && $notaPeriodos[$m->pk_materia_boletin][$pPasado] <= 3.9 )
                                BASICO({{$notaPeriodos[$m->pk_materia_boletin][$pPasado]}})
                              @else
                                @if ($notaPeriodos[$m->pk_materia_boletin][$pPasado] >= 4.0 && $notaPeriodos[$m->pk_materia_boletin][$pPasado] <= 4.5 )
                                  ALTO({{$notaPeriodos[$m->pk_materia_boletin][$pPasado]}})
                                @else
                                  SUPERIOR({{$notaPeriodos[$m->pk_materia_boletin][$pPasado]}})
                                @endif
                              @endif
                          @endif
                        </td>
                        <td align="center">
                            <br>{{$inasistenciaNotaPeriodos[$m->pk_materia_boletin][$pPasado]}}
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" style="padding-left:10px;color:rgb(70,70,70);">
                            <b> Logros evaluados </b>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" style="padding-left:20px;" class="borde-y">
                          @if ($m->logros_custom=="")
                            {{"No hay logros"}}
                          @else
                            @php
                              echo nl2br($m->logros_custom,false);
                            @endphp
                          @endif 
                        </td>
                      </tr>
                    @endforeach
                  @endif
              @endif
            </tbody>
          </table>        
          <h4 style="text-align:center;margin-bottom:5px;">CUADRO GENERAL DE EVALUACIONES E INASISTENCIA</h4>
          {{-- COPY PASTE -------------------------------------------- --}}
            <table width="100%" style="border-collapse: collapse;">
                <thead>
                    {{-- Cabecero tabla --}}
                    <tr class="margin-1">
                        <th >Areas y/o Asignaturas</th>
                        @foreach ($infoPeriodos as $periodo)
                            <th >Nota P{{$periodo->nro_periodo}}</th>
                        @endforeach
                        <th >Nota final</th>
                    </tr>
                </thead>
                <tbody> 
                  @if ( $msj == 2) 
                    <tr>
                      <td colspan="7" align="center" class="borde-y">
                        <br>
                          <b> No hay materias asignadas a este estudiante </b>
                          <br><br>
                      </td>
                    </tr>
                  @else
                    {{-- Contenido Tabla --}}
                    @foreach ($materias as $m)
                        <tr class="borde-y">
                            <td>{{$m->nombre}}</td>
                            @foreach ($infoPeriodos as $periodo)
                                <td>

                                        @if (intval($notaPeriodos[$m->pk_materia_boletin][$periodo->pk_periodo]) >= '3')
                                            {{$notaPeriodos[$m->pk_materia_boletin][$periodo->pk_periodo]}}
                                        @else
                                          <b style="color: #661923;">
                                              {{$notaPeriodos[$m->pk_materia_boletin][$periodo->pk_periodo]}}
                                          </b>
                                        @endif
                                </td>
                            @endforeach
                            <td>
                                @if (intval($m->nota_materia) >= '3')
                                  {{$m->nota_materia}}
                                @else
                                  <b style="color: #661923;">
                                      {{$m->nota_materia}}
                                  </b>
                                @endif  
                            </td>
                        </tr>
                    @endforeach
                    <tr  style="border-top: 2px solid #dee2e6 !important;">
                        <td>
                            <b> Promedio </b>
                        </td>
                        @foreach ($infoPeriodos as $periodo)
                            <td>
                                @if ($puesto[$periodo->pk_periodo]==null)
                                    {{"-"}}
                                @else
                                    {{$puesto[$periodo->pk_periodo]->promedio_periodo}}
                                @endif
                                
                            </td>
                        @endforeach
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <b> Puesto</b>
                        </td>
                        @foreach ($infoPeriodos as $periodo)
                            <td>
                                @if ($puesto[$periodo->pk_periodo]==null)
                                    {{"-"}}
                                @else
                                    {{$puesto[$periodo->pk_periodo]->puesto}}
                                @endif
                            </td>
                            
                        @endforeach
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <b> Inasistencias</b>
                        </td>
                        @foreach ($infoPeriodos as $periodo)
                            <td>
                                {{$inasistencias[$periodo->pk_periodo]}}
                            </td>
                        @endforeach
                        <td></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        <div style="background-color: rgb(190,190,190);text-align:center; ">
          @switch($boletin->estado)
              @case('a')
                      <b>Estado: </b>Aprobado
                  @break
              @case('p')
                      <b>Estado: </b>Reprobado
                  @break
              @default 
                      <b>Estado: </b>Indefinido <br>
                      Es posible que el estudiante aun se encuentre cursando el año.
          @endswitch
        </div>
        {{--  tabla  de recuperaciones --}}
        <h4 style="text-align:center;margin-bottom:5px;">CUADRO INFORMATIVO DE RECUPERACIONES </h4>
                <table style="border-collapse: collapse;" align="center">
                    <thead>
                        <tr>
                            <th rowspan="2"   class="text-center align-middle">
                                ÁREAS Y/O ASIGNATURAS
                            </th>
                            <th colspan="2" class="text-center" style="border-left: 2px solid #D8D8D8 !important;">
                                EVALUACIONES
                            </th>
                            <th colspan="3" class="text-center" style="border-left: 2px solid #D8D8D8 !important;">
                                RECUPERACIONES
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" style="border-left: 2px solid #D8D8D8 !important;" class="text-center">
                                Periodo
                            </th>
                            <th scope="col"  class="text-center">
                                Valoración
                            </th>
                            <th scope="col" style=";border-left: 2px solid #D8D8D8 !important;" class="text-center">
                                Recup
                            </th>
                            <th scope="col"  class="text-center">
                                Acta
                            </th>
                            <th scope="col"  class="text-center">
                                Fecha
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ( $msj == 2) 
                        <tr>
                          <td colspan="8" align="center" class="borde-y">
                            <br>
                              <b> No hay materias asignadas a este estudiante </b>
                              <br><br>
                          </td>
                        </tr>
                      @else
                        @foreach ($recuperaciones as $r)
                            <tr>
                                {{-- ÁREAS Y/O ASIGNATURAS --}}
                                <td>
                                    {{ucwords($r->nombre)}}
                                </td>
                                {{-- Periodo --}}
                                <td style="border-left: 2px solid #D8D8D8 !important;">
                                    P{{$r->nro_periodo}}
                                </td>
                                {{-- Valoración --}}
                                <td class="text-center">
                                    {{$r->nota_periodo}}
                                </td>
                                {{-- Recup --}}
                                <td style="border-left: 2px solid #D8D8D8 !important;">
                                    {{$r->nota}}
                                </td>
                                {{-- Acta --}}
                                <td>
                                    {{$r->observaciones}}
                                </td >
                                {{-- Fecha --}}
                                <td>
                                    {{$r->fecha_presentacion}}
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                  @endif
                </table>
    </div>
    @endif
  </body>
</html>