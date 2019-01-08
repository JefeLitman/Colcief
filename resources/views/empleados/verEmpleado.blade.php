@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_admin')
{{-- Guia Front --}}
{{-- Se envía el objeto $empleado --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show()
        @Autor Paola C. --}}
{{-- URL: localhost:8000\empleados\{pk_empleado} --}}
<style>
    .r {
        background-color: #fff;
    }
    @media (max-width: 576px) {
		.g {
			display: none !important;
		}
	}
</style>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <img class="card-img-top" src="{{$empleado->foto}}" alt="Card image cap">
                        
                        <div class="card-footer" title="Cédula">
                            <div class="float-left g">Cédula</div>
                            <div class="text-muted" style="text-align: right;">{{$empleado->cedula}}</div>
                        </div>
                        <div class="card-footer" title="Nombre">
                            <div class="float-left g">Nombre</div>
                            <div class="text-muted" style="text-align: right;">{{$empleado->nombre}}</div>
                        </div>
                        <div class="card-footer" title="Apellido">
                            <div class="float-left g">Apellido</div>
                            <div class="text-muted" style="text-align: right;">{{$empleado->apellido}}</div>
                        </div>
                        <div class="card-footer" title="Correo Electronico" >
                            <div class="float-left g">Email</div>
                            <div class="text-muted" style="text-align: right;">{{$empleado->email}}</div>
                        </div>
                        <div class="card-footer" title="Dirección">
                            <div class="float-left g">Dirección</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($empleado->direccion)}}</div>
                        </div>
                        <div class="card-footer" title="Titulo">
                            <div class="float-left g">Titulo</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($empleado->titulo)}}</div>
                        </div>
                        <div class="card-footer" title="Cargo">
                            <div class="float-left g">Cargo</div>
                            <div class="text-muted" style="text-align: right;"><strong>{{$cargo[$empleado->role]}}</strong></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-5">
                    @if (!empty($empleado->fk_curso))
                        <div class="card">
                            <div class="card-header">
                                Director del curso 
                            </div>
                            <div class="card-footer r">
                                <a href="/estudiantes/cursos/{{$empleado -> fk_curso}}">{{$empleado -> prefijo.'-'.$empleado -> sufijo}}</a>
                            </div>
                        </div>
                        <br>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            Cursos Asignados
                        </div>
                        @if (!empty($cursos[0]))
                            @foreach ($cursos as $curso)
                                <div class="card-footer r">
                                    <a href="/estudiantes/cursos/{{$curso -> pk_curso}}">{{$curso -> prefijo.'-'.$curso -> sufijo}}</a>
                                </div>
                            @endforeach
                        @else
                            <div class="card-footer">No tiene cursos asignados</div>
                        @endif 
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection
