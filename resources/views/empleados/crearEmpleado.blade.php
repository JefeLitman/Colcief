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
	{!! Form::open(['action' => ['EmpleadoController@store'], 'method' => 'POST', 'files' => true]) !!}
        {{Form::label('pk_empleado', 'pk_empleado:')}}
        {{Form::number('pk_empleado')}}
        
        {{Form::label('cedula', 'Cedula:')}}
        {{Form::number('cedula')}}

        {{Form::label('nombre', 'Nombre:')}}
        {{Form::text('nombre')}}

        {{Form::label('apellido', 'Apellido:')}}
        {{Form::text('apellido')}}

        {{Form::label('correo', 'Correo:')}}
        {{Form::text('correo')}}

        {{Form::label('clave', 'Contraseña:')}}
        {{Form::password('clave')}}

        {{Form::label('direccion', 'Dirección:')}}
        {{Form::text('direccion')}}

        {{Form::label('titulo', 'Título:')}}
        {{Form::text('titulo')}}

        {{Form::label('rol', 'Rol:')}}
        {{Form::text('rol')}}

        {{Form::label('tiempo_extra', 'Tiempo extra:')}}
        {{Form::number('tiempo_extra')}}

        {{Form::label('director', 'Director:')}}
        {{Form::text('director')}}

        {{Form::label('estado', 'Estado:')}}
        {{Form::checkbox('estado')}}

        {{Form::label('foto', 'Foto:')}}
        {{Form::file('foto')}}

        {{Form::submit('Submit')}}
    {!! Form::close() !!}

</body>
</html>