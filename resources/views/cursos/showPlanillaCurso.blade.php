@extends('contenedores.'.((session('role')=='administrador')?'admin':'profesor'))
@section('contenedor_'.((session('role')=='administrador')?'admin':'profesor'))
@section('titulo','Planilla '.$materiapc->materia)
<br id="br">
@php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
@endphp
<div class="container" style="background:#fafafa !important;">
    {{-- Encabezado --}}
    <div>
        <h5 class="text-center"> COLEGIO INTEGRADO EZEQUIEL FLORIAN </h5>
        <h5 class="text-center">FLORIAN - SANTANDER </h5>
        <b>Materia: </b> {{ucwords($materiapc->materia)}}
        <b>Curso: </b> {{$g[$materiapc->prefijo]}} - {{$materiapc->sufijo}}
        <b>Año: </b> {{$materiapc->created_at->year}}
        <br>
        <b>Docente: </b> {{ucwords($materiapc->nombre)}} {{ucwords($materiapc->apellido)}}
        <b>Periodo: </b> {{strtoupper($g[$p->nro_periodo])}}
    </div>
    <br>

    {{-- Planilla --}}
    <table>
        {{-- Encabezado planilla --}}
        <thead>
            <tr>
                <th>
                    Nombre estudiante
                </th>
                <th>
                    {{-- Inasistencias por el periodo seleccionado --}}
                    IA
                </th>
                    @foreach ($divisiones as $d)
                        @foreach ($notas[$p->pk_periodo][$d->pk_division] as $n)
                            {{-- Encabezado: Notas--}}
                            <th>
                                {{$n->nombre}} ({{$n->porcentaje}}%)
                            </th>
                        @endforeach
                        {{-- Encabezado: Nota de  la division --}}
                        <th>
                            {{$d->nombre}} ({{$d->porcentaje}}%)
                        </th>
                    @endforeach
                    @foreach ($periodos as $z)
                        {{-- Encabezado: Notas periodos --}}
                        <th>
                            P{{$z->nro_periodo}} {{-- Periodo N --}}
                        </th>
                    @endforeach
                <th>
                    {{-- Encabezado: Nota Final --}}
                    NF
                </th>
            </tr>
        </thead>
        {{-- Cuerpo planilla --}}
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
                            <td>
                                {{-- Notas por division del estudiante --}}
                                {{$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division}}
                            </td>
                        @endforeach
                        @foreach ($periodos as $z)
                            <td>
                                {{-- Notas por periodo del estudiante --}}
                                {{$notaPer[$e->pk_estudiante][$z->pk_periodo]->nota_periodo}}
                            </td>
                        @endforeach
                    <td>
                        {{-- Nota final del estudiante --}}
                        {{$e->nota_materia}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
