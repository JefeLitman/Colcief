@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Planillas')
<br id="br">
@php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
@endphp
<div class="container" style="background:#fafafa !important;">
    <h4 class="text-center"> Planillas: {{$g[$grado->prefijo]}} - {{$grado->sufijo}} </h4>
    @foreach ($materias as $m)
        <a href="/cursos/{{$grado->pk_curso}}/planillas/{{$m->pk_materia_pc}}">
            <button>
                {{$m->nombre}}
            </button>
        </a><br><br>
    @endforeach

</div>
@endsection
