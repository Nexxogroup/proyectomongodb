@extends ('layout')

@section ('title') Clientes @stop

@section ('content') 

	<h1>Lista de Clientes / Customer List</h1>

	<p>
		<a href="{{route('admin.users.create')}}" class="btn btn-primary">Crear  / Create</a>
	</p>

	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Nombre de envio / Shipping Name</th>
			<th>Direccion de correo electronico / Email address</th>
			<th>Acciones / Actions</th>
		</tr>
		@foreach($customers as $customer)
		<tr>
			
			<td>{{ $customer->shippingName }}</td>
			<td>{{ $customer->email }}</td>

			<td><a href="/proyectomongodb/public/admin/customerDetail/{{{$customer->id}}}" class="btn btn-info">Ver / View</a></td>

			<td><a href="{{ route('admin.users.edit', $customer->id) }}" class="btn btn-primary">Editar / Edit</a></td>

		</tr>
		@endforeach
	</table>

	{{ $customers->links() }}

@stop