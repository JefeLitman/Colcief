@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Cursos')
<div class="container">
    <br><br>
    <div class="card-group">
    @foreach ($cursos as $curso)
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Grado: {{$curso->prefijo}}-{{$curso->sufijo}}</h5>
                <p class="card-text">Año: {{$curso->ano}}</p>
                <a href="cursos/{{$curso->pk_curso}}/editar" class="btn btn-primary">Editar</a>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
