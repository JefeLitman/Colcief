@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Planillas')
<br id="br">
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{-- El titulo de la vista --}}
        @php
        $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
        @endphp
        <div class="card bg-light border-info">
            <h4 class="card-header text-center"><i class="fas fa-clipboard-list"></i> Planillas: {{$g[$grado->prefijo]}} - {{$grado->sufijo}}</h4>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @php
                        $j=0;
                    @endphp
                    @foreach ($materias as $m)
                        <li class="nav-item">
                            <a class="nav-link @if($j==0) active @endif" id="tab{{$j}}" data-toggle="tab" href="#id{{$j}}" role="tab" aria-controls="id{{$j}}" aria-selected="true">{{$m->nombre}}</a>
                        </li>
                    @php
                        $j++;
                    @endphp
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @php
                        $k=0;
                    @endphp
                    @foreach ($materias as $m)
                    <div class="tab-pane fade @if($k==0) show active @endif" id="id{{$k}}" role="tabpanel" aria-labelledby="tab{{$k}}">
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed table-sm  table-hover text-center">
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
                                            <a href="/planillas/{{$m->pk_materia_pc}}/periodos/{{$p->pk_periodo}}" title="Ver planilla"><i class="fas fa-eye text-info"></i>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @php
                        $k++;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
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
