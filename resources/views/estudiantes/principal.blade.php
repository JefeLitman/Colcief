@extends('contenedores.estudiante')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_estudiante')
<br>
<div class="card mx-auto border-dark bg-light" style="width: 20rem;"><br>
    <img class="card-img-top" src="{{session('user')['foto']}}" alt="Card image cap"><br>
    <ul  class="list-group list-group-flush">
        <li class="list-group-item border-dark bg-light"><h5 class="card-title text-center"><i class="fas fa-user-graduate"></i> {{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}}</h5></li>
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