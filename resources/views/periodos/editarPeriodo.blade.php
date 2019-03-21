@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Editar Periodo')

<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Información</strong><br>
                Tenga en cuenta que la finalización del periodo es el ultimo dia en el que el docente puede modificar notas del periodo
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Advertencia</strong><br>
                Tenga en cuenta que el tiempo entre la fecha de finalización y la fecha de iniciación de la recuperacion del periodo es el tiempo extra disponible para administrar a los docentes. En lo posible permita que este tiempo sea de por lo menos 7 dias.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('periodos.update', $periodo -> pk_periodo)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                            <h4>Editar periodo</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            {{--  fecha de inicio periodo --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Inicio de periodo</small></strong></label> <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control form-control-sm"  name="fecha_inicio" {{(strtotime($periodo->fecha_inicio) < strtotime(date('Y-m-d'))) ? 'disabled': ''}} value="{{$periodo->fecha_inicio}}">
                                    </div>
                                </div>
                            </div>
                            {{--  fecha límite periodo --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small title="Tenga en cuenta que la finalización del periodo es el ultimo dia en el que el docente puede modificar notas del periodo" style="color : #616161">Finalización del periodo</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input id="fecha_limite" class="form-control form-control-sm" type="date" name="fecha_limite" {{(strtotime($periodo->fecha_limite) < strtotime(date('Y-m-d'))) ? 'disabled': ''}} value="{{$periodo->fecha_limite}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--  fecha de inicio recuperacion  --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Inicio de recuperación</small></strong></label> <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input id="recuperacion_inicio" type="date" class="form-control form-control-sm"  name="recuperacion_inicio" {{(strtotime($periodo->recuperacion_inicio) < strtotime(date('Y-m-d'))) ? 'disabled': ''}} value="{{$periodo->recuperacion_inicio}}">
                                    </div>
                                </div>
                            </div>
                            {{--  fecha límite recuperacion --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small title="Tenga en cuenta que la fecha limite es el ultimo dia en el que el docente puede modifcar notas del periodo" style="color : #616161">Finalización del periodo</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input id="recuperacion_limite" class="form-control form-control-sm" type="date" name="recuperacion_limite" {{(strtotime($periodo->recuperacion_limite) < strtotime(date('Y-m-d'))) ? 'disabled': ''}} value="{{$periodo->recuperacion_limite}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#fecha_limite').change(function(){
        var now = new Date($(this).val());
        now.setDate(now.getDate()+7);
        $('#recuperacion_inicio').val(now.toISOString().slice(0,10));
        now.setDate(now.getDate()+7);
        $('#recuperacion_limite').val(now.toISOString().slice(0,10));
    })
</script>
@endsection
