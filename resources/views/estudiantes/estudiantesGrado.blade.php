@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Estudiantes/Grado')
<div id="br"></div>
<div class="container">
    <h4 class="text-center"> Curso {{$grado}} </h4><br>
    <div class="table-responsive" >
        <table class="table table-hover mr-auto" id="myTable">
            <thead>
                <tr>
                    <th scope="col" style="color:#00695c">Código</th>
                    <th scope="col" style="color:#00695c">Nombre</th>
                    <th scope="col" style="color:#00695c">Apellido</th>
                    <th scope="col" style="color:#00695c">Grado</th>
                    <th scope="col" style="color:#00695c">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (empty($curso[0]))
                    <tr>
                        <td colspan="7">
                            <div class="text-center">No hay estudiantes</div>
                        </td>
                    </tr>
                    
                @else
                    @foreach ($curso as $c)
                        <tr>
                            <td>{{$c->pk_estudiante}}</td>
                            <td>{{$c->nombre}}</td>
                            <td>{{$c->apellido}}</td>
                            <td>{{$c->grado}}</td>
                            <td>
                                <a href="/boletines/actual/estudiantes/{{$c->pk_estudiante}}" title="Ver notas"><i class="fas fa-clipboard-list" style="color:#00838f"></i></a>
                                <a href="{{ route('estudiantes.edit', $c->pk_estudiante) }}" title="Editar"><i  class="fas fa-edit" style="color:#00838f"></i>
                                </a>
                                <a class="delete" ruta="estudiantes" identificador="{{$c->pk_estudiante}}"><i title="Eliminar" class="fas fa-trash-alt" style="color:#c62828"></i></a>
                            </td> 
                        </tr>
                    @endforeach
                @endif
                
            </tbody>
        </table>

    </div>
</div>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection