@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo',' Horario') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-secondary text-center text-white">
                    Horarios - Cursos
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($cursos as $curso)
                        <li class="list-group-item" style="cursor: pointer;">
                            <div onclick="location.href='{{route('horarios.curso', $curso->pk_curso)}}'">
                                Curso {{$curso->prefijo."-".$curso->sufijo}}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- <div class="accordion" id="accordion">
                <div class="card-header bg-secondary text-center text-white">
                    Horarios - Cursos
                </div>
                @foreach ($cursos as $curso)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-2">
                                <a href="{{route('horarios.curso', $curso->pk_curso)}}" class="btn btn-link collapsed">
                                    Curso {{$curso->prefijo."-".$curso->sufijo}}
                                </a>
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-secondary text-center text-white">
                    Horarios - Empleados
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($empleados as $empleado)
                        <li class="list-group-item" style="cursor: pointer;">
                            <div onclick="location.href='{{route('horarios.empleado', $empleado->cedula)}}'">
                                {{ucwords($empleado->nombre." ".$empleado->apellido)}}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>




@endsection
