@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Empleados')
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
{{-- Se envian array's de objetos $cursos, $materias, $profesores y un {Objeto $materiapc} --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion edit() 
     @Autor Paola C. --}}
{{-- Estado: Terminada para admin --}}
{{-- URL: localhost:8000\materiaspc\{pk_materia_pc}\editar --}}


<form method="post" action="{{route('materiaspc.update', $materiapc->pk_materia_pc)}}" >
    {{ method_field('PATCH') }}
    @csrf
    <h1>EDITAR MATERIA Profesor-C</h1>
    
    
    Materia: 
    <select name="fk_materia" id="fk_materia">
        @foreach ( $materias as $i)
            @if($i->pk_materia == $materiapc->fk_materia)
                <option value="{{$i->pk_materia}}" selected>{{$i->nombre}}</option>
                {{-- Selecciona la opcion guardada en la base de datos --}}
            @else
                <option value="{{$i->pk_materia}}">{{$i->nombre}}</option>
            @endif 
        @endforeach
    </select>
    <br><br>

    Curso:
    <select name="fk_curso" id="fk_curso">
        @foreach ( $cursos as $i)
            @if($i->pk_curso == $materiapc->fk_curso)
                <option value="{{$i->pk_curso}}" selected>{{$i->nombre}}</option>
                {{-- Selecciona la opcion guardada en la base de datos --}}
            @else
                <option value="{{$i->pk_curso}}">{{$i->nombre}}</option>
            @endif 
        @endforeach
    </select>
    <br><br>

    Profesor:
    <select name="fk_empleado" id="fk_empleado">
        @foreach ( $profesores as $i)
            @if($i->cedula == $materiapc->fk_empleado)
                <option value="{{$i->cedula}}" selected>{{$i->nombre}} {{$i->apellido}} </option>
                {{-- Selecciona la opcion guardada en la base de datos --}}
            @else
                <option value="{{$i->cedula}}">{{$i->nombre}} {{$i->apellido}}</option>
            @endif 
        @endforeach
    </select>
    <br><br>

    {{--No debe superar una long de 5--}}
    Salón: <input name="salon" id="salon" type="text" value="{{$materiapc->salon}}">
    <br><br>
    
    Logros custom (Este campo solo puede ser modificado por el docente a cargo): {{$materiapc->logros_custom}} 
    {{-- Esto no puede ser modificado por el administrador, pero si puede observar el contenido de este. Se le debe informar que este campo solo puede ser modificado por el docente a cargo. --}}


    <br>
    <br>
    <button type="submit">Guardar</button>

    
</form>

{{-- Esto es necesario para poder eliminar una materiapc, ademas de importar el jquery --}}
<br id="br">
<button class="delete" tabla="materiaspc" identificador="{{$materiapc->pk_materia_pc}}">Eliminar MateriaPC</button>
<script src="{{ asset('js/ajax.js') }}"></script>

@endsection