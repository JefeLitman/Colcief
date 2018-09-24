@extends('inicios.sesion')
@section('titulo','Inicio de Sesion')
@section('content')
<div class="section center"></div>
  <main>
      <h5 class="green-text text-darken-4 center">Porfavor digite sus datos</h5>
      <br/>
      <div class="container center">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <form class="col s12" method="post" action="{{ route('login') }}">

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
