<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	<form method="post" action="/estudiantes" enctype="multipart/form-data">
		@csrf()
		<input type="number" name="pk_estudiante">
		<input type="number" name="fk_acudiente">
		<input type="" name="nombre">
		<input type="text" name="apellido">
		<input type="" name="clave">
		<input type="date" name="fecha_nacimiento">
		<input type="number" name="grado">
		<input type="checkbox" name="discapacidad">
		<input type="checkbox" name="estado">
		<input type="file" name="foto">
		<button type="submit">Enviar</button>
	</form>
</body>
</html>