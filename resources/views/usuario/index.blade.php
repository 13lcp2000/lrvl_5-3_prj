@extends('layouts.admin')

<?php $message=Session::get('message')?>

<!--if($message == 'store') 
<div class="alert alert-warning alert-dismissible" role="alert">
	<button class="close" type="button" data-dismiss="alert" arial-label="close">
		<span aria-hidden="true">&times</span>
	</button>
	Usuario creado con exito! :D
</div>
endif--> 



@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
	<button class="close" type="button" data-dismiss="alert" arial-label="close">
		<span aria-hidden="true">&times</span>
	</button>
	{{Session::get('message')}}
</div>
@endif

@section('content')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Operacion</th>
		</thead>
		@foreach($users as $user)
		<tbody>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{!! link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary']) !!}</td>
		</tbody>
		@endforeach
	</table>

	{!!$users->render()!!}

@stop