@extends ('layout')

@section ('title') Lista de Productos @stop

@section ('content')
	<h2>Lista de productos Orden # {{$order}}</h2>
	<h3>Product List Order # {{$order}}</h3>
	
	{{Form::open(array('action' => 'Admin_ProductsController@addProducto'))}}
	
	{{Form::text('numero', $order)}}
	{{Form::submit('Adicionar / Add Product', array('class'=>'btn btn-primary', 'name'=>'add'))}}
	
	<a href="{{ route('admin.users.show', Session::get('idcustomer')) }}" class="btn btn-primary">Guardar / Save</a>
	
	{{Form::close()}}

	<br>
	<table class="table table-stirped">
		<tr>
			<th>Producto / Product</th>
			<th>Ref# / Item#</th>
			<th>Cantidad / Quantity</th>
			<th>Precio / Price</th>
			<th>Color / Color</th>
			<th>Talla / Size</th>
			<th>Accion / Action</th>
		</tr>
		@foreach($productlist as $productos)
		<tr>
			<td>{{ $productos->producto }}</td>
			<td>{{ $productos->item }}</td>
			<td>{{ $productos->cantidad }}</td>
			<td>{{ $productos->precio }}</td>
			<td>{{ $productos->color }}</td>
			<td>{{ $productos->talla }}</td>
			<td></td>
		</tr>
		@endforeach
	</table>
	<br>
@stop