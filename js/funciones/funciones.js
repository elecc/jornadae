//FUNCION QUE ACTIVA LOS MENSAJES EN VALIDACION DE FORMULARIOS, ETC.
function mostrarMensaje(tipo,mensaje){
	//SUCCESS (VERDE)	//INFO (AZUL)	//WARNING (AMARILLO)	//DANGER (ROJO)
	var icono = '';
	switch(tipo){
		case 'error': 	icono = 'glyphicon glyphicon-remove';
						tipo = 'danger';
						break;
		case 'correcto':icono = 'glyphicon glyphicon-ok';
						tipo = 'success';
						break;
		case 'mensaje': icono = 'glyphicon glyphicon-eye-open';
						tipo = 'info';
						break;
		case 'alerta': 	icono = 'glyphicon glyphicon-warning-sign';
						tipo = 'warning';
						break;
		default: 		icono = 'glyphicon glyphicon-warning-sign';
						tipo = 'error';
						mensaje = 'Asignación de tipo incorrecto. (Error: MSG0001)';
						break;
	}
	
	$.notify({
		// options
          icon: icono,
          title: '<strong>Atención: </strong>',
          message: mensaje
        },{
          // settings
          type: tipo
	});
}

function validaModal(formId){

	$(".requerido").each(function(){
		var objID = "#"+$(this).attr('id');          //Sacamos el ID de cada elemento que tiene la clase "requerido"
		if(objID=='#undefined'){         //SI NO ESTA DEFINIDO EL ID, MOSTRAMOS UN MENSAJE EN LA ZONA DE MENSAJES
			activaMensaje('error','Algunos elementos no tienen asignación de ID, se pueden presentar irregularidades en la validación');
		}
	});
	
	var parentObjID = "#"+formId;
	var errores = 0;
	$(parentObjID + " .requerido").each(function(){
		var objID = "#"+$(this).attr('id');
		
		if($(objID).val() == ''){
			errores++;
		}
	});
	if(errores == 0){
		return true;
	}else{
		return false;
	}	
}