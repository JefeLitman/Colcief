@extends('contenedores.admin')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_admin')
<br>
<div class="card mx-auto bg-light" style="width: 20rem; border-color:  #17a2b8 !important;">
    <br>
    {{-- FOTO DEL USUARIO QUE INGRESA A LA PAGINA --}}
    <img class="mx-auto w-75"  src="{{session('user')['foto']}}" alt="Foto empleado"><br>
    {{-- BOTON: PARA CAMBIAR LA FOTO DEL USUARIO --}}
    <button type="button" class="btn btn-primary w-50 mx-auto" data-toggle="modal" data-target="#empleadoModal" style="background-color:  #17a2b8 !important; border-color:  #17a2b8 !important;">
        Cambiar Imagen
    </button>
    <br>
    {{-- DATOS DEL USUARIO --}}
    <ul  class="list-group list-group-flush">
        {{-- NOMBRE DEL USUARIO --}}
        <li class="list-group-item bg-light" style="border-color:  #17a2b8 !important;">
            <h5 class="card-title text-center">
                <i class="fas fa-user-tie"></i>
                {{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}}
            </h5>
        </li>
        {{-- CEDULA DEL USUARIO --}}
        <li class="list-group-item bg-light" style="border-color:  #17a2b8 !important;">
            <h5 class="card-title text-center">
                <i class="fas fa-id-card"></i> Cedula {{ucwords(session('user')['cedula'])}}
            </h5>
        </li>
        {{-- ROL --}}
        <li class="list-group-item border-dark bg-light" style="border-color:  #17a2b8 !important;">
            <h5 class="card-title text-center">
                <i class="fas fa-user-cog"></i> Role {{ucwords(session('role'))}}
            </h5>
        </li>
    </ul>
</div>
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="empleadoModal" tabindex="-1" role="dialog" aria-labelledby="empleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="empleadoModalLabel">Imagen de Perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- foto --}}
            @php
                $estudiante=session('user');
            @endphp
            <form  id="formulario" enctype="multipart/form-data" action="{{url('/empleados/perfil/'.session('user')['cedula'])}}" method="POST">
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
  </div>
<br>
@endsection
