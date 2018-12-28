@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-10">
            {{-- Lista de horarios de las materias --}}
            <div class="card mx-auto border-dark bg-light" style="max-width: 20rem; border-color:#17a2b8!important;">
                <div class="card-header" style="background-color:rgba(0,0,0,.03) !important;">
                    <h3 class="text-center">Lista de horarios</h3>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($materias as $materia)
                        <li class="list-group-item text-center" style="border-top-color: #17a2b8!important; border-bottom-color: #17a2b8!important;">
                            <a href="/horarios/{{$materia->pk_materia}}" style="text-decoration:none; color:black !important;"><h5 class="card-title text-center cambio">{{$materia->nombre}}</h5></a>
                        </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
