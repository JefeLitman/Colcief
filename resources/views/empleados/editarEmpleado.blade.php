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
        <h2>Editar Empleado</h2>
        <div class="card green lighten-5">
            <div class="card-content">
                <form enctype="multipart/form-data" action="{{route('empleados.update', $empleado->cedula)}}" method = "POST">
                    @csrf
                    {{-- input field es necesario para la animación de los label --}}
                    <div class="input-field">
                        <input type="number" id="cedula" name="cedula" value="{{$empleado->cedula}}">
                        <label for="cedula">Cedula: </label>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" id="nombre" name="nombre"value="{{$empleado->nombre}}">
                            <label for="nombre">Nombre: </label>
                        </div>
                        <div class="input-field col s4">
                            <input type="text" id="apellido" name="apellido" value="{{$empleado->apellido}}">
                            <label for="apellido">Apellido: </label>
                        </div>
                    </div>
                    <div class="input-field">
                        <input type="email" id="correo" name="correo" value="{{$empleado->correo}}">
                        <label for="correo">Correo: </label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="direccion" name="direccion" value="{{$empleado->direccion}}">
                        <label for="direccion">Dirección: </label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="titulo" name="titulo" value="{{$empleado->titulo}}">
                        <label for="titulo">Título: </label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="role" name="role" value="{{$empleado->role}}">
                        <label for="role">Role: </label>
                    </div>
                    <div class="input-field">
                        <input type="number" id="tiempo_extra" name="tiempo_extra" value="{{$empleado->tiempo_extra}}">
                        <label for="tiempo_extra">Tiempo extra: </label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="director" name="director" value="{{$empleado->director}}">
                        <label for="director">Director: </label>
                    </div>
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
                        <button class="btn waves-effect cyan darken-3" type="submit" name="action">Actualizar<i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection