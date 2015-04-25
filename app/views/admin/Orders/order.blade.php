@extends ('layout')

@section ('title') Order @stop

@section ('content') 

	<h1 style="Font-family:Verdana;">Detalle de orden / Order detail<p><a href="{{ URL::to('logout') }}" class="btn btn-danger">Cerrar sesión / Sign out</a></p></h1>
	<p><a href="{{ route('admin.users.show', $order->customerId) }}" class="btn btn-primary"> << Atras / Back</a></p>
	
	{{Form::hidden('customerId', $order->customerId)}}
	<table class="table table-striped" style="width: 900px">
		<tr>
			<th>Orden<br>Order</th>
			<th>Fecha de entrega<br>Delivery Date</th>
			<th>Proveedor<br>Supplier</th>
			<th>Estado<br>Status</th>
			<th>Comentarios<br>Remarks</th>
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
	<table class="table table-striped" style="width: 900px">
		<tr>
			<th>Producto<br>Product</th>
			<th>Referencia<br>Item</th>
			<th>Cantidad<br>Quantity</th>
			<th>¥ Valora unidad<br>Unit Price</th>
			<th>¥ Valor total<br>Total Price</th>
			<th>Accion<br>Action</th>
		</tr>
		@foreach($products as $product)
		<tr>
			<td>{{ $product->producto }}</td>
			<td>{{ $product->item }}</td>
			<td>{{ $product->cantidad }}</td>
			<td>{{ $product->precio }}</td>
			<td>{{ $product->cantidad * $product->precio }}</td>
			<td><a href="" class="btn btn-info">Ver / View</a></td-->
		</tr>
		@endforeach
	</table>
	{{ $products->links() }}
	<br>
	<br>
@stop