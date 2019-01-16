@extends('contenedores.sesion')
@section('titulo','Recuperar Contraseña')
@section('content')
<div id="row"></div>
<div class="container" style="background:#fff !important;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:40px">
                <div class="card-header">{{ __('Recuperar Contraseña') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" id="form">
                        @csrf
                        <div class='form-group'>
                            <label for="role">Tipo de Usuario</label>
                            <select class="custom-select custom-select-sm" name="role" id="role">
                                <option selected>Seleccionar...</option>
                                <option value="0" @if(old('role') == '0') selected @endif >Administrador</option>
                                <option value="1" @if(old('role') == '1') selected @endif >Director</option>
                                <option value="2" @if(old('role') == '2') selected @endif >Profesor</option>
                                <option value="3" @if(old('role') == '3') selected @endif >Estudiante</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label id="label_email" for="email">Correo Electronico</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" required>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success btn-sm btn-block" data-toggle="collapse"  style="background-color:  #17a2b8 !important; border-color: #17a2b8 !important; color:white;">Enviar solicitud</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@include('error.reset')
<script>
    $(document).ready(function(){
        $("#role").change(function(){
            var val = $(this).val();
            var email = $('#email');
            email.removeAttr('disabled');
            if (val == 3){
                $('#label_email').html('Codigo Estudiantil');
                email.attr('type', 'number');
                $('#form').attr('action', "{{ route('password.authentication') }}");
            } else if(val == 0 || val == 1 || val == 2){
                $('#label_email').html('Correo Electronico');
                email.attr('type', 'email');
                $('#form').attr('action', "{{ route('password.email') }}");

            }
        });
    });
</script>
@endsection
