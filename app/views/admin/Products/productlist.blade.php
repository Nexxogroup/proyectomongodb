@extends ('layout')

@section ('title') Lista de Productos @stop

@section ('content')
	<p><h1 style="font-family:Verdana;">Lista de productos Orden # {{$order->numero}}</h1>
		<h2 style="font-family:Verdana;">Product List Order # {{$order->numero}}</h2></p>
	{{Form::hidden('numero', $order->numero)}}

	<p><a href="{{ route('admin.products.create', array('numero' =>  $order->numero)) }}" class="btn btn-primary">Adicionar / Add Product</a>
	<a href="{{ route('admin.users.show', Session::get('idcustomer')) }}" class="btn btn-primary">Guardar / Save</a></p>
	
	{{Form::close()}}

	<br>
	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Producto / Product</th>
			<th>Ref# / Item#</th>
			<th>Cantidad / Quantity</th>
			<th>Precio / Price</th>
			<th>Total / Total Price</th>
			<th>Color / Color</th>
			<th>Talla / Size</th>
			
		</tr>
		@foreach($productlist as $productos)
		<tr>
			<td>{{ $productos->producto }}</td>
			<td>{{ $productos->item }}</td>
			<td>{{ $productos->cantidad }}</td>
			<td>{{ $productos->precio }}</td>
			<td>{{ $productos->totalproducto}}</td>
			<td>{{ $productos->color }}</td>
			<td>{{ $productos->talla }}</td>
		</tr>
		@endforeach
	</table>
	{{ $productlist->links() }}
	<br>
@stop
	