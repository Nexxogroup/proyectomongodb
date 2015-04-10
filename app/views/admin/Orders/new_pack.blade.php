@extends('layout')

@section('title') Create Pack @stop

@section('content')
	<h1>Nuevo Paquete / Create Pack</h1>
	<br>
	{{ Form::open(array(''), array('role' => 'form'))}}
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('pack', 'Numero')}}
			{{Form::number('pack', null, array('placeholder' => 'No Pack', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('barcode', 'Codigo de barras')}}
			{{Form::text('barcode', null, array('placeholder' => 'Barcode', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('date', 'Fecha')}}
			{{Form::text('date', null, array('placeholder' => 'Date', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('name', 'Nombre de envio')}}
			{{Form::text('name', null, array('placeholder' => 'Shipping Name', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('item', 'Ref #')}}
			{{Form::number('item', null, array('placeholder' => 'Item #', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('quantity', 'Cantidad')}}
			{{Form::number('quantity', null, array('placeholder' => 'Quantity', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('description', 'Descripcion')}}
			{{Form::text('description', null, array('placeholder' => 'Description', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('order', 'Orden')}}
			{{Form::number('order', null, array('placeholder' => 'Order', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-2">
			{{Form::label('lenght', 'Largo')}}
			{{Form::number('lenght', null, array('placeholder' => 'Lenght', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-2">
			{{Form::label('height', 'Ancho')}}
			{{Form::number('height', null, array('placeholder' => 'Height', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-2">
			{{Form::label('width', 'Alto')}}
			{{Form::number('width', null, array('placeholder' => 'Width', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-2">
			{{Form::label('weight', 'Peso')}}
			{{Form::number('weight', null, array('placeholder' => 'Weight', 'class' => 'form-control'))}}
		</div>
	</div>
	{{Form::button('Cancelar / Cancel', array('type'=>'submit', 'class'=>'btn btn-info'))}}
	{{Form::button('Guardar / Save', array('type'=>'submit', 'class'=>'btn btn-primary'))}}
	{{ Form::close()}}
@stop