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

<h2>{{ $action }} clientes / {{ $accion }}</h2><br>

{{--construye un formulario entre los helpers de laravel form::open y form::close--}}
{{--envia la informacion a la ruta specificada por medio del metodo post(informacion oculta)--}}

{{--Form::open(array('route' => 'admin.users.store', 'method' => 'POST', 'role' => 'form'))--}}
{{Form::model($customer, $form_data, array('role' => 'form'))}}

@include('errors', array('errors' => $errors))

<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('email', 'Correo electrónico')}}
		{{Form::text('email', null, array('placeholder' => 'Email address', 'class' => 'form-control'))}}
	</div>
	<div class="form-group col-md-4">
		{{Form::label('shippingName', 'Nombre de envío')}}
		{{Form::text('shippingName', null, array('placeholder' => 'Shipping Name', 'class' => 'form-control'))}}
	</div>
</div>

<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('password', 'Contraseña')}}
		{{Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control'))}}
	</div>
	<div class="form-group col-md-4">
		{{Form::label('password_confirmation', 'Confirmar Contraseña')}}
		{{Form::password('password_confirmation', array('placeholder' =>  'Confirm password', 'class' => 'form-control'))}}
	</div>
</div>
{{Form::hidden('rest', 0)}}
	
{{Form::button($action.' cliente / Add customer', array('type' => 'submit', 'class' => 'btn btn-primary'))}}

{{Form::close()}}

@stop