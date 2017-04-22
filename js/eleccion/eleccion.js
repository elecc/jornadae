$(document).ready(function(){
    	
	var $newCreae = $('#add_creae');
	var $btnCreae = $('#btn_creae');
	
	//LIMPIAMOS FORMULARIO EN CUANTO ABRA EL MODAL
	$btnCreae.on('click',function(){
		//LIMPIAMOS TODOS LOS CAMPOS
		$('#descripcioneleccion,#fecha_creaeleccion,#id_puestoe,#id_estado_eleccion, #mensajes').val('');
		$('#mensajes').hide();
	});
	
	//PREPARAMOS LOS DATAPICKERS
	$( "#fecha_creaeleccion" ).datepicker({			//ID DE LOS CAMPOS A LOS CUALES SE HARA DATEPICKER
		changeMonth: true,
		changeYear: true,
		//yearRange: "2012:2018"			//EJEMPLO DE RESTRICCION DEL SEXENIO
		//minDate: -20, 					//EJEMPLO DE RESTRICCION -20 DIAS
		//maxDate: "+1M +10D" 			//EJEMPLO DE RESTRICCION 1 MES + 10 DIAS
		//minDate: "-36M", 					//EJEMPLO DE RESTRICCION 3 AÑOS ATRAS
		//maxDate: "+36M"						//EJEMPLO DE RESTRICCION 3 AÑOS ADELANTE
    });
	$( "#fecha_creaeleccion" ).datepicker( "option", "showAnim", 'slide');			//OPCION DE ANIMACION (EFECTO) DEL CALENDARIO
	$( "#fecha_creaeleccion" ).datepicker( "option", "dateFormat", 'dd/mm/yy' );		//FORMATO DEL CALENDARIO
	
	$newCreae.on('click',function(){
		var descripcionE = $('#descripcioneleccion').val();
		var fechaE = $('#fecha_creaeleccion').val();
		var idPuestoE = $('#id_puestoe').val();
		var idEstadoE = $('#id_estado_eleccion').val();
		
		//VALIDAMOS FORMULARIO
		if(descripcionE == ""){
			$('#mensajes').html('Ingrese la descripción de la Elección').show();
			return false;
		}else if(fechaE == ""){
			$('#mensajes').html('Ingrese la fecha de la Elección').show();
			return false;
		}else if(idPuestoE ==0){
			$('#mensajes').html('Elija el Puesto').show();
			return false;
		}else if(idEstadoE ==0){
			$('#mensajes').html('Elija el Estado').show();
			return false;
		}else{
			$('#mensajes').html('').hide();
		}		
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_creaeleccion").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var insert_Elecc = $("#baseUrl").val()+'eleccion/creaeleccion/insertar_elecc';
	    
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: insert_Elecc,
	        data: datos
	    });
	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'eleccion/creaeleccion/refresca_Elecc';			//PARA REFRESCAR POR AJAX LA TABLA JE
				$.post(url_refresca, function(data){
				  $('#tabla_Elecc').html( data );
				});
				
				mostrarMensaje('correcto',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});
	});
});