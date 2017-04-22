$(document).ready(function(){
	$('#pop_elimina').modal('show');
	
	var $eliminar = $('#eliminar_usuario');
	
	$eliminar.on('click',function(){
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_elimina").serializeArray();
		
		//VARIABLE DONDE SE ELIMINA
	    var eliminaUsuario = $("#baseUrl").val()+'usuarios/usuarios/elimina_usuario';
	    
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: eliminaUsuario,
	        data: datos
	    });
	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'usuarios/usuarios/refresca_admon';			//PARA REFRESCAR POR AJAX LA TABLA ADMINISTRADORES
				$.post(url_refresca, function(data){
				  $('#tabla_usr').html( data );
				});
				mostrarMensaje('correcto',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});
	});
});
