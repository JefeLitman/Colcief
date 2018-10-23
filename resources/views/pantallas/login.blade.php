@extends('contenedores.sesion')
@section('titulo','Inicio de Sesion')
@section('content')
<br>
<section class="login-block">
  <div class="container2">
    <div class="row">
      <div class="col-md-4 login-sec">
          <h2 class="text-center">Acceso a ColCief</h2>
          @if(session()->has('error'))
              <div class="alert alert-danger danger-dismissible fade show hidden" role="alert">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" style="color:#812c3b">&times;</span>
                </button>
              </div>
              <script>
                $(document).ready(function(){
                  $("div").fadeIn();
                });
              </script>
          @endif
          <form class="login-form" action="{{route('login')}}" method="POST">
            @csrf
            <div class='form-group'>
              <label for="role" class="text-uppercase">Tipo de Usuario</label>
              <select class="custom-select" name="role" id="role">
                <option selected>Seleccionar...</option>
                <option value="0" @if(old('role') == '0') selected @endif >Administrador</option>
                <option value="1" @if(old('role') == '1') selected @endif >Director</option>
                <option value="2" @if(old('role') == '2') selected @endif >Profesor</option>
                <option value="3" @if(old('role') == '3') selected @endif >Estudiante</option>
              </select>
            </div>
            <div class="form-group">
              <label for="username" class="text-uppercase">Usuario</label>
              <input type="text" class="form-control" placeholder="" name='username' id='username' value="{{old('username')}}">
            </div>
            <div class="form-group">
              <label for="password" class="text-uppercase" >Contraseña</label>
              <input type="password" class="form-control" placeholder="" name='password' id='password'>
            </div>

            <div class="form-check">
              <button type="submit" class="btn btn-login float-right">Iniciar Sesión</button>
            </div>

          </form>
      </div>
      <div class="col-md-8 banner-sec"></div>
    </div>
  </div>

</section>

@endsection
