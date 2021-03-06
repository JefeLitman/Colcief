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
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="text-center">
                Materias
            </h3>
            <br>
            @if (count($materias)==0)
                <div style="height:100px; padding-top:30px;" class="text-center">No hay materias creadas. <br> Para crear haga click <a style="text-decoration:underline" href="/materias/crear">aquí</a>.</div>
            @else
                <div class="accordion" id="accordionExample">
                    @csrf
                    @php
                        $i=0;
                        $k=0;
                    @endphp
                    @foreach ($materias as $m)
                        <div id="materia{{$i}}" class="card mx-auto border-dark bg-light" style="border-color:#17a2b8 !important;">
                            <div id="headingOne">
                                <div class="card-header" style="background-color: rgba(0,0,0,.03)  !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}" >
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5 class="mb-0">
                                            {{ $m->nombre }}
                                        </h5>
                                    </div>
                                    {{-- Editar materia --}}
                                    <div class="col-md-1">
                                        <a href="{{ route('materias.edit', $m->pk_materia) }}" style="text-decoration:none !important; color:#17a2b8 !important;" title="Editar materia"><i class="fas fa-edit cambiob"></i></a>
                                    </div>
                                    {{-- Eliminar materia --}}
                                    <div padre="materia{{$i}}" class="delete col-md-1" ruta="materias" identificador="{{$m->pk_materia}}" title="Eliminar materia">
                                        <i class="fas fa-trash-alt cambiobe" style="color:#c62828"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="color:#00695c" class="text-center"> Nombre del profesor </th>
                                                    <!-- <th scope="col" style="color:#00695c" class="text-center"> Apellido del profesor</th> -->
                                                    <th scope="col" style="color:#00695c" class="text-center"> Curso </th>
                                                    <th scope="col" style="color:#00695c" colspan="2" class="text-center">
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($result)==0 or count($result[$m->pk_materia])==0)
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="text-center">No se han asignado cursos a docentes. Para crear haga click <a style="text-decoration:underline" href="/materiaspc/crear">aquí</a>.</div>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach($result[$m->pk_materia] as $j)
                                                        <tr id="materiapc{{$k}}">
                                                            {{--  nombre del profe  --}}
                                                            <td> {{$j[1]}} {{$j[2]}}</td>
                                                            {{--  curso  --}}
                                                            <td class="text-center"> {{$j[3]}}</td>
                                                            {{-- editar materiapc --}}
                                                            <td class="text-center"><a href="{{ route('materiaspc.edit',$j[0]) }}" title="Editar"><i class="fas fa-edit cambiob" style="color:#17a2b8"></i>
                                                            </a></td>
                                                            {{-- eliminar materiapc --}}
                                                            <td class="text-center">
                                                                <a padre="materiapc{{$k}}" class="delete" ruta="materiaspc" identificador="{{$j[0]}}" title="Eliminar"><i class="fas fa-trash-alt cambiobe" style="color:#c62828"></i></a>
                                                            </td>
                                                            {{-- ver --}}
                                                        </tr>
                                                        @php
                                                            $k++
                                                        @endphp
                                                    @endforeach
                                                @endif
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
            @endif
            <div class="row text-center">
                @if (count($materias) > 0)
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
                @else
                    <div class="col-12">
                        <div class="text-center" style="float:center;">
                            <br>
                            <a  class="btn btn-success" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;" href="/materias/crear">Crear una materia</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- Fue añadida en los cabeceros asi que ya no es necesario añadirla manualmente --}}
{{-- <script src="{{ asset('js/ajax.js') }}"></script> --}}

@endsection
