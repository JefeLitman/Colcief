@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<br>
<div class="container" style="background:#fafafa !important;">
    <div class="card mx-auto border-dark bg-light" style="max-width: 20rem; border-color:#66bb6a !important;">
        <div class="card-header" style="background-color:#66ba6a7d !important;">
            <h3 class="text-center">Lista de horarios</h3>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($materias as $materia)
                <li class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                    <a href="/horarios/{{$materia->pk_materia}}" style="text-decoration:none; color:black !important;"><h5 class="card-title text-center cambio">{{$materia->nombre}}</h5></a>
                </li>
        @endforeach
        </ul>
    </div>
</div>
@endsection
