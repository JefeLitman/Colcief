@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_principal')
@guest
    @include('error.error')
@endguest
<div class="row">
    <div class="col s2"></div>
    <div class="col s8 center"><br>
        <div class="card green lighten-5">
            <div class="card-content">
                <form method="post" action="{{ route('estudiantes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h4 class="center">Datos Estudiante</h4>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="nombre" required>
                            <label>Nombres <label class="rojo">*</label> </label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="apellido" required>
                            <label>Apellido <label class="rojo">*</label> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" name="fecha_nacimiento" class="datepicker" id="datepicker" required>
                            <label>Fecha de nacimiento <label class="rojo">*</label></label>
                        </div>

                        <div class="input-field col s4">

                            <select name="grado" required>
                              <option value="" disabled selected>Seleccionar</option>
                              <option value="0">Preescolar</option>
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
                            <label>Grado <label class="rojo">*</label></label>
                        </div>
                        <div class="input-field col s4">
                            <label>
                                <input type="checkbox" name="discapacidad" value="1">
                                <span>Discapacidad</span>
                            </label>
                        </div>
                    </div>
                    <div class="file-field input-field">
                        <div class="btn cyan darken-3 waves-effect">
                            <span>Seleccionar foto</span>
                            <input type="file" name="foto">
                        </div>
                        <div class="file-path-wrapper">{{-- file-path-wrapper es para mostrar el nombre la foto que subio y verificar que subio --}}
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <h4 class="center">Datos Acudiente 1</h4>
                    <div class="divider"></div>
                    <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="nombre_acu_1" required>
                                <label>Nombres <label class="rojo">*</label></label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" name="direccion_acu_1" required>
                                <label>Dirección <label class="rojo">*</label> </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" name="telefono_acu_1" required>
                                <label>Celular <label class="rojo">*</label> </label>
                            </div>

                    </div>
                    <h4 class="center">Datos Acudiente 2</h4>
                    <div class="divider"></div>
                    <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="nombre_acu_2">
                                <label>Nombres: </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" name="direccion_acu_2">
                                <label>Dirección: </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" name="telefono_acu_2">
                                <label>Celular: </label>
                            </div>

                    </div>
                    <div class="input-field center">
                        <button class="btn waves-effect cyan darken-3" type="submit" name="action">Enviar<i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
