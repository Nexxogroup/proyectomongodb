@extends ('layout')

@section ('title') Customer @stop

@section ('content') 

	<h1 style="Font-family:Verdana;">Detalle del cliente / Customer detail <p><a href="{{ URL::to('logout') }}" class="btn btn-danger">Cerrar sesión / Sign out</a></p></h1>

	{{ Form::hidden('customerId', $customer->id)}}
	<table class="table table-striped" style="width:900px;">
		<tr>
			<th>Nombre de envío<br>Shipping Name</th>
			<th>Correo Electronico<br>Email address</th>
			<th>Saldo<br>Balance</th>
		</tr>
		
		<tr>
			<td>{{ $customer->shippingName }}</td>
			<td>{{ $customer->email }}</td>
			<td>{{ $customer->rest }}</td>
		</tr>
		
		<br>
	</table>
	
	
	<p><a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Nueva orden / New order</a></p>
	
	<table class="table table-striped" style="width:900px;">
		<tr>
			<th>Número<br>Order number</th>
			<th>Proveedor<br>Supplier</th>
			<th>Estado<br>Status</th>
			<th>Costo<br>Cost</th>
			<th>Deposito<br>Deposit</th>
			<th>Saldo<br>Residue</th>
			<th>Fecha de entrega<br>Delivery date</th>
			<th>PL<br>PL</th>
			<th>Acciones<br>Actions</th>
		</tr>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->numero }}</td>
				<td>{{ $order->proveedor }}</td>
				<td>{{ $order->status }}</td>
				<td><?php echo "costo de la orden"; ?></td>
				<td>{{ $order->deposito }}</td>
				<td>{{ $customer->rest }}</td>
				<td>{{ $order->deliveryDate }}</td>
				<td></td>
				<td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Detalle</a></td>
			</tr>
			@endforeach
	</table>
	{{ $orders->links() }}
@stop