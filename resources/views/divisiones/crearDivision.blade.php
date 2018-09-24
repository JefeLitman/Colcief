<!DOCTYPE html>
<html>
<head>
    <title>Division - Crear</title>
    <script>var i=2</script>
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
    <form enctype="multipart/form-data" action="/divisiones" method="POST">
        @csrf
        <div id="div">
            @for ($i = 0; $i < 3; $i++)
                <div id="division[{{$i}}]">
                    <label for="nombre[{{$i}}]">Nombre: </label>
                    <input type="text" id="nombre[{{$i}}]" name="nombre[{{$i}}]" value="{{old('nombre(field.i)')}}">

                    <label for="descripcion[{{$i}}]">Descripcion: </label>
                    <textarea id="descripcion[{{$i}}]" name="descripcion[{{$i}}]">{{old('descripcion(field.i)')}}</textarea> 

                    <label for="porcentaje[{{$i}}]">Porcentaje: </label>
                    <input type="number" id="porcentaje[{{$i}}]" name="porcentaje[{{$i}}]" value="{{old('porcentaje(field.i)')}}">
                </div>
            @endfor
        </div>
        <a id="create"> + </a>
        <button type="submit">Crear</button>
        <a id="delete"> - </a>
    </form>
</body>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $('#create').click(function(){
        i++;
        $('#div').append(
            '<div id="division['+i+']">'+
                '<label for="nombre['+i+']">Nombre: </label>' +
                '<input type="text" id="nombre['+i+']" name="nombre['+i+']">' +

                '<label for="descripcion['+i+']">Descripcion: </label>' +
                '<textarea id="descripcion['+i+']" name="descripcion['+i+']"></textarea> ' +

                '<label for="porcentaje['+i+']">Porcentaje: </label>' +
                '<input type="number" id="porcentaje['+i+']" name="porcentaje['+i+']">' +
            '</div>'
        );
    });
    $('#delete').click(function(){
        $('form div:last').remove();
        i--;
    });
</script>
</html>

        
