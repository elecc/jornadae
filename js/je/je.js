$(document).ready(function(){
    	
	var $newJe = $('#add_je');
	var $btnJe = $('#btn_je');
	
	//LIMPIAMOS FORMULARIO EN CUANTO ABRA EL MODAL
	$btnJe.on('click',function(){
		//LIMPIAMOS TODOS LOS CAMPOS
		$('#descripcion_je,#fecha_je,#id_estado_je,#mensajes').val('');
		$('#mensajes').hide();
	});
	
	//PREPARAMOS LOS DATAPICKERS
	$( "#fecha_je" ).datepicker({			//ID DE LOS CAMPOS A LOS CUALES SE HARA DATEPICKER
		changeMonth: true,
		changeYear: true,
		//yearRange: "2012:2018"			//EJEMPLO DE RESTRICCION DEL SEXENIO
		//minDate: -20, 					//EJEMPLO DE RESTRICCION -20 DIAS
		//maxDate: "+1M +10D" 			//EJEMPLO DE RESTRICCION 1 MES + 10 DIAS
		//minDate: "-36M", 					//EJEMPLO DE RESTRICCION 3 AÑOS ATRAS
		//maxDate: "+36M"						//EJEMPLO DE RESTRICCION 3 AÑOS ADELANTE
    });
	$( "#fecha_je" ).datepicker( "option", "showAnim", 'slide');			//OPCION DE ANIMACION (EFECTO) DEL CALENDARIO
	$( "#fecha_je" ).datepicker( "option", "dateFormat", 'dd/mm/yy' );		//FORMATO DEL CALENDARIO
	
	$newJe.on('click',function(){
		var descripcionJe = $('#descripcion_je').val();
		var fechaJe = $('#fecha_je').val();
		var idEstadoJe = $('#id_estado_je').val();
		
		//VALIDAMOS FORMULARIO
		if(descripcionJe == ""){
			$('#mensajes').html('Ingrese la descripción de la Jornada Electoral').show();
			return false;
		}else if(fechaJe == ""){
			$('#mensajes').html('Ingrese la fecha de la Jornada Electoral').show();
			return false;
		}else if(idEstadoJe == ""){
			$('#mensajes').html('Ingrese Estado').show();
			return false;
		}else{
			$('#mensajes').html('').hide();
		}		
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_je").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var insert_je = $("#baseUrl").val()+'je/je/insertar_je';
	    
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: insert_je,
	        data: datos
	    });
	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'je/je/refresca_je';			//PARA REFRESCAR POR AJAX LA TABLA JE
				$.post(url_refresca, function(data){
				  $('#tabla_je').html( data );
				});
				
				mostrarMensaje('correcto',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});
	});
});