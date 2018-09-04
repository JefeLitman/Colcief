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
	{!! Form::open(['action' => ['EmpleadoController@update', $empleado->pk_empleado], 'method' => 'POST', 'files' => true]) !!}
        {{Form::label('pk_empleado', 'pk_empleado:')}}
        {{Form::number('pk_empleado', $empleado->pk_empleado, ['readonly'])}}
        
        {{Form::label('cedula', 'Cedula:')}}
        {{Form::number('cedula', $empleado->cedula)}}

        {{Form::label('nombre', 'Nombre:')}}
        {{Form::text('nombre', $empleado->nombre)}}

        {{Form::label('apellido', 'Apellido:')}}
        {{Form::text('apellido', $empleado->apellido)}}

        {{Form::label('correo', 'Correo:')}}
        {{Form::text('correo', $empleado->correo)}}

        {{Form::label('clave', 'Contraseña:')}}
        {{Form::password('clave')}}

        {{Form::label('direccion', 'Dirección:')}}
        {{Form::text('direccion', $empleado->direccion)}}

        {{Form::label('titulo', 'Título:')}}
        {{Form::text('titulo', $empleado->titulo)}}

        {{Form::label('rol', 'Rol:')}}
        {{Form::text('rol', $empleado->rol)}}

        {{Form::label('tiempo_extra', 'Tiempo extra:')}}
        {{Form::number('tiempo_extra', $empleado->tiempo_extra)}}

        {{Form::label('director', 'Director:')}}
        {{Form::text('director', $empleado->director)}}

        {{Form::label('estado', 'Estado:')}}
        {{Form::checkbox('estado')}}

        {{Form::label('foto', 'Foto:')}}
        {{Form::file('foto')}}
        <img src="{{Storage::url($empleado->foto)}}">

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit')}}
    {!! Form::close() !!}

</body>
</html>