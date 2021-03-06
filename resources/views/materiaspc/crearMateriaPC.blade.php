@extends('contenedores.admin')
@section('titulo','Materia-Profesor-Curso Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}

{{-- Guia Front --}}
{{-- Se envia $cursos, $materias, $profesores --}}
{{-- Los empleados qie se envian --}}
{{-- @Autor Paola C. --}}
{{-- Estado: Terminada (Sujeta a cambios) --}}
{{-- URL: localhost:8000\materiaspc\crear --}}

{{-- Acceso: Solo del Administrador. --}}

{{-- <b>Contenido $cursos: </b>{{$cursos}} <br><br>
<b>Contenido $materias: </b>{{$materias}} <br><br>
<b>Contenido $profesores: </b>{{$profesores}} <br><br> --}}
<br>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form method="post" action="/materiaspc" onload="logros(document.getElementById('fk_materia').value)">
                @csrf
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                       <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03)  !important;">
                           <h4><i class="fas fa-chalkboard-teacher"></i>      Asignar docente al curso</h4>
                       </div>
                    </div>

                <div class="card-body p-3">
                    <div class="row">
                        {{-- Datos de la materia --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Materia</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-book"></i>
                                        </span>
                                    </div>
                                <select class="custom-select custom-select-sm" name="fk_materia" id="fk_materia" onchange="logros(this.value)" required>
                                    <option if>Seleccionar la materia</option>
                                    @foreach ( $materias as $materia)
                                        <option value="{{$materia["pk_materia"]}}">{{$materia["nombre"]}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                         </div>
                    {{-- profesor --}}
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="cedula"><strong><small style="color : #616161">Profesor</small></strong></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                </div>
                                <select class="custom-select custom-select-sm" name="fk_empleado" id="fk_empleado" required>
                                    <option if>Seleccionar profesor</option>
                                    @foreach ( $profesores as $profesor)
                                        <option value="{{$profesor["cedula"]}}">{{ucwords($profesor["nombre"])}} {{ucwords($profesor["apellido"])}}</option>
                                        {{-- Los nombres y apellidos estan normalizados a estar completamente en minuscula --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- curso --}}
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="cedula"><strong><small style="color : #616161">Curso</small></strong></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </div>
                                <select class="custom-select custom-select-sm" name="fk_curso" id="fk_curso" required>
                                    <option if>Seleccionar el curso</option>
                                    @foreach ( $cursos as $curso)
                                        <option value="{{$curso["pk_curso"]}}">{{$curso["nombre"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- salon --}}
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="cedula"><strong><small style="color : #616161">Salón</small></strong></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </span>
                                </div>
                                <input type="text" placeholder="(máx 5 caracteres)" class="form-control form-control-sm" name="salon" id="salon" maxlength="5" required>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                {{-- Boton de enviar --}}
                <div class="text-center">
                    <input type="submit" name="action" value="Enviar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
