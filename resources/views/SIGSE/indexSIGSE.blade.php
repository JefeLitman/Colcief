@extends('contenedores.profesor')
@section('titulo','SIGSE')
@section('contenedor_profesor')
<div class="container" style="background-color: #fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form class="" action="/SIGSE" method="post">
            {{ csrf_field() }}
            <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                        <h4>
                            Materias del profesor
                        </h4>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        {{--  MATERIA CURSO  --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">
                                    <strong>
                                        <small>
                                            Materia y curso
                                        </small>
                                    </strong>
                                </label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-book"></i>
                                        </span>
                                    </div>
                                    <select class="custom-select custom-select-sm" name="MateriasPC">
                                        @foreach ($MateriasPC as $pk_materia_pc => $MateriaPC)
                                        <option value="{{$pk_materia_pc}}">{{$MateriaPC[0].' de '.$MateriaPC[1]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--  BOTON  --}}
                        <div class="col-md-6">
                            <br>
                            <div class="text-center">
                                <input type="submit" name="action" value="Generar informe" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-10 text-center">
            {{--  dsfsdfsdfsdfsd  --}}
        </div>
    </div>
</div>
@endsection
