@extends ('layout')

@section ('title') Inicio de sesión @stop

@section ('linkcss') assets/css/signin.css @stop

@section ('content')

@if(Session::has('mensaje_error'))
	<div class="alert alert-danger">{{Session::get('mensaje_error')}}</div>
@endif

<div>
		
	{{Form::open(array('url' => '/login', 'class' => 'form-signin', 'role' => 'form'))}}

		<h2 class="form-signin-heading" style="text-align:center">Input your information <br></h2> <h4 class="form-signin-heading" style="text-align:center" >Ingrese sus datos de usuario</h4>
		<br>
		<br>
		<div class="row">
			<div class="form-group col-md-12">
				{{Form::label('email', 'Email address')}}
				{{Form::email('email', Input::old('email'), array('placeholder' => 'Correo Electronico', 'class'=>'form-control'));}}
			</div>
			<div class="form-group col-md-12">
				{{Form::label('password', 'Password')}}
				{{Form::password('password', array('placeholder' => 'Contraseña', 'class'=>'form-control'));}}
			</div>
		</div>
	
	
		<div class="checkbox">
			<label>
				{{Form::checkbox('rememberme', true)}}
				<p>Remember your password<br>Recordar contraseña  </p>
			</label>
		</div>
		
		{{Form::submit('Ingresar / Log in', array('class'=>'btn btn-primary btn-lg btn-block'))}}
		<h3 style="text-align:right">{{HTML::link('admin/users/create', 'Registrese / Sign in');}}</h3>
	{{Form::close()}}

</div>

@stop