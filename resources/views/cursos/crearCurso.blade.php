@extends('contenedores.admin')
@section('titulo','Crear curso')
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
            <form enctype="multipart/form-data" action="/cursos" method = "POST">
                @csrf
                <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                            <h4><i class="fas fa-book"></i> Crear curso</h4>
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
                                    <select class="custom-select custom-select-sm" name="prefijo" id="prefijo" required>
                                        <option if value="" disabled selected>Seleccionar nivel</option>
                                        <option @select('prefijo', '0') @endselect value="0">Preescolar</option>
                                        <option @select('prefijo', '1') @endselect value="1">Primero</option>
                                        <option @select('prefijo', '2') @endselect value="2">Segundo</option>
                                        <option @select('prefijo', '3') @endselect value="3">Tercero</option>
                                        <option @select('prefijo', '4') @endselect value="4">Cuarto</option>
                                        <option @select('prefijo', '5') @endselect value="5">Quinto</option>
                                        <option @select('prefijo', '6') @endselect value="6">Sexto</option>
                                        <option @select('prefijo', '7') @endselect value="7">Septimo</option>
                                        <option @select('prefijo', '8') @endselect value="8">Octavo</option>
                                        <option @select('prefijo', '9') @endselect value="9">Noveno</option>
                                        <option @select('prefijo', '10') @endselect value="10">Decimo</option>
                                        <option @select('prefijo', '11') @endselect value="11">Undecimo</option>
                                    </select>
                                    {{ csrf_field() }}
                                    <input type="text" class="form-control form-control-sm" name="sufijo" id="sufijo" readonly="readonly">
                                    <input type="number" min = "1990" max = "2050" step = "1" value = {{now()->year}} name="ano" id="ano"
                                    placeholder="Año" class="form-control form-control-sm">
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

<script>
    $(document).ready(function(){
        $('#prefijo').change(function(){
            var query = $(this).val();
            if(query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('cursos.sigSufijo') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#sufijo').val(data);
                    }
                });
            }
        });
    });
</script>
@endsection
