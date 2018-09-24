<!DOCTYPE html>
<html>
<head>
	<title>Division - Editar</title>
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
    <form enctype="multipart/form-data" action="{{route('divisiones.update', $division->pk_division)}}" method="POST">
		{{ method_field('PATCH') }} {{-- metodo del recurso --}}
    	@csrf {{-- csrf token --}}
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" value="{{$division->nombre}}">

        <label for="descripcion">Descripcion: </label>
        <textarea id="descripcion" name="descripcion">{{$division->descripcion}}</textarea> 

        <label for="porcentaje">Porcentaje: </label>
        <input type="number" id="porcentaje" name="porcentaje" value="{{$division->porcentaje}}">

        <label for="ano">Año: </label>
        <input type="year" id="ano" name="ano" value="{{$division->ano}}">

        <button type="submit">Editar</button>
    </form>
</body>
</html>