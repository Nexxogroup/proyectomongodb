@extends ('layout')

@section ('title') Lista de Productos @stop

@section ('content')
	<h1>Lista de productos Orden # {{$order}}</h1>

	{{Form::open(array('route' => 'admin.orders.store', 'method' => 'POST', 'role' => 'form'))}}
	{{Form::text('numero', $order)}}
	{{Form::submit('Add Product', array('class'=>'btn btn-primary', 'name'=>'add'))}}
	<a href="{{route('admin.orders.index')}}" class="btn btn-primary">Save</a>
	{{Form::close()}}

	<br>
	<table class="table table-stirped">
		<tr>
			<th>Product</th>
			<th>Item#</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Color</th>
			<th>Size</th>
			<th>Remark</th>
			<th>Action</th>
		</tr>
		@foreach($productlist as $productos)
		<tr>
			<td>{{ $productos->producto }}</td>
			<td>{{ $productos->item }}</td>
			<td>{{ $productos->cantidad }}</td>
			<td>{{ $productos->precio }}</td>
			<td>{{ $productos->color }}</td>
			<td>{{ $productos->talla }}</td>
			<td>{{ $productos->remarks }}</td>
			<td></td>
		</tr>
		@endforeach
	</table>
	<br>
@stop