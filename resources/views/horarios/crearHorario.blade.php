@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_admin')
    @include('error.error')
<br>
<div class="container">
    <h1 class="card-title text-center">
        Crear horario para la materia {{$materiaPC->nombre}} del curso {{$curso->prefijo}}-{{$curso->sufijo}}
        con el profesor: {{$empleado->nombre}} {{$empleado->apellido}} 
    </h1>
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
                            <select class="custom-select custom-select-sm" name="dia[{{$i}}]" id="dia[{{$i}}]" value="{{old('dia(field.i)')}}">
                                <option if>Seleccionar día</option>
                                <option @select('dia[{{$i}}]', 'Lunes') @endselect value="Lunes">Lunes</option>
                                <option @select('dia[{{$i}}]', 'Martes') @endselect value="Martes">Martes</option>
                                <option @select('dia[{{$i}}]', 'Miercoles') @endselect value="Miercoles">Miercoles</option>
                                <option @select('dia[{{$i}}]', 'Jueves') @endselect value="Jueves">Jueves</option>
                                <option @select('dia[{{$i}}]', 'Viernes') @endselect value="Viernes">Viernes</option>
                            </select>
                        </th>
                        <td>
                            <input type="time" class="form-control" id="hora_inicio[{{$i}}]" name="hora_inicio[{{$i}}]" value="{{old('hora_inicio(field.i)')}}" min="06:00" max="17:00" step = "1800">
                        </td>
                        <td>
                            <input type="time" class="form-control" id="hora_fin[{{$i}}]" name="hora_fin[{{$i}}]" value="{{old('hora_fin(field.i)')}}" min="07:00" max="18:00" step = "1800">
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        
        </div>
        <div class="row">
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
    $('#create').click(function(){
        i++;
        {{$i}}
        if(i<3){
            $('#div').append(
                '<tr class="menos" id="index['+i+']">'+
                    '<input type="hidden" name = "fk_materia_pc['+i+']" id = "fk_materia_pc['+i+']" value = "{{$materiaPC->pk_materia_pc}}">'+
                    '<th scope="row">'+
                        '<select class="custom-select custom-select-sm" name="dia['+i+']" id="dia['+i+']">'+
                            '<option if>Seleccionar nivel</option>'+
                            '<option @select("dia['+i+']", "Lunes") @endselect value="Lunes">Lunes</option>'+
                            '<option @select("dia['+i+']", "Martes") @endselect value="Martes">Martes</option>'+
                            '<option @select("dia['+i+']", "Miercoles") @endselect value="Miercoles">Miercoles</option>'+
                            '<option @select("dia['+i+']", "Jueves") @endselect value="Jueves">Jueves</option>'+
                            '<option @select("dia['+i+']", "Viernes") @endselect value="Viernes">Viernes</option>'+
                        '</select>'+
                    '</th>'+
                    '<td>'+
                        '<input type="time" class="form-control" id="hora_inicio['+i+']" name="hora_inicio['+i+']" min="06:00" max="17:00" step = "1800">'+
                    '</td>'+
                    '<td>'+
                        '<input type="time" class="form-control" id="hora_fin['+i+']" name="hora_fin['+i+']" min="07:00" max="18:00" step = "1800">'+
                    '</td>'+
                '</tr>'
            );
        }
    });

    $('#delete').click(function(){
        $('#div .menos:last').remove();
        i--;
    });
</script>
<br>
@endsection
