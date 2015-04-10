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
{{Form::model($order,$form_data, array('role' => 'form'))}}

{{--evaluamos si existe algún error al ingresar la informacion y lo mostramos en pantalla --}}
@include('errors', array('errors' => $errors))

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('numero', 'Numero de orden')}}
			{{Form::text('numero', null, array('placeholder' => 'Order number', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('deliveryDate', 'Fecha de entrega/Delivery Date')}}
			<input class = "form-control" name="deliveryDate" type="date" id="deliveryDate" >
			
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('proveedor', 'Proveedor')}}
			{{Form::text('proveedor', null, array('placeholder' => 'Supplier', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('status', 'Estado/Status')}}
			<select class="form-control" id="status" name="status"><option value="produccion">Producci&oacute;n</option><option value="recibido">Recibido</option><option value="control de calidad">QC</option><option value="empaque">Empaque</option><option value="almacenado">Almacenado</option><option value="5">Despachado</option></select>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-8">
			{{Form::label('descripcion', 'Observaciones')}}
			{{Form::text('descripcion', null, array('placeholder' => 'Remarks', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('deposito', 'Deposito')}}
			{{Form::text('deposito', null, array('placeholder' => 'Payment', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('packinglist', 'Lista de empaque')}}
			<!--{{Form::text('packinglist', null, array('placeholder' => 'Packing list', 'class' => 'form-control'))}}-->
			<br>
			<a href="/proyectomongodb/public/admin/createpl" class="btn btn-info">Create Packing list </a>
			<a href="/proyectomongodb/public/admin/createpl" class="btn btn-info">View Packing list</a>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-8">
			<a href="" class="btn btn-primary">Adicioinar / Add Product</a>
		</div>
	</div>
	{{Form::text('order', Input::get('numero'));}}
	<br>	

	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Producto / Product</th>
			<th>Item / Ref</th>
			<th>Cantidad / Quantity</th>
			<th>ValorUnit / Unit price</th>
			<th>ValorTotal / Total price</th>
			<th>Acciones / Actions</th>
			
		</tr> 
		
	</table>
	{{Form::button('Guardar / Save', array('type' => 'submit', 'class' => 'btn btn-primary'))}}

	{{Form::close()}}

@stop