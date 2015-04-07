@extends('layout')

@section('title') Create Pack @stop

@section('content')
	<h1>Create Pack / Nuevo Packete</h1>
	<br>
	{{ Form::open(array(''), array('role' => 'form'))}}
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('pack', 'No Pack')}}
			{{Form::number('pack', null, array('placeholder' => 'Numero', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('barcode', 'Barcode')}}
			{{Form::text('barcode', null, array('placeholder' => 'Codigo de barras', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('date', 'Date')}}
			{{Form::text('date', null, array('placeholder' => 'Fecha', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('name', 'Shipping Name')}}
			{{Form::text('name', null, array('placeholder' => 'Nombre de envio', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('item', 'Item #')}}
			{{Form::number('item', null, array('placeholder' => 'Ref #', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('quantity', 'Quantity')}}
			{{Form::number('quantity', null, array('placeholder' => 'Cantidad', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('description', 'Description')}}
			{{Form::text('description', null, array('placeholder' => 'Descripcion', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('order', 'Order')}}
			{{Form::number('order', null, array('placeholder' => 'Orden', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-2">
			{{Form::label('lenght', 'Lenght')}}
			{{Form::number('lenght', null, array('placeholder' => 'Largo', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-2">
			{{Form::label('height', 'Height')}}
			{{Form::number('height', null, array('placeholder' => 'Ancho', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-2">
			{{Form::label('width', 'Width')}}
			{{Form::number('width', null, array('placeholder' => 'Alto', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-2">
			{{Form::label('weight', 'Weight')}}
			{{Form::number('weight', null, array('placeholder' => 'Peso', 'class' => 'form-control'))}}
		</div>
	</div>
	{{Form::button('Cancel', array('type'=>'submit', 'class'=>'btn btn-info'))}}
	{{Form::button('Save', array('type'=>'submit', 'class'=>'btn btn-primary'))}}
	{{ Form::close()}}
@stop