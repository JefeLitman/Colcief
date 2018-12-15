@extends('contenedores.admin')
@section('titulo','Materia-Profesor-Curso Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}
@include('error.error')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $result--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
	{{-- URL: localhost:8000\materiaspc  -> Logeado en un usuario de tipo administrador--}}
<br id="br">
<div class="container">
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
                    <div>
                        {{-- Botones --}}
                          
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
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materia as $j)
                                        <tr>
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
                                                <form action="{{route('materiaspc.destroy', $j[0])}}" method = "post">
                                                    @csrf
                                                    @method("DELETE")
                                                    {{-- <i class="fas fa-trash-alt" style="color:#c62828" type="submit"></i> --}}
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt" style="color:#c62828"></i></button>
                                                </form>
                                            </td>
                                            {{-- ver --}}

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
