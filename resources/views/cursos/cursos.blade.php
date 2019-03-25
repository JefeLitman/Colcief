@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Cursos')

<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
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

                        <div class="container-fluid">
                            {{-- Muestra los grados para primaria --}}
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <a class="btn btn-outline-secondary mt-3 form-control" data-toggle="collapse" href="#preescolar" role="button" aria-expanded="false" aria-controls="preescolar">
                                        <small>Preescolar</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <a class="btn btn-outline-secondary mt-3 form-control" data-toggle="collapse" href="#primero" role="button" aria-expanded="false" aria-controls="primero">
                                        <small>Primero</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <a class="btn btn-outline-secondary mt-3 form-control" data-toggle="collapse" href="#segundo" role="button" aria-expanded="false" aria-controls="segundo">
                                        <small>Segundo</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <a class="btn btn-outline-secondary mt-3 form-control" data-toggle="collapse" href="#tercero" role="button" aria-expanded="false" aria-controls="tercero">
                                        <small>Tercero</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <a class="btn btn-outline-secondary mt-3 form-control" data-toggle="collapse" href="#cuarto" role="button" aria-expanded="false" aria-controls="cuarto">
                                        <small>Cuarto</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <a class="btn btn-outline-secondary mt-3 form-control mb-3" data-toggle="collapse" href="#quinto" role="button" aria-expanded="false" aria-controls="quinto">
                                        <small>Quinto</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Contenidos para primaria --}}
                        <div class="collapse" id="preescolar">
                            <div class="card card-body text-center">
                                Cursos de preescolar
                                @if(empty($curso[0]))
                                    <div>No hay Cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[0] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" href="/estudiantes/cursos/{{$c->pk_curso}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach 
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="collapse" id="primero">
                            <div class="card card-body text-center">
                                Cursos de primero
                                @if(empty($curso[1]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[1] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" href="/estudiantes/cursos/{{$c->pk_curso}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="collapse" id="segundo">
                            <div class="card card-body text-center">
                                Cursos de segundo
                                @if(empty($curso[2]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[2] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="collapse" id="tercero">
                            <div class="card card-body text-center">
                                Cursos de tercero
                                @if(empty($curso[3]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[3] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="collapse" id="cuarto">
                            <div class="card card-body text-center">
                                Cursos de cuarto
                                @if(empty($curso[4]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[4] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="collapse" id="quinto">
                            <div class="card card-body text-center">
                                Cursos de quinto
                                @if(empty($curso[5]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[5] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
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
                        <div class="container-fluid">
                            {{-- Muestra los grados para secundaria --}}
                            <div class="row">
                                <div class="col-12 col-sm-4 col-lg-2">
                                    <a class="btn btn-outline-secondary form-control mt-3" data-toggle="collapse" href="#sexto" role="button" aria-expanded="false" aria-controls="sexto">
                                        <small>Sexto</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-lg-2">
                                    <a class="btn btn-outline-secondary form-control mt-3" data-toggle="collapse" href="#septimo" role="button" aria-expanded="false" aria-controls="septimo">
                                        <small>Septimo</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-lg-2">
                                    <a class="btn btn-outline-secondary form-control mt-3" data-toggle="collapse" href="#octavo" role="button" aria-expanded="false" aria-controls="octavo">
                                        <small>Octavo</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-lg-2">
                                    <a class="btn btn-outline-secondary form-control mt-3" data-toggle="collapse" href="#noveno" role="button" aria-expanded="false" aria-controls="noveno">
                                        <small>Noveno</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-lg-2">
                                    <a class="btn btn-outline-secondary form-control mt-3" data-toggle="collapse" href="#decimo" role="button" aria-expanded="false" aria-controls="decimo">
                                        <small>Decimo</small>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-lg-2">
                                    <a class="btn btn-outline-secondary form-control mt-3 mb-3" data-toggle="collapse" href="#once" role="button" aria-expanded="false" aria-controls="once">
                                        <small>Once</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Contenidos para secundaria --}}
                        <div class="collapse" id="sexto">
                            <div class="card card-body text-center">
                                Cursos de sexto
                                @if(empty($curso[6]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[6] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3"  prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="collapse" id="septimo">
                            <div class="card card-body text-center">
                                Cursos de septimo
                                @if(empty($curso[7]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[7] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="collapse" id="octavo">
                            <div class="card card-body text-center">
                                Cursos de octavo
                                @if(empty($curso[8]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[8] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="collapse" id="noveno">
                            <div class="card card-body text-center">
                                Cursos de noveno
                                @if(empty($curso[9]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[9] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="collapse" id="decimo">
                            <div class="card card-body text-center">
                                Cursos de decimo
                                @if(empty($curso[10]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[10] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="collapse" id="once">
                            <div class="card card-body text-center">
                                Cursos de once
                                @if(empty($curso[11]))
                                <div>No hay cursos</div>
                                @else
                                    <div class="row">
                                        @foreach ($curso[11] as $c)
                                            <div class="col-12 col-sm-4 col-lg-2">
                                                <a class="form-control btn btn-primary mt-3" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" href="/estudiantes/cursos/{{$c->pk_curso}}" role="button">{{$c->prefijo}}-{{$c->sufijo}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('role') == 'administrador')
                <div class="row text-center mt-4">
                    <div class="col-6">
                        <a data-toggle="tooltip" data-placement="top" title="Crear curso" class="btn btn-info" href="/cursos/crear">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <small class="d-none d-sm-block">Crear curso</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <a data-toggle="tooltip" data-placement="top" title="Crear Estudiante" class="btn btn-info" href="/estudiantes/crear">
                            <i class="fas fa-user-plus"></i>
                            <small class="d-none d-sm-block">Crear estudiante</small>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
