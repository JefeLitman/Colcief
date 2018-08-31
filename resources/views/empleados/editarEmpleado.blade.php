<!DOCTYPE html>
<html>
<head>
	<title>Empleado</title>
</head>
<body>
	{{ gettype($empleado)}} <br>
	{{$empleado}} <br>

	<h1>Formulario</h1>
	{!! Form::open(['action' => ['EmpleadoController@update', $empleado->pk_empleado], 'method' => 'POST']) !!}
        {{Form::label('pk_empleado', 'Código:')}}
        {{Form::number('pk_empleado', $empleado->pk_empleado, ['readonly'])}}
        
        {{Form::label('cedula', 'Cedula:')}}
        {{Form::number('cedula', $empleado->cedula)}}

        {{Form::label('nombre', 'Nombre:')}}
        {{Form::text('nombre', $empleado->nombre)}}

        {{Form::label('apellido', 'Apellido:')}}
        {{Form::text('apellido', $empleado->apellido)}}

        {{Form::label('correo', 'Correo:')}}
        {{Form::text('correo', $empleado->correo)}}

        {{Form::label('direccion', 'Dirección:')}}
        {{Form::text('direccion', $empleado->direccion)}}

        {{Form::label('titulo', 'Título:')}}
        {{Form::text('titulo', $empleado->titulo)}}

        {{Form::label('rol', 'Rol:')}}
        {{Form::text('rol', $empleado->rol)}}

        {{Form::label('estado', 'Estado:')}}
        {{Form::text('estado', $empleado->estado)}}

        {{Form::label('foto', 'Foto:')}}
        {{Form::file('foto')}}
        <a href=""></a>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit')}}
    {!! Form::close() !!}

</body>
</html>