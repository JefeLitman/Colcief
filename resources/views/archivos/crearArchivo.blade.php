@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Archivos')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form action="{{route('archivos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                            <h4><i class="fas fa-cloud-upload-alt"></i> Subir Archivo</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            {{-- archivo --}}
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="customFileLang"><strong><small style="color : #616161">Archivo</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
                                            <i class="fas fa-file input-group-text"></i>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="archivo" class="custom-file-input form-group" id="customFileLang" lang="es">
                                            <label id="file" class="custom-file-label" for="customFileLang">Archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- titulo --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="titulo"><strong><small style="color : #616161">Titulo</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-keyboard"></i>
                                            </span>
                                        </div>
                                        <input type="text"  name="titulo" class="form-control form-control-sm" id="titulo" value="@eachError('titulo', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- celular --}}
                            <div class="col">
                                <div class="from-group mb-2">
                                    <label for="descripcion"><strong><small style="color : #616161">Descripción</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-justify"></i>
                                            </span>
                                        </div>
                                        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm">@eachError('descripcion', $errors)@endeachError</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- enviar --}}
                        <br>
                        <div class="text-center">
                            <input type="submit" name="action" value="Subir" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
