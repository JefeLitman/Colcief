@extends('contenedores.profesor')
@section('titulo',' Horarios')
@section('contenedor_profesor')
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="accordion" id="accordion">
                <div class="card-header bg-secondary text-center text-white">
                    Horarios
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                        <button onclick="location.href='/horarios/director'" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{session('user')['nombre']}} {{session('user')['apellido']}}
                        </button>
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                        <button onclick="location.href='/horarios/curso'" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Curso: {{$c}}
                        </button>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
