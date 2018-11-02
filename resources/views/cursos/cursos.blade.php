@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Cursos')
@yield('nombre')
<div class="accordion" id="accordion">
        <div class="card-header bg-secondary text-center text-white">
                Cursos COLCIEF
        </div>
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
                        Cursos de preescolar: 
                        <a class="btn btn-primary mt-3" href="
                        @if ($pas=='0')
                        {{ url('/estudiantes') }}
                        @else
                        {{ url('/estudiantes') }}
                        @endif
                        " role="button">Uno</a>
                    </div>
                </div>
                <div class="collapse" id="primero">
                    <div class="card card-body">
                        Cursos de primero
                    </div>
                </div>
                <div class="collapse" id="segundo">
                    <div class="card card-body">
                        Cursos de segundo
                    </div>
                </div>
                <div class="collapse" id="tercero">
                    <div class="card card-body">
                        Cursos de tercero
                    </div>
                </div>
                <div class="collapse" id="cuarto">
                    <div class="card card-body">
                        Cursos de cuarto
                    </div>
                </div>
                <div class="collapse" id="quinto">
                    <div class="card card-body">
                        Cursos de quinto
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
                    </div>
                </div>
                <div class="collapse" id="septimo">
                    <div class="card card-body">
                        Cursos de septimo
                    </div>
                </div>
                <div class="collapse" id="octavo">
                    <div class="card card-body">
                        Cursos de octavo
                    </div>
                </div>
                <div class="collapse" id="noveno">
                    <div class="card card-body">
                        Cursos de noveno
                    </div>
                </div>
                <div class="collapse" id="decimo">
                    <div class="card card-body">
                        Cursos de decimo
                    </div>
                </div>
                <div class="collapse" id="once">
                    <div class="card card-body">
                        Cursos de once
                    </div>
                </div>
        </div>
        </div>
</div>
</div>
@endsection