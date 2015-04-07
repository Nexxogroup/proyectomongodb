{{--hereda la estructura del Layout--}}
@extends ('layout')
{{-- sobreescribe el titulo --}}
@section ('title') Edit order/Editar Orden @stop
{{--declara la seccion de contenido principal--}}
@section ('content')

<h1>Edit order/Editar Orden</h1>
<br>
{{--construye un formulario entre los helpers de laravel form::open y form::close--}}
{{--envia la informacion a la ruta specificada por medio del metodo post(informacion oculta)--}}
{{Form::model($order,$form_data, array('role' => 'form'))}}

{{--evaluamos si existe algún error al ingresar la informacion y lo mostramos en pantalla --}}
@include('errors', array('errors' => $errors))

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('numero', 'Order number')}}
			{{Form::text('numero', null, array('placeholder' => 'Numero de orden', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('deliveryDate', 'Delivery Date/Fecha de entrega')}}
			<input class = "form-control" name="deliveryDate" type="date" id="deliveryDate" >
			
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('proveedor', 'Supplier')}}
			{{Form::text('proveedor', null, array('placeholder' => 'Proveedor', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('status', 'Status/Estado')}}
			<select class="form-control" id="status" name="status"><option value="produccion">Producci&oacute;n</option><option value="recibido">Recibido</option><option value="control de calidad">QC</option><option value="empaque">Empaque</option><option value="almacenado">Almacenado</option><option value="5">Despachado</option></select>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-8">
			{{Form::label('descripcion', 'Remarks')}}
			{{Form::text('descripcion', null, array('placeholder' => 'Observaciones', 'class' => 'form-control'))}}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('deposito', 'Payment')}}
			{{Form::text('deposito', null, array('placeholder' => 'deposito', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('packinglist', ' Packing list ')}}
			{{Form::text('packinglist', null, array('placeholder' => 'Lista de empaque', 'class' => 'form-control'))}}<br>
			<a href="/proyectomongodb/public/admin/createpl" class="btn btn-info">Create Packing list </a>
			<a href="/proyectomongodb/public/admin/createpl" class="btn btn-info">View Packing list</a>
		</div>
	</div>
	<br>
	<a href="" class="btn btn-primary">Add Product / Adicionar producto</a>
	
	<br>
	{{Form::text('order', Input::get('numero'));}}
	<br>	

	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Producto</th>
			<th>Item</th>
			<th>Cantidad</th>
			<th>ValorUnit</th>
			<th>ValorTotal</th>
			<th>Acciones</th>
			
		</tr> 
		
	</table>
	{{Form::button('Save / Guardar', array('type' => 'submit', 'class' => 'btn btn-primary'))}}

	{{Form::close()}}

@stop