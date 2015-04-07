{{--hereda la estructura del Layout--}}
@extends ('layout')

<!--?php
	//$customer;
	if($customer->exists):
		$form_data 	= array('route' => array('admin.users.update', $customer->id), 'method' => 'PATCH');
		$action 	= 'Editar';
	else:
		$form_data 	= array('route' => array(''), 'method' => 'POST');
		$action 	= 'Crear';
	endif;
?-->

{{-- sobreescribe el titulo --}}
@section ('title') {{ $action }} clientes @stop
{{--declara la seccion de contenido principal--}}
@section ('content')

<h2>{{ $accion }} / {{ $action }} clientes</h2><br>

{{--construye un formulario entre los helpers de laravel form::open y form::close--}}
{{--envia la informacion a la ruta specificada por medio del metodo post(informacion oculta)--}}

{{--Form::open(array('route' => 'admin.users.store', 'method' => 'POST', 'role' => 'form'))--}}
{{Form::model($customer, $form_data, array('role' => 'form'))}}

@include('errors', array('errors' => $errors))

<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('email', 'Email address')}}
		{{Form::text('email', null, array('placeholder' => 'Correo electrónico', 'class' => 'form-control'))}}
	</div>
	<div class="form-group col-md-4">
		{{Form::label('shippingName', 'Shipping Name')}}
		{{Form::text('shippingName', null, array('placeholder' => 'Nombre de envío', 'class' => 'form-control'))}}
	</div>
</div>

<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('password', 'Password')}}
		{{Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control'))}}
	</div>
	<div class="form-group col-md-4">
		{{Form::label('password_confirmation', 'Confirm password')}}
		{{Form::password('password_confirmation', array('placeholder' =>  'Confirmar Contraseña', 'class' => 'form-control'))}}
	</div>
</div>
<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('rest', 'Balance / Saldo')}}
		{{Form::text('rest', 0, array('class' => 'form-control'))}}
	</div>
</div>
{{Form::button($action.' / Add customer', array('type' => 'submit', 'class' => 'btn btn-primary'))}}

{{Form::close()}}

@stop