@extends('layouts.admin')
@section('content')

	<br> <!-- un saltico para que se vea mas bonito xD -->
	{!!Form::model($user, ['route'=>['usuario.update', $user->id],  'method'=>'PUT'])!!}
		<!--div class="form-group">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del usuario'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Correo:')!!}
			{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el correo del usuario'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Password:')!!}
			{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el password del usuario'])!!}
		</div-->

		@include('usuario.forms.usr')

		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}	

@stop