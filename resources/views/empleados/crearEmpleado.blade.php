@extends('.contenedorAdmin')
@section('contenedorAdmin')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col s12 center">
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
                       <div class="input-field">
                            <input type="number" id="tiempo_extra" name="tiempo_extra">
                            <label for="tiempo_extra">Tiempo extra: </label>
                       </div>
                        <label for="director">Director: </label>
                        <input type="text" id="director" name="director"}}">

                        <label for="estado">Estado: </label>
                        <label for="estado">Si </label>
                        <input type="radio" id="estado" name="estado" value = "1">
                        <label for="estado">No </label>
                        <input type="radio" id="estado" name="estado" value = "0" checked>

                        <label for="foto">Foto: </label>
                        <input type="file" id="foto" name="foto"}}>

                        <button type="submit">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
