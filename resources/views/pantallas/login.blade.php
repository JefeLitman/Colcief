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
                  <input type="number" name="username" class="form-control {{ ($errors->has('username') || session()->has('false')) ? ' is-invalid' : '' }}" id="username" placeholder="Ingrese su cédula" value="@eachError('username', $errors) @endeachError">
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
                  <input type="password" name="password" class="form-control {{ ($errors->has('password') || session()->has('false')) ? ' is-invalid' : '' }}" id="password" placeholder="Ingrese su contraseña" value="@eachError('password', $errors) @endeachError">
                </div>
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
            <div class="col-sm-4 col-sm-4 col-md-4 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="0">Admin</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-4 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="1">Coordinador</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-4 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="2">Director</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-4 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="3">Profesor</button>
            </div>
            <div class="col-sm-4 col-sm-4 col-md-4 col-xs-4">
              <button class="value btn btn-success mt-3 text-center ml-auto mr-auto form-control btn-pill" data-target="#exampleModal" data-toggle="modal" data-dismiss="modal" value="4">Estudiante</button>
            </div>
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
      $('#exampleModal').modal('show')
    @endif
  })
  function user(role){
    nombre = ['Administrador', 'Coordinador', 'Director', 'Profesor', 'Estudiante']
    if(role == '4'){
        $('#label').html('Código')
        $('#username').attr('placeholder','Ingrese su código')
      } else if(role == '3' || role == '2' || role == '1' || role == '0'){
        $('#label').html('Cédula')
        $('#username').attr('placeholder','Ingrese su cédula')
      }
      $('#hidden').val(role);
      $('#n').html(nombre[role])
  }
</script>

