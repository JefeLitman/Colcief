@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Planillas {{$materiapc->nombre}}')
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
    <table>
        <thead>
            <tr>
                <th>
                    Nombre estudiante
                </th>
                    @foreach ($divisiones as $d)
                        @foreach ($notas[$p->pk_periodo][$d->pk_division] as $n)
                            <th>
                                {{$n->nombre}} ({{$n->porcentaje}}%)
                            </th>
                        @endforeach
                        <th>
                            {{$d->nombre}} ({{$d->porcentaje}}%)
                        </th>
                    @endforeach
                    <th>
                        P{{$p->nro_periodo}}
                    </th>
                <th>
                    NF
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $e)
                <tr>
                    <td>
                        {{$e->nombre}} {{$e->apellido}}
                    </td>
                        @foreach ($divisiones as $d)
                            @foreach ($notas[$p->pk_periodo][$d->pk_division] as $n)
                                <td>
                                    {{$notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]->nota}}
                                </td>
                            @endforeach
                            <td>
                                {{$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division}}
                            </td>
                        @endforeach
                        <td>
                            {{$notaPer[$e->pk_estudiante][$p->pk_periodo]->nota_periodo}}
                        </td>
                    <td>
                        {{$e->nota_materia}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
