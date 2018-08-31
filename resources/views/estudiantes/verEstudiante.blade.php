<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	{{ gettype($estudiante)}} <br>
	{{$estudiante}} <br>
	{{$acudiente}} <br>

	<h1>Ejemplo</h1>
	Nombre: {{$estudiante->nombre}} <br>
	Apellido: {{$estudiante->apellido}} <br>

	{!! Form::model($estudiante, array('url' => '/estudiantes', 'files' => true)) !!}
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
	{!!Form::close() !!}

</body>
</html>