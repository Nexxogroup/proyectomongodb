{{--hereda la estructura del Layout--}}
@extends ('layout')
{{-- sobreescribe el titulo --}}
@section ('title') Order @stop
{{--declara la seccion de contenido principal--}}
@section ('content')

<h1>Editar Orden/Edit order</h1>
<br>
{{--construye un formulario entre los helpers de laravel form::open y form::close--}}
{{--envia la informacion a la ruta specificada por medio del metodo post(informacion oculta)--}}
{{Form::model($productos, $order, $form_data, array('role' => 'form'))}}

{{--evaluamos si existe algún error al ingresar la informacion y lo mostramos en pantalla --}}
@include('errors', array('errors' => $errors))

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('numero', 'Numero de orden / Order number')}}
			{{Form::text('numero', null, array('placeholder' => 'Order number', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('deliveryDate', 'Fecha de entrega / Delivery Date')}}
			<input class = "form-control" name="deliveryDate" type="date" id="deliveryDate" >
			
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('proveedor', 'Proveedor / Provider')}}
			{{Form::text('proveedor', null, array('placeholder' => 'Supplier', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('status', 'Estado / Status')}}
			<select class="form-control" id="status" name="status"><option value="produccion">Producci&oacute;n</option><option value="recibido">Recibido</option><option value="control de calidad">QC</option><option value="empaque">Empaque</option><option value="almacenado">Almacenado</option><option value="5">Despachado</option></select>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-8">
			{{Form::label('descripcion', 'Observaciones / Remarks')}}
			{{Form::text('descripcion', null, array('placeholder' => 'Remarks', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-2">
			{{Form::label('deposito', 'Deposito / Deposit')}}
			{{Form::text('deposito', null, array('placeholder' => 'Payment', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-6">
			{{Form::label('packinglist', 'Lista de empaque / Packing List')}}
			<!--{{Form::text('packinglist', null, array('placeholder' => 'Packing list', 'class' => 'form-control'))}}-->
			<br>
			<a href="/proyectomongodb/public/admin/createpl" class="btn btn-info">Crear / Create Packing list </a>
			<a href="/proyectomongodb/public/admin/createpl" class="btn btn-info">Ver / View Packing list</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="form-group col-md-8">
			<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Adicionar / Add Product</a>
		</div>
	</div>
	{{Form::text('order', $order->numero) }} <!--Input::get('numero'));}}-->
	<br>	

	<table class="table table-striped" style="width: 900px">
		<tr>
			<th>Producto<br>Product</th>
			<th>Referencia<br>Item</th>
			<th>Cantidad<br>Quantity</th>
			<th>ValorUnit<br>Unit price</th>
			<th>ValorTotal<br>Total price</th>
			<th>Acciones<br>Actions</th>
			
		</tr>
		@foreach($productos as $product)
		<tr>
			<td>{{ $producto->producto }}</td>
			<td>{{ $producto->item }}</td>
			<td>{{ $producto->cantidad }}</td>
			<td>{{ $producto->precio }}</td>
			<td>{{ $producto->cantidad * $producto->precio }}</td>
			<td></td>
		</tr>
		@endforeach
	</table>

	{{Form::button('Guardar / Save', array('type' => 'submit', 'class' => 'btn btn-primary'))}}

	{{Form::close()}}

@stop