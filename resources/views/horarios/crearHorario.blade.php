@extends('contenedores.admin')
@section('titulo','Crear Horario')
@section('contenedor_admin')
    @include('error.error')
<br id = "br">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="card-title text-center">
                Crear horario
            </h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h4 class="card-title text-center">
                <i class="fas fa-book"></i> <br>{{$materiaPC->nombre_materia}}
            </h4>
        </div>
        <div class="col-md-4">
            <h4 class="card-title text-center">
                <i class="fas fa-chalkboard"></i><br>
                {{$materiaPC->prefijo}}-{{$materiaPC->sufijo}}
            </h4>
        </div>
        <div class="col-md-4">
            <h4 class="card-title text-center">
                <i class="fas fa-user-tie"></i><br>
                {{$materiaPC->nombre}} {{$materiaPC->apellido}}
            </h4>
        </div>
    </div>
    @if(session()->has('error'))
        <script src = "{{asset('js/ajax.js')}}"></script>
        <script> newModal('Problemas',
                'No se pueden crear los siguientes horarios debido a los siguientes problemas:<br><br>'+
                '<ul>'+
                    '@foreach(session()->get('error') as $error)'+
                        '<li>{{$error}}</li>'+
                    '@endforeach'+
                '</ul>', false
            );
        </script>
    @endif

    <br>
    <form enctype="multipart/form-data" action="/horarios" method="POST">
    @csrf
        <div class="table-responsive">
            <script>var i=0</script>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Día</th>
                        <th scope="col" class="text-center">Hora inicio</th>
                        <th scope="col" class="text-center">Hora fin</th>
                    </tr>
                </thead>
                <tbody id="div">
                    @for ($i = 0 ; $i < 1; $i++)
                    <tr  class="menos" id="index[{{$i}}]">
                        <input type="hidden" name = "fk_materia_pc[{{$i}}]" id = "fk_materia_pc[{{$i}}]" value = "{{$materiaPC->pk_materia_pc}}">
                        <th scope="row">
                            <select class="custom-select custom-select-sm" name="dia[{{$i}}]" id="dia[{{$i}}]" value="{{old('dia(field.i)')}}" required>
                                <option value="" disabled selected>Seleccionar día</option>
                                <option @select('dia[{{$i}}]', 'lunes') @endselect value="lunes">Lunes</option>
                                <option @select('dia[{{$i}}]', 'martes') @endselect value="martes">Martes</option>
                                <option @select('dia[{{$i}}]', 'miercoles') @endselect value="miercoles">Miercoles</option>
                                <option @select('dia[{{$i}}]', 'jueves') @endselect value="jueves">Jueves</option>
                                <option @select('dia[{{$i}}]', 'viernes') @endselect value="viernes">Viernes</option>
                            </select>
                        </th>
                        <td>
                            <input type="time" class="form-control" id="hora_inicio[{{$i}}]" name="hora_inicio[{{$i}}]" value="{{old('hora_inicio(field.i)')}}" min="07:00" max="15:00" step = "300" required>
                        </td>
                        <td>
                            <input type="time" class="form-control" id="hora_fin[{{$i}}]" name="hora_fin[{{$i}}]" value="{{old('hora_fin(field.i)')}}" min="08:00" max="16:00" step = "300" required>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>

        </div>
        <input type="hidden" value = "{{$materiaPC->f_curso}}" name = "curso">
        <input type="hidden" value = "{{$materiaPC->fk_empleado}}" name = "empleado">
        <div class="row justify-content-center ">
            <div class="col-md-2"></div>
            <div class="col-md-4 mb-2 mx-auto">
                <a class=" btn btn-info btn-block rounded-0 py-2" style="background-color: #039be5 !important; border-color: #039be5 !important; width: 40%;" id="create"><i class="fas fa-plus" style="color: white !important;"></i></a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4 mb-2 mx-auto">
                <a class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #039be5 !important; border-color: #039be5 !important; width: 40%;" id="delete"><i class="fas fa-minus" style="color: white !important;"></i></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #0277bd !important; border-color: #0277bd !important; width: 40%;" type="submit" name="action">
                    Crear
                </button>
            <div class="col-md-4"></div>
            </div>
        </div>
    </form>
</div>
<script>

    $("#hora_inicio\\[0\\]").on("focusout", function(){
        var hora_inicio = document.getElementById("hora_inicio[0]").value;
        document.getElementById("hora_fin[0]").value = hora_inicio;
        document.getElementById("hora_fin[0]").stepUp(12);
    });

    $('#create').click(function(){
        i++;
        if(i<3){
            $('#div').append(
                '<tr class="menos" id="index['+i+']">'+
                    '<input type="hidden" name = "fk_materia_pc['+i+']" id = "fk_materia_pc['+i+']" value = "{{$materiaPC->pk_materia_pc}}">'+
                    '<th scope="row">'+
                        '<select class="custom-select custom-select-sm" name="dia['+i+']" id="dia['+i+']" required>'+
                            '<option value="" disabled selected>Seleccionar nivel</option>'+
                            '<option @select("dia['+i+']", "lunes") @endselect value="lunes">Lunes</option>'+
                            '<option @select("dia['+i+']", "martes") @endselect value="martes">Martes</option>'+
                            '<option @select("dia['+i+']", "miercoles") @endselect value="miercoles">Miercoles</option>'+
                            '<option @select("dia['+i+']", "jueves") @endselect value="jueves">Jueves</option>'+
                            '<option @select("dia['+i+']", "viernes") @endselect value="viernes">Viernes</option>'+
                        '</select>'+
                    '</th>'+
                    '<td>'+
                        '<input type="time" class="form-control" id="hora_inicio['+i+']" name="hora_inicio['+i+']" min="07:00" max="15:00" step = "300" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="time" class="form-control" id="hora_fin['+i+']" name="hora_fin['+i+']" min="08:00" max="16:00" step = "300" required>'+
                    '</td>'+
                '</tr>'
            );
        }

        for (let i = 1; i < 3; i++) {
            $("#hora_inicio\\["+i+"\\]").on("focusout", function(){
                var hora_inicio = document.getElementById("hora_inicio["+i+"]").value;
                document.getElementById("hora_fin["+i+"]").value = hora_inicio;
                document.getElementById("hora_fin["+i+"]").stepUp(12);
            });
        }
    });

    $('#delete').click(function(){
        $('#div .menos:last').remove();
        i--;
    });

</script>

<br>
@endsection
