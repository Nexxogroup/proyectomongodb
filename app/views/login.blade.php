@extends ('layout')

@section ('title') Inicio de sesión @stop

@section ('linkcss') assets/css/signin.css @stop

@section ('content')

@if(Session::has('mensaje_error'))
	<div class="alert alert-danger">{{Session::get('mensaje_error')}}</div>
@endif

<div class = 'page-header'>
	<img src="assets/images/logotipo.png" alt="logotipo" class="img-thumbnail" ><h2 class="text-center">Bienvenido a nuestra plataforma</h2>
		
	{{Form::open(array('url' => '/login', 'class' => 'form-signin', 'role' => 'form'))}}

		<h3 class="form-signin-heading" style="text-align:center">Ingrese sus datos de usuario<br></h3> <h4 class="form-signin-heading" style="text-align:center" >Input your information</h4>
		<br>
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
				<p>Recordar contraseña<br>Remember your password</p>
			</label>
		</div>
		
		{{Form::submit('Ingresar / Log in', array('class'=>'btn btn-primary btn-lg btn-block'))}}
		<h3 style="text-align:right">{{HTML::link('admin/users/create', 'Registrese / Sign in');}}</h3>
	{{Form::close()}}

</div>

@stop