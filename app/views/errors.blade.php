{{--evaluamos si existe algún error al ingresar la informacion y lo mostramos en pantalla --}}
@if($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Por favor corrige los siguientes errores:</strong>
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif