@extends('.contenedorEstudiantes')
@section('contenedorEstudiantes')
<div class="row">
    <div class="col s12">
    <br>
    <form method="post" action="/estudiantes" enctype="multipart/form-data">
        @csrf
        {{-- <img src="/storage/PvRbjWWj0jk4QD84Y6kkfm2Wri5tdMz35lEu9JGM.jpeg"> --}}
        <div class="input-field">
            <input type="number" name="pk_estudiante">
            <label>Código: </label>
        </div>
        <div class="input-field">
            <input type="number" name="fk_acudiente">
            <label>Código acudiente:</label>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="nombre">
                <label>Nombre: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="apellido">
                <label>Apellido: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="clave">
                <label>Contraseña: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="fecha_nacimiento" class="datepicker" id="datepicker">
                <label>Fecha de nacimiento:</label>
            </div>
        </div>
        <div class="input-field">
            <input type="number" name="grado">
            <label>Grado:</label>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label>
                    <input type="checkbox" name="discapacidad" value="1">
                    <span>Discapacidad</span>
                </label>
            </div>
            <div class="input-field col s6">
                <label>
                    <input type="checkbox" name="estado" value="1">
                    <span> Estado</span>
                </label>
            </div>
        </div>
        <br>
        <div class="file-field input-field">
            <div class="btn">
                <span>Seleccionar archivo</span>
                <input type="file" name="foto">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="input-field center">
            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar<i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    </div>
</div>
@endsection
