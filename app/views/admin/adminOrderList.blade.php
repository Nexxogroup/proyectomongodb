@extends('layout')

@section('title') Lista de Ordenes / Orders List @stop

@section('content')

	<h1>Lista de Ordenes / Orders List</h1>
	{{ Form::text('customersession', Session::get('idcustomer'))}}
	<p>
		<a href="{{ route('admin.users.show', array(Session::get('idcustomer'))) }}" class="btn btn-primary">Back / Atras</a>
		<a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Create Order / Crear Orden</a>
		<a href="/proyectomongodb/public/logout" class="btn btn-primary">Sign out / Cerrar sesión</a>
	</p>

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
		@if($orders)
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
				<td><a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Editar</a></td>

			</tr>
			@endforeach
		@else
			<tr><td>No tiene ordenes registradas</td></tr>
		@endif
	</table>

	

@stop
