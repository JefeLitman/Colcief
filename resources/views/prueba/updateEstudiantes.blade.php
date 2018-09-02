<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{!! Form::model($estudiante, array('method' => 'PATCH', 'url' => route('estudiantes.update', $estudiante), 'files' => true)) !!}
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
		<img src="{{Storage::url($estudiante->foto)}}">
		{!!Form::submit('Enviar')!!}
	{!!Form::close() !!}
</body>
</html>