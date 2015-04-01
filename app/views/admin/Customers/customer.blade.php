@extends ('layout')

@section ('title') Customer details / Detalle del cliente @stop

@section ('content') 

	<h1>Customer details / Detalle del cliente<a href="/proyectomongodb/public/logout" class="btn btn-danger">Sign out / Cerrar sesión</a></h1>

	{{ Form::text('customerId', $customer->id)}}
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
	<!--a href="/proyectomongodb/public/admin/orderlist/{{{$customer->id}}}" class="btn btn-primary">Show orders / Ver ordenes</a-->
	<!--a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Show orders / Ver ordenes</a-->
	<a href="{{ route('admin.orders.create') }}" class="btn btn-primary">New order / Nueva orden</a>
	<br>
	<br>
	<table class="table table-stirped">
		<tr>
			<th>Order number</th>
			<th>Supplier</th>
			<th>Status</th>
			<th>Costo</th>
			<th>Deposito</th>
			<th>Balance</th>
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
			<th>Saldo</th>
			<th>Fecha de entrega</th>
			<th>PL</th>
			<th>FAC</th>
			<th>Acciones</th>
		</tr>
		
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->numero }}</td>
				<td>{{ $order->proveedor }}</td>
				<td>{{ $order->status }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ $order->deliveryDate }}</td>
				<td></td>
				<td></td>
				<td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Detalle</a></td>
			</tr>
			@endforeach
		
	</table>
@stop