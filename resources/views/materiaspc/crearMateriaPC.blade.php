@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- Guia Front --}}
{{-- No se envia nada --}}
{{-- @Autor Paola C. --}}
{{-- Estado: En construccion --}}
{{-- URL: localhost:8000\materiaspc\crear --}}

...EN CONSTRUCCIÓN...
<form method="post" action="" >
    @csrf
    {{-- <h1>CREAR MATERIA</h1> --}}
    {{-- el nombre no puede contener mas de 20 caracteres --}}
    {{-- Nombre de la materia: <input type="text" name="nombre"><br><br> --}}

    {{-- El contenido no debe exceder los 255 caracteres --}}
    {{-- Contenido de la materia:  <input type="textarea" name="contenido"> <br><br> --}}

    {{-- Los logros no deben exceder los 255 caracteres --}}
    {{-- Logros predefinidos: <input type="textarea" name="logros_custom">  --}}
    
    <br>
    <br>
    {{-- <button type="submit">Guardar</button> --}}
</form>