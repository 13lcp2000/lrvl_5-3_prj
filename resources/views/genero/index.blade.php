@extends('layouts.admin')
	@include('alerts.success')
	@section('content')
	@include('genero.modal')
	<br>
	<!--div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
  		<strong> Genero Actualizado Correctamente.</strong>
	</div-->

		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Operaciones</th>
			</thead>
			<tbody id="datos"></tbody>
		</table>
	@endsection

	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@endsection