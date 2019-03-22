@extends('contenedores.'.((session('role')=='administrador')?'admin': session('role')))
@section('contenedor_'.((session('role')=='administrador')?'admin': session('role')))
@section('titulo','Archivos')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="fas fa-search" style="color:white;"></i></span>
                </div>
                <input type="text" class="form-control"  id="entradafilter" placeholder="Buscar" aria-label="lead" aria-describedby="basic-addon1">
            </div>
            <br>
            @if (!count($archivos) > 0)
                <div class="text-center">No hay archivos</div>
            @else
                <div class="card-columns contenidobusqueda">
                    @foreach ($archivos as $archivo)
                        <div id="archivo{{$archivo -> pk_archivo}}" class="card" href="{{route('archivos.show', $archivo -> pk_archivo)}}" target="_blank">
                            {{-- <img class="card-img-top" src="{{'/img/'.$archivo -> tipo.'.png'}}".png" alt="Card image cap"> --}}
                            <div class="card-header">
                                <div class="card-title">
                                    {{ucwords($archivo -> titulo)}}
                                    <img style ="max-width:40px;float:right" src="{{'/img/'.$tipos[$archivo -> tipo].'.png'}}" class="m-x-auto img-fluid img-circle" >
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{($archivo -> descripcion == '' || is_null($archivo -> descripcion)) ? 'No se ingreso una descripción' : ucfirst($archivo -> descripcion) }}.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted" style="font-size:60%">
                                    {{ucwords($archivo -> apellido)}}
                                </small>
                                <div style="float: right">
                                    <a href="{{route('archivos.show', $archivo -> pk_archivo)}}" title="Descargar">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </a>
                                    @if (session('role') == "administrador")
                                        <span padre="archivo{{$archivo -> pk_archivo}}" class="delete" ruta="archivos" identificador="{{$archivo -> pk_archivo}}" title="Eliminar" >
                                            <i class="fas fa-trash-alt" style="color:#c62828"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#entradafilter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.contenidobusqueda .card').hide();
            $('.contenidobusqueda .card').filter(function () {
                return rex.test($(this).text());
            }).show();
        });
    });
</script>
@endsection
