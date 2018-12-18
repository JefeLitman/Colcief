@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Planillas')
<br id="br">
<div class="container" style="background:#fafafa !important;">
    {{-- El titulo de la vista --}}
    @php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
    @endphp
    <h4 class="text-center mb-0">
    Planillas: {{$g[$grado->prefijo]}} - {{$grado->sufijo}}
    </h4>
    <br>
    <div class="accordion" id="accordionExample">
        @php
            $i=0;
        @endphp
        @foreach ($materias as $m)
        <div class="card mx-auto border-dark bg-light" style="border-color:#66bb6a !important;">
            <div id="headingOne">
                <div class="card-header" style="background-color:#66ba6a7d !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                    {{-- materias --}}
                    <h5 class="text-center mb-0">
                        {{$m->nombre}}
                    </h5>
                </div>
            </div>
            <div class="collapse" id="collapse{{$i}}" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mr-auto">
                            <thead>
                                <tr>
                                    <th scope="col" style="color:#00695c" class="text-center">Periodos</th>
                                    <th scope="col" style="color:#00695c" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periodos as $p)
                                <tr>
                                    <td class="text-center">
                                        Periodo {{$p->nro_periodo}}
                                    </td>
                                    <td class="text-center">
                                        <a href="/planillas/{{$m->pk_materia_pc}}/periodos/{{$p->pk_periodo}}" title="Ver planilla"><i class="fas fa-eye" style="color:#00838f"></i>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        </div>
        @endforeach
    </div>
</div>
<br>
{{-- <div class="container" style="background:#fafafa !important;">
    <h4 class="text-center"> Planillas: {{$g[$grado->prefijo]}} - {{$grado->sufijo}} </h4>
    @foreach ($materias as $m)
        <a href="/cursos/{{$grado->pk_curso}}/planillas/{{$m->pk_materia_pc}}">
            <button>
                {{ucwords($m->nombre)}}
            </button>
        </a><br><br>
    @endforeach

</div> --}}
@endsection
