@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Cursos')
@yield('nombre')
{{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> --}}
<div class="container" style="background:#fafafa !important;">
{{-- <h4 class="text-center"><i class="fas fa-user-edit"></i> Editar Estudiantes </h4><br> --}}
<div class="accordion" id="accordion">
        <div class="card-header bg-secondary text-center text-white">
                Cursos COLCIEF
        </div>
        @csrf
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Primaria
                </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">

                <div class="text-center">
                    {{-- Muestra los grados para primaria --}}
                    <p>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#preescolar" role="button" aria-expanded="false" aria-controls="preescolar">
                            Preescolar
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#primero" role="button" aria-expanded="false" aria-controls="primero">
                            Primero
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#segundo" role="button" aria-expanded="false" aria-controls="segundo">
                            Segundo
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#tercero" role="button" aria-expanded="false" aria-controls="tercero">
                            Tercero
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#cuarto" role="button" aria-expanded="false" aria-controls="cuarto">
                            Cuarto
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#quinto" role="button" aria-expanded="false" aria-controls="quinto">
                            Quinto
                        </a>
                    </p>
                </div>
                {{-- Contenidos para primaria --}}
                <div class="collapse" id="preescolar">
                    <div class="card card-body">
                        Cursos de preescolar
                        @if(empty($curso[0]))
                            <div class="text-center">No hay Cursos</div>
                        @else
                            @foreach ($curso[0] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button" href="/estudiantes/cursos/{{$c->pk_curso}}">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="collapse" id="primero">
                    <div class="card card-body">
                        Cursos de primero
                        @if(empty($curso[1]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[1] as $c)
                                <a class="btn btn-primary mt-3 text-light submit w-25" href="/estudiantes/cursos/{{$c->pk_curso}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="segundo">
                    <div class="card card-body">
                        Cursos de segundo
                        @if(empty($curso[2]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[2] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="tercero">
                    <div class="card card-body">
                        Cursos de tercero
                        @if(empty($curso[3]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[3] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="cuarto">
                    <div class="card card-body">
                        Cursos de cuarto
                        @if(empty($curso[4]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[4] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="quinto">
                    <div class="card card-body">
                        Cursos de quinto
                        @if(empty($curso[5]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[5] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>


            </div>
        </div>
        <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Secundaria
            </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

                <div class="text-center">
                    {{-- Muestra los grados para secundaria --}}
                    <p>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#sexto" role="button" aria-expanded="false" aria-controls="sexto">
                            Sexto
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#septimo" role="button" aria-expanded="false" aria-controls="septimo">
                            Septimo
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#octavo" role="button" aria-expanded="false" aria-controls="octavo">
                            Octavo
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#noveno" role="button" aria-expanded="false" aria-controls="noveno">
                            Noveno
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#decimo" role="button" aria-expanded="false" aria-controls="decimo">
                            Decimo
                        </a>
                        <a class="btn btn-secondary mt-3" data-toggle="collapse" href="#once" role="button" aria-expanded="false" aria-controls="once">
                            Once
                        </a>
                    </p>
                </div>
                {{-- Contenidos para secundaria --}}
                <div class="collapse" id="sexto">
                    <div class="card card-body">
                        Cursos de sexto
                        @if(empty($curso[6]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[6] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25"  prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="septimo">
                    <div class="card card-body">
                        Cursos de septimo
                        @if(empty($curso[7]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[7] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="octavo">
                    <div class="card card-body">
                        Cursos de octavo
                        @if(empty($curso[8]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[8] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="noveno">
                    <div class="card card-body">
                        Cursos de noveno
                        @if(empty($curso[9]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[9] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="decimo">
                    <div class="card card-body">
                        Cursos de decimo
                        @if(empty($curso[10]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[10] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="once">
                    <div class="card card-body">
                        Cursos de once
                        @if(empty($curso[11]))
                        <div class="text-center">No hay cursos</div>
                        @else
                            @foreach ($curso[11] as $c)
                                <a class="btn btn-primary mt-3 text-light submit  w-25" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$grado[$c->prefijo]}}-{{$c->sufijo}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-6">
            <div class="text-center" style="float:center;">
                <br>
                <a  class="btn btn-success" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;" href="/cursos/crear">Crear curso</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center" style="float:center;">
                <br>
                <a  class="btn btn-success" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;" href="/estudiantes/crear">Agregar un nuevo estudiante</a>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
