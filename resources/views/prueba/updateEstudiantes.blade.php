<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form enctype="multipart/form-data" action="{{route('estudiantes.update', $estudiante->pk_estudiante)}}" method="POST">
		{{ method_field('PATCH') }} {{-- metodo del recurso --}}
    	@csrf {{-- csrf token --}}
		<label for="pk_estudiante" >pk_estudiante</label> 
		<input type="number" value="{{$estudiante->pk_estudiante}}" id="pk_estudiante" name="pk_estudiante">
		<label for="fk_acudiente" >fk_acudiente</label> 
		<input type="number" value="{{$estudiante->fk_acudiente}}" id="fk_acudiente" name="fk_acudiente">
		<label for="nombre" >nombre</label> 
		<input type="text" value="{{$estudiante->nombre}}" id="nombre" name="nombre">
		<label for="apellido" >apellido</label> 
		<input type="text" value="{{$estudiante->apellido}}" id="apellido" name="apellido">
		<label for="clave" >clave</label> 
		<input type="password" value="{{$estudiante->clave}}" id="clave" name="clave">
		<label for="fecha_nacimiento" >fecha_nacimiento</label> 
		<input type="date" value="{{$estudiante->fecha_nacimiento}}" id="fecha_nacimiento" name="fecha_nacimiento">
		<label for="grado" >grado</label> 
		<input type="number" value="{{$estudiante->grado}}" id="grado" name="grado">
		<label for="discapacidad" >discapacidad</label> 
		<input type="checkbox" id="discapacidad" name="discapacidad" value="1" 
			@if($estudiante->discapacidad == "1") {{-- verifico si el estudiante tiene discapacidad, en caso q si, imprimo checked para checkar el checkbox --}} 
				checked 
			@endif
		>
		<label for="estado" >estado</label> 
		<input type="checkbox" id="{{$estudiante->estado}}" name="estado" value="1" 
			@if($estudiante->estado == "1") {{-- verifico estado, en caso q si imprimo checked para checkar el checkbox --}} 
				checked 
			@endif
		>
		<label for="foto" >foto</label> 
		<input type="file" id="foto" name="foto">
		<img src="{{Storage::url($estudiante->foto)}}">
		<button type="submit">Actualizar</button>
	</form>
</body>
</html>