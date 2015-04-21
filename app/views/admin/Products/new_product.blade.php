@extends('layout')

@section('title') Product @stop

@section('content')

	<h1>Adicionar producto / Add Product</h1>
	<br>
	
	{{Form::open(array('route'=>'admin.products.store', 'method'=>'POST'), array('role'=>'form'))}}
	@include('errors', array('errors' => $errors))
	{{Form::hidden('idOrder', Input::get('numero'))}}
		<div class="row">
			<div class="form-group col-md-4">
				{{Form::label('producto', 'Producto')}}
				{{Form::text('producto', null, array('placeholder' => 'Product', 'class' => 'form-control'))}}
			</div>
			<div class="form-group col-md-4">
				{{Form::label('item', 'Ref #')}}
				{{Form::text('item', null, array('placeholder' => 'Item #', 'class' => 'form-control'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				{{Form::label('cantidad', 'Cantidad')}}
				{{Form::number('cantidad', null, array('placeholder' => 'Quantity', 'class' => 'form-control'))}}
			</div>
			<div class="form-group col-md-4">
				{{Form::label('precio', 'Precio / Price (CNY)')}} 
				{{Form::number('precio', null, array('placeholder' => '¥', 'class' => 'form-control'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				{{Form::label('color', 'Colores')}}
				{{Form::text('color', null, array('placeholder' => 'Colors', 'class' => 'form-control'))}}
			</div>
			<div class="form-group col-md-4">
				{{Form::label('talla', 'Tallas')}}
				{{Form::text('talla', null, array('placeholder' => 'Sizes', 'class' => 'form-control'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-8">
				{{Form::label('remarks', 'Comentarios')}}
				{{Form::textarea('remarks', null, array('placeholder' => 'Remarks', 'class' => 'form-control', 'rows' => '5'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				{{Form::label('file', 'Cargar Imagen / Load picture')}}
				{{Form::file('attachmentFile', array('type' => '', 'class' => 'form-control'))}}
			</div>
		</div>

	{{ Form::button('Adicionar / Add', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
	
	{{ Form::close() }}
	
@stop 