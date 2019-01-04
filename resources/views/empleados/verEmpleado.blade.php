@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_admin')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $empleado --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\empleados\{pk_empleado} --}}
<br>
<div class="container" style="background:#fafafa !important;">
    <h4 class="text-center">
        Datos de {{$empleado->nombre}} {{$empleado->apellido}}
    </h4>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center" style="background-color: rgba(0,0,0,.03) !important; float:center !important; border-color: #17a2b8 !important; border-radius:0.25rem !important;">
                <img class="card-img-top" src="{{$empleado->foto}}" alt="Card image cap" style="padding: 5px 5px 5px 5px;">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body" style="border-color:#66bb6a !important;">
                <div class="table-responsive">
                    <table class="table table-hover mr-auto">
                        <thead style="background-color: rgba(0,0,0,.03) !important;">
                            <tr>
                                <th scope="col" style="color:#0a7788" class="text-center">Cedula</th>
                                <th scope="col" style="color:#0a7788" class="text-center">Correo</th>
                                <th scope="col" style="color:#0a7788" class="text-center">Dirección</th>
                                <th scope="col" style="color:#0a7788" class="text-center">Profesión</th>
                                <th scope="col" style="color:#0a7788" class="text-center">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{$empleado->cedula}}</td>
                                <td class="text-center">{{$empleado->correo}}</td>
                                <td class="text-center">{{$empleado->direccion}}</td>
                                <td class="text-center">{{$empleado->titulo}}</td>
                                <td class="text-center">
                                    @php
                                        $role=["Administrador","Director","Profesor"]
                                    @endphp
                                    @foreach ($role as $i=>$value)
                                        @if (intval($empleado->role)==$i)
                                            {{$value}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
