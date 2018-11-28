@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}
@include('error.error')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form class="" action="/periodos" method="post">
            @csrf
            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h4><i class="fas fa-address-card"></i> Crear periodo</h4>
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
                                    <input type="date" class="form-control form-control-sm"  name="fecha_inicio" value="">
                                </div>
                            </div>
                       </div>
                    {{--  fecha límite  --}}
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="cedula"><strong><small style="color : #616161">Fecha límite</small></strong></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input class="form-control form-control-sm" type="datetime" name="fecha_limite" value="">
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        {{--  Año  --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Año</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-clock"></i>

                                        </span>
                                    </div>
                                    <input class="form-control form-control-sm" type="number" name="ano" value="">
                                </div>
                            </div>
                        </div>
                        {{--  periodo  --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Periodo</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-check"></i>
                                        </span>
                                        </div>
                                       <input
                                       class="form-control form-control-sm"
                                       type="number" name="nro_periodo" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="action" value="Enviar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
