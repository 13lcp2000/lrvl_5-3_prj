@extends('layouts.admin')
	@section('content')
	{!!Form::open()!!}
	<div class="alert alert-success alert-dismissible" id="msj-success" role="alert" style="display:none">
		<strong>Genero Agregado Correctamente</strong>
	</div>

	<div class="alert alert-danger alert-dismissible" id="msj-error" role="alert" style="display:none">
		<strong id="msj"></strong>
	</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		@include('genero.form.genero')
		{!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
	{!!Form::close()!!}
	@endsection

	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@endsection