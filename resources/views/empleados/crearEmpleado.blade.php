<!DOCTYPE html>
<html>
<head>
	<title>Empleado</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Formulario</h1>
    <form enctype="multipart/form-data" action="/empleados" method = "POST">
        @csrf
        <label for="pk_empleado">Pk_empleado: </label>
        <input type="number" name="pk_empleado" id="pk_empleado">

        <label for="cedula">Cedula: </label>
        <input type="number" id="cedula" name="cedula"}}">

        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre"}}">

        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido"}}">

        <label for="correo">Correo: </label>
        <input type="email" id="correo" name="correo"}}">

        <label for="clave">Clave: </label>
        <input type="password" id="clave" name="clave"}}">

        <label for="direccion">Dirección: </label>
        <input type="text" id="direccion" name="direccion"}}">

        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo"}}">

        <label for="rol">Rol: </label>
        <input type="text" id="rol" name="rol"}}">

        <label for="tiempo_extra">Tiempo extra: </label>
        <input type="number" id="tiempo_extra" name="tiempo_extra"}}">

        <label for="director">Director: </label>
        <input type="text" id="director" name="director"}}">

        <label for="estado">Estado: </label>
        <label for="estado">Si </label>
        <input type="radio" id="estado" name="estado" value = "1">
        <label for="estado">No </label>
        <input type="radio" id="estado" name="estado" value = "0" checked>

        <label for="foto">Foto: </label>
        <input type="file" id="foto" name="foto"}}">

        <button type="submit">Crear</button>
    </form>
</body>
</html>