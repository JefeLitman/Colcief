@extends('contenedores.profesor')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_profesor')

<div class="container" style="background:#fafafa !important;">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    No leidas
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @if (count($activas) > 0)
                            @foreach ($activas as $activa)
                                <a href="{{$activa->link}}" class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{$activa->titulo}}</h5>
                                    </div>
                                    <p class="mb-1">{{$activa->descripcion}}</p>
                                </a>
                            @endforeach
                        @else
                            <div class="text-center">No hay notificaciones por leer</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Leidas
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @if (count($inactivas) > 0)
                            @foreach ($inactivas as $inactiva)
                                <a href="{{$inactiva->link}}" class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{$inactiva->titulo}}</h5>
                                    </div>
                                    <p class="mb-1">{{$inactiva->descripcion}}</p>
                                </a>
                            @endforeach
                        @else
                            <div class="text-center">No hay notificaciones leidas</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
