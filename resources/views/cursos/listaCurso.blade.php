@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Cursos')
<div class="container">
    <br><br>
    @foreach ($cursos as $prefijo => $curso)
        <table>
            <h3>{{$prefijo}}</h3>
            @foreach ($curso as $c)
                <tr>
                    <td>Curso: {{$c->prefijo}}-{{$c->sufijo}} Año: {{$c->ano}} 
                        <form action="{{route('cursos.destroy', $c->pk_curso)}}" method = "post">
                            @csrf
                            @method("DELETE")
                            <button type="submit">Eliminar</button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </table>
    @endforeach
    </div>
</div>
@endsection
