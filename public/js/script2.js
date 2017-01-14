$(document).ready(function(){
	Carga();
});

function Carga() {
	var tablaDatos = $('#datos');
	var route = 'http://localhost:9000/generos'

	$('#datos').empty();
	$.get(route, function(res){
		$(res).each(function(key, value){
			tablaDatos.append(
				"<tr>"+
					"<td>"+value.genero+"</td>"+
					"<td>"+
						"<button value="+value.id+" OnClick='Mostrar(this);'  class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button>  "+
					    "<button value="+value.id+" OnClick='Eliminar(this);' class='btn btn-danger' >Eliminar</button>"+
					"</td>"+
				"</tr>"
				
			);
		});
	});
}

function Eliminar(btn){
	var route = "http://localhost:9000/genero/"+btn.value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			Carga();
			$("#msj-success").fadeIn();
			//esto se lo agregue para diferenciar que aqui esta eliminando un registro...
			$("#msj-success").html('<strong> Genero Eliminado Correctamente.</strong>'); 
			//le coloco la propiedad html para que cargue como un codigo html y no como texto...
		}
	});
}

function Mostrar(btn) {
	//console.log(btn.value);

	var route = "http://localhost:9000/genero/"+btn.value+"/edit"

	$.get(route, function(res){
		$("#genero").val(res.genero);
		$("#id").val(res.id);
	});
}


$("#actualizar").click(function(){
	var value = $("#id").val();
	var dato = $("#genero").val();
	var route = "http://localhost:9000/genero/"+value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {genero: dato},
		success: function(){
			Carga();
			$("#myModal").modal('toggle');
			$("#msj-success").fadeIn();
		}
	});
});