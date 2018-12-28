@extends('contenedores.admin')
@section('titulo','Materia-Profesor-Curso Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}

	{{-- Guia Front --}}
	{{-- Se envía el objeto $result--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
	{{-- URL: localhost:8000\materiaspc  -> Logeado en un usuario de tipo administrador--}}
<br id="br">
<div class="container" style="background:#fafafa !important;">
    <h1 class="text-center">
        Materias
    </h1>
    <br>
        <div class="accordion" id="accordionExample">
        @csrf
        @php
            $i=0;
            $k=0;
        @endphp
        @foreach ($materias as $m)
            <div id="materia{{$i}}" class="card mx-auto border-dark bg-light" style="border-color:#66bb6a !important;">
                <div id="headingOne">
                    <div class="card-header" style="background-color:#66ba6a7d !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}" >
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="text-center mb-0">
                                {{ $m->nombre }}
                            </h5>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('materias.edit', $m->pk_materia) }}" style="text-decoration:none !important; color:#004d40 !important;"><i class="fas fa-edit cambiob"></i></a>
                        </div>
                        <div padre="materia{{$i}}" class="delete col-md-1" ruta="materias" identificador="{{$m->pk_materia}}">
                            <i class="fas fa-trash-alt cambiob" style="color:#c62828"></i>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mr-auto">
                                <thead>
                                    <tr>
                                        <th scope="col" style="color:#00695c" class="text-center"> Nombre del profesor </th>
                                        <th scope="col" style="color:#00695c" class="text-center"> Apellido del profesor</th>
                                        <th scope="col" style="color:#00695c" class="text-center"> Curso </th>
                                        <th scope="col" style="color:#00695c" class="text-center" colspan="2">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result[$m->pk_materia] as $j)
                                        <tr id="materiapc{{$k}}">
                                            {{--  nombre del profe  --}}
                                            <td class="text-center"> {{$j[1]}}</td>
                                            {{--  apellido del profe  --}}
                                            <td class="text-center"> {{$j[2]}}</td>
                                            {{--  curso  --}}
                                            <td class="text-center"> {{$j[3]}}</td>
                                            {{-- editar materia --}}
                                            <td class="text-center"><a href="{{ route('materiaspc.edit',$j[0]) }}"><i class="fas fa-edit" style="color:#00838f"></i>
                                            </a></td>
                                            {{-- eliminar materia --}}
                                            <td class="text-center">
                                                <a padre="materiapc{{$k}}" class="delete" ruta="materiaspc" identificador="{{$j[0]}}"><i class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                            </td>
                                            {{-- ver --}}
                                        </tr>
                                        @php
                                            $k++
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            </div>
            {{--  @endfor  --}}
        @endforeach
    </div>
    <div class="row text-center">
        <div class="col-md-6">
            <div class="text-center" style="float:center;">
                <br>
                <a  class="btn btn-success" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;" href="/materias/crear">Crear una materia</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center" style="float:center;">
                <br>
                <a  class="btn btn-success" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;" href="/materiaspc/crear">Asignar docente</a>
            </div>
        </div>
    </div>
</div>
{{-- Fue añadida en los cabeceros asi que ya no es necesario añadirla manualmente --}}
{{-- <script src="{{ asset('js/ajax.js') }}"></script> --}}

@endsection
