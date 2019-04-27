@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo',' Horario') 
@php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
    $setion = ['Primaria' => $primaria, 'Secundaria' => $secundaria]
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="accordion mt-3" id="accordion">
                <div class="card-header bg-secondary text-center text-white">
                        Cursos COLCIEF
                </div>
                @csrf
                @if(count($primaria) == 0 && count($secundaria) == 0)
                    <div class="card">
                        <div class="card-body">No se encuentran cursos registrados </div>
                    </div>
                @else
                    @foreach($setion as $key => $seccion)
                    <div class="card">
                        <div class="card-header" id="heading_{{$key}}">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$key}}">
                                {{$key}}
                            </button>
                            </h5>
                        </div>

                        <div id="collapse_{{$key}}" class="collapse" aria-labelledby="heading_{{$key}}" data-parent="#accordion">

                            <div class="container-fluid">
                                <div class="row">
                                    @if(count($seccion) == 0)
                                        <div class="card-body">No se encuentran cursos registrados en {{strtolower($key)}}</div>
                                    @else
                                        @foreach($seccion as $grado)
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                                <a class="btn btn-outline-secondary mt-3 mb-3 form-control" data-toggle="collapse" href="#{{$g[$grado[0]->prefijo]}}" role="button" aria-expanded="false" aria-controls="{{$g[$grado[0]->prefijo]}}">
                                                    <small>{{ucwords($g[$grado[0]->prefijo])}}</small>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            {{-- Contenidos para primaria --}}
                            @foreach($seccion as $grado)
                                <div class="collapse" id="{{$g[$grado[0]->prefijo]}}">
                                    <div class="card card-body text-center">
                                        Cursos de {{$g[$grado[0]->prefijo]}}
                                        <div class="row">
                                            @foreach ($grado as $curso)
                                                <div class="col-12 col-sm-4 col-lg-2">
                                                    <a class="form-control btn btn-primary mt-3" href="{{route('horarios.curso', $curso->pk_curso)}}" role="button">{{$curso->prefijo}}-{{$curso->sufijo}}</a>
                                                </div>
                                            @endforeach 
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            @if (session('role') == 'administrador')
                <div class="row text-center mt-4">
                    <div class="col-6">
                        <a data-toggle="tooltip" data-placement="top" title="Crear curso" class="btn btn-info" href="/cursos/crear">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <small class="d-none d-sm-block">Crear curso</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <a data-toggle="tooltip" data-placement="top" title="Crear Estudiante" class="btn btn-info" href="/estudiantes/crear">
                            <i class="fas fa-user-plus"></i>
                            <small class="d-none d-sm-block">Crear estudiante</small>
                        </a>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header bg-secondary text-center text-white">
                    Horarios - Empleados
                </div>
                <ul class="list-group list-group-flush">
                    @if(count($empleados) == 0)
                        <li class="list-group-item" style="cursor: pointer;">
                            <div>
                                No se encuentran profesores ni directores registrados
                            </div>
                        </li>
                    @else
                        @foreach ($empleados as $empleado)
                            <li class="list-group-item" style="cursor: pointer;">
                                <div onclick="location.href='{{route('horarios.empleado', $empleado->cedula)}}'">
                                    {{ucwords($empleado->nombre." ".$empleado->apellido)}}
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>




@endsection
