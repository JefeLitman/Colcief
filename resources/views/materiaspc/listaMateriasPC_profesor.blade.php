@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Materia-Profesor-Curso Nuevo')
{{-- mensajes de error --}}

	{{-- Guia Front --}}
	{{-- Se envía el objeto $result--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
	{{-- URL: localhost:8000\materiaspc  -> Logeado en un usuario de tipo profesor--}}

	{{-- <h3>Tipo de Archivos:</h3> $result: {{ gettype($result)}} <br>
<h3>Contenido materias:</h3> Ejemplo: $result={"Etica":[[1,"8-2"],[2,"8-2"]],"Software":[[3,"8-2"]]} <br>
--}}
<br id="br">
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card bg-light border-info">
                <h4 class="card-header text-center"><i class="fas fa-book"></i> Mis Materias</h4>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @php
                            $j=0;
                        @endphp
                        @foreach ($result as $nombre => $materia)
                            <li class="nav-item">
                                <a class="nav-link @if($j==0) active @endif" id="tab{{$j}}" data-toggle="tab" href="#id{{$j}}" role="tab" aria-controls="id{{$j}}" aria-selected="true">{{ $nombre }}</a>
                            </li>
                        @php
                            $j++;
                        @endphp
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @php
                            $k=0;
                        @endphp
                        @foreach ($result as $nombre => $materia)
                        <div class="tab-pane fade @if($k==0) show active @endif" id="id{{$k}}" role="tabpanel" aria-labelledby="tab{{$k}}">
                            <div class="table-responsive">
                                    <table class="table table-striped table-condensed table-sm  table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" scope="col" style="color:#00695c" class="text-center"> Código </th>
                                                <th rowspan="2" scope="col" style="color:#00695c" class="text-center"> Curso </th>
                                                <th rowspan="2" scope="col" style="color:#00695c" class="text-center"> Logros </th>
                                                <th rowspan="2" scope="col" style="color:#00695c" class="text-center"> Concentrador </th>
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
                                                        <a href="/materiaspc/{{$j[0]}}" data-toggle="tooltip" data-placement="right"  title="Ver más"><i class="fas fa-eye text-info" ></i></a>
                                                        {{-- Editar logros de una materia --}}
                                                        <a href="{{ route('materiaspc.edit',$j[0]) }}" data-toggle="tooltip" data-placement="right"  title="Modificar logros"><i class="fas fa-edit text-info" ></i></a>
                                                    </td>
                                                    <td  class="text-center">
                                                      <a href="/concentrador/{{$j[0]}}" data-toggle="tooltip" data-placement="right"  title="Ver concentrador"><i class="fas fa-clipboard-list text-info" ></i></a>
                                                    </td>
                                                    @foreach ($periodos as $p)
                                                        <td class="text-center">
                                                            {{-- Ver planillas/Notas --}}
                                                            <a href="/planillas/{{$j[0]}}/periodos/{{$p->pk_periodo}}" data-toggle="tooltip" data-placement="right"  title="Ver notas" ><i class="fas fa-eye text-info"  title="Ver notas"></i></a>
                                                            {{-- Editar planillas/Notas  --}}
                                                            @php
                                                                $fecha = date('Y-m-d', strtotime($p->fecha_limite." + ".$tiempo_extra." days"));
                                                            @endphp
                                                            @if (strtotime(date('d-m-Y'))>=strtotime($p->fecha_inicio) and strtotime(date('d-m-Y'))<=strtotime($fecha))
                                                                <a data-toggle="tooltip" data-placement="right" title="Modificar notas" href="/planillas/{{$j[0]}}/periodos/{{$p->pk_periodo}}/editar" ><i class="fas fa-edit text-info" ></i></a>
                                                            @else
                                                                <a data-toggle="tooltip" data-placement="right" title="Solo puede ser editado desde el {{$p->fecha_inicio}} hasta las 23:59 del {{$p->fecha_limite}}."><i class="fas fa-edit text-secondary"  ></i></a>
                                                            @endif
                                                        </td>
                                                    @endforeach

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        @php
                            $k++;
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection
