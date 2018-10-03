@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{route('materias.update', $materia->pk_materia)}}" >
    {{ method_field('PATCH') }}
    @csrf
    <h1>EDITAR MATERIA</h1>
    
    {{-- el nombre no puede contener mas de 20 caracteres --}}
    Nombre de la materia: <input type="text" name="nombre" value="{{ $materia["nombre"] }}"><br><br>

    {{-- El contenido no debe exceder los 255 caracteres --}}
    Contenido de la materia:  <input type="textarea" name="contenido" value="{{ $materia["contenido"] }}"> <br><br>

    {{-- Los logros no deben exceder los 255 caracteres --}}
    Logros predefinidos: <input type="textarea" name="logros_custom" value="{{ $materia["logros_custom"] }}"> 
    
    <br>
    <br>
    <button type="submit">Guardar</button>
</form>