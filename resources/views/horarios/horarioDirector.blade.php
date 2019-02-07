@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo',' Horarios') 
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header bg-secondary text-center text-white">
                    Horarios
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="cursor:pointer">
                        <div onclick="location.href='{{route('horarios.empleado', session('user')['cedula'])}}'">
                            {{session('user')['nombre']}} {{session('user')['apellido']}}
                        </div>
                    </li>
                    <li class="list-group-item" style="cursor:pointer">
                        <div onclick="location.href='{{route('horarios.curso', session('user')['fk_curso'])}}'">
                            Curso: {{$c}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
