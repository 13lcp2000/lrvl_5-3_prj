
$("#registro").click(function(){
	var	dato  = $("#genero").val();
	var route = "http://localhost:9000/genero";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: {genero: dato},

		success:function(){
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			console.log(msj.responseJSON.genero);
			$("#msj").html(msj.responseJSON.genero);
			$("#msj-error").fadeIn();
		}
	});
});