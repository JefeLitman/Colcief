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
<div class="section center"></div>
  <main>
      <h5 class="blue-text text-darken-3 center">Por favor digite sus datos</h5>
      <br/>
      <div class="container center">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <form class="col s12" method="post" action="{{route('login')}}">
            @csrf
            
            <div class="row">
              <select name="role" id="role">
                <option value="0">Administrador</option>
                <option value="1">Profesor</option>
                <option value="2">Estudiante</option>
              </select>
              <label for='role'>Role</label>
            </div>
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' id='username' />
                <label for='username'>Codigo de usuario</label>
              </div>
            </div>
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Contraseña</label>
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
      </div>
  </main>
@endsection
