@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Planillas {{$materiapc->nombre}}')
<br id="br">
@php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once']; 
@endphp
<div class="container">
    {{-- <h4 class="text-center"> Planilla: {{$g[$grado->prefijo]}} - {{$grado->sufijo}} </h4> --}}
    <table>
        <thead>
            <tr>
                <th>
                    Nombre estudiante
                </th>
                @foreach ($periodos as $p)
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
                @endforeach
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
                    @foreach ($periodos as $p)
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
                    @endforeach
                    <td>
                        {{$e->nota_materia}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    
</div>
@endsection
