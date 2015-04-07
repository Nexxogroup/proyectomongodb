{{--hereda la estructura del Layout--}}
@extends ('layout')
{{-- sobreescribe el titulo --}}
@section ('title') Registro de administradores @stop
{{--declara la seccion de contenido principal--}}
@section ('content')

<h1>Registro de administradores</h1>

{{--construye un formulario entre los helpers de laravel form::open y form::close--}}
{{--envia la informacion a la ruta specificada por medio del metodo post(informacion oculta)--}}
{{Form::open(array('route' => 'admin.admins.store', 'method' => 'POST', 'role' => 'form'))}}

{{--evaluamos si existe algún error al ingresar la informacion y lo mostramos en pantalla --}}
@include('errors', array('errors' => $errors))

<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('email', 'Direccion de E-mail')}}
		{{Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control'))}}
	</div>
	<div class="form-group col-md-4">
		{{Form::label('full_name', 'Full Name')}}
		{{Form::text('full_name', null, array('placeholder' => 'Introduce tu nombre de envío', 'class' => 'form-control'))}}
	</div>
</div>

<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('password', 'Contraseña')}}
		{{Form::password('password', array('class' => 'form-control'))}}
	</div>
	<div class="form-group col-md-4">
		{{Form::label('password_confirmation', 'Confirmar Contraseña')}}
		{{Form::password('password_confirmation', array('class' => 'form-control'))}}
	</div>
</div>
{{Form::button('Crear administrador', array('type' => 'submit', 'class' => 'btn btn-primary'))}}

{{Form::close()}}

@stop