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
{{-- Se envia $cursos, $materias, $profesores --}}
{{-- Los empleados qie se envian --}}
{{-- @Autor Paola C. --}}
{{-- Estado: Terminada (Sujeta a cambios) --}}
{{-- URL: localhost:8000\materiaspc\crear --}}

{{-- Acceso: Solo del Administrador. --}}

<b>Contenido $cursos: </b>{{$cursos}} <br><br>
<b>Contenido $materias: </b>{{$materias}} <br><br>
<b>Contenido $profesores: </b>{{$profesores}} <br><br>

<form method="post" action="/materiaspc" onload="logros(document.getElementById('fk_materia').value)">
    @csrf
    <h1>CREAR MATERIA PROFESOR-CURSO</h1>
    
    Materia: 
    <select name="fk_materia" id="fk_materia" onchange="logros(this.value)" required>
        @foreach ( $materias as $materia)
        <option value="{{$materia["pk_materia"]}}">{{$materia["nombre"]}}</option>
        @endforeach
    </select> <br><br>
    Profesor: 
    <select name="fk_empleado" id="fk_empleado" required>
        @foreach ( $profesores as $profesor)
        <option value="{{$profesor["cedula"]}}">{{ucwords($profesor["nombre"])}} {{ucwords($profesor["apellido"])}}</option>
        {{-- Los nombres y apellidos estan normalizados a estar completamente en minuscula --}}
        @endforeach
    </select> <br><br>
    Curso: 
    <select name="fk_curso" id="fk_curso" required>
        @foreach ( $cursos as $curso)
        <option value="{{$curso["pk_curso"]}}">{{$curso["nombre"]}}</option>
        @endforeach
    </select> <br><br> 

    {{-- El contenido no debe exceder los 5 caracteres --}}
    Salon: <input type="text" name="salon" id="salon" maxlength="5" required>
    <br>
    <br>
    <button type="submit">Guardar</button>
</form>