<!DOCTYPE html>
<html>
<head>
	<title>Empleado</title>
</head>
<body>
	{{ gettype($empleado)}} <br>
    {{$empleado}} <br>
    
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
    <form enctype="multipart/form-data" action="{{route('empleados.update', $empleado->cedula)}}" method = "POST">
        {{ method_field('PATCH') }}
        @csrf
        <label for="cedula">cedula: </label>
        <input type="number" name="cedula" value="{{$empleado->cedula}}" id="cedula">

        <label for="cedula">Cedula: </label>
        <input type="number" id="cedula" name="cedula" value="{{$empleado->cedula}}">

        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" value="{{$empleado->nombre}}">

        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" value="{{$empleado->apellido}}">

        <label for="correo">Correo: </label>
        <input type="email" id="correo" name="correo" value="{{$empleado->correo}}">

        <label for="clave">Clave: </label>
        <input type="password" id="clave" name="clave" value="{{$empleado->clave}}">

        <label for="direccion">Dirección: </label>
        <input type="text" id="direccion" name="direccion" value="{{$empleado->direccion}}">

        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo" value="{{$empleado->titulo}}">

        <label for="role">role: </label>
        <input type="text" id="role" name="role" value="{{$empleado->role}}">

        <label for="tiempo_extra">Tiempo extra: </label>
        <input type="number" id="tiempo_extra" name="tiempo_extra" value="{{$empleado->tiempo_extra}}">

        <label for="director">Director: </label>
        <input type="text" id="director" name="director" value="{{$empleado->director}}">

        <div class="input-field col s4">
            <label>
                <input type="checkbox" name="discapacidad"
                @if($empleado->estado == "1") {{-- verifico si el estudiante tiene discapacidad, en caso q si, imprimo checked para checkar el checkbox --}} 
                    checked value="1"
                @endif
                >
                <span>Estado</span>
            </label>
        </div>
        <label for="estado">No </label>
        <input type="radio" id="estado" name="estado" value = "0" checked>

        <label for="foto">Foto: </label>
        <input type="file" id="foto" name="foto"}}">
        <img src="{{Storage::url($empleado->foto)}}" alt="Foto estudiante {{$empleado->cedula}}">

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>