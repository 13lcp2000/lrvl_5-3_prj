@extends('layouts.admin')

@section('content')

	<!-- aqui antes estaba el mensaje de validacion de los campos que no fueran vacios -->


	<!--form action="">
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Correo</label>
			<input type="text" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Contrasenia</label>
			<input type="password" class="form-control">
		</div>
		<button class="btn btn-primary">Registrar</button>
	</form-->
	
	@include('alerts.request')  <!-- esto me trae la plantilla de request que esta en la carpeta views/alerts -->
	<br> <!-- un saltico para que se vea mas bonito xD -->
	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
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