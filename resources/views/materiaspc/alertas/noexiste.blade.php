@extends('contenedores.admin')
@section('titulo','Alerta')
@section('contenedor_admin')
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="card mx-auto border-dark bg-light" style="width: 40rem; border-color:#17a2b8 !important;">
        <div class="card-header" style="background-color:rgba(0,0,0,.03) !important;">
            <h1 class="text-center">
                <i class="fas fa-exclamation-triangle" style="color:white;"></i>
            </h1>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-center" style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
                <h5 class="card-title text-center">
                    Esta materia no existe
                </h5>
            </li>
        </ul>
    </div>
</div>
@endsection
