@extends ('layout')

@section ('title') Customer List @stop

@section ('content') 

	<h1>Customer List</h1>

	<p>
		<a href="{{route('admin.users.create')}}" class="btn btn-primary">Create user</a>
	</p>

	<table class="table table-stirped" style="width: 900px">
		<tr>
			<th>Shipping Name</th>
			<th>Email address</th>
			<th>Actions</th>
		</tr>
		@foreach($customers as $customer)
		<tr>
			
			<td>{{ $customer->shippingName }}</td>
			<td>{{ $customer->email }}</td>

			<td><a href="/proyectomongodb/public/admin/customerDetail/{{{$customer->id}}}" class="btn btn-info">View</a></td>

			<td><a href="{{ route('admin.users.edit', $customer->id) }}" class="btn btn-primary">Edit</a></td>

		</tr>
		@endforeach
	</table>

	{{ $customers->links() }}

@stop