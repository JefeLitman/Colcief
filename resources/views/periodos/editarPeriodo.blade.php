@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Editar Periodo')

<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-10">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Información</strong><br>
                Tenga en cuenta que la fecha limite es el ultimo dia en el que el docente puede modifcar notas del periodo
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
                            <h4><i class="fas fa-address-card"></i> Editar periodo</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            {{--  fecha de inicio  --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Fecha de inicio</small></strong></label> <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control form-control-sm"  name="fecha_inicio" value="{{$periodo->fecha_inicio}}">
                                    </div>
                                </div>
                            </div>
                            {{--  fecha límite  --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small title="Tenga en cuenta que la fecha limite es el ultimo dia en el que el docente puede modifcar notas del periodo" style="color : #616161">Fecha límite</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input class="form-control form-control-sm" type="date" name="fecha_limite" value="{{$periodo->fecha_limite}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="submit" name="action" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
