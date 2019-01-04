@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Archivos')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-10">
            <form action="" id="autocompletar">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="fas fa-search" style="color:white;"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="autocomplete-input" class="autocomplete" placeholder="Nombre" aria-label="lead" aria-describedby="basic-addon1">
                </div>
            </form>
            <br>
            @if (empty($archivos[0]))
                <div class="text-center">No hay archivos</div>
            @else
                <div class="card-columns">
                    @foreach ($archivos as $archivo)
                        <div id="archivo{{$archivo -> pk_archivo}}" class="card" href="{{route('archivos.show', $archivo -> pk_archivo)}}" target="_blank">
                            {{-- <img class="card-img-top" src="{{'/img/'.$archivo -> tipo.'.png'}}".png" alt="Card image cap"> --}}
                            <div class="card-header">
                                <div class="card-title">{{ucwords($archivo -> titulo)}}</div>
                                <div class="float-right">
                                    <img style ="max-width:40px" src="{{'/img/'.$tipos[$archivo -> tipo].'.png'}}" class="m-x-auto img-fluid img-circle" >
                                    {{-- <a href="{{route('archivos.show', $archivo -> pk_archivo)}}"></a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ucfirst($archivo -> descripcion)}}.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted ">
                                    {{ucwords($archivo -> nombre.' '.$archivo -> apellido)}}
                                </small>
                                @if (session('role') == "administrador")
                                    <div style="float: right">
                                        <a href="{{route('archivos.show', $archivo -> pk_archivo)}}" title="Descargar">
                                            <i class="fas fa-cloud-download-alt"></i>
                                        </a>
                                        <span padre="archivo{{$archivo -> pk_archivo}}" class="delete" ruta="archivos" identificador="{{$archivo -> pk_archivo}}" title="Eliminar" >
                                            <i class="fas fa-trash-alt" style="color:#c62828"></i>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
