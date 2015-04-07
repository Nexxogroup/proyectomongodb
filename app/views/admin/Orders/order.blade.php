@extends ('layout')

@section ('title') Order details / Detalle de orden @stop

@section ('content') 

	<h1>Order details / Detalle de orden<a href="/proyectomongodb/public/logout" class="btn btn-danger">Sign out / Cerrar sesión</a></h1>

	<a href="{{ route('admin.orders.index') }}" class="btn btn-primary"> << Back / Atras</a>
		
	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Order</th>
			<th>Delivery Date</th>
			<th>Supplier</th>
			<th>Status</th>
			<th>Remarks</th>
		</tr>
		<br>
		<tr>
			<td>{{ $order->numero }}</td>
			<td>{{ $order->deliveryDate }}</td>
			<td>{{ $order->proveedor }}</td>
			<td>{{ $order->status}}</td>
			<td>{{ $order->descripcion }}</td>
		</tr>
		
		<br>
	</table>
	
	<table class="table table-sitrped" style="width: 900px">
		<tr>
			<th>Product</th>
			<th>Item</th>
			<th>Quantity</th>
			<th>¥ Unit Price</th>
			<th>¥ Total Price</th>
			<!--th>Actions</th-->
		</tr>
		@foreach($products as $product)
		<tr>
			<td>{{ $product->producto }}</td>
			<td>{{ $product->item }}</td>
			<td>{{ $product->cantidad }}</td>
			<td>{{ $product->precio }}</td>
			<td>{{ $product->cantidad * $product->precio }}</td>
			<!--td><a href="{{ route('admin.products.show') }}" class="btn btn-info">Ver Producto</a></td-->
		</tr>
		@endforeach
	</table>
	<br>
	<br>
@stop