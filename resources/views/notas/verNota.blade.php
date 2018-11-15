@extends('contenedores.admin')
@section('titulo',' Ver Notas')
@section('contenedor_admin')

<br>
<div class="container">
    <div class="row">
        {{-- NOTAS --}}
        <div class="col-md-4 text-center">
            <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color:#66bb6a !important;">
                <div class="card-header" style="background-color:#66ba6a7d !important;">
                    @foreach ($datos as $dato)
                        <h2 class="text-center">{{$dato[0]['nombre']}}</h2>
                    @endforeach
                </div>
                <ul class="list-group list-group-flush">
                    {{-- codigo de la nota --}}
                    <li  class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                        @foreach ($datos as $dato)
                        <h5 class="card-title text-center">Código de la nota</h5>
                        <h5 class="card-title text-center">
                            <i class="fas fa-star"></i>
                            {{$dato[0]['pk_nota']}}
                        </h5>
                        @endforeach
                    </li>

                    {{-- descripcion de la nota --}}
                    <li  class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                        @foreach ($datos as $dato)
                        {{-- <h5 class="card-title text-center">Descripción</h5> --}}
                        <h5 class="card-title text-center">
                            <i class="fas fa-book-open"></i><br>
                            {{$dato[0]['descripcion']}}
                        </h5>
                        @endforeach
                    </li>

                    {{-- porcentaje de nota --}}
                    <li  class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                        @foreach ($datos as $dato)
                        {{-- <h5 class="card-title text-center">Descripción</h5> --}}
                        <h5 class="card-title text-center">
                            {{$dato[0]['porcentaje']}}   <i class="fas fa-percentage"></i>
                        </h5>
                        @endforeach
                    </li>
                </ul>
            </div>
            {{-- @foreach ($datos as $dato)
            <p>pk_nota: {{$dato[0]['pk_nota']}}</p>
            <p>nombre: {{$dato[0]['nombre']}}</p>
            <p>descripcion: {{$dato[0]['descripcion']}}</p>
            <p>porcentaje: {{$dato[0]['porcentaje']}}</p>
            @endforeach --}}
        </div>

        {{-- Divisiones --}}
        <div class="col-md-4 text-center">
            <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color:#66bb6a !important;">
                <div class="card-header" style="background-color:#66ba6a7d !important;">
                    @foreach ($datos as $dato)
                        <h2 class="text-center">{{$dato[1]['nombre']}}</h2>
                    @endforeach
                </div>
                <ul class="list-group list-group-flush">
                    {{-- codigo de division --}}
                    <li class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                        @foreach ($datos as $dato)
                        <h5 class="card-title text-center">Código de división</h5>
                        <h5 class="card-title text-center">
                            <i class="fas fa-star"></i>
                            {{$dato[0]['fk_division']}}
                        </h5>
                        @endforeach
                    </li>

                    {{-- descripcion de la division --}}
                    <li class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                        @foreach ($datos as $dato)
                        {{-- <h5 class="card-title text-center">Descripción</h5> --}}
                        <h5 class="card-title text-center">
                            <i class="fas fa-book-open"></i><br>
                            {{$dato[1]['descripcion']}}
                        </h5>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
        {{-- Materia profesor --}}
        <div class="col-md-4 text-center">
            <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color:#66bb6a !important;">
                <div class="card-header" style="background-color:#66ba6a7d !important;">
                    @foreach ($datos as $dato)
                        <h2 class="text-center">{{$dato[2]['nombre']}}</h2>
                    @endforeach
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                        @foreach ($datos as $dato)
                        <h5 class="card-title text-center">Código de materia - profesor</h5>
                        <h5 class="card-title text-center">
                            <i class="fas fa-star"></i>
                            {{$dato[2]['fk_materia']}}
                        </h5>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

