@extends ('layout')

@section ('title') Customer @stop

@section ('content') 

	<h1>Detalle del cliente / Customer detail <p><a href="./logout" class="btn btn-danger">Cerrar sesión / Sign out</a></p></h1>

	{{ Form::hidden('customerId', $customer->id)}}
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
	<br>
	
	<p><a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Nueva orden / New order</a></p>
	
	<table class="table table-stirped" style="width: 900px">
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
				<td><?php echo "costo de la orden"; ?></td>
				<td></td>
				<td>{{ $customer->rest }}</td>
				<td>{{ $order->deliveryDate }}</td>
				<td></td>
				<td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Detalle</a></td>
			</tr>
			@endforeach
	</table>
	{{ $orders->links() }}
@stop