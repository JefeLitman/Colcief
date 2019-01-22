<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 id="login" class="section-title text-center" style="margin-bottom: 2rem!important;">
          <span id="n">Login</span>
          <i class="fa fa-chevron-left float-left" style="font-size:25px !important" id="back"></i>
        </h3>
        <div class="justify-content-center">
          <form action="{{route('authenticate')}}" method="POST">
            @csrf
            <input type="hidden" name="role" id="hidden" value="@eachError('role', $errors) @endeachError">
            <div class="row">
              <div class="form-group col-sm-12">
                <label id="label" for="username" style="{{ (($errors->has('username') || session()->has('false')) || session()->has('false')) ? 'color: #c4183c' : '' }}">Cédula</label>
                <div class="input-group input-group-seamless">
                  <span class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user" style="{{ ($errors->has('username') || session()->has('false')) ? 'color: #c4183c' : '' }}"></i>
                    </span>
                  </span>
                  <input type="number" name="username" class="form-control-sm form-control {{ ($errors->has('username') || session()->has('false')) ? ' is-invalid' : '' }}" id="username" placeholder="Ingrese su cédula" value="@eachError('username', $errors) @endeachError">
                </div>
                <div class="invalid-feedback" style="{{ ($errors->has('username')) ? 'display: block' : 'display: none' }}">{{$errors->first('username')}}</div>
              </div>
              <div class="form-group col-sm-12">
                <label for="password" style="{{ ($errors->has('password') || session()->has('false')) ? 'color: #c4183c' : '' }}">Contraseña</label>
                <div class="input-group input-group-seamless">
                  <span class="input-group-prepend ">
                    <span class="input-group-text ">
                      <i class="fa fa-lock" style="{{ ($errors->has('password') || session()->has('false')) ? 'color: #c4183c' : '' }}"></i>
                    </span>
                  </span>
                  <input type="password" name="password" class="form-control-sm form-control {{ ($errors->has('password') || session()->has('false')) ? ' is-invalid' : '' }}" id="password" placeholder="Ingrese su contraseña" value="@eachError('password', $errors) @endeachError">
                </div>
                <a data-target="#resetModal" data-toggle="modal" data-dismiss="modal" href="" class="float-right mt-1" style="color: #495057;"><small>¿Olvidaste tu contraseña?</small></a>

                <div class="invalid-feedback" style="{{ ($errors->has('password')) ? 'display: block' : 'display: none' }}">{{$errors->first('password')}}</div>
              </div>
              <div class="invalid-feedback text-center" style="{{ (session()->has('false')) ? 'display: block' : 'display: none' }}">{{session('false')}}</div>
            </div>
            <button style="margin-top: 1.5rem!important;" class="btn btn-success btn-pill d-flex ml-auto mr-auto" type="submit">Iniciar sessión</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="section-title text-center" style="margin-bottom: 2rem!important;">Usuario</h3>
        <div class="justify-content-center">
          <div class="row">
            <div class="col-sm-4 col-sm-4 col-md-6 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="0"><i class="fas fa-user-cog float-left"></i> Administrador</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-6 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="1"><i class="fas fa-user-tie float-left"></i> Coordinador</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-6 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="2"><i class="fas fa-chalkboard-teacher float-left"></i> Director</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-6 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="3"><i class="fas fa-user float-left"></i> Profesor</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-6 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="4"><i class="fas fa-graduation-cap float-left"></i> Estudiante</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 id="login" class="section-title text-center" style="margin-bottom: 2rem!important;">
          <span id="n">Recuperar contraseña</span>
        </h3>
        <div class="justify-content-center">
          <form method="POST" action="{{ route('password.email') }}" id="form">
            @csrf
            <input type="hidden" name="role" id="hidden-role" value="@eachError('role', $errors) @endeachError">
            <div class="row">
              <div class="form-group col-sm-12">
                <label id="label_email" for="email" style="{{$errors->has('email') ? 'color: #c4183c' : '' }}">Correo Electronico</label>
                <div class="input-group input-group-seamless">
                  <span class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-at" id="icons" style="{{$errors->has('email') ? 'color: #c4183c' : '' }}"></i>
                    </span>
                  </span>
                  <input type="email" name="email" id="email" class="form-control form-control-sm {{$errors->has('email') ? ' is-invalid' : '' }}" required>
                </div>
                @if (session()->has('warning'))
                  <div class="invalid-feedback" style="display: block">{{session('warning')}}</div>
                @else
                  <div class="invalid-feedback" style="{{($errors->has('email') ||$errors->any()) ? 'display: block' : 'display: none'}}">{{$errors->first('email')}}</div>
                @endif
              </div>
            </div>
            <button style="margin-top: 1.5rem!important;" class="btn btn-success btn-pill d-flex ml-auto mr-auto" type="submit">Enviar solicitud</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="trueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="section-title text-center" style="margin-bottom: 2rem!important;">Contraseña</h3>
        <div class="justify-content-center">
          <div class="row mt-5">
            {{session('true')}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.value').click(function(){
      var role = $(this).val()
      user(role);
    });
    $('#back').click(function(){
      $('#exampleModal').modal('hide')
      $('#userModal').modal('show')
    })
    @if ($errors->any() || session()->has('false'))
      user($('#hidden').val())
      @if ($errors->has('email'))
        $('#resetModal').modal('show')
      @else
        $('#exampleModal').modal('show')
      @endif
    @endif
    @if(session()->has('true'))
      $('#trueModal').modal('show')
    @endif
  })
  function user(role){
    nombre = ['Administrador', 'Coordinador', 'Director', 'Profesor', 'Estudiante']
    var email = $('#email')
    var icon = $('#icons')
    if(role == '4'){
        $('#label').html('Código')
        $('#username').attr('placeholder','Ingrese su código')
        $('#label_email').html('Codigo Estudiantil');
        email.attr('type', 'number');
        $('#form').attr('action', "{{ route('password.authentication') }}");
        icon.removeClass('fa fa-at').addClass('fa fa-user')
      } else if(role == '3' || role == '2' || role == '1' || role == '0'){
        $('#label').html('Cédula')
        $('#username').attr('placeholder','Ingrese su cédula')
        $('#label_email').html('Correo Electronico');
        email.attr('type', 'email');
        $('#form').attr('action', "{{ route('password.email') }}");
        icon.removeClass('fa fa-user').addClass('fa fa-at')
      }
      $('#hidden').val(role);
      $('#hidden-role').val(role);
      $('#n').html(nombre[role]);
  }
</script>
@if(session()->has('true'))
  @php
    session() -> forget('true')    
  @endphp
@endif
@if(session()->has('false'))
  @php
    session() -> forget('false')    
  @endphp
@endif
