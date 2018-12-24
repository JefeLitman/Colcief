@extends('contenedores.profesor')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_profesor')

<div class="container" style="background:#fafafa !important;">
    <div class="list-group list-group-flush">
        @foreach ($notificaciones as $notificacion)
            <a href="{{$notificacion->link}}" class="list-group-item list-group-item-action
                @if ($notificacion->estado == true)
                    list-group-item-secondary
                @endif 
            ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$notificacion->titulo}}</h5>
                </div>
                <p class="mb-1">{{$notificacion->descripcion}}</p>
            </a>
        @endforeach
    </div>
</div>


@endsection
