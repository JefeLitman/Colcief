@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_admin')
{{-- d-none d-sm-blockuia Front --}}
{{-- Se envía el objeto $empleado --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show()
        @Autor Paola C. --}}
{{-- URL: localhost:8000\empleados\{pk_empleado} --}}
<style>
    .r {
        background-color: #fff;
    }
</style>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-12 col-lg-10 col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{$empleado->foto}}" alt="Card image cap">
                        <div class="card-footer" title="Cédula">
                            <div class="float-left d-none d-sm-block">Cédula</div>
                            <div class="text-muted" style="text-align: right;">{{$empleado->cedula}}</div>
                        </div>
                        <div class="card-footer" title="Nombre">
                            <div class="float-left d-none d-sm-block">Nombre</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($empleado->nombre)}}</div>
                        </div>
                        <div class="card-footer" title="Apellido">
                            <div class="float-left d-none d-sm-block">Apellido</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($empleado->apellido)}}</div>
                        </div>
                        <div class="card-footer" title="Correo Electronico" >
                            <div class="float-left d-none d-sm-block">Email</div>
                            <div class="text-muted" style="text-align: right;">{{$empleado->email}}</div>
                        </div>
                        <div class="card-footer" title="Dirección">
                            <div class="float-left d-none d-sm-block">Dirección</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($empleado->direccion)}}</div>
                        </div>
                        <div class="card-footer" title="Titulo">
                            <div class="float-left d-none d-sm-block">Titulo</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($empleado->titulo)}}</div>
                        </div>
                        <div class="card-footer" title="Cargo">
                            <div class="float-left d-none d-sm-block">Cargo</div>
                            <div class="text-muted" style="text-align: right;"><strong>{{$cargo[$empleado->role]}}</strong></div>
                        </div>
                        @if (session('role') == 'administrador')
                            <div class="card-footer" title="Acciones">
                                <div class="float-left d-none d-sm-block">Acciones</div>
                                <div class="" style="text-align: right;">
                                    <a title="Agregar tiempo extra" class="
                                    @if($empleado->role != 0 || $empleado->role != 1)
                                        time
                                    @endif
                                    " identificador="{{$empleado->cedula}}"><i
                                    @switch($empleado->tiempo_extra)
                                        @case(1)
                                            style="color:#007bff"
                                            @break
                                        @case(3)
                                            style="color:#ffc107"
                                            @break
                                        @case(7)
                                            style="color:#dc3545"
                                            @break
                                        @default
                                            style="color:#343a40"
                                    @endswitch
                                    id="{{$empleado->cedula}}t" class="fas fa-stopwatch
                                    @if($empleado->role == 0)
                                        text-secondary
                                    @endif
                                    "></i></a>
                                    <a href="{{ route('empleados.edit', $empleado->cedula) }}"><i class="fas fa-edit" style="color:#17a2b8" title="Editar"></i></a>
                                    <a padre="null" class="delete" ruta="empleados" direccion="/empleados" identificador="{{$empleado->cedula}}" title="Eliminar" ><i class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <br>
                <div class="col-sm-6">
                    @if (!empty($empleado->fk_curso))
                        <div class="card mb-3">
                            <div class="card-header">
                                Director del curso 
                            </div>
                            <div class="card-footer r">
                                <a href="/estudiantes/cursos/{{$empleado -> fk_curso}}">
                                    <div style="text-align: right;">{{$empleado -> prefijo.'-'.$empleado -> sufijo}}</div>
                                </a>
                            </div>
                        </div>
                    @endif
                    @if (!empty($cursos[0]))
                        <div class="card mb-3">
                            <div class="card-header">
                                Cursos Asignados
                            </div>
                            @if (!empty($cursos[0]))
                                @foreach ($cursos as $curso)
                                    <div class="card-footer r">
                                        <a href="/estudiantes/cursos/{{$curso -> pk_curso}}">
                                            <div class="float-left">{{$curso -> nombre}}</div>
                                            <div class="text-muted" style="text-align: right;">{{$curso -> prefijo.'-'.$curso -> sufijo}}</div>
                                        </a>
                                    </div>
                                @endforeach
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
