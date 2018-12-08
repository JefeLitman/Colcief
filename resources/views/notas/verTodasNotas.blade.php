@extends('contenedores.profesor')
@section('titulo',' Ver Notas')
@section('contenedor_profesor')
{{-- mensajes de error --}}
@include('error.error')
<br id="br">
<div class="container">
    <div class="accordion" id="accordionExample">
        {{--  recorre el acordion del curso --}}
        @php
            $i=0;
        @endphp
        @foreach ($datos as $llave => $dato)
            <div class="card mx-auto border-dark bg-light" style="border-color:#66bb6a !important;">
                <div id="headingOne">
                    <div class="card-header" style="background-color:#66ba6a7d !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}" >
                        {{--  Curso   --}}
                        <h5 class="text-center mb-0">
                            {{$llave}}
                        </h5>
                    </div>
                </div>
                <div class="collapse" id="collapse{{$i}}" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                    <div class="card-body accordion" id="accordionExample">
                        @php
                            $j=0;
                        @endphp
                        {{--  ///////////  --}}
                        @foreach ($dato as $materia)
                        <div class="card-header" data-toggle="collapse" data-target="#collapseExample{{$j}}" aria-expanded="false" aria-controls="collapseExample{{$j}}" style="background-color:#66ba6a7d !important; cursor: pointer; border-color:#66bb6a !important;">
                            <h5 class="text-center mb-0">
                                {{$materia['materia']}} {{$materia['salon']}}
                            </h5>
                        </div>

                        <div class="collapse" id="collapseExample{{$j}}">
                            <div class="card card-body">
                                  <div class="table-responsive">
                                    <table class="table table-hover mr-auto">
                                        <thead>
                                            <tr>
                                                @for ($k=1; $k <= $numeroPeriodos; $k++)
                                                <th scope="col" style="color:#00695c" class="text-center">Periodo {{$k}}</td>
                                                @endfor
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($materia['periodos'] as $periodo)
                                                {{-- En la variable nota está toda la info de la nota que sea necesaria --}}
                                                <td class="text-center">
                                                    @foreach ($periodo as $nota)
                                                        <a href="{{ route('notas.show',$nota['pk_nota']) }}">
                                                            <p class="cambiop text-center mb-0" style="color:black;">
                                                                {{$nota['nombre']}}
                                                            </p>
                                                        </a>
                                                    <div class="dropdown-divider"></div>
                                                    @endforeach
                                                </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @php
                            $j++;
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            {{--  recorre el acordión del curso --}}
            @php
                $i++;
            @endphp
        @endforeach
    </div>
</div>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection
