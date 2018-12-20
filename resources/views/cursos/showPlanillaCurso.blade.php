@extends('contenedores.'.((session('role')=='administrador')?'admin':'profesor'))
@section('contenedor_'.((session('role')=='administrador')?'admin':'profesor'))
@section('titulo','Planilla '.$materiapc->materia)
<br id="br">
@php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
@endphp
<div class="container" style="background:#fafafa !important;">
    {{-- Encabezado --}}
    <div class="card bg-light border-info mb-3">
        <div class="card-header text-center"><h5>COLEGIO INTEGRADO EZEQUIEL FLORIAN</h5></div>
        <div class="card-body">
                <table class="table table-borderless table-sm w-75 mx-auto">
                    <tbody>
                        <tr>
                        <td><b>Materia: </b> {{ucwords($materiapc->materia)}}</td>
                        <td><b>Grado: </b> {{$g[$materiapc->prefijo]}}</td>
                        <td><b>Curso: </b> {{$materiapc->sufijo}}</td>
                        </tr>
                        <tr>
                        <td><b>Docente: </b> {{ucwords($materiapc->nombre)}} {{ucwords($materiapc->apellido)}}</td>
                        <td><b>Periodo: </b> {{strtoupper($g[$p->nro_periodo])}}</td>
                        <td><b>Año: </b> {{$materiapc->created_at->year}}</td>
                        </tr>
                    </tbody>
                </table>
          <p class="card-text">
            <div class="table-responsive">
            <table class="table table-striped table-condensed table-sm  table-hover text-center">
                <thead>
                    <tr class="table-primary" >
                        <th rowspan="2">Nombres</th>
                        <th rowspan="2">IA</th>
                        @foreach ($divisiones as $d)
                        {{-- Encabezado: Nota de  la division --}}
                        <th data-toggle="tooltip" data-placement="bottom" title="{{$d->porcentaje}}%" colspan="{{count($notas[$p->pk_periodo][$d->pk_division])}}" class="table-primary">
                            {{$d->nombre}} <span class="badge badge-pill badge-primary">{{$d->porcentaje}}%</span>
                        </th>
                        <th></th>
                        @endforeach
                    <th rowspan="2" data-toggle="tooltip" data-placement="bottom" title="Nota Periodo {{$p->nro_periodo}}" >NP{{$p->nro_periodo}}</th>
                        <th rowspan="2" data-toggle="tooltip" data-placement="bottom" title="Nota definitiva del año" >NF</th>
                    </tr>
                    <tr>
                        @foreach ($divisiones as $d)
                        
                            @foreach ($notas[$p->pk_periodo][$d->pk_division] as $n)
                                {{-- Encabezado: Notas--}}
                                
                                <th class="table-secondary" data-toggle="tooltip" data-placement="bottom" title="{{$n->porcentaje}}%" >
                                    {{$n->nombre}} <span class="badge badge-pill badge-secondary">{{$n->porcentaje}}%</span>
                                </th>
                            @endforeach
                        <th class="table-secondary"></th>
                        @endforeach
                    </tr>
               
                </thead>
                <tbody>
                        @foreach ($estudiantes as $e)
                        <tr>
                            <td>
                                {{-- Nombre del estudiante --}}
                                {{$e->nombre}} {{$e->apellido}}
                            </td>
                            <td>
                                {{-- Numero de inasistencias por el periodo seleccionado del estudiante --}}
                                {{$notaPer[$e->pk_estudiante][$p->pk_periodo]->inasistencias}}
                            </td>
                                @foreach ($divisiones as $d)
                                    @foreach ($notas[$p->pk_periodo][$d->pk_division] as $n)
                                        <td>
                                            {{-- Notas del estudiante --}}
                                            {{$notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]->nota}}
                                        </td>
                                    @endforeach
                                    <td data-toggle="tooltip" data-placement="bottom" @if ($notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division <= 2.9)
                                        class="table-danger"  title="Nota Baja"
                                    @elseif($notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division <= 3.9)
                                        class="table-warning"  title="Nota Basica"
                                    @elseif($notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division <= 4.5)
                                        class="table-primary"  title="Nota Alta"
                                    @else
                                        class="table-success" title="Nota Superior"
                                    @endif >
                                        {{-- Notas por division del estudiante --}}
                                        {{$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division}}
                                    </td>
                                @endforeach
                                <td data-toggle="tooltip" data-placement="bottom" @if ($notaPer[$e->pk_estudiante][$p->nro_periodo]->nota_periodo <= 2.9)
                                    class="table-danger"  title="Nota Periodo Baja"
                                    @elseif($notaPer[$e->pk_estudiante][$p->nro_periodo]->nota_periodo <= 3.9)
                                        class="table-warning"  title="Nota Periodo Basica"
                                    @elseif($notaPer[$e->pk_estudiante][$p->nro_periodo]->nota_periodo <= 4.5)
                                        class="table-primary"  title="Nota Periodo Alta"
                                    @else
                                        class="table-success" title="Nota Periodo Superior"
                                    @endif >
                                {{-- Notas por periodo del estudiante --}}
                                {{$notaPer[$e->pk_estudiante][$p->nro_periodo]->nota_periodo}}
                            </td>
                            <td data-toggle="tooltip" data-placement="bottom"  @if ($e->nota_materia <= 2.95)
                                class="table-danger"  title="Nota Final Baja"
                                    @elseif($e->nota_materia <= 3.9)
                                        class="table-warning"  title="Nota Final Basica"
                                    @elseif($e->nota_materia <= 4.5)
                                        class="table-primary"  title="Nota Final Alta"
                                    @else
                                        class="table-success" title="Nota Final Superior"
                                    @endif >
                                {{-- Nota final del estudiante --}}
                                {{$e->nota_materia}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </p>
        </div>
      </div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
