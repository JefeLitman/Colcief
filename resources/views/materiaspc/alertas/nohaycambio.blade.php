@extends('contenedores.profesor')
@section('titulo','Alerta')
@section('contenedor_profesor')
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="card mx-auto border-dark bg-light" style="width: 40rem; border-color:#66bb6a !important;">
        <div class="card-header" style="background-color:#66ba6a7d !important;">
            <h1 class="text-center">
                <i class="fas fa-exclamation-triangle" style="color:white;"></i>
            </h1>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                <h5 class="card-title text-center">
                    No hay ningun cambio para guardar.
                </h5>
            </li>
        </ul>
    </div>
</div>
@endsection
