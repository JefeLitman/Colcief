@extends('contenedores.estudiante')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_estudiante')

</div>
<div class="row">
        <div class="col s3"></div>
        <div class="col s6 center"><br>
            <div class="card green lighten-5">
                    <h4 class=" blue-grey-text">Bienvenido</h4>
                <div class="card-content">
                    <div class="row center">
                        <div class="col s12">
                            <img class="responsive-img" style="max-width:250px;" src="{{session('user')['foto']}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1"></div>
                        <div class="col s3">
                            <i class="blue-grey-text small material-icons">face</i>
                            <p class="blue-grey-text">Estudiante</p>
                        </div>
                        <div class="col s7">
                            <h5 class="blue-grey-text">{{ucwords(session('user')['nombre'])}}<br>{{ucwords(session('user')['apellido'])}}</h5>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                            <div class="col s1"></div>
                            <div class="col s3">
                                <i class="blue-grey-text small material-icons">grade</i>
                                <p class="blue-grey-text">Grado</p>
                            </div>
                            <div class="col s7">
                                <h5 class="blue-grey-text"> @switch(session('user')['grado'])
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
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col s2"></div>
        <div class="col s1"></div>
    </div>
@endsection