@extends('contenedores.admin')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_admin')
<br>
<div class="card mx-auto border-dark bg-light" style="width: 20rem;"><br>
    <img class="card-img-top" src="{{session('user')['foto']}}" alt="Card image cap"><br>
    <ul  class="list-group list-group-flush">
        <li class="list-group-item border-dark bg-light"><h5 class="card-title text-center"><i class="fas fa-user-tie"></i></i> {{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}}</h5></li>
        <li class="list-group-item border-dark bg-light"><h5 class="card-title text-center"><i class="fas fa-id-card"></i> Cedula {{ucwords(session('user')['cedula'])}}</h5></li>
        <li class="list-group-item border-dark bg-light"><h5 class="card-title text-center"><i class="fas fa-user-cog"></i> Role {{ucwords(session('role'))}}</h5></li>
    </ul>
    
</div>
<br>
@endsection