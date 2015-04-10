@extends('layout')

@section('title')PackingList @stop

@section('content')
	<h1>Nueva Lista de Empaque</h1>
	<br>
	{{ Form::open(array(''), array('role' => 'form'))}}
	
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('bill', 'Bill')}}
			{{Form::number('bill', null, array('placeholder' => 'Factura', 'class' => 'form-control'))}}
		</div>
		<div class="form-group col-md-4">
			{{Form::label('amount', 'Total amount')}}
			{{Form::number('amount', null, array('placeholder' => 'Valor Total', 'class' => 'form-control'))}}
		</div>
	</div>
	
	{{Form::button('Save', array('type'=>'submit', 'class'=>'btn btn-primary'))}}
	{{ Form::close()}}
@stop