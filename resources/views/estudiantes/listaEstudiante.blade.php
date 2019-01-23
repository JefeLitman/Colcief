@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Estudiante')
    <div class="container" style="background:#fafafa !important;">
        <form action="{{url('/filtro')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button id="filter" form="grado" class="btn btn-outline-secondary form-control-sm"><i class="fas fa-filter"></i></button>
                        </div>
                        <input type="text" class="form-control form-control-sm" aria-label="Text input with dropdown button">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <select name="grado" id="grado" class="custom-select custom-select-sm">
                            @for ($i=0;$i<12;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="table-responsive">
            <table class="table table-hover mr-auto">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" style="color:#00695c">Código</th>
                        <th class="text-center" scope="col" style="color:#00695c">Nombre</th>
                        <th class="text-center" scope="col" style="color:#00695c">Apellido</th>
                        <th class="text-center" scope="col" style="color:#00695c">Grado</th>
                        <th class="text-center" scope="col" style="color:#00695c" colspan="4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($estudiante))
                        <tr>
                            <td colspan="7">
                                <div class="text-center">No hay estudiantes</div>
                            </td>
                        </tr>
                    @else
                        @foreach ($estudiante as $c)
                            <tr id="estudiantes{{$c->pk_estudiante}}">
                                <td class="text-center">{{$c->pk_estudiante}}</td>
                                <td class="text-center">{{ucwords($c->nombre)}}</td>
                                <td class="text-center">{{ucwords($c->apellido)}}</td>
                                <td class="text-center">{{$c->grado}}</td>
                                {{-- ver notas
                                <td class="text-center">
                                    <a href="/boletines/actual/estudiantes/{{$c->pk_estudiante}}" title="Ver notas"><i class="fas fa-clipboard-list" style="color:#00838f"></i></a>
                                </td> --}}
                                {{-- Ver estudiantes --}}
                                <td class="text-center">
                                    <a href="{{ route('estudiantes.show', $c->pk_estudiante) }}" title="Ver información del estudiante"><i class="fas fa-eye" style="color:#00838f"></i>
                                    </a>
                                </td>
                                {{-- Editar estudiantes --}}
                                <td class="text-center">
                                    <a href="{{ route('estudiantes.edit', $c->pk_estudiante) }}" title="Editar"><i  class="fas fa-edit" style="color:#00838f"></i>
                                    </a>
                                </td>
                                {{-- Eliminar estudiantes --}}
                                <td class="text-center">
                                    <a class="delete" padre="estudiantes{{$c->pk_estudiante}}" ruta="estudiantes" identificador="{{$c->pk_estudiante}}"><i title="Eliminar" class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <script>
        $('.filter').click(function(){
            var grado = $('#grado').val();
            $.ajax({
                type: 'POST',
                url: '/filtro',
                data: {_token:$('#csrf_token').attr('content'), grado : grado},
                success: function(data) {
                    mensaje=''
                    $.each( data.data, function(key, notificar) {
                        mensaje+= ''+
                            '<tr id="estudiantes{{$c->pk_estudiante}}">'+
                                '<td class="text-center">{{$c->pk_estudiante}}</td>'+
                                '<td class="text-center">{{ucwords($c->nombre)}}</td>'+
                                '<td class="text-center">{{ucwords($c->apellido)}}</td>'+
                                '<td class="text-center">{{$c->grado}}</td>'+
                                '<td class="text-center">'+
                                    '<a href="{{ route('estudiantes.show', $c->pk_estudiante) }}" title="Ver información del estudiante"><i class="fas fa-eye" style="color:#00838f"></i>
                                    '</a>'+
                                '</td>'+
                                '<td class="text-center">'+
                                    <'a href="{{ route('estudiantes.edit', $c->pk_estudiante) }}" title="Editar"><i  class="fas fa-edit" style="color:#00838f"></i>
                                    '</a>'+
                                '</td>'+
                                '<td class="text-center">'+
                                   ' <a class="delete" padre="estudiantes{{$c->pk_estudiante}}" ruta="estudiantes" identificador="{{$c->pk_estudiante}}"><i title="Eliminar" class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                '</td>'+
                            '</tr>';
                    });
                }
            }); 
        });   
    </script>
@endsection
