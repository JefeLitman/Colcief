@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_admin')
{{-- d-none d-sm-blockuia Front --}}
{{-- Se envía el objeto $empleado --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show()
        @Autor Paola C. --}}
{{-- URL: localhost:8000\empleados\{pk_empleado} --}}

<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-12 col-lg-10 col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{$empleado->foto}}" alt="Card image cap">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" title="Cédula">
                                <small class="text-muted">Cédula:</small>
                                <div>{{$empleado->cedula}}</div>
                            </li>
                            <li class="list-group-item" title="Nombre">
                                <small class="text-muted">Nombre:</small>
                                <div>{{ucwords($empleado->nombre)}}</div>
                            </li>
                            <li class="list-group-item" title="Apellido">
                                <small class="text-muted">Apellido:</small>
                                <div>{{ucwords($empleado->apellido)}}</div>
                            </li>
                            <li class="list-group-item" title="Correo Electronico" >
                                <small class="text-muted">Email:</small>
                                <div>{{$empleado->email}}</div>
                            </li>
                            <li class="list-group-item" title="Dirección">
                                <small class="text-muted">Dirección:</small>
                                <div>{{ucwords($empleado->direccion)}}</div>
                            </li>
                            <li class="list-group-item" title="Titulo">
                                <small class="text-muted">Titulo:</small>
                                <div>{{ucwords($empleado->titulo)}}</div>
                            </li>
                            <li class="list-group-item" title="Cargo">
                                <small class="text-muted">Cargo:</small>
                                <div>{{$cargo[$empleado->role]}}</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            Acciones
                        </div>
                        <ul class="list-group list-group-flush">
                            @if (session('role') == 'administrador')
                                <li class="list-group-item" title="Acciones">
                                    <div>
                                        @if (is_null($empleado->deleted_at))
                                            @if ($empleado->role == '1' || $empleado->role == '2')
                                                <a class="time" identificador="{{$empleado->cedula}}"><i data-toggle="tooltip" data-placement="top" 
                                                @switch($empleado->tiempo_extra)
                                                    @case(1)
                                                        style="color:#007bff" title="1 día extra"
                                                        @break
                                                    @case(3)
                                                        style="color:#ffc107" title="3 días extra" 
                                                        @break
                                                    @case(7)
                                                        style="color:#dc3545" title="1 semana extra"
                                                        @break
                                                    @default
                                                        style="color:#343a40" title="0 días extra"
                                                @endswitch
                                                id="{{$empleado->cedula}}t" class="fas fa-stopwatch"></i></a>
                                            @endif
                                            <a href="{{ route('empleados.edit', $empleado->cedula) }}"><i class="fas fa-edit text-info" title="Editar" data-toggle="tooltip" data-placement="top" title="Ver notas"></i></a>
                                            <a padre="null" data-toggle="tooltip" data-placement="top" title="Ver notas" class="delete" ruta="empleados" direccion="/empleados/{{$empleado->cedula}}" identificador="{{$empleado->cedula}}" title="Eliminar" ><i class="fas fa-trash-alt text-danger"></i></a>
                                        @else
                                            <a ruta="empleados" class="restore text-success" direccion="/empleados/{{$empleado->cedula}}" identificador="{{$empleado->cedula}}" ><i class="fas fa-recycle" data-toggle="tooltip" data-placement="top" title="Ver notas" title="Restaurar"></i>
                                        </a>
                                        @endif
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if (!empty($empleado->fk_curso))
                        <div class="card mb-3">
                            <div class="card-header">
                                Director del curso 
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="/estudiantes/cursos/{{$empleado -> fk_curso}}">
                                        <div style="text-align: right;">{{$empleado -> prefijo.'-'.$empleado -> sufijo}}</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    @if (!empty($cursos[0]))
                        <div class="card mb-3">
                            <div class="card-header">
                                Cursos Asignados
                            </div>
                            @if (!empty($cursos[0]))
                                <ul class="list-group list-group-flush">
                                    @foreach ($cursos as $curso)
                                        <li class="list-group-item">
                                            <a href="/estudiantes/cursos/{{$curso -> pk_curso}}">
                                                <div class="float-left">{{$curso -> nombre}}</div>
                                                <div class="text-muted" style="text-align: right;">{{$curso -> prefijo.'-'.$curso -> sufijo}}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif 
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.time').click(function(){
            var id = $(this).attr('identificador');
            var icon = $('#'+id+'t');
            var entrada = ''+
            '<div class="form-group mb-2">'+
                '<label for="cedula"><strong><small style="color : #616161">Tiempo extra</small></strong></label>'+
                '<div class="input-group mb-2">'+
                    '<div class="input-group-prepend">'+
                        '<span class= "input-group-text">'+
                            '<i class="fas fa-stopwatch"></i>'+
                        '</span>'+
                    '</div>'+
                    '<select class="custom-select custom-select-sm" name="time" id="time">'+
                        '<option value="0">Seleccionar</option>'+
                        '<option value="1">Un dia</option>'+
                        '<option value="3">Tres dias</option>'+
                        '<option value="7">Una semana</option>'+
                    '</select>'+
                '</div>'+
            '</div>'
            modalConfirm(function(confirm){
                $("#exampleModalCenter").modal('hide');
                if(confirm){
                    var time = $('#time').val();
                    var color = '';
                    switch (time) {
                        case '1':
                            color = '#007bff';
                            break;
                        case '3':
                            color = '#ffc107';
                            break;
                        case '7':
                            color = '#dc3545';
                            break;
                        default:
                            color = '#343a40';
                            break;
                    }
                    $.ajax({
                        type: 'POST',
                        url: '/empleados/'+id+'/time/'+time,
                        data: {_token:$('#csrf_token').attr('content'), _method:'PUT'},
                        success: function(data) {
                            icon.css({'color':color});
                        }
                    });
                }
            },'¿Desea agregar tiempo extra?', entrada, true);
        });
    });
</script>

@endsection
