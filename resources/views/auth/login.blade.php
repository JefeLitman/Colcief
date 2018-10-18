@extends('pantallas.sesion')
@section('titulo','Inicio de Sesion')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

<section class="login-block">
  <div class="container">
<div class="row">
  <div class="col-md-4 login-sec">
      <h2 class="text-center">Acceso a ColCief</h2>
      <form class="login-form" action="{{route('login')}}" method="POST">
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
        {{-- <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <div class="banner-text">
                <h2>This is Heaven</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
            </div>	
      </div>
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <div class="banner-text">
                <h2>This is Heaven</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
            </div>	
        </div>
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <div class="banner-text">
                <h2>This is Heaven</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
            </div>	
        </div>
      </div>
                </div>	   
            
        </div>
      </div> --}}
</div>
</div>
</section>
{{-- </section>
<div class="section center"></div>
      <h5 class="blue-text text-darken-3 center">Acceso a ColCief</h5>
      <br/>
      <div class="container center">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <form class="col s12" method="post" action="{{route('login')}}">
            @csrf
            
            <div class="row">
              <div class='input-field col s12'>
                <select name="role" id="role">
                  <option value="0">Administrador</option>
                  <option value="1">Director</option>
                  <option value="2">Profesor</option>
                  <option value="3">Estudiante</option>
                </select>
                <label for='role'>Tipo de usuario <label class="rojo">*</label></label>
              </div>
            </div>
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' id='username' />
                <label for='username'>Codigo de usuario <label class="rojo">*</label></label>
              </div>
            </div>
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Contraseña <label class="rojo">*</label></label>
              </div>
              <label style='float: right;'>
              <a class='grey-text text-darken-2' href='#!'><b>Olvido su contraseña?</b></a>
              </label>
            </div>
            <br />
            <div class='row'>
              <button type='submit' class='col s12 btn btn-large waves-effect light-blue darken-1'>Iniciar Sesion</button>
            </div>
          </form>
        </div>
      </div> --}}

@endsection
