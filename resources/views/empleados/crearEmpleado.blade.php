@extends('contenedores.admin')
@section('titulo','Empleado Nuevo')
@section('contenedor_principal')
@guest
    @include('error.error')
@endguest
<br>
<div class="row justify-content-center">
    <div class="col-10">
        <form enctype="multipart/form-data" action="{{ url('/empleados') }}" method = "POST">
        @csrf
        <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
            <div class="card-header p-0">
                <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                    <h3><i class="fa fa-envelope"></i>Crear empleados</h3>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="form-group">
                    <div class="input-group mb-2">
                        {{-- cedula --}}
                        <div class="input-group-text">
                            <i class="material-icons">contacts</i>
                        </div>
                        <input type="number" class="form-control"  id="cedula" name="cedula" placeholder="Cedula" value="@eachError('cedula', $errors) @endeachError">
                    </div>

                    <div class="input-group mb-2">
                    {{-- nombre --}}
                        <div class="input-group-text">
                            <i class="material-icons">face</i>
                        </div>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombres" class="form-control" value="@eachError('nombre', $errors)@endeachError">
                    {{-- apellido --}}
                         &nbsp &nbsp <div class="input-group-text">
                            <i class="material-icons">face</i>
                        </div>
                        <input type="text" id="apellido" name="apellido" placeholder="Apellidos" class="form-control" value="@eachError('apellido', $errors)@endeachError">
                    </div>

                    <div class="input-group mb-2">
                    {{-- Correo --}}
                        <div class="input-group-text">
                            <i class="material-icons">mail</i>
                        </div>
                        <input type="email" id="correo" name="correo" placeholder="E-mail" class="form-control" value="@eachError('correo', $errors)@endeachError">
                    {{-- Direccion --}}
                        &nbsp &nbsp <div class="input-group-text">
                            <i class="material-icons">location_on</i>
                        </div>
                        <input type="text" id="direccion" name="direccion" placeholder="Dirección" class="form-control" value="@eachError('direccion', $errors)@endeachError">
                    </div>

                    <div class="input-group mb-2">
                    {{-- Titulo --}}
                        <div class="input-group-text">
                            <i class="material-icons">school</i>
                        </div>
                        <input type="text" id="titulo" name="titulo" placeholder="Titulo" class="form-control" value="@eachError('titulo', $errors)@endeachError">
                    {{-- Tiempo extra --}}
                         &nbsp &nbsp <div class="input-group-text">
                            <i class="material-icons">access_time</i>
                        </div>
                        <input type="number" id="tiempo_extra" name="tiempo_extra" placeholder="Tiempo extra" class="form-control" value="@eachError('tiempo_extra', $errors)@endeachError">
                    {{-- Director --}}
                        &nbsp &nbsp <div class="input-group-text">
                            <i class="material-icons">work</i>
                        </div>
                        <input type="text" id="director" name="director" placeholder="Director" class="form-control" value="@eachError('director', $errors)@endeachError">
                    </div>

                    <div class="input-group mb-2">
                    {{-- Rol --}}
                        <div class="input-group-text">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <select class="custom-select" name="role">
                            <option selected>Seleccionar el rol</option>
                            <option value="0">Profesor</option>
                            <option value="1">Administrador</option>
                            {{-- <option value="3">Three</option> --}}
                        </select>
                    </div>

                    <div class="input-group mb-2">
                    {{-- Foto --}}
                    <div class="input-group-text">
                        <i class="material-icons">add_photo_alternate</i>
                    </div>
                    &nbsp &nbsp <input type="file" id="foto" name="foto" accept="image/png, image/jpeg, image/gif">&nbsp &nbsp
                    </div>

                    {{-- enviar --}}
                    <div class="text-center">
                        <input type="submit" name="action" value="Enviar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<br>
@endsection
