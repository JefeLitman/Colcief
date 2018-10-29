@extends('contenedores.estudiante')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_estudiante')
@php
    $estudiante=session('user');
@endphp
<br>
<div class="card mx-auto border-dark bg-light" style="width: 20rem;"><br>
    <form enctype="multipart/form-data" action="{{route('estudiantes.update', $estudiante['pk_estudiante'])}}" method="POST">
        @csrf
        @method("PUT")
        <img class="card-img-top" src="{{session('user')['foto']}}" alt="Card image cap"><br>
        {{-- foto --}}
        <div class="col-md-12">
            <div class="input-group mb-2">
                <div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
                    <i class="fas fa-file-image input-group-text"></i>
                </div>
                <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" value="{{$estudiante['foto']}}" lang="es">
                    <label class="custom-file-label" for="customFileLang">Actualizar Foto</label>
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="action" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
        </div>
    </form>
    <ul  class="list-group list-group-flush">
        <li class="list-group-item border-dark bg-light"><h5 class="card-title text-center"><i class="fas fa-user-graduate"></i> {{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}}</h5></li>
        <li class="list-group-item border-dark bg-light"><h5 class="card-title text-center"><i class="fas fa-hashtag"></i> Código {{ucwords(session('user')['pk_estudiante'])}}</h5></li>
        <li class="list-group-item border-dark bg-light"><h5 class="card-title text-center"><i class="fas fa-star"></i> @switch(session('user')['grado'])
                @case(0)
                    Preescolar
                    @break
                @case(1)
                    Primero
                    @break
                @case(2)
                    Segundo
                    @break
                @case(3)
                    Tercero
                    @break
                @case(4)
                    Cuarto
                    @break
                @case(5)
                    Quinto
                    @break
                @case(6)
                    Sexto
                    @break
                @case(7)
                    Septimo
                    @break
                @case(8)
                    Octavo
                    @break
                @case(9)
                    Noveno
                    @break
                @case(10)
                    Decimo
                    @break
                @case(11)
                    Once
                    @break
                    
            @endswitch </h5>
        </li>
        
    </ul>
    
</div>
<br>

@endsection