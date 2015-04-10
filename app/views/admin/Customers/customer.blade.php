@extends ('layout')

@section ('title') Detalle del cliente / Customer details @stop

@section ('content') 

	<h1>Detalle del cliente / Customer details<a href="/proyectomongodb/public/logout" class="btn btn-danger">Cerrar sesión / Sign out</a></h1>

	{{ Form::text('customerId', $customer->id)}}
	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Nombre de envío/Shipping Name</th>
			<th>Correo Electronico/Email address</th>
			<th>Saldo/Balance</th>
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
	<a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Nueva orden / New order</a>
	<br>
	<br>
	<table class="table table-stirped">
		<tr>
			<th>Número</th>
			<th>Proveedor</th>
			<th>Estado</th>
			<th>Costo</th>
			<th>Deposito</th>
			<th>Saldo</th>
			<th>Fecha de entrega</th>
			<th>PL</th>
			<th>Acciones</th>
		</tr>
		<tr>
			<th>Order number</th>
			<th>Supplier</th>
			<th>Status</th>
			<th>Cost</th>
			<th>Deposit</th>
			<th>Balance</th>
			<th>Delivery date</th>
			<th>PL</th>
			<th>Actions</th>
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
				<td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Detalle</a></td>
			</tr>
			@endforeach
		
	</table>
@stop