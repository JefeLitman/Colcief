@extends('contenedores.profesor')
@section('titulo','Materia-Profesor-Curso Nuevo')
@section('contenedor_profesor')
{{-- mensajes de error --}}
@include('error.error')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $result--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
	{{-- URL: localhost:8000\materiaspc  -> Logeado en un usuario de tipo profesor--}}

	{{-- <h3>Tipo de Archivos:</h3> $result: {{ gettype($result)}} <br>
	<h3>Contenido materias:</h3> Ejemplo: $result={"Etica":[[1,"8-2"],[2,"8-2"]],"Software":[[3,"8-2"]]} <br> --}}

    <br id="br">
    <div class="container" style="background:#fafafa !important;">
        <h4 class="text-center"><i class="fas fa-book"></i> Mis Materias</h4> <br>
        <div class="accordion" id="accordionExample">
        @php
            $i=0;
        @endphp
        @foreach ($result as $nombre => $materia)
            <div class="card mx-auto border-dark bg-light" style="border-color:#66bb6a !important;">
                <div id="headingOne">
                    <div class="card-header" style="background-color:#66ba6a7d !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}" >
                        <h5 class="text-center mb-0">
                            {{ $nombre }}
                        </h5>
                    </div>
                </div>
                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mr-auto">
                                <thead>
                                    <tr>
                                        <th rowspan="2" scope="col" style="color:#00695c" class="text-center"> Código </th>
                                        <th rowspan="2" scope="col" style="color:#00695c" class="text-center"> Curso </th>
                                        <th rowspan="2" scope="col" style="color:#00695c" class="text-center"> Logros </th>
                                        <th colspan="{{count($periodos)}}" scope="col" style="color:#00695c" class="text-center"> Periodos </th>
                                    </tr>
                                    <tr>
                                        @foreach ($periodos as $p)
                                            <th scope="col" style="color:#00695c" class="text-center">P{{$p->nro_periodo}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materia as $j)
                                        <tr>
                                            {{--  código  --}}
                                            <td class="text-center"> {{$j[0]}}</td>
                                            {{--  curso  --}}
                                            <td class="text-center"> {{$j[1]}}</td>
                                            {{-- editar materia --}}
                                            <td class="text-center">
                                                {{-- Ver logros de una materia --}}
                                                <a href="/materiaspc/{{$j[0]}}"><i class="fas fa-eye" style="color:#00838f"></i></a>
                                                {{-- Editar logros de una materia --}}
                                                <a href="{{ route('materiaspc.edit',$j[0]) }}"><i class="fas fa-edit" style="color:#00838f" title="Modificar logros"></i></a>
                                            </td>
                                            @foreach ($periodos as $p)
                                                <td class="text-center">
                                                    {{-- Ver planillas/Notas --}}
                                                    <a href="/planillas/{{$j[0]}}/periodos/{{$p->pk_periodo}}"><i class="fas fa-eye" style="color:#00838f" title="Ver notas"></i></a>
                                                    {{-- Editar planillas/Notas  --}}
                                                    <a href="/planillas/{{$j[0]}}/periodos/{{$p->pk_periodo}}/editar"><i class="fas fa-edit" style="color:#00838f" title="Modificar notas"></i></a>
                                                </td>
                                            @endforeach
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--  @endfor  --}}
            @php
                $i++;
            @endphp
        @endforeach
    </div>
</div>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection
