@extends('contenedores.admin')
@section('titulo','Editar curso')
@section('contenedor_admin')
@include('error.error')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
<br>
    <div class="row justify-content-center">
        <div class="col-10">
            <form enctype="multipart/form-data" action="{{route('cursos.update', $curso->pk_curso)}}" method = "POST">
                @csrf
                @method("PUT")
                <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                            <h3><i class="fas fa-book"></i> Editar curso</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class= "input-group-text">
                                            <i class="fas fa-book-open"></i>
                                        </span>
                                    </div>
                                    <select class="custom-select custom-select-sm" name="prefijo" id="prefijo">
                                        <option if>Seleccionar nivel</option>
                                        <option @select('prefijo', '0') @endselect value="0" {{$curso->prefijo === "0" ? 'selected' : '' }}>Preescolar</option>
                                        <option @select('prefijo', '1') @endselect value="1" {{$curso->prefijo === "1" ? 'selected' : '' }}>Primero</option>
                                        <option @select('prefijo', '2') @endselect value="2" {{$curso->prefijo === "2" ? 'selected' : '' }}>Segundo</option>
                                        <option @select('prefijo', '3') @endselect value="3" {{$curso->prefijo === "3" ? 'selected' : '' }}>Tercero</option>
                                        <option @select('prefijo', '4') @endselect value="4" {{$curso->prefijo === "4" ? 'selected' : '' }}>Cuarto</option>
                                        <option @select('prefijo', '5') @endselect value="5" {{$curso->prefijo === "5" ? 'selected' : '' }}>Quinto</option>
                                        <option @select('prefijo', '6') @endselect value="6" {{$curso->prefijo === "6" ? 'selected' : '' }}>Sexto</option>
                                        <option @select('prefijo', '7') @endselect value="7" {{$curso->prefijo === "7" ? 'selected' : '' }}>Septimo</option>
                                        <option @select('prefijo', '8') @endselect value="8" {{$curso->prefijo === "8" ? 'selected' : '' }}>Octavo</option>
                                        <option @select('prefijo', '9') @endselect value="9" {{$curso->prefijo === "9" ? 'selected' : '' }}>Noveno</option>
                                        <option @select('prefijo', '10') @endselect value="10" {{$curso->prefijo === "10" ? 'selected' : '' }}>Decimo</option>
                                        <option @select('prefijo', '11') @endselect value="11" {{$curso->prefijo === "11" ? 'selected' : '' }}>Undecimo</option>
                                    </select>
                                    <select class="custom-select custom-select-sm" name="sufijo" id="sufijo">
                                        <option if>Selecciona el salón</option>
                                        <option @select('sufijo', '1') @endselect value="1" {{$curso->sufijo === "1" ? 'selected' : '' }}>1</option>
                                        <option @select('sufijo', '2') @endselect value="2" {{$curso->sufijo === "2" ? 'selected' : '' }}>2</option>
                                        <option @select('sufijo', '3') @endselect value="3" {{$curso->sufijo === "3" ? 'selected' : '' }}>3</option>
                                        <option @select('sufijo', '4') @endselect value="4" {{$curso->sufijo === "4" ? 'selected' : '' }}>4</option>
                                        <option @select('sufijo', '5') @endselect value="5" {{$curso->sufijo === "5" ? 'selected' : '' }}>5</option>
                                        <option @select('sufijo', '6') @endselect value="6" {{$curso->sufijo === "6" ? 'selected' : '' }}>6</option>
                                        <option @select('sufijo', '7') @endselect value="7" {{$curso->sufijo === "7" ? 'selected' : '' }}>7</option>
                                        <option @select('sufijo', '8') @endselect value="8" {{$curso->sufijo === "8" ? 'selected' : '' }}>8</option>
                                        <option @select('sufijo', '9') @endselect value="9" {{$curso->sufijo === "9" ? 'selected' : '' }}>9</option>
                                    </select>
                                    <input type="number" min = "1990" max = "2050" step = "1" value = {{$curso->ano}} name="ano" id="ano"
                                    placeholder="Año"
                                    class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="text-center">
                                <input type="submit" name="action" value="Crear" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
