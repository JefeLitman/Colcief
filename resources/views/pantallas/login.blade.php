@extends('contenedores.sesion')
@section('titulo','Inicio de Sesion')
@section('content')



<section class="login-block">
<<<<<<< HEAD
  <div class="container2">
=======
  <div class="container" style="border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);">
>>>>>>> b55f228cb47a4b8c05e3eb1351862435996eea89
    <div class="row">
      <div class="col-md-4 login-sec">
          <h2 class="text-center">Acceso a ColCief</h2>
          <form class="login-form" action="{{route('login')}}" method="POST">
            @csrf
            <div class='form-group'>
              <label for="role" class="text-uppercase">Tipo de Usuario</label>
              <select class="custom-select" name="role" id="role">
                <option selected>Seleccionar...</option>
                <option value="0">Administrador</option>
                <option value="1">Director</option>
                <option value="2">Profesor</option>
                <option value="3">Estudiante</option>
              </select>
            </div>
            <div class="form-group">
              <label for="username" class="text-uppercase">Usuario</label>
              <input type="text" class="form-control" placeholder="" name='username' id='username'>
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
