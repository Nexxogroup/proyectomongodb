@extends ('layout')

@section ('title') Inicio de sesión @stop

@section ('linkcss') assets/css/signin.css @stop

@section ('content')

@if(Session::has('mensaje_error'))
	<div class="alert alert-danger">{{Session::get('mensaje_error')}}</div>
@endif

<div class = 'page-header'>
	<img src="assets/images/logotipo.png" alt="logotipo" class="img-responsive" ><h1 class="text-center" style="font-family:Verdana;">Bienvenido a nuestra plataforma</h1>
		
	{{Form::open(array('url' => '/login', 'class' => 'form-signin', 'role' => 'form'))}}

		<h3 class="form-signin-heading" style="text-align:center; font-family:Verdana;">Ingrese sus datos de usuario<br></h3> <h4 class="form-signin-heading" style="text-align:center; font-family:Verdana;" >Input your information</h4>
		<br>
		<div class="row">
			<div class="form-group col-md-12">
				{{Form::label('email', 'Correo Electronico')}}
				{{Form::email('email', Input::old('email'), array('placeholder' => 'Email address', 'class'=>'form-control'));}}
			</div>
			<div class="form-group col-md-12">
				{{Form::label('password', 'Contraseña')}}
				{{Form::password('password', array('placeholder' => 'Password', 'class'=>'form-control'));}}
			</div>
		</div>
		<div class="checkbox">
			<label>
				{{Form::checkbox('rememberme', true)}}
				Recordar contraseña<br>Remember your password
			</label>
		</div>
		
		{{Form::submit('Ingresar / Log in', array('class'=>'btn btn-primary btn-lg btn-block'))}}
		<br>
		<h4 style="text-align:right; font-family:Verdana;"><strong>{{HTML::link('admin/users/create', 'Registrese / Sign in');}}</strong></h4>
	{{Form::close()}}

</div>

@stop