@extends ('layout')

@section ('title') Detalle del cliente / Customer details @stop

@section ('content') 

	<h1>Detalle del cliente / Customer details</h1>

	<!--a href="/proyectomongodb/public/logout" class="btn btn-primary">Sign out / Cerrar sesión</a-->
	{{ Form::text('customerId', $customer->id)}}
	<!--a href="{}" class="btn btn-primary"> << Back / Atras</a-->
	<td><a href="{{ route('admin.users.index') }}" class="btn btn-primary"> << Atras / Back</a></td>
	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Nombre de envío / Shipping Name</th>
			<th>Correo Electronico / Email address</th>
			<th>Saldo / Balance</th>
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
			<th>Numero / Order number</th>
			<th>Proveedor / Supplier</th>
			<th>Estado / Status</th>
			<th>Costo / Cost</th>
			<th>Deposito / Deposit</th>
			<th>Fecha de entrega / Delivery date</th>
			<th>PL</th>
			<th>Acciones / Actiones</th>
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