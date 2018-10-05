@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_principal')
@guest
    @include('error.error')
@endguest
    <script>var i=1</script>
<div class="row">
    <div class="col s2"></div>
    <div class="col s8 center"><br>
        <div class="card green lighten-5">
            <div class="card-content">
                <h1>Divisiones</h1>
                <form enctype="multipart/form-data" action="/divisiones" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s4">
                            <h5>Nombre</h5>
                        </div>
                        <div class="col s4">
                            <h5>Descripción</h5>
                        </div>
                        <div class="col s4">
                            <h5>Porcentaje</h5>
                        </div>
                    </div>
                    <div id="div">
                        @for ($i = 0 ; $i < 1; $i++)
                            <div class="row" id="index[{{$i}}]">
                                <div class="col s4">
                                    <div class="input-field">
                                        <input type="text" id="nombre[{{$i}}]" name="nombre[{{$i}}]" value="{{old('nombre(field.i)')}}">
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="input-field">
                                        <textarea class="materialize-textarea" id="descripcion[{{$i}}]" name="descripcion[{{$i}}]">{{old('descripcion(field.i)')}}</textarea>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="input-field">
                                        <input type="number" id="porcentaje[{{$i}}]" name="porcentaje[{{$i}}]" value="{{old('porcentaje(field.i)')}}">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row center ">
        <div class="col s6">
            <a class="btn waves-effect cyan darken-3" id="create"> + </a>
        </div>
        <div class="col s6">
            <a class="btn waves-effect cyan darken-3" id="delete"> - </a>
        </div>
    </div>
    <div class="input-field center">
        <button class="btn waves-effect cyan darken-3" type="submit" name="action">Crear
        </button>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $('#create').click(function(){
        i++;
        $('#div').append(
            '<div class="row" id="index['+i+']">'+
                '<div class="col s4">'+
                    '<div class="input-field">'+
                        '<input type="text" id="nombre['+i+']" name="nombre['+i+']">'+
                    '</div>'+
                '</div>'+
                '<div class="col s4">'+
                    '<div class="input-field">'+
                        '<textarea class="materialize-textarea" id="descripcion['+i+']" name="descripcion['+i+']">'+'</textarea>'+
                    '</div>'+
                '</div>'+
                '<div class="col s4">'+
                    '<div class="input-field">'+
                        '<input type="number" id="porcentaje['+i+']" name="porcentaje['+i+']">'+
                    '</div>'+
                '</div>'+
            '</div>'
            
        );
    });
    $('#delete').click(function(){
        $('#div .row:last').remove();
        i--;
    });
</script>
@endsection
