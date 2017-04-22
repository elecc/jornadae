$(document).ready(function(){
	$('#pop_admon').modal('show');
	var $newJe = $('#add_admon');
	
	$newJe.on('click',function(){
		
		//LIMPIAMOS TODOS LOS CAMPOS
		//$('#descripcion_je,#fecha_je,#id_estado_je,#mensajes').val('');
		//$('#mensajes').hide();
		
		var nombre = $('#nombre').val();
		var paterno = $('#paterno').val();
		var materno = $('#materno').val();
		var rfc = $('#rfc').val();
		var correo = $('#correo').val();
		
		//VALIDAMOS FORMULARIO
		if(nombre == ""){
			$('#mensajes').html('Ingrese nombre').show();
			return false;
		}else if(paterno == ""){
			$('#mensajes').html('Ingrese apellido paterno').show();
			return false;
		}else if(materno == ""){
			$('#mensajes').html('Ingrese apellido materno').show();
			return false;
		}else if(rfc == ""){
			$('#mensajes').html('Ingrese RFC').show();
			return false;
		}else if(correo == ""){
			$('#mensajes').html('Ingrese correo').show();
			return false;
		}else{
			$('#mensajes').html('').hide();
		}
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_admon").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var insertAdmon = $("#baseUrl").val()+'usuarios/usuarios/insertar_usuario';
	    
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: insertAdmon,
	        data: datos
	    });
	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'usuarios/usuarios/refresca_admon';			//PARA REFRESCAR POR AJAX LA TABLA ADMINISTRADORES
				$.post(url_refresca, function(data){
				  $('#tabla_usr').html( data );
				});
				mostrarMensaje('correcto',res.mensaje);
			}else if(res.codigo == -1){
				mostrarMensaje('error',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});
	});
});
