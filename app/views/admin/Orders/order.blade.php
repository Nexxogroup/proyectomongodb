@extends ('layout')

@section ('title') Order @stop

@section ('content') 

	<h1>Detalle de orden / Order detail<p><a href="/proyectomongodb/public/logout" class="btn btn-danger">Cerrar sesión / Sign out</a></p></h1>
	<p><a href="{{ route('admin.users.show', $order->customerId) }}" class="btn btn-primary"> << Atras / Back</a></p>
	<br>
	{{Form::text('customerId', $order->customerId)}}
	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Orden/ Order</th>
			<th>Fecha de entrega / Delivery Date</th>
			<th>Proveedor / Supplier</th>
			<th>Estado / Status</th>
			<th>Comentarios / Remarks</th>
		</tr>
		<br>
		<tr>
			<td>{{ $order->numero }}</td>
			<td>{{ $order->deliveryDate }}</td>
			<td>{{ $order->proveedor }}</td>
			<td>{{ $order->status}}</td>
			<td>{{ $order->descripcion }}</td>
		</tr>
	</table>
	<br>
	<br>
	<table class="table table-sitrped" style="width: 900px">
		<tr>
			<th>Producto / Product</th>
			<th>Referencia / Item</th>
			<th>Cantidad / Quantity</th>
			<th>¥ Valora unidad / Unit Price</th>
			<th>¥ Valor total / Total Price</th>
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
	{{ $products->links() }}
	<br>
	<br>
@stop