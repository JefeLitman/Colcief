@extends('contenedores.estudiante')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_estudiante')
<br>
<div class="card mx-auto border-dark bg-light" style="width: 20rem;"><br>
    <img class="card-img-top" src="{{session('user')['foto']}}" alt="Card image cap"><br>
    <button type="button" class="btn btn-primary w-50 mx-auto" data-toggle="modal" data-target="#exampleModal">
        Cambiar Imagen
    </button><br>
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
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Imagen de Perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- foto --}}
            @php
                $estudiante=session('user');
            @endphp
            <form  id="formulario" enctype="multipart/form-data" action="{{url('/estudiantes/perfil/'.session('user')['pk_estudiante'])}}" method="POST">
                @csrf
                @method("POST")
                <img class="rounded mx-auto d-block w-75" src="{{session('user')['foto']}}" alt="Card image cap"><br>
                {{-- foto --}}
                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
                            <i class="fas fa-file-image input-group-text"></i>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang"  lang="es">
                            <label class="custom-file-label" for="customFileLang">Actualizar Foto</label>
                        </div>
                    </div>
                </div>
                
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" form="formulario" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
<br>
@endsection