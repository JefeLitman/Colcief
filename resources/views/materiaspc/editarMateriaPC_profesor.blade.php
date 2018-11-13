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
{{-- Se envian un Objeto $materiapc --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion edit() 
     @Autor Paola C. --}}
{{-- Estado: Terminada para profesor --}}
{{-- URL: localhost:8000\materiaspc\{pk_materia_pc}\editar --}}

<form method="post" action="{{route('materiaspc.update', $materiapc->pk_materia_pc)}}" >
    {{ method_field('PATCH') }}
    @csrf
    <h1>EDITAR MATERIA Profesor-C</h1>
    
    
    Materia: {{$materiapc->materia}}
    <br><br>

    Curso: {{$materiapc->curso}}
    <br><br>

    Profesor: {{$materiapc->nombre}} {{$materiapc->apellido}}
    <br><br>

    {{--No debe superar una long de 5--}}
    Salón:  {{$materiapc->salon}}
    <br><br>
    
    Logros custom: <br>
    {{-- Solo se permiten 255 caracteres --}} 
    <textarea name="logros_custom" id="logros_custom" cols="30" rows="10" maxlength="255">{{$materiapc->logros_custom}}</textarea>
    <br>
    <br>
    <button type="submit">Guardar</button>
</form>