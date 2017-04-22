$(document).ready(function(){
	$('#pop_perfil').modal('show');
	
	var $modificarPerfil = $('#modificar_perfil');
	
	$modificarPerfil.on('click',function(){
		
		var idPerfil = $('#id_perfil').val();
		
		//VALIDAMOS FORMULARIO
		if(idPerfil == ""){
			$('#mensajes').html('Elija un perfil del combo').show();
			return false;
		}else{
			$('#mensajes').html('').hide();
		}
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_perfil").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var actualizaPerfil = $("#baseUrl").val()+'usuarios/usuarios/actualiza_perfil';
	    
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: actualizaPerfil,
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
