@extends('contenedores.admin')
@section('titulo','Empleado Nuevo')
@section('contenedor_principal')
@guest
    @include('error.error')
@endguest
<div class="row">
    <div class="col s2"></div>
    <div class="col s8 center">
        <br>
        <h2>Crear Empleado</h2>
        <div class="card green lighten-5">
            <div class="card-content">
                <form enctype="multipart/form-data" action="/empleados" method = "POST">
                    @csrf
                    {{-- input field es necesario para la animación de los label --}}
                    <div class="input-field">
                        <input type="number" name="pk_empleado" id="pk_empleado">
                        <label for="pk_empleado">Código Empleado:</label>
                    </div>
                    <div class="input-field">
                        <input type="number" id="cedula" name="cedula">
                        <label for="cedula">Cedula: </label>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" id="nombre" name="nombre">
                            <label for="nombre">Nombre: </label>
                        </div>
                        <div class="input-field col s4">
                            <input type="text" id="apellido" name="apellido">
                            <label for="apellido">Apellido: </label>
                        </div>
                        <div class="input-field col s4">
                            <input type="password" id="clave" name="clave">
                            <label for="clave">Contraseña: </label>
                        </div>
                    </div>
                    <div class="input-field">
                        <input type="email" id="correo" name="correo">
                        <label for="correo">Correo: </label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="direccion" name="direccion">
                        <label for="direccion">Dirección: </label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="titulo" name="titulo">
                        <label for="titulo">Título: </label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="rol" name="rol">
                        <label for="rol">Rol: </label>
                    </div>
                    {{-- <div class="input-field">
                        <input type="number" id="tiempo_extra" name="tiempo_extra">
                        <label for="tiempo_extra">Tiempo extra: </label>
                    </div> --}}
                    {{--  <div class="input-field">
                        <input type="text" id="director" name="director">
                        <label for="director">Director: </label>
                    </div> --}}
                    {{-- <div class="input-field row">
                        <div class="col s12 center">
                            <label for="estado">Estado: </label>
                            <label>
                                <input type="radio" id="estado" name="estado" value = "1">
                                <span>Si</span>
                            </label>
                            <label>
                                <input type="radio" id="estado" name="estado" value = "0">
                                <span>No</span>
                            </label>
                        </div>
                    </div> --}}
                    <div class="file-field input-field">
                        <div class="btn cyan darken-3 waves-effect">
                            <span>Seleccionar archivo</span>
                            <input type="file" id="foto" name="foto">
                        </div>
                        <div class="file-path-wrapper">{{-- file-path-wrapper es para mostrar el nombre la foto que subio y verificar que subio --}}
                            <input class="file-path validate" type="text">
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
{{-- <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div> --}}
@endsection
