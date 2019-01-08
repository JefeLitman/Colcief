@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_admin')

<style>
    @media (max-width: 576px) {
		.g {
			display: none !important;
		}
	}
</style>
	{{-- Guia Front --}}
	{{-- Se envía el objeto $empleado --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\empleados\{pk_empleado} --}}
    <div class="container">
            <div class="row justify-content-center" style="background-color: #fafafa !important;">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <img class="card-img-top" src="{{$empleado->foto}}" alt="Card image cap">
                                <div class="card-footer" title="Cédula">
                                    <div class="float-left g">Cédula</div>
                                    <div class="text-muted" style="text-align: right;">{{$empleado->cedula}}</div>
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
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if (!empty($empleado->prefijo))
                                <div class="card">
                                    <div class="card-header">
                                        Director del curso {{$empleado->prefijo.'-'.$empleado->sufijo}}
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    Cursos Asignados
                                </div>
                                @if (!empty($cursos[0]))
                                    @foreach ($cursos as $curso)
                                        <div class="card-footer">
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
    </div>
    

@endsection
