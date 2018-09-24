<!DOCTYPE html>
<html>
<head>
	<title>Division - Lista</title>
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
    @foreach ($division as $i)
        <p>Nombre: {{ $i->nombre }}</p>
        <p>Porcentaje: {{ $i->porcentaje }}</p>
        <p>Descripcion: {{ $i->descripcion }}</p>
        <br>
    @endforeach
</body>
</html>