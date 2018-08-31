<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	{!! Form::open(array('url' => '/estudiantes', 'files' => true)) !!}
		@csrf
		{!!Form::number('pk_estudiante');!!}
		{!!Form::number('fk_acudiente');!!}
		{!!Form::text('nombre');!!}
		{!!Form::text('apellido');!!}
		{!!Form::password('clave');!!}
		{!!Form::date('fecha_nacimiento');!!}
		{!!Form::number('grado');!!}
		{!!Form::checkbox('discapacidad');!!}
		{!!Form::checkbox('estado');!!}
		{!!Form::file('foto');!!}
		{!!Form::submit('enviar');!!}
	{!!Form::close(); !!}
		{{-- {!! Form::model($user, array('action' => 'estudiantes', 'files' => true)) !!}
		   @csrf() 
		{!! Form::close() !!} --}}
</body>
</html>