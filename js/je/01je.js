$(document).ready(function(){
	
	//VALORES PARA AJUSTAR EL POP
	var pxHeight = document.body.clientHeight;
	var pxWidth = document.body.clientWidth;
	var $newJe = $('#agregar_je a');
	
	/***********************************************************************************************************************************************/	
	//CAMBIO DE COLORES
	$(document).on("mouseenter", ".fa,#add", function(){
		//$(this).addClass('activo2');
	});
	
	$(document).on("mouseleave",  ".fa,#add", function(){
		//$(this).removeClass('activo2');
	});
	/***********************************************************************************************************************************************/
	$newJe.on('click',function(){
		//validaSesion();				//VALIDA SESION, VIENE DE FUNCIONALIDAD.JS
		
		var url_je = $('#baseUrl').val()+'je/je/pop_je';
		
		$("#nueva_je2").load(url_je);			//CONTROLADOR QUE LLEVA A LA VISTA "FORMULARIO JORNADA ELECTORAL"
		
		$(function() {
			//$('div[aria-describedby="nuevo_proyecto"]').css("z-index",100000);
			$("#nueva_je").dialog({
				autoOpen: true,
				resizable: true,
				show: {
			    	effect: "blind",
					duration: 300
				},
			    hide: {
			    effect: "clip",
			    duration: 300
			    },
				//height: pxHeight*.5,
				width: pxWidth*.50,
				modal: false,
				buttons: {
					"Agregar Jornada Electoral": function() {
						
						//VALIDACIONES EN PLANTILLA ANTERIOR
						//var formProject = "proyecto_publico";
						//if(validaFormPop(formProject)){}else{return false;}
						
						//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
						//var datos = $("#proyecto_publico").serializeArray();
						
						//PREPARAMOS LA INSERCION A LA BD
						/*
				        var url = $("#baseUrl").val()+'je/je/insertar_je';
				        
				        var petichon = $.ajax({
				            type: "POST",
				            dataType: 'json',
				            url: url,
				            data: datos
				        });
				        
				        petichon.done(function(respuesta){
				    		if(respuesta.codigo == 666){
				    				activaZonaMensaje('error',respuesta.mensaje);
							}else if(respuesta.codigo > 0){
									var link = $('#baseUrl').val()+'publicos/seguimiento';
									var refresca_proyectos = $('#baseUrl').val()+'publicos/administra_proyecto/tabla_proyectos';
									var complemento = '<br><br><a style="font-weight:bold; color:#FF3300;" href="'+link+'">'+		
													  'Ha sido completado el paso 1 "Agregar Datos iniciales del proyecto" para continuar con el registro presione aquí</a>';
					    			activaZonaMensaje('correcto',respuesta.mensaje+complemento);
					    			$('#principal').load(refresca_proyectos);
							}else if(respuesta.codigo < 0){
								activaZonaMensaje('error',respuesta.mensaje);
							}else{
								activaZonaMensaje('error',respuesta.mensaje);
							}
						});
						$( this ).dialog( "close" );
						*/
						
					}
		      	}			//BUTTONS
		    });			//DIALOG
		});			//FUNCION
		
	});
	/***********************************************************************************************************************************************/
});				//general*/