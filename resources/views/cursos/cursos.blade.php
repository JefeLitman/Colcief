@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Cursos')
@yield('nombre')
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<div class="table-responsive" style="display: none;">
    <table class="table table-hover mr-auto" id="myTable">
        <thead>
            <tr>
                <th scope="col" style="color:#00695c">Código</th>
                <th scope="col" style="color:#00695c">Nombre</th>
                <th scope="col" style="color:#00695c">Apellido</th>
                {{-- <th scope="col" style="color:#00695c">Clave</th> --}}
                <th scope="col" style="color:#00695c">Grado</th>
                <th scope="col" style="color:#00695c"></th>
                <th scope="col" style="color:#00695c"></th>
                {{-- <th>Editar</th>
                <th>Eliminar</th> --}}
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
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
                        Cursos de preescolar: 
                        @isset($curso[0])
                            @foreach ($curso[0] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="primero">
                    <div class="card card-body">
                        Cursos de primero
                        @isset($curso[1])
                            @foreach ($curso[1] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="segundo">
                    <div class="card card-body">
                        Cursos de segundo
                        @isset($curso[2])
                            @foreach ($curso[2] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="tercero">
                    <div class="card card-body">
                        Cursos de tercero
                        @isset($curso[3])
                            @foreach ($curso[3] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="cuarto">
                    <div class="card card-body">
                        Cursos de cuarto
                        @isset($curso[4])
                            @foreach ($curso[4] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="quinto">
                    <div class="card card-body">
                        Cursos de quinto
                        @isset($curso[5])
                            @foreach ($curso[5] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
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
                        @isset($curso[6])
                            @foreach ($curso[6] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset                        
                    </div>
                </div>
                <div class="collapse" id="septimo">
                    <div class="card card-body">
                        Cursos de septimo
                        @isset($curso[7])
                            @foreach ($curso[7] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="octavo">
                    <div class="card card-body">
                        Cursos de octavo
                        @isset($curso[8])
                            @foreach ($curso[8] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="noveno">
                    <div class="card card-body">
                        Cursos de noveno
                        @isset($curso[9])
                            @foreach ($curso[9] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="decimo">
                    <div class="card card-body">
                        Cursos de decimo
                        @isset($curso[10])
                            @foreach ($curso[10] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="collapse" id="once">
                    <div class="card card-body">
                        Cursos de once
                        @isset($curso[11])
                            @foreach ($curso[11] as $c)
                                <a class="btn btn-primary mt-3 submit" prefijo="{{$c->prefijo}}" sufijo="{{$c->sufijo}}" role="button">{{$grado[$c->sufijo]}}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.submit').click(function(){
        prefijo = $(this).attr('prefijo');
        sufijo = $(this).attr('sufijo');
        hidden = $('.accordion');
        tr = $('tbody');
        tabla = $('.table-responsive');
        $.ajax({
            type: 'GET',
            dataType: "json",
            url: '/cursos/estudiantes/'+prefijo+'/'+sufijo,
            data: {_token:$('input[name=_token]').val()},
            success: function(data) {
                hidden.fadeOut();
                tabla.fadeIn();
                $.each( data, function(key, value) {
                    add = ''+
                    '<tr>'+
                        '<td>'+value.pk_estudiante+'</td>'+
                        '<td>'+value.nombre+'</td>'+
                        '<td>'+value.apellido+'</td>'+
                        '<td>'+value.grado+'</td>'+
                        '<td><a href="/estudiantes/'+value.pk_estudiante+'/editar"><i class="fas fa-edit" style="color:#00838f"></i></a></td>'+
                        '<td class="delete" tabla="estudiante" identificador="'+value.pk_estudiante+'"><i class="fas fa-trash-alt" style="color:#c62828"></i></td>'+
                    '</tr>';
                    tr.append(add);
                });
            },
            error: function(){
                alert('salio mal');
            }
        });
    });
    
});
</script>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection