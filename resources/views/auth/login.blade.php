@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Acceso a la aplicación</h1>
				</div>
				<div class="panel-body">
					<form method="POST" action="{{route('autentication')}}">
						{{csrf_field()}}
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">Email</label>
							<input class="form-control" id="email" type="email" name="email" value="{{old('email')}}">
							{!! $errors -> first('email','<span class="help-block">:message</span>')!!}
						</div>
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label for="password">Password</label>
							<input class="form-control" id="password" type="password" name="password">
							{!! $errors -> first('password','<span class="help-block">:message</span>')!!}
						</div>
						<button class="btn btn-primary btn-block">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection()