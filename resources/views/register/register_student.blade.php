@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>
</ul>
  
<!-- Tab panes -->
<div class="tab-content">
    <form action="{{route('success')}}" method="POST">
        <div class="tab-pane container active" id="home">
            @csrf
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input id="cedula" max="30" name="id_attendanta" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input id="nombres" maxlenght="30" name="first_namea" type="text" class="form-control">
            </div> 
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input id="apellidos" maxlenght="30" name="last_namea" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input id="correo" maxlenght="40" name="emaila" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input id="direccion" maxlenght="50" name="addressa" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input id="telefono" max="30" name="phonea" type="number" class="form-control">
            </div>
            <button type="submit">Submit</button>
        
        </div>
        <div class="tab-pane container fade" id="menu1">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input id="codigo" max="30" name="id_student" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="nombres_student">Nombres</label>
                <input id="nombres_student" maxlenght="30" name="first_name" type="text" class="form-control">
            </div> 
            <div class="form-group">
                <label for="apellido_students">Apellidos</label>
                <input id="apellido_students" maxlenght="30" name="last_name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="correo_student">Correo</label>
                <input id="correo_student" maxlenght="40" name="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input id="contraseña" maxlenght="50" name="password" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono_student">Telefono</label>
                <input id="telefono_student" max="30" name="phone" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha de nacimiento">fecha de nacimiento</label>
                <input id="fecha de nacimiento" name="birthday" type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="grado">Grado</label>
                <input id="grado" maxlenght="8" name="grade" type="text" class="form-control">
            </div>
         
        </div>
        <div class="tab-pane container fade" id="menu2">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
{{-- <script>
    $(document).ready(function(){
        $('button').click(function(){
            ho = $('form').serialize();
            alert(ho);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('success')}}",
                method: 'post',
                data: $('form').serialize(),
                error: function(result){
                    console.log(result);
                }
            });
        });
    });

</script> --}}
@endsection()