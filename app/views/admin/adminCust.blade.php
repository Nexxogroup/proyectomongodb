@extends ('layout')

@section ('title') Customer details / Detalle del cliente @stop

@section ('content') 

	<h1>Customer details / Detalle del cliente</h1>

	<!--a href="/proyectomongodb/public/logout" class="btn btn-primary">Sign out / Cerrar sesión</a-->
	{{ Form::text('customerId', $customer->id)}}
	<!--a href="{}" class="btn btn-primary"> << Back / Atras</a-->
	<td><a href="{{ route('admin.users.index') }}" class="btn btn-primary"> << Back</a></td>
	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Shipping Name/Nombre de envío</th>
			<th>Email address/Correo Electronico</th>
			<th>Balance/Saldo</th>
		</tr>
		<br>
		<tr>
			<td>{{ $customer->shippingName }}</td>
			<td>{{ $customer->email }}</td>
			<td>{{ $customer->rest }}</td>
		</tr>
		
		<br>
	</table>
	<!--a href="/proyectomongodb/public/adminorderlist/{{{$customer->id}}}" class="btn btn-primary">Show orders / Ver ordenes</a>
	
	<a href="{{ route('admin.orders.create') }}" class="btn btn-primary">New order / Nueva orden</a-->
	<br>
	<table class="table table-stirped">
		<tr>
			<th>Order number</th>
			<th>Supplier</th>
			<th>Status</th>
			<th>Costo</th>
			<th>Deposito</th>
			<th>Delivery date</th>
			<th>PL</th>
			<th>FAC</th>
			<th>Actions</th>
		</tr>
		<tr>
			<th>Número</th>
			<th>Proveedor</th>
			<th>Estado</th>
			<th>Costo</th>
			<th>Deposito</th>
			<th>Fecha de entrega</th>
			<th>PL</th>
			<th>FAC</th>
			<th>Acciones</th>
		</tr>
		@if($orders)
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->numero }}</td>
				<td>{{ $order->proveedor }}</td>
				<td>{{ $order->status }}</td>
				<td></td>
				<td></td>
				<td>{{ $order->deliveryDate }}</td>
				<td></td>
				<td></td>
				<!--td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Detalle</a></td-->
				<td><a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Editar</a></td>

			</tr>
			@endforeach
		@else
			<tr><td>No tiene ordenes registradas</td></tr>
		@endif
	</table>
@stop