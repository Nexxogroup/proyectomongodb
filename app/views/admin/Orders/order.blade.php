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
			<td><a id="verProducto" href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">Ver / View</a></td><!--data-target="#myProducto" data-toggle="modal"-->
		</tr>
		@endforeach
	</table>
	{{ $products->links() }}
	<br>
	<br>
@stop

<!--script type="text/javascript">
$(document).ready(function(){
	//asociar un evento al boton ver
	$('#verProducto').click(function(){
		$.ajax({
			//la url para la peticion
			url: '';
			//la informacion a enviar
			data:{'hola'};
			//especifica el tipo de peticion post o get
			type:'POST';
			//el tipo de informacion que se esperea de respuesta
			dataType:'';
			//codigo a ejecutar si la peticion es satisfactoria;
			success: function(respuesta){
				$('#myProducto').html(respuesta);
			},
			//codigo a ejecutar si la peticion falla;
			error: function(xhr, status){
				alert('Disculpe, existe un problema');
			},
		});
	});
});
</script>