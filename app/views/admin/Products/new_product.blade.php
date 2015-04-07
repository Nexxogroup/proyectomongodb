@extends('layout')

@section('title') Product @stop

@section('content')

	<h1>Add Product / Adicionar producto</h1>
	<br>
	
	{{Form::open(array('route'=>'admin.products.store', 'method'=>'POST'), array('role'=>'form'))}}
	
	{{Form::text('idOrder', $idOrder)}}
		<div class="row">
			<div class="form-group col-md-4">
				{{Form::label('producto', 'Product')}}
				{{Form::text('producto', null, array('placeholder' => 'Producto', 'class' => 'form-control'))}}
			</div>
			<div class="form-group col-md-4">
				{{Form::label('item', 'Item #')}}
				{{Form::text('item', null, array('placeholder' => 'Ref#', 'class' => 'form-control'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				{{Form::label('cantidad', 'Quantity')}}
				{{Form::text('cantidad', null, array('placeholder' => 'Cantidad', 'class' => 'form-control'))}}
			</div>
			<div class="form-group col-md-4">
				{{Form::label('precio', 'Price / Precio (CNY)')}} 
				{{Form::text('precio', null, array('placeholder' => '¥', 'class' => 'form-control'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				{{Form::label('color', 'Colors')}}
				{{Form::text('color', null, array('placeholder' => 'Colores', 'class' => 'form-control'))}}
			</div>
			<div class="form-group col-md-4">
				{{Form::label('talla', 'Sizes')}}
				{{Form::text('talla', null, array('placeholder' => 'Tallas', 'class' => 'form-control'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-8">
				{{Form::label('remarks', 'Remarks')}}
				{{Form::textarea('remarks', null, array('placeholder' => 'Comentarios del Producto', 'class' => 'form-control', 'rows' => '5'))}}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				{{-- form action="ejemplo.php" encrypte="multipart/form-data" method="post" --}}
				{{Form::label('file', 'Load picture / Cargar Imagen')}}
				{{Form::file('attachmentFile', array('type' => '', 'class' => 'form-control'))}}
			</div>
		</div>

	{{ Form::button('Add', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
	
	{{ Form::close() }}
	
@stop 