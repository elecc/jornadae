$(document).ready(function(){
	
	var $newJe = $('#add_je');
	
	$newJe.on('click',function(){
		
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
	});
});	
