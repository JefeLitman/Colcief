@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Estudiante')
    @php
        $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
    @endphp
    <div class="container" style="background:#fafafa !important;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{url('/filtro')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <label for="fk_curso"><strong><small style="color : #616161">Curso:</small></strong></label>
                                <div class="input-group mb-2">
                                    <select name="fk_curso" id="fk_curso" class="custom-select filter custom-select-sm">
                                        <option selected value="null">Todos</option>
                                        @foreach ($cursos as $curso)
                                            <option value="{{$curso -> pk_curso}}">{{$curso -> prefijo}} - {{$curso -> sufijo}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <label for="genero"><strong><small style="color : #616161">Genero:</small></strong></label>
                                <div class="input-group mb-2">
                                    <select name="genero" id="genero" class="custom-select filter custom-select-sm">
                                        <option selected value="null">Todos</option>
                                        <option value="f">Femenino</option>
                                        <option value="m">Masculino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <label for="discapacidad"><strong><small style="color : #616161">Discapacidad:</small></strong></label>
                                <div class="input-group mb-2">
                                    <select name="discapacidad" id="discapacidad" class="custom-select filter custom-select-sm">
                                        <option selected value="null">Todos</option>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <label for="delete_at"><strong><small style="color : #616161">Eliminado:</small></strong></label>
                                <div class="input-group mb-2">
                                    <select name="delete_at" id="delete_at" class="custom-select filter custom-select-sm">
                                        <option selected value="null">Todos</option>
                                        <option value="1">No</option>
                                        <option value="0">Si</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group mb-2">
                                <label for="grado"><strong><small style="color : #616161">Ultimo grado aprobado:</small></strong></label>
                                <div class="input-group mb-2">
                                    <select name="grado" id="grado" class="custom-select filter custom-select-sm">
                                        <option selected value="null">Todos</option>
                                        <option value="0">Prescolar</option>
                                        <option value="1">Primero</option>
                                        <option value="2">Segundo</option>
                                        <option value="3">Tercero</option>
                                        <option value="4">Cuarto</option>
                                        <option value="5">Quinto</option>
                                        <option value="6">Sexto</option>
                                        <option value="7">Septimo</option>
                                        <option value="8">Octavo</option>
                                        <option value="9">Noveno</option>
                                        <option value="10">Decimo</option>
                                        <option value="11">Once</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-9 col-12">
                            <div class="form-group mb-2">
                                <label for="nombre"><strong><small style="color : #616161">Nombre:</small></strong></label>
                                <div class="input-group mb-3">
                                    {{-- <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="fas fa-search" style="color:white;"></i></span>
                                    </div> --}}
                                    <input type="text" id="nombre" class="form-control form-control-sm">
                                </div>
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
                                <th class="text-center" scope="col" style="color:#00695c">Curso</th>
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
                                        <td class="text-center">{{ucwords($c->nombre)}} {{ucwords($c->apellido)}}</td>
                                        <td class="text-center">{{ucwords($c->prefijo)}}-{{ucwords($c->sufijo)}}</td>
                                        {{-- Ver estudiantes --}}
                                        <td class="text-center">
                                            <a href="{{ route('estudiantes.show', $c->pk_estudiante) }}" title="Ver información del estudiante"><i class="fas fa-eye" style="color:#00838f"></i>
                                            </a>
                                        </td>
                                        @if (session('role') == 'administrador')
                                            {{-- Editar estudiantes --}}
                                            <td class="text-center">
                                                @if (is_null($c->deleted_at))
                                                    <a href="{{ route('estudiantes.edit', $c->pk_estudiante) }}" title="Editar"><i  class="fas fa-edit" style="color:#00838f"></i>
                                                </a>
                                                @else
                                                    <a title="Deshabilitado"><i  class="fas fa-edit" style="color:#6c757d"></i></a>
                                                @endif
                                                
                                            </td>
                                            {{-- Eliminar estudiantes --}}
                                            <td class="text-center">
                                                @if (is_null($c->deleted_at))
                                                    <a class="delete" padre="estudiantes{{$c->pk_estudiante}}" ruta="estudiantes" identificador="{{$c->pk_estudiante}}"><i title="Eliminar" class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                                @else
                                                    <a><i title="Desabilitado" class="fas fa-trash-alt" style="color:#6c757d"></i></a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script>
        function filter(a){
            // alert(a.attr('ruta'));
            var ruta = a.attr('ruta');
            var padre = a.attr('padre');
            var padre = $('#'+padre);
            var id = $(a).attr('identificador');
            var direccion = $(a).attr('direccion');
            modalConfirm(function(confirm){
                $("#exampleModalCenter").modal('hide');
                if(confirm){
                    deleteRegistro(ruta, id, padre, direccion)
                }
            },'Confirmar','¿Desea Eliminar el registro?',true);
        }
    </script>
    <script>
        $('.filter').change(function(){
            var grado = $('#grado').val();
            var genero = $('#genero').val();
            var discapacidad = $('#discapacidad').val();
            var delete_at = $('#delete_at').val();
            var fk_curso = $('#fk_curso').val();
            $.ajax({
                type: 'POST',
                url: '/filtro',
                data: {
                    _token:$('#csrf_token').attr('content'), 
                    grado:grado,
                    genero:genero,
                    discapacidad:discapacidad,
                    deleted_at:delete_at,
                    fk_curso:fk_curso,
                },
                success: function(data) {
                    console.log(data)
                    mensaje=''
                    if(data.data.length == 0){
                        mensaje+= ''+
                        '<tbody>'+
                            '<tr>'+
                                '<td colspan="7">'+
                                    '<div class="text-center">No hay estudiantes con el filtro aplicado</div>'+
                                '</td>'+
                            '</tr>'+
                        '<tbody>';
                    } else {
                        $.each( data.data, function(key, value) {
                            if(value.deleted_at == null){
                                del = ''+
                                    '<td class="text-center">'+
                                        '<a href="/estudiantes/'+value.pk_estudiante+'/editar" title="Editar"><i  class="fas fa-edit" style="color:#00838f"></i>'+
                                        '</a>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<a class="delete" onclick="filter($(this))" padre="estudiantes'+value.pk_estudiante+'" ruta="estudiantes" identificador="'+value.pk_estudiante+'"><i title="Eliminar" class="fas fa-trash-alt" style="color:#c62828"></i></a>'+
                                    '</td>';
                            } else {
                                del = ''+
                                    '<td class="text-center">'+
                                        '<a title="Desabilitado"><i  class="fas fa-edit" style="color:#6c757d"></i>'+
                                        '</a>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<a><i title="Desabilitado" class="fas fa-trash-alt" style="color:#6c757d"></i></a>'+
                                    '</td>';
                            }
                            mensaje+= ''+
                            '<tbody>'+
                                '<tr id="estudiantes'+value.pk_estudiante+'">'+
                                    '<td class="text-center">'+value.pk_estudiante+'</td>'+
                                    '<td class="text-center">'+$.ucfirst(value.nombre+' '+value.apellido)+'</td>'+
                                    '<td class="text-center">'+value.prefijo+'-'+value.sufijo+'</td>'+
                                    '<td class="text-center">'+
                                        '<a href="/estudiantes/'+value.pk_estudiante+'" title="Ver información del estudiante"><i class="fas fa-eye" style="color:#00838f"></i>'+
                                        '</a>'+
                                    '</td>'+
                                    del+
                                '</tr>'+
                            '<tbody>';
                        });
                    }
                    $('tbody').fadeOut('fast');
                    $('thead').after(mensaje);
                }
            }); 
        });   
    </script>
@endsection
