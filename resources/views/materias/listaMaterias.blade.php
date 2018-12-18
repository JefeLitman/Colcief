@extends('contenedores.admin')
@section('titulo','Lista de materias')
@section('contenedor_admin')
{{-- mensajes de error --}}
@include('error.error')
	{{-- Guia Front --}}
	{{-- Se envía array de objetos $materias --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaController.php  funcion index()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\materias --}}

    {{-- el id del br es importante para poder suscribir el modal de eliminar materia --}}
    <br id="br">
    <div class="container">
       <div class="row center" style="background-color: #fafafa !important;">
           <div class="col-md-1"></div>
           <div class="col-md-10">
               <br>
               <div class="col-md-12">
                <div class="table-reponsive">
                    <table class="table table-hover mr-auto">
                        <thead>
                            <tr>
                                <th scope="col" style="color:#00695c" class="text-center">Código</th>
                                <th scope="col" style="color:#00695c" class="text-center">Nombre</th>
                                <th scope="col" style="color:#00695c" class="text-center">Contenido</th>
                                <th scope="col" style="color:#00695c" class="text-center" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materias as $materia)
                            <tr>
                                <td class="text-center">{{$materia->pk_materia }}</td>
                                <td class="text-center">{{$materia->nombre}}</td>
                                <td class="text-center">{{$materia->contenido}}</td>
                                {{-- editar materia --}}
                                <td class="text-center"><a href="{{ route('materias.edit', $materia->pk_materia) }}" title="Editar"><i class="fas fa-edit" style="color:#00838f"></i>
                                </a></td>
                                {{-- eliminar materia --}}
                                <td class="delete" tabla="materia" identificador="{{$materia->pk_materia}}" title="Eliminar"><i class="fas fa-trash-alt" style="color:#c62828"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               </div>
           </div>
       </div>
    </div>
    {{-- ajax para llamar el modal de eliminar materia --}}
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection
