@extends('pantallas.inicio')
@section('titulo','Cambiar Contraseña')
@section('contenedor_login')
<!-- Welcome Section -->
<div class="welcome d-flex justify-content-center flex-column">
    <div class="container">
        <!-- Navigation -->
        @include('menus.principal')
        <!-- / Navigation -->
    </div> <!-- .container -->

    <!-- Inner Wrapper -->
    <div class="inner-wrapper mt-auto mb-auto container">
        <div class="row justify-content-md-center px-4">
            <div class="col-sm-12 col-md-8 col-lg-6 p-4 mb-4 card">
                <h3 class="section-title text-center mb-5">Recuperar Contraseña</h3>
                <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="row" style="text-align: left !important">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label for="email" style="{{ ($errors->has('email')) ? 'color: #c4183c' : '' }}">Correo electronico</label>
                                <div class="input-group input-group-seamless">
                                    <span class="input-group-prepend ">
                                        <span class="input-group-text ">
                                            <i class="fa fa-at" style="{{ ($errors->has('email')) ? 'color: #c4183c' : '' }}"></i>
                                        </span>
                                    </span>
                                    <input id="email" type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <input id="email" type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                            </div> --}}
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label for="password" style="{{ ($errors->has('password')) ? 'color: #c4183c' : '' }}">Contraseña</label>
                                <div class="input-group input-group-seamless">
                                    <span class="input-group-prepend ">
                                        <span class="input-group-text ">
                                            <i class="fa fa-lock" style="{{ ($errors->has('password')) ? 'color: #c4183c' : '' }}"></i>
                                        </span>
                                    </span>
                                    <input id="password" type="password" class="form-control form-control-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label for="password-confirm">Confirmar contraseña</label>
                                <div class="input-group input-group-seamless">
                                    <span class="input-group-prepend ">
                                        <span class="input-group-text ">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-success btn-pill d-flex ml-auto mr-auto" type="submit" value="Enviar">
                </form>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12 mt-auto mb-auto mr-3">
                <h2 class="welcome-heading text-white">¿Quienes somos?</h2>
                <p class="text-muted">El colegio fue creado en 1.970 por el secretario de Educación del departamento bajo la denominación de colegio “Eduardo Camacho Gamba”, en honor al ilustre político. Inicio sus laborares con un total de 31 estudiantes matriculados en el curso de bachillerato y fue nombrado como rector el docente Baltasar Santoyo Alza...</p>
                <a href="#" class="btn btn-success btn-pill align-self-center">Ver mas ...</a>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-12 ml-auto">
                <img class="iphone-mockup ml-auto" src="img/app-promo/iphone-app-mockup.png" alt="iPhone App Mockup - Shards App Promo Demo">
            </div>
        </div> --}}
    </div>
    <!-- / Inner Wrapper -->
</div>
<!-- / Welcome Section -->
@endsection
