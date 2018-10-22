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
{{-- Se envía el objeto $materiapc --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion edit() 
     @Autor Paola C. --}}
{{-- Estado: En construccion --}}
{{-- URL: localhost:8000\materiaspc\{pk_materia_pc}\editar --}}

...EN CONTRUCCION...

<form method="post" action="{{route('materiaspc.update', $materiapc->pk_materia_pc)}}" >
    {{ method_field('PATCH') }}
    @csrf
    {{-- <h1>EDITAR MATERIA</h1> --}}
    
    {{-- el nombre no puede contener mas de 20 caracteres --}}
    {{-- Nombre de la materia: <input type="text" name="nombre" value="{{ $materia["nombre"] }}"><br><br> --}}

    {{-- El contenido no debe exceder los 255 caracteres --}}
    {{-- Contenido de la materia:  <input type="textarea" name="contenido" value="{{ $materia["contenido"] }}"> <br><br> --}}

    {{-- Los logros no deben exceder los 255 caracteres --}}
    {{-- Logros predefinidos: <input type="textarea" name="logros_custom" value="{{ $materia["logros_custom"] }}">  --}}
    
    <br>
    <br>
    <button type="submit">Guardar</button>
</form>*/