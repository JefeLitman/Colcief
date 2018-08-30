<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	<form method="post" action="/estudiantes" enctype="multipart/form-data">
		@csrf()
		{{-- <img src="/storage/PvRbjWWj0jk4QD84Y6kkfm2Wri5tdMz35lEu9JGM.jpeg"> --}}
		<input type="number" name="pk_estudiante">
		<input type="number" name="fk_acudiente">
		<input type="" name="nombre">
		<input type="text" name="apellido">
		<input type="" name="clave">
		<input type="date" name="fecha_nacimiento">
		<input type="number" name="grado">
		<input type="checkbox" name="discapacidad" value="1">
		<input type="checkbox" name="estado" value="1">
		<input type="file" name="foto">
		<button type="submit">Enviar</button>
	</form>
</body>
</html>